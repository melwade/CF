<?php
session_start();
 // start up your PHP session! 
 if ($_SESSION['isadmin']) {
include('connect.php');
include('content.php');
?>
<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.2.232.244"/>
  <title>New Member Added</title>
  <!-- CSS -->
  <link href="assets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
	<!--Link the Spry TabbedPanels JavaScript library-->
	<script src="assets/SpryTabbedPanels.js" type="text/javascript"></script> 
  <link rel="stylesheet" type="text/css" href="css/site_global.css?272710960"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?4059369144"/>
  <link rel="stylesheet" type="text/css" href="cf_style.css" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>
<script type="text/javascript" src='message.js'></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<SCRIPT LANGUAGE="JavaScript" SRC="js/CalendarPopup.js"></SCRIPT>

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

<link rel="stylesheet" type="text/css" href="message_default.css">
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

   </head>
 <body>

  <? include('CF_header.php'); ?>

      <h1 class="Heading-1" style="margin-bottom:25px;">Member Edited Successfully</h1>
<?	  //Get post values

	
$member_id = addslashes($_POST['member_id']);
$meetup_username = addslashes($_POST['meetup_username']);
$gender = addslashes($_POST['gender']);
$pw = addslashes($_POST['password1']);
$fname = ucwords(addslashes($_POST['fname']));
$lname = ucwords(addslashes($_POST['lname']));
$street = addslashes($_POST['street']);
$city = addslashes($_POST['city']);
$state = addslashes($_POST['state']);
$zip = addslashes($_POST['zip']);
$phone = addslashes($_POST['phone']);
$email_add = addslashes($_POST['email_add']);
$cancel_date=($_POST['cancel_date']=='') ? "" : date('Y-m-d', (strtotime($_POST['cancel_date'])));
$meetup_removal_date=($_POST['meetup_removal_date']=='') ? "" : date('Y-m-d', (strtotime($_POST['meetup_removal_date'])));
$approval_date=($_POST['approval_date']=='') ? "" : date('Y-m-d', (strtotime($_POST['approval_date'])));
$membership_level = addslashes($_POST['membership_level']);
$coupon_user = addslashes($_POST['coupon_user']);
$payment_status = addslashes($_POST['payment_status']);
$training_status = addslashes($_POST['training_status']);
//$accepted_date=($_POST['accepted_date']=='') ? "" : date('Y-m-d', (strtotime($_POST['accepted_date'])));
$expiration_date=($_POST['expiration_date']=='') ? "" : date('Y-m-d', (strtotime($_POST['expiration_date'])));
$card_sent = addslashes($_POST['card_sent']);
$card_sent_date=($_POST['card_sent_date']=='') ? "" : date('Y-m-d', (strtotime($_POST['card_sent_date'])));
$opt_in = addslashes($_POST['opt_in']);
$profile_type = addslashes($_POST['profile_type']);
$user_level = addslashes($_POST['user_level']);
$notes = addslashes($_POST['notes']);
$cancel_reason = addslashes($_POST['cancel_reason']);
$groups_array=$_POST['group'];
if($pw!=""){
	$pw=md5($pw);}
if ($groups_array) {  //Groups array has values
$groups = mysql_real_escape_string(implode(",", $_POST['group'])); 
 }
else { $groups=""; }

$query = "update tblUserData
             set meetup_username= '".$meetup_username."',
             fname = '".$fname."',
             lname = '".$lname."',
             street = '".$street."',
			 city = '".$city."',
			 state = '".$state."',
   		     zip = '".$zip."',
			 phone = '".$phone."',
 			 gender = '".$gender."',
   		     email_add = '".$email_add."',
			 membership_level = '".$membership_level."',
			 coupon_user = '".$coupon_user."',
			 payment_status = '".$payment_status."',
			 training_status = '".$training_status."',
 			 card_sent = '".$card_sent."',
   		     opt_in = '".$opt_in."',
			 profile_type = '".$profile_type."',
			 user_level = '".$user_level."',
 			 notes = '".$notes."',
			 cancel_reason = '".$cancel_reason."',
   		     groups = '".$groups."',";
			 
if ($pw!="") {
   $query .= "cfpw = '$pw', ";
}

if ($approval_date!="") {
   $query .= "approval_date = '$approval_date', ";
}
else { $query .= "approval_date = NULL, "; }

if ($expiration_date!="") {
   $query .= "expiration_date = '$expiration_date', ";
}
else { $query .= "expiration_date = NULL, "; }

if ($card_sent_date!="") {
   $query .= "card_sent_date = '$card_sent_date', ";
}
else { $query .= "card_sent_date = NULL, "; }

if ($cancel_date!="") {
   $query .= "cancel_date = '$cancel_date', ";
}
else { $query .= "cancel_date = NULL, "; }

if ($meetup_removal_date!="") {
   $query .= "meetup_removal_date = '$meetup_removal_date' ";
}
else { $query .= "meetup_removal_date = NULL "; }

$query .="where id = $member_id";


$result=mysql_query($query) or die;			 

?>
<a href="index.php">
  <input type="button" value="Return to Admin Page" />
</a>
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