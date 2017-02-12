<?php
session_start(); // start up your PHP session! 
if ($_SESSION['myusername'] ) { 
?>
<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.2.232.244"/>
  <title>Cancel Membership</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?272710960"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?4059369144"/>
  <link rel="stylesheet" type="text/css" href="cf_style.css" id="pagesheet"/>
  <!-- Other scripts -->
  <script src="js/gen_validatorv4.js" type="text/javascript"></script>
  <script type="text/javascript" language="JavaScript">

function ReverseDisplay(d) {
if(document.getElementById(d).style.display == "none") { document.getElementById(d).style.display = "block"; }
else { document.getElementById(d).style.display = "none"; }
}
//--></script>

  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>
<script src="js/md5.min.js"></script>
<script type="text/javascript" src='message.js'></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>


<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
<script>
jQuery(function($){
   $("#phone").mask("(999) 999-9999");
});
</script>

    
<script language="javascript">
//<!---------------------------------+
//  Developed by Roshan Bhattarai 
//  Visit http://roshanbh.com.np for this script and more.
//  This notice MUST stay intact for legal use
// --------------------------------->
$(document).ready(function()
{
	$("#username").blur(function()
	{
		if( $(this).val() ) {  
		//remove all the class add the messagebox classes and start fading
		$("#msgbox").removeClass().addClass('messagebox').text('Checking Availability...').fadeIn("slow");
		//check the username exists or not from ajax
		$.post("username_availability.php",{ username:$(this).val() } ,function(data)
        {
		  if(data=='no') //if username not avaiable
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('This username already exists').addClass('messageboxerror').fadeTo(900,1);
			  $("#username").val('');
			  $('#username').focus();
			});		
          }
		  else
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Username is available.').addClass('messageboxok').fadeTo(900,1);	
			 
			});
		  }
		 setTimeout(function() { $("#msgbox").fadeOut(); }, 8000);		
        });
		}
	});
	
});
</script>
 <script>
function Contact_Change(labelid) {
	document.getElementById(labelid).style.color = '#A10000';
		
	if (document.getElementById('contact_check').value!="Clicked") {
	$('#modified_contact').show(300).delay(8000);
	//$('#modified_contact').hide(300);
	//document.getElementById('jlist').style.display = "block";
	//dhtmlx.alert("Mailing List modified.  Claim must be saved in order to update the mailing list contacts.");
	}
	else {
	document.getElementById('contact_check').value="Clicked";}
	}

	//alertCorner("Mailing List Changed", "check", 4000);
</script>
<script>
function makemd5pw()
{
	var frm = document.forms["contactform"];
	var currentpwentered = (md5(frm.password0.value));
	frm.pw_vcheck2.value = currentpwentered;
	frm.pw_orig_md5.value = currentpwentered;
}
function makemd5pwj(plain, encrypted)
{
	var frm = document.forms["contactform"];
	document.getElementById(encrypted).value = (md5(document.getElementById(plain).value));
	//var currentpwentered = (md5(frm.fieldid.value));
	//frm.pw_new_md5.value = currentpwentered;
	//document.getElementById(fieldid).value=currentpwentered;
	
}

