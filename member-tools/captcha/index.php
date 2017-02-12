<html>
<head>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/ajax.js"></script>
</head>
<body onLoad="document.getElementById('Name').focus();">
<?

if (empty($_POST)) {
	require_once('includes/sweetcaptcha.php');	?>
	<form name="RequestForm" id="RequestForm" method="post" action="ajax_sendRequest.php" onSubmit="if(validateForm()) { validateCaptcha(); } return false;">
        <p>Name: <input type="text" name="Name" id="Name" value="ff" placeholder="Name" /></p>
        <span id="captchaDiv"><? echo $sweetcaptcha->get_html(); ?></span>
	</form>
    
    
        <script>
			function doOnSuccess(form_id) {
				document.getElementById(form_id).action = "index.php";
				document.getElementById(form_id).submit();
			}
		</script>
        <script>
			function return_error(ErrorMsg, ErrorField) {
				if(ErrorMsg !== "") {
					alert(ErrorMsg);
					if(ErrorField !== "") {
						document.getElementById(ErrorField).focus();	
					}
					new_captcha("Information Needs To Be Corrected");
					return false;
				}				
			}
		</script>
        <script>
			function validateForm() {
				if(document.getElementById('Name').value == '') {
					return_error("Please enter your first name.", "Name");
					return false;
				}
				
				return true;				
			}
		</script>
        
        <? include("includes/captchaScripts.php"); ?>
        
        <?
        
} else {
	$Name = $_POST['Name']; ?>
    <p>You have successfully submitted <? echo $Name; ?>.</p>
    <input type="button" value="Submit Another Name" onClick="window.location.reload();"> <?	
} ?>
</body>
</html>
  
