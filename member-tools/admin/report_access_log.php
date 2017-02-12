<?php
session_start(); // start up your PHP session! 
if ($_SESSION['isadmin']) {

//check if GET variable exists
if(isset($_POST['limiter'])) {
	$limiter=$_POST['limiter'];
}
else
{$limiter=100;
}	
	
?>
<!DOCTYPE html>
<html class="html">
 <head>
 <style>
 td.jtable {padding: 5px; font-size:14px;} /* or you can target individual cells */
 td.jtablered {padding: 5px; font-size:14px; color:#F00; font-style:italic;} /* or you can target individual cells */
th.jtable {padding: 5px; font-size:14px; text-align:center !important;} /* or you can target individual cells */
</style>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.2.232.244"/>
  <title>Access Log</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?272710960"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?4059369144"/>
  <link rel="stylesheet" type="text/css" href="cf_style.css" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>
<script LANGUAGE="JavaScript">
function confirmSubmit()
{
var agree=confirm("Are you sure you wish to delete this member?");
if (agree)
	return true ;
else
	return false ;
}
// -->
</script>

<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/message.js"></script>
<link rel="stylesheet" type="text/css" href="js/message_default.css">

<link rel="stylesheet" type="text/css" href="styles/style.css">


   </head>
 <body>
 <? // HERE WE CHECK IF THE COUPON CODE WAS PASSED AND ITS STATUS
$coupon_code_var=$_GET['code'];

if($coupon_code_var=="member_deleted"){
?><script>dhtmlx.alert("The user was removed successfully.");</script><? 
}
if($coupon_code_var=="member_not_deleted"){
?><script>dhtmlx.alert("There was an error processing your request.");</script><? 
}

  include('CF_header.php'); ?>
  
      <h1 class="Heading-1" style="margin-bottom:25px;">Access Log</h1>
      <div style="margin-top:15px; margin-bottom:10px;"><a href='reports.php'>Back to Reports Page</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href='index.php'>Back to Admin Page</a></div>
       <form id="myform" method="post">
		# of Log Files to Show: <select name = 'limiter' style = 'position: relative' onchange="change()">
	    <option value="100" <? if($limiter==100) {echo "SELECTED";}?>>100</option>
    	<option value="250" <? if($limiter==250) {echo "SELECTED";}?>>250</option>
	    <option value="500" <? if($limiter==500) {echo "SELECTED";}?>>500</option>
		</select>
	  </form><br>

<script>
function change(){
    document.getElementById("myform").submit();
}
</script>
	  <?
		include ('connect.php');

    /*	$result = mysql_query("SELECT id, fname, lname, payment_status, expiration_date,
	    DATEDIFF(DATE(expiration_date), CURDATE()) as 'DaysTillRenewal'
		FROM tblUserData
		WHERE
		DATEDIFF(DATE(expiration_date), CURDATE()) < 61 AND payment_status='Expired' AND
	    1=1 ORDER BY expiration_date DESC");
      */
	   $result = mysql_query("SELECT id, username, ip_add, action, time FROM tblLog ORDER BY time DESC LIMIT $limiter");
	    
		echo "<table bgcolor='#a20000' border='0' width='850'><tr bgcolor='#a20000'><th class='jtable'><font color='#fff'>Time</font></th><th class='jtable'><font color='#fff'>Email</font></th><th class='jtable'><font color='#fff'>Name</font></th><th class='jtable'><font color='#fff'>IP Address</font></th><th class='jtable'><font color='#fff'>Event</font></th></tr>";
		while ($row = mysql_fetch_array($result)) {

			if($bgcolor=='#f4f4e9'){$bgcolor='#e0dfc9';}
			else{$bgcolor='#f4f4e9';}
            
			
			echo "<tr bgcolor=$bgcolor >";
			echo "<td class='jtable' align='center' width='220'>".date('n/j/y g:iA', (strtotime($row['time'])))."</td>";
			echo "<td class='jtable' align='center' width='150'>$row[username]</td>";
			
			//See if there's an exisitng user for the email address in the log.  If so, show first and last name
			$membernameqry = "SELECT fname, lname from tblUserData WHERE email_add = '$row[username]'";
			$sv = mysql_query($membernameqry) or die(mysql_error()); 
			$row_sv = mysql_fetch_assoc($sv); 
			$totalRows_sv = mysql_num_rows($sv); 
			if ($totalRows_sv == 0) { 
			echo "<td>&nbsp;</td>"; }
			else {
			echo "<td class='jtable' align='center' width='200'>$row_sv[fname] $row_sv[lname]</td>";	
			}
			echo "<td class='jtable' align='center' width='100'>$row[ip_add]</td>";
			echo "<td class='jtable' align='center' width='180'>$row[action]</td>";
			echo "</tr>"; 
            
			
        }
		echo "</table>";
		
     ?>
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