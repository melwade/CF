<?	  
session_start();
if ($_SESSION['isadmin']) {
include('connect.php');
$result = mysql_query("DELETE FROM tblCouponCodes
WHERE DATEDIFF( DATE( date_added ) , CURDATE( ) ) < -30
AND 1 =1");
	
 ?>
<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.2.232.244"/>
  <title>CF Member Admin</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?272710960"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?4059369144"/>
  <link rel="stylesheet" type="text/css" href="cf_style.css" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>
<script type="text/javascript" src="js/message.js"></script>
<script src="js/gen_validatorv4.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="js/message_default.css">
<script>
function makeid()
{
    var text = "";
    var possible = "123456789";

    for( var i=0; i < 5; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    var myf = document.getElementById("coupon_code");
	myf.value=text;
}
</script>
<script type="text/javascript" language="JavaScript"><!--
function HideContent(d) {
document.getElementById(d).style.display = "none";
}
function ShowContent(d) {
document.getElementById(d).style.display = "block";
}
function ReverseDisplay(d) {
if(document.getElementById(d).style.display == "none") { document.getElementById(d).style.display = "block"; }
else { document.getElementById(d).style.display = "none"; }
}
function ReverseDisplay2(d) {
if(document.getElementById(d).style.display == "none") { document.getElementById(d).style.display = "block"; document.getElementById("SmartSearch").focus(); }
else { document.getElementById(d).style.display = "none"; }
}

//--></script>


<script src="jquery-1.8.3.min.js"></script>
 <script type='text/javascript' src='jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
<script type="text/javascript">
$().ready(function() {
	
	$("#SmartSearch").autocomplete("get_member_list.php", {
		width: 400,
		matchContains: true,
		mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	
	$("#SmartSearch").result(function(event, data, formatted) {
		result_array = data[0].split('~');
		result_name = result_array[0].slice(0, -1);
		document.getElementById("SmartSearch").value=(result_name);
		document.getElementById("SmartSearchID").value=(data[1]);
		document.forms['SmartSearchForm'].submit();
	});
});
</script>

<style> 
#wrapper {
    width: 850px;
    overflow: hidden; /* will contain if #first is longer than #second */
}
#first {
    width: 500px;
    float:left; /* add this */
}
#second {
	display:block;
	padding:5px;
	border: 1px solid #A10000;
    overflow: hidden; /* if you don't want #second to wrap below #first */
}
#panel {
    padding: 20px;
}
.statsheader {
	font-size:15px;
	font-weight:bold;
	color:#A10000;
	text-align:center;
	margin:105px;
	margin-bottom:10px;
}
.statstitle {
	font-size:13px;
	font-weight:bold;
	
}
.statsnumber {
	font-size:13px;
	
}

</style>
   </head>
 <body>

<? // HERE WE CHECK IF THE COUPON CODE WAS PASSED AND ITS STATUS
$coupon_code_var=$_GET['code'];
$existing_code=$_GET['existing'];
if($coupon_code_var=="success"){
?><script>dhtmlx.alert("The coupon code was added successfully.");</script><? 
}
if($coupon_code_var=="duplicate"){
?><script>dhtmlx.alert("A coupon code already exists - <? echo $existing_code; ?>");</script><? 
}
if($coupon_code_var=="error"){
?><script>dhtmlx.alert("An error occurred while adding the coupon code. Please try again.");</script><? 
}
if($coupon_code_var=="member_deleted"){
?><script>dhtmlx.alert("The user was removed successfully.");</script><? 
}
if($coupon_code_var=="member_not_deleted"){
?><script>dhtmlx.alert("There was an error processing your request.");</script><? 
}

?>
 <? include('CF_header.php'); ?>
      <h1 style="margin-bottom:20px;" class="Heading-1">Admin</h1>
      
      <div id="wrapper">
<div id="first">
      <div style="margin-bottom:20px;"><a href="add_member.php"><img src="images/add_member.png"></a></div>
    <div style="margin-bottom:20px;"><a href="javascript:ReverseDisplay2('uniquename')">
<img src="images/edit_member.png">
</a>
<div id="uniquename" style="display:none; padding:15px;">
     <form name="SmartSearchForm" action="edit_member.php" autocomplete="off" method="post">
	<label class="claim" for="search_type">		
	<span class="claim" >Name or Email</span></label>
	
			<input class="claim" type="text" name="SmartSearch" id="SmartSearch" />
			<!--input type="button" value="Get Value" /-->
			<input type="hidden" name="SmartSearchID" id="SmartSearchID" />
		<!--<input type="submit" value="Submit" />-->
	</form>
</div></div>

	       	<div style="margin-bottom:20px;"><a href="reports.php"><img src="images/reports.png"></a></div>
          	<div style="margin-bottom:20px;"><a href="javascript:ReverseDisplay('coupon')" onClick="makeid();">
<img src="images/coupon_code.png">
</a>
<div id="coupon" style="display:none; padding:15px;">
<div style="margin-bottom:15px;"><a href="existing_coupon_codes.php">View Existing Coupon Codes</a></div>

     <form name="coupon" action="coupon_process.php" autocomplete="off" method="post">
     <span style="font-weight:bold">New Member or Renewal?</span>
     <input type="radio" name="coupon_type" value="New Member">New Member&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 <input type="radio" name="coupon_type" value="Renewal">Renewal<br><br>
	<span style="font-weight:bold">Email Address</span><br>
	<input class="claim" type="text" name="email_add" size="40" id="email_add" />
	<p style="margin-top:15px;">
	<span style="font-weight:bold">Code</span><br>
	<input class="claim" type="text" name="coupon_code" id="coupon_code" readonly /></p>
	<p style="margin-top:15px;"><input type="submit" value="Submit" /></p>
	</form>
     <script type="text/javascript">var frmvalidator  = new Validator("coupon");
	
	 frmvalidator.addValidation("coupon_type","selone_radio","Please select New Member or Renewal coupon type.");
	 frmvalidator.addValidation("email_add","req","Please enter a valid email address.");
	 frmvalidator.addValidation("email_add","email","Please enter a valid email address.");
	 
	 </script>
</div></div>
<div style="margin-bottom:20px;"><a href='pending_users.php'><img src="images/pending_users.png"></a></div>
<div style="margin-bottom:20px;"><a href='report_access_log.php'><img src="images/access_log.png"></a></div>
<div style="margin-bottom:20px;"><a href='../logout.php'><img src="images/logout.png"></a></div>
<div style="margin-bottom:20px;"><a href='../index.php'><img src="images/view_profile.png"></a></div>            
            </div>
            
<? //Run queries to get stats
include('connect.php');
$qry_paid = mysql_query("SELECT COUNT(*) AS id FROM tblUserData where payment_status='Paid' and coupon_user != 'Yes' and approval_date != ''");
$result_paid = mysql_fetch_array($qry_paid);
$count_paid = $result_paid["id"];

$qry_combined = mysql_query("SELECT COUNT(*) AS id FROM tblUserData where payment_status='Paid' and approval_date != ''");
$result_combined = mysql_fetch_array($qry_combined);
$count_combined = $result_combined["id"];

$qry_ride_leader = mysql_query("SELECT COUNT(*) AS id FROM tblUserData where user_level='Ride Leader' OR user_level='Admin'");
$result_ride_leader = mysql_fetch_array($qry_ride_leader);
$count_ride_leader = $result_ride_leader["id"];

$qry_ride_leader_family = mysql_query("SELECT COUNT(*) AS id FROM tblUserData where user_level='Ride Leader Family'");
$result_ride_leader_family = mysql_fetch_array($qry_ride_leader_family);
$count_ride_leader_family = $result_ride_leader_family["id"];

$qry_sponsor = mysql_query("SELECT COUNT(*) AS id FROM tblUserData where user_level='Sponsor'");
$result_sponsor = mysql_fetch_array($qry_sponsor);
$count_sponsor = $result_sponsor["id"];

$qry_unpaid = mysql_query("SELECT COUNT(*) AS id FROM tblUserData where payment_status='Unpaid'");
$result_unpaid = mysql_fetch_array($qry_unpaid);
$count_unpaid = $result_unpaid["id"];

$qry_pending = mysql_query("SELECT COUNT(*) AS id FROM tblUserData where membership_processed='0' AND (payment_status='Paid' OR payment_status='Pending')");
$result_pending = mysql_fetch_array($qry_pending);
$count_pending = $result_pending["id"];

$qry_expired = mysql_query("SELECT COUNT(*) AS id FROM tblUserData where payment_status='Expired'");
$result_expired = mysql_fetch_array($qry_expired);
$count_expired = $result_expired["id"];

$qry_training_gruppetto = mysql_query("SELECT COUNT(*) AS id FROM tblUserData where training_status=1");
$result_training_gruppetto = mysql_fetch_array($qry_training_gruppetto);
$count_training_gruppetto = $result_training_gruppetto["id"];

$qry_training_new_memeber_ride = mysql_query("SELECT COUNT(*) AS id FROM tblUserData where training_status=2");
$result_training_new_memeber_ride = mysql_fetch_array($qry_training_new_memeber_ride);
$count_training_new_memeber_ride = $result_training_new_memeber_ride["id"];

$qry_coupon = mysql_query("SELECT COUNT(*) AS id FROM tblUserData where payment_status='Paid' and coupon_user='Yes' and approval_date != ''");
$result_coupon = mysql_fetch_array($qry_coupon);
$count_coupon = $result_coupon["id"];

/*
$myqry="SELECT COUNT(*) AS id FROM tblUserData
WHERE payment_status =  'Paid'
AND card_sent_date < DATE_SUB( expiration_date, INTERVAL 1 YEAR ) 
AND approval_date !=  ''";
*/
$qry_renewals_to_process = mysql_query("SELECT COUNT(*) AS id FROM tblUserData
WHERE (payment_status =  'Paid'
AND card_sent_date < DATE_SUB( expiration_date, INTERVAL 1 YEAR ) 
AND approval_date !=  '') OR (payment_status='Paid' and card_sent_date='') ");
$result_renewals_to_process = mysql_fetch_array($qry_renewals_to_process);
$count_renewals_to_process = $result_renewals_to_process["id"];

?>            
            <div id="second"><span class="statsheader">Membership Stats</span>
            
            <p style="margin-top:20px;"><span class="statstitle">Paid Non-Coupon Members - </span><span class="statsnumber"><? echo $count_paid; ?></p>
			<p style="margin-top:20px;"><span class="statstitle"><a href="report_paidcoupon_users.php">Paid Coupon Members</a> - </span><span class="statsnumber"><? echo $count_coupon; ?></p>  
			<p style="margin-top:20px;"><span class="statstitle">Combined Paid Members - </span><span class="statsnumber"><? echo $count_combined; ?></p>  			
		    <p style="margin-top:20px;"><span class="statstitle"><a href="report_ride_leader.php">Ride Leaders</a> - </span><span class="statsnumber"><? echo $count_ride_leader; ?></p>
            <p style="margin-top:20px;"><span class="statstitle"><a href="report_ride_leader_family.php">Ride Leaders Family</a> - </span><span class="statsnumber"><? echo $count_ride_leader_family; ?></p>
            <p style="margin-top:20px;"><span class="statstitle"><a href="report_sponsors.php">Sponsors</a> - </span><span class="statsnumber"><? echo $count_sponsor; ?></p>
            <p style="margin-top:20px;"><span class="statstitle"><a href="pending_users.php">New Members</a> - </span><span class="statsnumber"><? echo $count_pending; ?></p>
            <p style="margin-top:20px;"><span class="statstitle"><a href="report_expired_users.php">Expired Members</a> - </span><span class="statsnumber"><? echo $count_expired; ?></p>
            <p style="margin-top:20px;"><span class="statstitle"><a href="report_training_gruppetto.php">Training - Gruppetto</a> - </span><span class="statsnumber"><? echo $count_training_gruppetto; ?></p>
            <p style="margin-top:20px;"><span class="statstitle"><a href="report_training_new_member_ride.php">Training - New Member Ride</a> - </span><span class="statsnumber"><? echo $count_training_new_memeber_ride; ?></p>
			
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
 <!-- <script type="text/javascript">
   if (document.location.protocol != 'https:') document.write('\x3Cscript src="jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script type="text/javascript">
   window.jQuery || document.write('\x3Cscript src="jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>-->
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