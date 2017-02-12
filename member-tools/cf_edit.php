<?php
session_start(); // start up your PHP session! 
if ($_SESSION['myusername'] ) { 
?>
<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.2.232.244"/>
  <title>Edit Your Member Profile</title>
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
  
<script type="text/javascript"> 

function stopRKey(evt) { 
  var evt = (evt) ? evt : ((event) ? event : null); 
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
} 

document.onkeypress = stopRKey; 

</script>
 <link rel="stylesheet" type="text/css" href="member_tools_style.css" />
   </head>
 <? include('CF_header.php'); ?>
      <!-- content -->
      <h1 class="Heading-1" style="margin-bottom:30px;">Edit Your Member Profile</h1>
      <span class="pagedesc">Correct or update any information in the fields below.</span>
      <p style="margin-top:25px;"><span class="reqfield" style="margin-top:25px; margin-bottom:25px; margin-left:18px;">*All fields are required except Meetup Username.</span></p>


      <table style="margin-top:20px;" width="100%">
        <tr>
          <td><form name="contactform" action="cf_edit_action.php" method="post">
          <input type="hidden" name="contact_check" id="contact_check">
          
           <div style="display:none; margin-bottom:25px; color:#A10000; font-weight:bold;" id="modified_contact">Field(s) in red have been modified.  Record must be saved in order to save changes.</div>
         
            <div class="_100"> <span id="msgbox" style="display:none"></span> </div>
            <div style="clear: both;"></div>
            <?  
include ('connect.php');
$id = $_POST['account_id'];
$result = mysql_query("SELECT * from tblUserData where account_id='$id'");
while ($item = mysql_fetch_array($result)) {
echo "<input type='hidden' name='pw_vcheck1' id='pw_vcheck1' value=$item[cfpw]>";
echo "<input type='hidden' name='pw_vcheck2' id='pw_vcheck2'>";
echo "<input type='hidden' name='password_status' id='password_status'>";
echo "<input type='hidden' name='account_id' id='account_id' value='$id'>";
echo "<input type='hidden' name='pw_orig_md5' id='pw_orig_md5'>";
echo "<input type='hidden' name='pw_new_md5' id='pw_new_md5'>";
echo "<input type='hidden' name='pw_new2_md5' id='pw_new2_md5'>";
?>
<div class="_50">
              <p class="contactform">
                <label class="bold_label" id="meetup_label">Meetup Username</label>&nbsp;<span class="fieldexplain">(if known)</span>
                <input style="margin-bottom:0; padding-bottom:0;" autocomplete="off" onChange="Contact_Change('meetup_label');" class="contactform" id="meetup_username" name="meetup_username" type="text"  value="<?php echo $item['meetup_username']; ?>"/></p>
               </div>
              <div style="clear: both; margin-top:15px;"></div>
              
            <div class="_25">
              <p class="contactform">
                <label class="bold_label" id="fname_label" for="fname">First Name</label>
                <input autocomplete="off" class="contactform" id="fname" onChange="Contact_Change('fname_label');" name="fname" type="text" value="<?php echo $item['fname']; ?>"/></p>
    </div>
            <div class="_25">
              <p class="contactform">
                <label class="bold_label" id="lname_label" for="lname">Last Name</label>
               <input autocomplete="off" class="contactform" id="lname" onChange="Contact_Change('lname_label');" name="lname" type="text" value="<?php echo $item['lname']; ?>"/></p>
    </div>
              <div class="_50">
              <p class="contactform">
                <label class="bold_label" id="email_add_lanel" for="email_add">E-Mail Address</label>&nbsp;&nbsp;<span class="fieldexplain">(<a style="font-weight:bold" tabindex="-1" target="_blank"  href="mailto:info@cyclefolsom.com?Subject=Cycle%20Folsom--Email%20Address%20Change%20Request">Contact Admin to change your email address</a>)</span>
               <input style="background-color:#e0e0e0; font-style:italic" autocomplete="off" class="contactform" tabindex="-1" readonly id="email_add" name="email_add" type="text" value="<?php echo $item['email_add']; ?>"/></p>
              <span  class="fieldexplain">Your e-mail address will not be given away or sold. You may unsubscribe at any time.</span> </div>
            <div style="clear: both; margin-top:15px;"></div>
            <div class="_50">
              <p class="contactform">
                <label class="bold_label" id="street_label" for="street">Mailing Address</label>
                <input autocomplete="off" class="contactform" id="street" onChange="Contact_Change('street_label');" name="street" type="text" value="<?php echo $item['street']; ?>"/>
              </p>
            </div>
            <div class="_30">
              <p class="contactform">
                <label class="bold_label" id="city_label" for="city">City</label>
                <input autocomplete="off" class="contactform" id="city" onChange="Contact_Change('city_label');"  name="city" type="text" value="<?php echo $item['city']; ?>"/>
              </p>
            </div>
            <div class="_10">
              <p class="contactform">
                <label class="bold_label" id="state_label" for="state">State</label>
               <input autocomplete="off" class="contactform" id="state" onChange="Contact_Change('state_label');" name="state" type="text" value="<?php echo $item['state']; ?>"/>
              </p>
            </div>
            <div class="_10">
              <p class="contactform">
                <label class="bold_label" id="zip_label" for="zip">Zip</label>
                <input autocomplete="off" class="contactform" id="zip" onChange="Contact_Change('zip_label');" name="zip" type="text" value="<?php echo $item['zip']; ?>"/>
              </p>
            </div>
            <div style="clear: both;"></div>
             <div style="margin-top:20px;" class="_20">
              <p class="contactform">
                <label class="bold_label" id="gender_label">Gender</label>&nbsp;
                  <select class="contactform" name="gender" onChange="Contact_Change('gender_label');" id="gender">
<option value="Male" <?  if ($item['gender']=="Male")	{echo " selected ";}?>>Male</option>
<option value="Female" <?  if ($item['gender']=="Female")	{echo " selected ";}?>>Female</option>
</select>
              </p>
            </div>
            
            <div style="margin-top:20px;" class="_20">
              <p class="contactform">
                <label class="bold_label" id="phone_label" for="phone">Cell Phone</label>&nbsp;<a tabindex="-1" class="tip" href="#" data-tooltip="Cell phone numbers are used for emergencies only and will not be disclosed without your permission.">Info</a>
                <input class="contactform" id="phone" onChange="Contact_Change('phone_label');" name="phone" type="text" value="<?php echo $item['phone']; ?>"/>
              </p><span  class="fieldexplain">Cell phone numbers are used for emergencies only and will not be disclosed without your permission.</span>
            </div>
            
            <div style="margin-top:20px;" class="_20">
              <p class="contactform">
                <label class="bold_label" id="opt_in_label" for="in_user">Opt In?</label>
                &nbsp;<a tabindex="-1" class="tip" href="#" data-tooltip="Select Yes to receive emails from the administrator. Ensures that you’ll receive important membership announcements & updates.">Info</a>
                <select class="contactform" name="opt_in" onChange="Contact_Change('opt_in_label');" id="opt_in">
<option value="Yes" <?  if ($item['opt_in']=="Yes")	{echo " selected ";}?>>Yes</option>
<option value="No" <?  if ($item['opt_in']=="No")	{echo " selected ";}?>>No</option>
</select>
              </p><span  class="fieldexplain">Select Yes to receive emails from the administrator. Ensures that you’ll receive important membership announcements & updates.</span>
            </div>
            <div style="margin-top:20px;" class="_20">
              <p class="contactform">
                <label class="bold_label" id="label_profile_type" for="in_user">Profile Status</label>
                &nbsp;<a tabindex="-1" class="tip" href="#" data-tooltip="Select &quot;Public&quot; to allow other registered members to see your e-mail address and cell phone number. Select &quot;Private&quot; and only your name will be displayed.">Info</a>
                 <select class="contactform" name="profile_type" onChange="Contact_Change('label_profile_type');" id="profile_type">
<option value="Public" <?  if ($item['profile_type']=="Public")	{echo " selected ";}?>>Public</option>
<option value="Private" <?  if ($item['profile_type']=="Private")	{echo " selected ";}?>>Private</option>
</select>

              </p><span  class="fieldexplain">Select "Public" to allow other registered members to see your e-mail address and cell phone number. Select "Private" and only your name will be displayed</span>
            </div>
            <div style="clear: both; margin-top:15px;"></div>
           <a style="margin-left:15px; font-weight:bold;" href="javascript:ReverseDisplay('pwsection')">
<img src="images/change_pw.png">
</a> <div style="clear: both; "></div>


            <div id="pwsection" style="display:none; margin-top:25px;">
            <div class="_30">
              <p class="contactform">
                <label class="bold_label" for="street">Current Password<br> <span class="pwtext2">(at least 6 characters)</span></label>
                <input autocomplete="off" onChange="makemd5pw();" class="contactform" id="password0" name="password0" type="password" value=""/>
              </p>
            </div>
            
            <div class="_30">
              <p class="contactform">
                <label class="bold_label" for="street">New Password<br> <span class="pwtext2">(at least 6 characters)</span></label>
                <input autocomplete="off" class="contactform" onChange="makemd5pwj('password1','pw_new_md5');" id="password1" name="password1" type="password" value=""/>
              </p>
            </div>
            <div class="_30">
              <p class="contactform">
                <label class="bold_label" for="city">Re-Enter New Password<br>&nbsp;</label>
                <input autocomplete="off" class="contactform" onChange="makemd5pwj('password2','pw_new2_md5');" id="password2"  name="password2" type="password" value=""/>
              </p>
            </div>
                      <div style="clear: both;"></div></div>
            <div style="margin-top:15px;"><div style="float:left; "><input style="margin-left:15px;" type="image" src="images/submit_changes.png" alt="Proceed to Next Step" value="Proceed to Next Step" name="nextstep"/></div>  <div style="float:right;"><a href="index.php"><img src="images/exit_wo_saving.png"></a></div>       </div>    <div style="clear: both;"></div>
            <!--<INPUT TYPE="image" SRC="images/add_contact_sm.png" style="margin-top:30px;"  />
<a href="index.php"><img src="images/cancel.png" border="0"></a>-->


          </form></td>
        </tr>
      </table>
 <?
}//end while
?>
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