</script>
<link rel="stylesheet" type="text/css" href="message_default.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
  

 <link rel="stylesheet" type="text/css" href="member_tools_style.css" />
   </head>
 <? include('CF_header.php'); 
 if ($_SESSION['account_id'] == '') { ?>
 <h1 class="Heading-1" style="margin-bottom:30px;">Invalid Page Access</h1>
An error has ocurred while accessing this page.  Please log in using the following link:

<p><a href="https://www.cyclefolsom.com/member-tools/index.php">Login Link</a></p>

<a class="anchor_item grpelem" id="thequestion"></a> </div>
    <div class="verticalspacer"></div>
    <div class="clearfix colelem" id="u1130"><!-- group -->
     <div class="clearfix grpelem" id="u6597-4"><!-- content -->
      <p>© 2013 Cycle Folsom | Site Design by Stan Schultz</p>
     </div>
     <div class="clearfix grpelem" id="u6598-7"><!-- content -->
      <p>Special thanks to longtime CF member Carl Costas for contributing many of the professional photos on this site. See Carl's work at <a class="nonblock" href="http://www.carlcostas.com" target="_blank">CarlCostas.com</a>.</p>
     </div>
    </div>
   </div>
  </div>
  <!-- JS includes -->
  <script type="text/javascript">
   if (document.location.protocol != 'https:') document.write('\x3Cscript src="http://musecdn2.businesscatalyst.com/scripts/4.0/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script type="text/javascript">
   window.jQuery || document.write('\x3Cscript src="scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script src="scripts/museutils.js?3880880085" type="text/javascript"></script>
  <script src="scripts/jquery.tobrowserwidth.js?152985095" type="text/javascript"></script>
  <script src="scripts/jquery.musemenu.js?32367222" type="text/javascript"></script>
  <script src="scripts/webpro.js?33264525" type="text/javascript"></script>
  <script src="scripts/musewpdisclosure.js?250538392" type="text/javascript"></script>
  <script src="scripts/jquery.watch.js?4199601726" type="text/javascript"></script>
  <!-- Other scripts -->
  <script type="text/javascript">
   $(document).ready(function() { try {
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
$('.browser_width').toBrowserWidth();/* browser width elements */
Muse.Utils.prepHyperlinks(false);/* body */
Muse.Utils.initWidget('.MenuBar', function(elem) { return $(elem).museMenu(); });/* unifiedNavBar */
Muse.Utils.initWidget('#accordionu15508', function(elem) { return new WebPro.Widget.Accordion(elem, {canCloseAll:true,defaultIndex:-1}); });/* #accordionu15508 */
Muse.Utils.fullPage('#page');/* 100% height page */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
} catch(e) { Muse.Assert.fail('Error calling selector function:' + e); }});
</script>
   </body>
</html>
<? exit; }  ?>
      <!-- content -->
      <h1 class="Heading-1" style="margin-bottom:30px;">Cancel Your Membership</h1>
      <span class="pagedesc">We're sorry to see you go.  Please take a moment to tell us why you're leaving. </span>


      <table style="margin-top:20px;" width="100%">
        <tr>
          <td><form name="contactform" action="cf_cancel_action.php" method="post">
          
            <?  
include ('connect.php');
$id = $_SESSION['account_id'];


?>
<input type="hidden" name="member_id" id="member_id" value="<? echo $id; ?>">
<div class="_50">
              <p class="contactform">
                <label class="bold_label" for="email_add">Reason for canceling</label>&nbsp;<span class="fieldexplain">(optional)</span>
                <textarea style="border-width:thin; margin-top:15px;" rows="7" cols="50" name="cancel_reason" id="cancel_reason"></textarea></p>
               </div>
            <div style="clear: both;"></div>
             <input style="margin-left:18px; margin-top:15px;" type="checkbox" name="checker" value="on" id="checker">&nbsp;&nbsp;I wish to cancel my membership with Cycle Folsom.  I understand that I can renew at any time by paying the annual registration fee.
            
 <input style="margin-top:15px;" type="image" src="images/cancel_membership.png" border="0" alt="Submit" />

          </form>
           <script type="text/javascript">var frmvalidator  = new Validator("contactform");
	   
	   frmvalidator.addValidation("checker","shouldselchk=on", "You must check the box acknowledging your cancelation.");
	 

	   </script>
       </td>
        </tr>
      </table>

<script>
function jcustomv()
{
	var frm = document.forms["contactform"];
	var currentpw = frm.password0.value;
	var trimpw = (currentpw.trim());
	var currentpwlength = trimpw.length;
	var tempfld = frm.password1.value;
	if(currentpwlength == 0)
	{//document.getElementById('password_status').value='pwsame';
	return true;}

		else if(frm.pw_vcheck1.value != frm.pw_vcheck2.value)
		{sfm_show_error_msg('Value entered for current password is incorrect',frm.password0);
	    return false;}
	
		else if(frm.password1.value.length < 6)
			     {sfm_show_error_msg('The new password MUST be 6 characters or more',frm.password1);
		    return false;}
			
		else if(frm.password1.value != frm.password2.value)
			{sfm_show_error_msg('The new passwords entered do not match',frm.password1);
		    return false;}			
			
		else { document.getElementById('password_status').value='pwchange';
		return true;}
	}

</script>


	   <script type="text/javascript">var frmvalidator  = new Validator("contactform");
	   frmvalidator.setAddnlValidationFunction(jcustomv);
	   frmvalidator.addValidation("fname","req","Please enter your First Name");
	   frmvalidator.addValidation("lname","req","Please enter your Last Name");
	   frmvalidator.addValidation("street","req","Please enter your Street Address");
	   frmvalidator.addValidation("city","req","Please enter your City");
	   frmvalidator.addValidation("state","req","Please enter your State");
	   frmvalidator.addValidation("zip","req","Please enter your Zip");
	   frmvalidator.addValidation("phone","req","Please enter your Cell Phone");
	   frmvalidator.addValidation("email_add","req","Please enter your Email");
	   frmvalidator.addValidation("email_add","email", "Not a valid email address");
	 

	   </script>
      <a class="anchor_item grpelem" id="thequestion"></a> </div>
    <div class="verticalspacer"></div>
    <div class="clearfix colelem" id="u1130"><!-- group -->
     <div class="clearfix grpelem" id="u6597-4"><!-- content -->
      <p>© 2013 Cycle Folsom | Site Design by Stan Schultz</p>
     </div>
     <div class="clearfix grpelem" id="u6598-7"><!-- content -->
      <p>Special thanks to longtime CF member Carl Costas for contributing many of the professional photos on this site. See Carl's work at <a class="nonblock" href="http://www.carlcostas.com" target="_blank">CarlCostas.com</a>.</p>
     </div>
    </div>
   </div>
  </div>
  <!-- JS includes -->
  <script type="text/javascript">
   if (document.location.protocol != 'https:') document.write('\x3Cscript src="http://musecdn2.businesscatalyst.com/scripts/4.0/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script type="text/javascript">
   window.jQuery || document.write('\x3Cscript src="scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script src="scripts/museutils.js?3880880085" type="text/javascript"></script>
  <script src="scripts/jquery.tobrowserwidth.js?152985095" type="text/javascript"></script>
  <script src="scripts/jquery.musemenu.js?32367222" type="text/javascript"></script>
  <script src="scripts/webpro.js?33264525" type="text/javascript"></script>
  <script src="scripts/musewpdisclosure.js?250538392" type="text/javascript"></script>
  <script src="scripts/jquery.watch.js?4199601726" type="text/javascript"></script>
  <!-- Other scripts -->
  <script type="text/javascript">
   $(document).ready(function() { try {
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
$('.browser_width').toBrowserWidth();/* browser width elements */
Muse.Utils.prepHyperlinks(false);/* body */
Muse.Utils.initWidget('.MenuBar', function(elem) { return $(elem).museMenu(); });/* unifiedNavBar */
Muse.Utils.initWidget('#accordionu15508', function(elem) { return new WebPro.Widget.Accordion(elem, {canCloseAll:true,defaultIndex:-1}); });/* #accordionu15508 */
Muse.Utils.fullPage('#page');/* 100% height page */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
} catch(e) { Muse.Assert.fail('Error calling selector function:' + e); }});
</script>
   </body>
</html>
<?
}
else {
header( 'Location: https://www.cyclefolsom.com/member-tools/' ) ;
}?>