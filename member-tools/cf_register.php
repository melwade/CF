<?	  
session_start(); ?>
<!DOCTYPE html>
<html class="html">
 <head>


  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.2.232.244"/>
  <title>New Member Registration (step 1 of 3)</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?272710960"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?4059369144"/>
  <link rel="stylesheet" type="text/css" href="cf_style.css" id="pagesheet"/>
  <!-- Other scripts -->
  <script src="js/gen_validatorv4.js" type="text/javascript"></script> 

  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>
<script type="text/javascript" src="message.js"></script>
<link rel="stylesheet" type="text/css" href="message_default.css">
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<SCRIPT LANGUAGE="JavaScript" SRC="js/CalendarPopup.js"></SCRIPT>
<script>
$(document).ready(function(){

$(".coupon_question").click(function() {
    if($(this).is(":checked")) {
        $(".answer").show();
        $('#couponhead').show();
        $('#stdhead').hide();
    } else {
        $(".answer").hide();
        $('#couponhead').hide();
        $('#stdhead').show();
    }
});
});
</script>
<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
<script>
jQuery(function($){
   $("#phone").mask("(999) 999-9999");
});
</script>
<script>
function clearit(date_val)
{
var panel = document.getElementById(date_val);
panel.value='';
}
</script>

	<SCRIPT LANGUAGE="JavaScript">
		var cal = new CalendarPopup();
		var cal2 = new CalendarPopup();
		var cal3 = new CalendarPopup();
		cal3.showYearNavigation();
		var cal4 = new CalendarPopup();
	</SCRIPT>
    
<script language="javascript">
//<!---------------------------------+
//  Developed by Roshan Bhattarai 
//  Visit http://roshanbh.com.np for this script and more.
//  This notice MUST stay intact for legal use
// --------------------------------->
$(document).ready(function()
{
	$("#email_add").blur(function()
	{
		if( $(this).val() ) {  
		//remove all the class add the messagebox classes and start fading
		//$("#msgbox").removeClass().addClass('messagebox').text('Checking Availability...').fadeIn("slow");
		//check the username exists or not from ajax
		$.post("username_availability.php",{ username:$(this).val() } ,function(data)
        {
		  if(data=='no') //if username not avaiable
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('This email address has already been registered.<br><br><a class="nav" href="index.php">Click here to login</a><br><br>Forgot your password?  <a class="nav" href="reset_password.php">Click here to recover it.</a>').addClass('messageboxerror').fadeTo(900,1);
			  setTimeout(function() { $("#contactform").fadeOut(); }, 2000);
			  //$('#nextstep').hide();
			 
			});		
          }
		  else
		  {/*
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Email address has is available.').addClass('messageboxok').fadeTo(900,1);	
			 
			});*/
		  }
		 //setTimeout(function() { $("#msgbox").fadeOut(); }, 18000);		
        });
		}
	});
	
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
	$("#coupon_code").blur(function()
	{
		if( $(this).val() ) {  
		
		$.post("coupon_availability.php",{ username:$(this).val() } ,function(data)
        {
		  if(data=='no') //if username not avaiable
		  {dhtmlx.alert("The coupon code entered is valid.  You can proceed to the next step.");}
		  else
		  {
		    {dhtmlx.alert({
    text: "The coupon code entered is not valid.  Please enter a valid code.",
    callback: function() {$('#coupon_code').val(""); $('#coupon_code').focus();}
});}		  }
        });
		}
	});
	
});
</script>

