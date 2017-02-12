<?php
session_start(); // start up your PHP session! 
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

      <h1 class="Heading-1" style="margin-bottom:25px;">New Member Added</h1>
<?	  //Generate random Account ID
$account_id = genPassword(30);

	
$meetup_username = addslashes($_POST['meetup_username']);
$fname = ucwords(addslashes($_POST['fname']));
$lname = ucwords(addslashes($_POST['lname']));
$street = addslashes($_POST['street']);
$city = addslashes($_POST['city']);
$cfpw=md5(addslashes($_POST['password']));
$state = addslashes($_POST['state']);
$zip = addslashes($_POST['zip']);
$phone = addslashes($_POST['phone']);
$email_add = addslashes($_POST['email_add']);
$approval_date = date('Y-m-d', (strtotime($_POST['approval_date'])));	
$membership_level = addslashes($_POST['membership_level']);
$payment_status = addslashes($_POST['payment_status']);
$accepted_date = date('Y-m-d', (strtotime($_POST['accepted_date'])));
$expiration_date = date('Y-m-d', (strtotime($_POST['expiration_date'])));
$card_sent = addslashes($_POST['card_sent']);
$card_sent_date = date('Y-m-d', (strtotime($_POST['card_sent_date'])));
$opt_in = addslashes($_POST['opt_in']);
$coupon_user = addslashes($_POST['coupon_user']);
$profile_type = addslashes($_POST['profile_type']);
$user_level = addslashes($_POST['user_level']);
$notes = addslashes($_POST['notes']);
$groups_array=$_POST['groups'];
if ($groups_array) {  //Groups array has values
$groups = mysql_real_escape_string(implode(",", $_POST['groups'])); 
 }
else { $groups=""; }

/*
echo "<br>account_id Field is ".$account_id;
echo "<br>meetup_username Field is ".$meetup_username;
echo "<br>fname Field is ".$fname;
echo "<br>lname Field is ".$lname;
echo "<br>street Field is ".$street;
echo "<br>city Field is ".$city;
echo "<br>state Field is ".$state;
echo "<br>zip Field is ".$zip;
echo "<br>phone Field is ".$phone;
echo "<br>email_add Field is ".$email_add;
echo "<br>approval_date Field is ".$approval_date;
echo "<br>membership_level Field is ".$membership_level;
echo "<br>payment_status Field is ".$payment_status;
echo "<br>accepted_date Field is ".$accepted_date;
echo "<br>expiration_date Field is ".$expiration_date;
echo "<br>card_sent Field is ".$card_sent;
echo "<br>card_sent_date Field is ".$card_sent_date;
echo "<br>opt_in Field is ".$opt_in;
echo "<br>profile_type Field is ".$profile_type;
echo "<br>user_level Field is ".$user_level;
echo "<br>notes Field is ".$notes;
echo "<br>groups Field is ".$groups;
*/

$query="INSERT into tblUserData (account_id, cfpw, coupon_user, meetup_username, fname, lname, street, city, state, zip, phone, email_add, membership_level, payment_status, card_sent, opt_in, profile_type, user_level, notes, groups, approval_date, accepted_date, expiration_date, card_sent_date) VALUES ('$account_id', '$cfpw', '$coupon_user', '$meetup_username', '$fname', '$lname', '$street', '$city', '$state', '$zip', '$phone', '$email_add', '$membership_level', '$payment_status', '$card_sent', '$opt_in', '$profile_type', '$user_level', '$notes', '$groups', ";
$query.=$_POST['approval_date']=='' ? 'NULL, ' : "'".date('Y-m-d', (strtotime($_POST[approval_date])))."',";
$query.=$_POST['accepted_date']=='' ? 'NULL, ' : "'".date('Y-m-d', (strtotime($_POST[accepted_date])))."',";
$query.=$_POST['expiration_date']=='' ? 'NULL, ' : "'".date('Y-m-d', (strtotime($_POST[expiration_date])))."',";
$query.=$_POST['card_sent_date']=='' ? 'NULL)' : "'".date('Y-m-d', (strtotime($_POST[card_sent_date])))."')";

$result=mysql_query($query) or die;			 
$id = mysql_insert_id(); 
?>
<form name="memberform" action="edit_member.php" method="post">
<input type="hidden" name="SmartSearchID" id="SmartSearchID" value="<? echo $id; ?>" />
<input style="margin-bottom:20px;" type="image" src="images/edit_member.png" name="Edit Memeber" id="Edit Member" value="Edit Member"><br style="margin-top:25px;">
<a href="index.php">
  <img src="images/home_page.png"
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