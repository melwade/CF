<?php
session_start(); // start up your PHP session! 
if ($_SESSION['isadmin']) {
?>
<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.2.232.244"/>
  <title>Add New Member</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?272710960"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?4059369144"/>
  <link rel="stylesheet" type="text/css" href="cf_style.css" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>
<script type="text/javascript" src='js/message.js'></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<SCRIPT LANGUAGE="JavaScript" SRC="js/CalendarPopup.js"></SCRIPT>
<script src="js/gen_validatorv4.js" type="text/javascript"></script> 
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
    
 

<link rel="stylesheet" type="text/css" href="js/message_default.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<style>
.messageboxhide{
display:none;
}

.messagebox{
 
 float:left;
 width:auto;
 height:20px;
 margin-right:30px;
 border:1px solid #c93;
 background:#ffc;
}

.messageboxok{
 float:left;
 width:auto;
 height:20px;
 margin-right:30px;
 border:1px solid #349534;
 background:#C9FFCA;
 font-weight:bold;
 color:#008000;
}
.messageboxerror{
 float:left;
 width:auto;
 height:20px;
 margin-right:30px;
 border:1px solid #CC0000;
 background:#F7CBCA;
 font-weight:bold;
 color:#CC0000;
}
</style>
<script language="javascript">
$(document).ready(function()
{
	$("#email_add").blur(function()
	{
		if( $(this).val() ) {  
		$.post("email_availability.php",{ username:$(this).val() } ,function(data)
        {
		  if(data=='no') //email available
		  {}
		  else
		  {
		  {dhtmlx.alert({
    text: "The email address entereed is already in the system. ",
    callback: function() {$('#email_add').val(""); $('#email_add').focus();}
});}		  } 
        } );
		}
	});
	
});
</script>
   </head>
 <body>

   <? include('CF_header.php'); ?>

      <h1 class="Heading-1" style="margin-bottom:25px;">Add New Member</h1>
	  <table width="100%"><tr><td>
      <form name="contactform" action="add_member_action.php" method="post">
<div class="_100">
<span id="msgbox" style="display:none"></span>
</div>
<div style="clear: both;"></div>
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

<div class="_33">
    <p class="contactform"><label class="bold_label" for="email_add">Email</label><input autocomplete="off" class="contactform" id="email_add" name="email_add" type="text" value=""/></p>
    </div>  
    
<div class="_33">
    <p class="contactform"><label class="bold_label" for="fname">First Name</label><input autocomplete="off" class="contactform" id="fname" name="fname" type="text" value=""/></p>
    </div>

<div class="_33">
    <p class="contactform"><label class="bold_label" for="lname">Last Name</label><input autocomplete="off" class="contactform" id="lname" name="lname" type="text" value=""/></p>
    </div>
   <div style="clear: both;"></div>
   
<div class="_50">
    <p class="contactform"><label class="bold_label" for="street">Street</label><input autocomplete="off" class="contactform" id="street" name="street" type="text" value=""/></p>
    </div>  
<div class="_30">
    <p class="contactform"><label class="bold_label" for="city">City</label><input autocomplete="off" class="contactform" id="city"  name="city" type="text" value=""/></p></div>
<div class="_10">
    <p class="contactform"><label class="bold_label" for="state">State</label><input autocomplete="off" class="contactform" id="state" name="state" type="text" value="CA"/></p></div>
<div class="_10">
    <p class="contactform"><label class="bold_label" for="zip">Zip</label><input autocomplete="off" class="contactform" id="zip" name="zip" type="text" value=""/></p></div>
  <div style="clear: both;"></div>   
  <div class="_33">
    <p class="contactform"><label class="bold_label" for="phone">Phone</label><input class="contactform" id="phone" name="phone" type="text" value=""/></p>
    </div> 
    <div class="_33">
    <p class="contactform"><label class="bold_label" for="fname">Meetup Username</label><input autocomplete="off" class="contactform" id="meetup_username" name="meetup_username" type="text" value=""/></p>
    </div>
    
     
 <div class="_33">
    <p class="contactform"><label class="bold_label" for="phone">User Password</label><input class="contactform" id="password" name="password" type="text" value=""/></p>
    </div><div style="clear: both;"></div>
<div class="_15cal">
    <p class="contactform"><label class="bold_label" for="meetup_approval_date">Meetup Appr</label><input autocomplete="off" class="contactform" id="approval_date" name="approval_date" type="text" value=""/>
   </p> </div>
   <div class="_5cal"> <p class="contactform"><label class="bold_label" for="phone"><br /></label> <A HREF="#"
    onClick="cal.select(document.forms['contactform'].approval_date,'anchor1','MM/dd/yyyy'); return false;"
    NAME="anchor1" ID="anchor1"><img border="0" src="images/cal.gif" /></A> <A HREF="#"
    onClick="clearit('approval_date');return false;"
    NAME="clear1" ID="clear1"><img border="0" src="images/clear.png" /></A></p></div>
    
<div class="_20">
    <p class="contactform"><label class="bold_label" for="in_user">Membership Level</label><?php
include ('connect.php');	
$query = "SELECT level FROM tblMembershipLevels order by level asc"; 
$result = mysql_query($query); 
echo "<select class='contactform' name='membership_level'>";
while ($row = mysql_fetch_array($result)) {
	if ($row['level']=='Premium'){
	echo "<option selected value='" . $row['level'] . "'>" . $row['level'] . "</option>";	
	}
	else {
    echo "<option value='" . $row['level'] . "'>" . $row['level'] . "</level>"; }
}
echo "</select>";

?></p>
</div>

    <div class="_20">
    <p class="contactform"><label class="bold_label" for="in_user">Payment Status</label><?php
$query = "SELECT status FROM tblPaymentStatuses order by status asc"; 
$result = mysql_query($query); 
echo "<select class='contactform' name='payment_status'>";
while ($row = mysql_fetch_array($result)) {
	if ($row['status']=="Paid")
	{    echo "<option value='" . $row['status'] . "' selected>" . $row['status'] . "</option>"; }
	else {    echo "<option value='" . $row['status'] . "'>" . $row['status'] . "</option>";}
}
echo "</select>";

?></p>
</div>

<div class="_20">
    <p class="contactform"><label class="bold_label" for="in_user">Coupon User?</label>
    <select class="contactform" name="coupon_user" id="coupon_user">
<option value="Yes">Yes</option>
<option value="No" SELECTED>No</option>
</select>
    </p>
</div>
   <div style="clear: both;"></div>


<!--<div class="_15cal">
    <p class="contactform"><label class="bold_label" for="payment_accepted">Accepted Date</label><input autocomplete="off" class="contactform" id="accepted_date" name="accepted_date" type="text" value=""/>
   </p> </div>
   <div class="_5cal"> <p class="contactform"><label class="bold_label" for="phone"><br /></label> <A HREF="#"
    onClick="cal2.select(document.forms['contactform'].accepted_date,'anchor2','MM/dd/yyyy'); return false;"
    NAME="anchor2" ID="anchor2"><img border="0" src="images/cal.gif" /></A>
    <A HREF="#"
    onClick="clearit('accepted_date');return false;"
    NAME="clear2" ID="clear2"><img border="0" src="images/clear.png" /></A>
    </p></div>-->
    
<div class="_15cal">
    <p class="contactform"><label class="bold_label" for="next_renewal_date">Expiration Date</label><input autocomplete="off" class="contactform" id="expiration_date" name="expiration_date" type="text" VALUE="<? echo date('m/d/Y', strtotime('+1 year')); ?>"/>
   </p> </div>
   <div class="_5cal"> <p class="contactform"><label class="bold_label" for="next_renewal_date"><br /></label> <A HREF="#"
    onClick="cal3.select(document.forms['contactform'].expiration_date,'anchor3','MM/dd/yyyy'); return false;"
    NAME="anchor3" ID="anchor3"><img border="0" src="images/cal.gif" /></A>
     <A HREF="#"
    onClick="clearit('expiration_date');return false;"
    NAME="clear3" ID="clear3"><img border="0" src="images/clear.png" /></A>
    </p></div>

<div class="_20">
    <p class="contactform"><label class="bold_label" for="in_user">How Card Sent</label><?php
$query = "SELECT method FROM tblCardSentMethods order by method asc"; 
$result = mysql_query($query); 
echo "<select class='contactform' name='card_sent'>";
while ($row = mysql_fetch_array($result)) {
	if ($row['method']=='N/A'){
	echo "<option selected='selected' value='" . $row['method'] . "'>" . $row['method'] . "</option>";	
	}
	else {
    echo "<option value='" . $row['method'] . "'>" . $row['method'] . "</option>"; }
}
echo "</select>";

?></p>
</div>

<div class="_15cal">
    <p class="contactform"><label class="bold_label" for="card_sent_date">Date Card Sent</label><input autocomplete="off" class="contactform" id="card_sent_date" name="card_sent_date" type="text" value=""/>
   </p> </div>
   <div class="_5cal"> <p class="contactform"><label class="bold_label" for="card_sent_date"><br /></label> <A HREF="#"
    onClick="cal4.select(document.forms['contactform'].card_sent_date,'anchor4','MM/dd/yyyy'); return false;"
    NAME="anchor4" ID="anchor4"><img border="0" src="images/cal.gif" /></A>
     <A HREF="#"
    onClick="clearit('card_sent_date');return false;"
    NAME="clear4" ID="clear4"><img border="0" src="images/clear.png" /></A>
    </p></div
    
    
   ><div style="clear: both;"></div>

<div class="_25">
    <p class="contactform"><label class="bold_label" for="in_user">Opt In?</label>
    <select class="contactform" name="opt_in" id="opt_in">
<option value="Yes" selected>Yes</option>
<option value="No">No</option>
</select>
    </p>
</div>

<div class="_25">
    <p class="contactform"><label class="bold_label" for="in_user">Profile Type</label>
    <select class="contactform" name="profile_type" id="profile_type">
<option value="Public" >Public</option>
<option value="Private" selected>Private</option>
</select>
    </p>
</div>

<div class="_25">
    <p class="contactform"><label class="bold_label" for="in_user">User Level</label><?php
$query = "SELECT level FROM tblUserLevels order by level asc"; 
$result = mysql_query($query); 
echo "<select class='contactform' name='user_level'>";
while ($row = mysql_fetch_array($result)) {
	if ($row['level']=='Normal'){
	echo "<option selected='selected' value='" . $row['level'] . "'>" . $row['level'] . "</option>";	
	}
	else {
    echo "<option value='" . $row['level'] . "'>" . $row['level'] . "</option>"; }
}
echo "</select>";

?></p>
</div>


      <div style="clear: both;"></div>

<div class="_100">
    <p class="contactform"><label class="bold_label" for="email">Groups</label><br>
    <input  name="groups[]" type="checkbox" id="groups[]" style="margin-top:5px;" value="Doctor">Doctor
    <input  name="groups[]" type="checkbox" id="groups[]" style="margin-left:20px; margin-top:5px;" value="Management">Management
    <input  name="groups[]" type="checkbox" id="groups[]" style="margin-left:20px; margin-top:5px;" value="Medic">Medic
    <input  name="groups[]" type="checkbox" id="groups[]" style="margin-left:20px; margin-top:5px;" value="Nurse">Nurse

    </p>
    </div>  <div style="clear: both;"></div>
    



    <div class="_100">
    <p style="margin-top:15px;" class="contactform"><label class="bold_label" for="notes">Notes</label><textarea rows="5" class="contactform" id="notes" name="notes"></textarea></p>
     <div style="clear: both;"></div>	
<!--<INPUT TYPE="image" SRC="images/add_contact_sm.png" style="margin-top:30px;"  />
<a href="index.php"><img src="images/cancel.png" border="0"></a>-->
<input style="margin-bottom:20px;" type="image" name="Add Memeber" id="Add Member" src="images/add_member.png" value="Add Member"><br style="margin-top:25px;">
<a href="index.php">
<img src="images/cancel.png">
</a>
</form></td></tr></table>
</script>
	   <script type="text/javascript">var frmvalidator  = new Validator("contactform");
	  
	   frmvalidator.addValidation("fname","req","Please enter First Name");
	   frmvalidator.addValidation("password","minlen=6","Password must be at least 6 characters");
	   frmvalidator.addValidation("lname","req","Please enter Last Name");
	   frmvalidator.addValidation("street","req","Please enter Street Address");
	   frmvalidator.addValidation("city","req","Please enter City");
	   frmvalidator.addValidation("state","req","Please enter State");
	   frmvalidator.addValidation("zip","req","Please enter Zip");
	   frmvalidator.addValidation("phone","req","Please enter Cell Phone");
	   frmvalidator.addValidation("email_add","req","Please enter Email");
	   frmvalidator.addValidation("email_add","email", "Not a valid email address");
	 

	   </script>
     </div>
     <a class="anchor_item grpelem" id="thequestion"></a>
    
    </div>
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