<link rel="stylesheet" type="text/css" href="message_default.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
 <link rel="stylesheet" type="text/css" href="member_tools_style.css" />
  <style>
 a.nav:link {color: #FFF; text-decoration: none; }
a.nav:visited {color: #FFF; text-decoration: none; }
a.nav:hover {color: #FFF; text-decoration: none; }
a.nav:active {color: #FFF; text-decoration: none; }
</style>
<style>
.messageboxhide{
display:none;
}
.messageboxok{

 width:auto;
 height:20px;
 margin-right:30px;
 border:1px solid #349534;
 background:#a10000;
 font-weight:bold;
 color:#ffffff;
}
.messageboxerror{
	text-align:center;
 float:left;
 height:90px;
 border:1px solid #CC0000;
 background:#a10000;
 font-weight:bold;
 color:#ffffff;
}
</style>

<script type="text/javascript"> 

function stopRKey(evt) { 
  var evt = (evt) ? evt : ((event) ? event : null); 
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
} 

document.onkeypress = stopRKey; 

</script>
   </head>
 <? include('CF_header.php'); ?>
      <!-- content -->
      <div id="stdhead"><h1 class="Heading-1" style="margin-bottom:30px;">New Member Registration (step 1 of 3)</h1><span class="pagedesc">This registration is required and is separate from your Meetup Membership (please make a note of your User Name and Password). This user profile will be used maintain club membership and payment status. Credit card info is NOT kept on file. You can edit your profile at any time after registration.</span></div>
      <div id="couponhead" style="display:none"><h1 class="Heading-1" style="margin-bottom:30px;">New Member Registration (with Coupon Code) (step 1 of 2)</h1>
      <span class="pagedesc">This form is used to confirm the membership contact info we have on file for you, to submit a liability waiver for you, and to enter the coupon code you have been given for free registration. You can edit your profile before continuing, or at any time after registration. <span style="font-weight:bold">NOTE</span>: This registration is separate from your Meetup registration. Please make note of 
your User name and Password for this site.</span></div>

<div style="width:400px; margin-bottom:20px; margin-left:auto; margin-right:auto;"> <span style="padding:5px; display:none width:600px;" id="msgbox"> </span>
</div>
            <div style="clear: both;"></div>
            
      
      
      <table style="margin-top:20px;" width="100%">
        <tr>
          <td><form name="contactform" id="contactform" action="cf_register_action.php" method="post">
        <p style="margin-top:5px; margin-bottom:20px;"><span class="reqfield" style="margin-top:25px; margin-bottom:25px; margin-left:18px;">*All fields are required except Meetup Username.</span></p>
            
            <!--<div class="_20">
    <p class="contactform"><label class="bold_label" for="in_user">Title</label><?php
/*$query = "SELECT title FROM tblTitles order by title asc"; 
$result = mysql_query($query); 
echo "<select class='contactform' name='title'><option value=''>----NONE----</option>";
while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['title'] . "'>" . $row['title'] . "</option>";
}
echo "</select>";
*/
?></p>
</div>-->
            <div class="_50">
              <p class="contactform">
                <label class="bold_label" for="email_add">Meetup Username</label>&nbsp;<span class="fieldexplain">(if known)</span>
                <input style="margin-bottom:0; padding-bottom:0;" autocomplete="off" class="contactform" id="meetup_username" name="meetup_username" type="text" value=""/></p>
               </div>
              <div style="clear: both; margin-top:15px;"></div>
              
            <div class="_50">
              <p class="contactform">
                <label class="bold_label" for="email_add">E-Mail Address</label>&nbsp;<a tabindex="-1" class="tip" href="#" data-tooltip="Your e-mail address will not be given away or sold. You may unsubscribe at any time.">Info</a>&nbsp;<span class="fieldexplain">(you will use this for site login)</span>
                <input style="margin-bottom:0; padding-bottom:0;" autocomplete="off" class="contactform" id="email_add" name="email_add" type="text" value=""/></p>
              <span  class="fieldexplain">Your e-mail address will not be given away or sold. You may unsubscribe at any time.</span> </div>
			<div class="_25">
              <p class="contactform">
                <label class="bold_label" for="fname">First Name</label>
                <input autocomplete="off" class="contactform" id="fname" name="fname" type="text" value=""/>
              </p>
            </div>
            <div class="_25">
              <p class="contactform">
                <label class="bold_label" for="lname">Last Name</label>
                <input autocomplete="off" class="contactform" id="lname" name="lname" type="text" value=""/></p>
              </div>
              
            <div style="clear: both; margin-top:15px;"></div>
            <div class="_50">
              <p class="contactform">
                <label class="bold_label" for="street">Mailing Address</label>
                <input autocomplete="off" class="contactform" id="street" name="street" type="text" value=""/>
              </p>
            </div>
            <div class="_30">
              <p class="contactform">
                <label class="bold_label" for="city">City</label>
                <input autocomplete="off" class="contactform" id="city"  name="city" type="text" value=""/>
              </p>
            </div>
            <div class="_10">
              <p class="contactform">
                <label class="bold_label" for="state">State</label>
                <input autocomplete="off" class="contactform" id="state" name="state" type="text" value="CA"/>
              </p>
            </div>
            <div class="_10">
              <p class="contactform">
                <label class="bold_label" for="zip">Zip</label>
                <input autocomplete="off" class="contactform" id="zip" name="zip" type="text" value=""/>
              </p>
            </div>
            <div style="clear: both; margin-bottom:20px;"></div>
            <div class="_20">
              <p class="contactform">
                <label class="bold_label" for="gender">Gender</label>&nbsp;
                 <select style="margin-bottom:0; padding-bottom:0;" class="contactform" name="gender" id="gender">
                  <option value="Male" selected>Male</option>
                  <option value="Female">Female</option>
                </select>
              </p>
            </div>
            
            <div class="_20">
              <p class="contactform">
                <label class="bold_label" for="phone">Cell Phone</label>&nbsp;<a tabindex="-1" class="tip" href="#" data-tooltip="Cell phone numbers are used for emergencies only and will not be disclosed without your permission.">Info</a>
                <input style="margin-bottom:0; padding-bottom:0;" class="contactform" id="phone" name="phone" type="text" value=""/>
              </p><span  class="fieldexplain">Cell phone numbers are used for emergencies only and will not be disclosed without your permission.</span>
            </div>
            
            <div class="_20">
              <p class="contactform">
                <label class="bold_label" for="in_user">Opt In?</label>
                &nbsp;<a tabindex="-1" class="tip" href="#" data-tooltip="Select Yes to receive emails from the administrator. Ensures that you’ll receive important membership announcements & updates.">Info</a>
                <select style="margin-bottom:0; padding-bottom:0;" class="contactform" name="opt_in" id="opt_in">
                  <option value="Yes" selected>Yes</option>
                  <option value="No">No</option>
                </select>
              </p><span  class="fieldexplain">Select Yes to receive emails from the administrator. Ensures that you’ll receive important membership announcements & updates.</span>
            </div>
            <div class="_20">
              <p class="contactform">
                <label class="bold_label" for="in_user">Profile Status</label>
                &nbsp;<a tabindex="-1" class="tip" href="#" data-tooltip="Select &quot;Public&quot; to allow other registered members to see your e-mail address and cell phone number. Select &quot;Private&quot; and only your name will be displayed.">Info</a>
                <select style="margin-bottom:0; padding-bottom:0;" class="contactform" name="profile_type" id="profile_type">
                  
                  <option value="Private" selected>Private</option>
                  <option value="Public" >Public</option>
                </select>
              </p><span  class="fieldexplain">Select "Public" to allow other registered members to see your e-mail address and cell phone number. Select "Private" and only your name will be displayed</span>
            </div>
            <div style="clear: both; "></div>
           
            <div class="_100" style="margin-top:5px;">
            <p class="contactform">
            <label for="coupon_question">Do you have a coupon code?</label>
            <input class="coupon_question" type="checkbox" name="coupon_question" id="coupon_question" value="1" />
            <span class="item-text">Yes</span>


	       <span class="answer" style="margin-left:25px; display:none;">
           <label for="coupon_field">Enter coupon code:</label>
           <input type="text" name="coupon_code" id="coupon_code"/></span><br><span class="answer" style="color:#A10000;  display:none;">After entering the coupon code, a message box will appear and let you know if the code is valid.
		   </span></p>

            </div>          <div style="clear: both;"></div>
             <div class="_30" style="margin-top:15px;">
              <p class="contactform">
                <label class="bold_label" for="street">Password <span class="pwtext2">(at least 6 characters)</span></label>
                <input autocomplete="off" class="contactform" id="password1" name="password1" type="password" value=""/>
              </p>
            </div>
            <div class="_30" style="margin-top:15px;">
              <p class="contactform">
                <label class="bold_label" for="city">Re-Enter Password</label>
                <input autocomplete="off" class="contactform" id="password2"  name="password2" type="password" value=""/>
              </p>
            </div>
                      <div style="clear: both;"></div>
            
                      
                       <div style="margin-top:15px;"><div style="float:left; "><input type="image" src="images/proceed_next_step.png" alt="Proceed to Next Step" value="Proceed to Next Step" name="nextstep" id="nextstep"/>  </div>  <div style="float:right;"><a href="/membership-tools.html"><img src="images/cancel_registration.png"></a></div>       </div>    <div style="clear: both;"></div>                       
            
            <!--<INPUT TYPE="image" SRC="images/add_contact_sm.png" style="margin-top:30px;"  />
<a href="index.php"><img src="images/cancel.png" border="0"></a>-->


          </form></td>
        </tr>
      </table>
      

	<script>function DoCustomValidation()
{
  var frm = document.forms["contactform"];
  if(frm.password1.value != frm.password2.value)
  {
    sfm_show_error_msg('The passwords entered do not match',frm.password1);
    return false;
  }
  
  else
  {
    return true;
  }
}

</script>

<script>function DoCustomValidationCoupon()
{
  var frm = document.forms["contactform"];
  if(frm.coupon_question.checked == true && frm.coupon_code.value== '')
  {
    sfm_show_error_msg('You checked the box for a coupon code but did not enter the coupon');
    return false;
  }
  
  else
  {
    return true;
  }
}

</script>
	   <script type="text/javascript">var frmvalidator  = new Validator("contactform");
	   frmvalidator.setAddnlValidationFunction(DoCustomValidation);
	   frmvalidator.setAddnlValidationFunction(DoCustomValidationCoupon);
	   frmvalidator.addValidation("fname","req","Please enter your First Name");
	   frmvalidator.addValidation("password1","minlen=6","Your password must be at least 6 characters");
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
