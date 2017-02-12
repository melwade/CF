<script>
	function new_captcha(msg) {
		fix_captcha(msg);
		document.getElementById('resetlink').click();
	}
</script>
<script>
	function fix_captcha(msg) {
		if(typeof msg == "undefined"){msg="";}
		var modifyCaptch = setInterval(function(){
			if($("#scpowered:contains('Powered')").length) {
				$('#scpowered').hide();
				$('#scpowered').text(msg);
				$('#scpowered').css('background-image','url()');
				$('#scpowered').css('color','red');
				$('#scpowered').css('font-size','15px');
				$("#scpowered").fadeIn("10");
				$('a.reset').attr('id', 'resetlink');
				$("#resetlink").css('display','none');
				$('div.sweetcaptcha').css('height','100px');
				$('div.sweetcaptcha').css('background','none');
				$('div.sweetcaptcha').css('box-shadow','none');
				$('#captchaDiv').each(function () {
					$('p').each(function () {
						var p = $(this).html();
						if (p.indexOf("Verify") >= 0) {
							p = p.replace("Verify your real existence<br>", "");
							$(this).html(p);
						}
					});
				});
				if(msg !== ""){
					setTimeout(function(){ 
						$("#scpowered").fadeOut("10"); 
					}, 1500);
				}
				clearInterval(modifyCaptch);
			}
		},1);
	}
	fix_captcha();
</script>
<script>
	function validateCaptcha() {
		var found = "false";
		var form_id = "";
		var span_id = "";
		$('form').each(function () {
			form_id = $(this).attr('id');
			$('span').each(function () {
				span_id = $(this).attr('id');
				if(span_id == "captchaDiv") {
					found = "true";
					return false;
				}
			});
			if(found == "true") {
				return false;
			}
		});
		var action = $("#"+form_id).attr('action');
		
		$.ajax({
			type:"POST",
			data: $("#"+form_id).serializeArray(),
			url: action,
			async: false,
			success: function(results) {
				//Check Critical Error
				var CriticalErrorResult = GetAjaxResult("CriticalError", results);
				if(CriticalErrorResult !== "") {
					new_captcha(CriticalErrorResult);
					return false;
				}
					
				//Show Non-Critical Errors
				var ErrorResult = GetAjaxResult("Error", results);
				for (var i = 0; i < ErrorResult.length; i++) {
					//alertCorner(ErrorResult[i], "info", 6000);
				}
				
				//Show Info
				var InfoResult = GetAjaxResult("Info", results);
				for (var i = 0; i < InfoResult.length; i++) {
					//alertCorner(InfoResult[i], "info", 4000);
				}
				
				//Show Success
				var SuccessResult = GetAjaxResult("Success", results);
				for (var i = 0; i < SuccessResult.length; i++) {
					//alertCorner(SuccessResult[i], "check", 4000);
				}
				
				
				doOnSuccess(form_id);
				return true;
					
			},
			error: function(xhr, status, error) {
				alert("Error Code 207: " + error);
			}
		});
		return false;
	}
</script>