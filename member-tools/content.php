<style type="text/css">
.failed_login {
	background-color:#a10000;
	color:#FFF;
	font-weight:bold;
	padding:3px;
}
td.jtable {padding: 5px; font-size:14px;} /* or you can target individual cells */
th.jtable {padding: 5px; font-size:14px; color:#FFF} /* or you can target individual cells */

#cfwrapper{
	width:900px;
	margin: 0 auto;
	margin-top:0px;
}
#cfleftcolumn, #cfrightcolumn {
    float: left;
    min-height: 130px;
}
#cfleftcolumn {
     width: 700px;
}

#cfrightcolumn {
     width: 190px;
	 padding-left:10px;
}
#cfwrapper2{
	width:900px;
	margin: 0 auto;
	margin-top:0px;
}
#cfleftcolumn2, #cfrightcolumn2 {
    float: left;
    min-height: 100px;
}
#cfleftcolumn2 {
     width: 700px;
}

#cfrightcolumn2 {
     width: 190px;
	 padding-left:10px;
}
 td.cf {
	 font-size:14;
 }
  td.cfgreen {
	  color:#390;
	 font-size:14;
 }
 td.cfred {
	 color:#A10000;
	 font-size:14;
 }
 td.cfyellow {
	  color:#e7b404 ;
	 font-size:14;
 }
 .cancelred
 {
	 color:#A10000;
	 font-size:14;
	 font-weight:bold;
 }
 .subtitle{
  color: #A10000;
  font-family: source-sans-pro, sans-serif;
  font-size: 14px;
  font-weight: 600;
  line-height: 1.35;
  padding: 8px 0px 0px;
  }
   .subtitle_black{
  color: #000;
  font-family: source-sans-pro, sans-serif;
  font-size: 14px;
  font-weight: 600;
  line-height: 1.35;
  padding: 8px 0px 0px;
  }
.pagedesc {
	font-size: 17px;
	color: #232323;
	font-family: source-sans-pro, sans-serif;
	line-height: 1.4;

	 }
table.padded-outside td { padding:4px; }
table.padded-table td { padding:4px; }
table.padded-table tr td.blk  {
	font-size:12;
}
.hero-unit2{padding:10px;margin-bottom:20px;font-size:14px;line-height:30px;color:inherit;background-color:#ebebeb;-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:6px}
</style>
<style>
 
.tip {
	font-size:11px}
/* Add this attribute to the element that needs a tooltip */
[data-tooltip] {
	position: relative;
	z-index: 2;
	cursor: pointer;
}

/* Hide the tooltip content by default */
[data-tooltip]:before,
[data-tooltip]:after {
  visibility: hidden;
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
	filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
	opacity: 0;
	pointer-events: none;
}

/* Position tooltip above the element */
[data-tooltip]:before {
	position: absolute;
	bottom: 150%;
	left: 50%;
	margin-bottom: 5px;
	margin-left: -80px;
	padding: 7px;
	width: 160px;
	-webkit-border-radius: 3px;
	-moz-border-radius:    3px;
	border-radius:         3px;
	background-color: #000;
	background-color: hsla(0, 0%, 20%, 0.9);
	color: #fff;
	content: attr(data-tooltip);
	text-align: center;
	font-size: 14px;
	line-height: 1.2;
}

/* Triangle hack to make tooltip look like a speech bubble */
[data-tooltip]:after {
	position: absolute;
	bottom: 150%;
	left: 50%;
	margin-left: -5px;
	width: 0;
	border-top: 5px solid #000;
	border-top: 5px solid hsla(0, 0%, 20%, 0.9);
	border-right: 5px solid transparent;
	border-left: 5px solid transparent;
	content: " ";
	font-size: 0;
	line-height: 0;
}

/* Show tooltip content on hover */
[data-tooltip]:hover:before,
[data-tooltip]:hover:after {
	visibility: visible;
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	opacity: 1;
}
</style>
<? 

function displayContent() {
include ('connect.php');
//Look up username and last logged in date and time
$account_id = $_SESSION['account_id'];  

	$uquery = "SELECT fname, email_add, payment_status from tblUserData WHERE account_id='$account_id'";
	$rRow = mysql_fetch_array(mysql_query($uquery)); 
	$userfname = $rRow['fname'];
	$uname = $rRow['email_add'];
	
	//$current_status used to determine whether to show RWGPS link
	$current_status = $rRow['payment_status'];
	
	$datequery = "SELECT time as logdate from tblLog WHERE username='$uname' and action = 'logon' ORDER BY time DESC LIMIT 1,1";

	$rRow = mysql_fetch_array(mysql_query($datequery)); 
	if ($rRow['logdate']==''){
		$NoLog="yes";}
	
	$udate = date('n/j/y', (strtotime($rRow['logdate']))); 
	$utime = date('g:ia', (strtotime($rRow['logdate']))); 

	
	
if ($_SESSION['isadmin']){
echo "<div style='float: left;'><h1 class='Heading-1'>Member Profile</h1>Welcome back, $userfname.";

echo ($NoLog == "yes") ? "" : "You last logged in on $udate at $utime";
//echo ($item['expiration_date']=='') ? "" : date('n/j/y', (strtotime($item['expiration_date'])));
echo "<span class='pagedesc'><br><br>Your profile, membership status, and payment history are shown below. You may edit your <br>profile or renew your membership at any time.  If you'd like to </span><span class = 'cancelred'>cancel </span><span class='pagedesc'>your membership, you can<br>do so by clicking <a href='cancel_membership.php'>here</a></span>.";

//Here we show the RWGPS club account info if the user is paid
if($current_status=="Paid"){
echo "<span class='subtitle_black'><br><br>Free RideWithGPS Club Access</span><br><span class='pagedesc'>Your Cycle Folsom membership includes access to our club's <a target='_blank' href='http://ridewithgps.com'>RideWithGPS.com</a> account and <br>provides some Premium features. <a target='_blank' href='http://ridewithgps.com/clubs/102-cycle-folsom?join_code=duSQ7OBakbBBlPNw'>Submit a request to join our RideWithGPS Club</a></span>.";}
 
echo "</div><div style='float: right; margin-right:57px;'><a href='admin/'><img src='images/admin_tools.png'></a><br><a href='logout.php'><img src='images/logout_sm.png'></a></div>";}
else {echo "<div style='float: left;'><h1 class='Heading-1'>Member Profile</h1>Welcome back, $userfname.";

echo ($NoLog == "yes") ? "" : "You last logged in on $udate at $utime";
echo "<span class='pagedesc'><br><br>Your profile, membership status, and payment history are shown below. You may edit your <br>profile or renew your membership at any time.  If you'd like to </span><span class = 'cancelred'>cancel </span><span class='pagedesc'>your membership, you can<br>do so by clicking <a href='cancel_membership.php'>here</a></span>.";

//Here we show the RWGPS club account info if the user is paid
if($current_status=="Paid"){
echo "<span class='subtitle_black'><br><br>Free RideWithGPS Club Access</span><br><span class='pagedesc'>Your Cycle Folsom membership includes access to our club's <a target='_blank' href='http://ridewithgps.com'>RideWithGPS.com</a> account and <br>provides some Premium features. <a target='_blank' href='http://ridewithgps.com/clubs/102-cycle-folsom?join_code=duSQ7OBakbBBlPNw'>Submit a request to join our RideWithGPS Club</a></span>.";}

echo "</div><div style='float: right; margin-right:57px;'><a href='logout.php'><img src='images/logout_sm.png'></a></div>";}
echo "<div style='clear: both;'></div>";
//echo "<span class='pagedesc'><br><br>Your profile, membership status, and payment history are shown below. You may edit your profile or renew your membership at any time.  If you'd like to </span><span class = 'cancelred'>cancel </span><span class='pagedesc'>your membership, you can do so by clicking <a href='cancel_membership.php'>here</a></span>.";
//Lookup user info
  


$result = mysql_query("SELECT * from tblUserData where account_id='$account_id'");
while ($item = mysql_fetch_array($result)) {
	?>
    <div id="cfwrapper" style="margin-top:30px;">
    <h5 class="subtitle" style="margin-bottom:0;">Member Name and Contact Info</h5>
	       <hr class="cf">
    <div id="cfleftcolumn">
    <? 
		if ($_SESSION['isadmin']){
			$_SESSION['adminname'] = $item['fname']." ".$item['lname'];
		}
	?>
         
	<table width="100%" border="0">
	<tr><td class="cf" width="300"><? echo $item['fname']." ".$item['lname']; ?></td><td class="cf" align="right">Meetup Username:&nbsp;&nbsp;</td><td class="cf"><? echo $item['meetup_username'];?></td></tr>
	<tr><td class="cf" width="300"><? echo $item['street'];?></td><td class="cf" align="right">E-Mail Address:&nbsp;&nbsp;</td><td class="cf"><? echo $item['email_add'];?></td></tr>
	<tr><td class="cf" width="300"><? echo $item['city'].", ".$item['state']." ".$item['zip'];?></td><td class="cf" align="right">Cell Phone:&nbsp;&nbsp;</td><td class="cf"><? echo $item['phone'];?></td></tr>
	<tr><td class="cf" width="300">&nbsp;</td><td class="cf" align="right">Profile Status:&nbsp;&nbsp;</td><td class="cf"><? echo $item['profile_type'];?></td></tr>
    	<tr><td class="cf" width="300">&nbsp;</td><td class="cf" align="right">Opt In:&nbsp;&nbsp;</td><td class="cf"><? echo $item['opt_in'];?></td></tr></table></div>
    <div id="cfrightcolumn"><form name="edit_profile" action="cf_edit.php" method="post">
    <input type='hidden' name='account_id' id='account_id' value="<? echo $_SESSION['account_id']; ?>">
    <input type="image" src="images/edit_profile.png" border="0" alt="Submit" /><br /><i>Click to edit your profile or change your password.</i></form>
    </div>
    </div>
     <div id="cfwrapper2" style="min-height:100px;">
    <h5 class="subtitle" style="margin-bottom:0;">Membership Status</h5><i>Memberships can be renewed up to 90 days in advance.</i>
	       <hr class="cf">
    <div id="cfleftcolumn2">
	<table width="100%" border="0"> 
    
     <? 

	  
	 //Determine membership status
	 switch ($item['payment_status']) {
		case "Paid":
		//Determine how many days until membership expires
		$date1 = new DateTime(date("n/j/y"));
		$date2 = new DateTime(date('n/j/y', (strtotime($item['expiration_date']))));
		$interval = $date2->diff($date1);
		$numdays = $interval->days;
		
		?><tr><td width="150" class="cf" align="right">Membership Type:&nbsp;&nbsp;</td><td class="cfgreen"><? echo $item['membership_level']; ?></td></tr>
		  <tr><td width="150" class="cf" align="right">Expiration Date:&nbsp;&nbsp;</td><td class="cfgreen"><? echo ($item['expiration_date']=='') ? "" : date('n/j/y', (strtotime($item['expiration_date'])));?></td></tr>
         <? // Check if status is active or expiring soon, based on date
		 if($numdays > 90) {
		 ?>
        <tr><td width="150" class="cf" align="right">Membership Status:&nbsp;&nbsp;</td><td class="cfgreen">Active/Current</td></tr>
    	
    	<? }
		else { 
		if($item['coupon_user']=="Yes"){
		?>
		<tr><td width="150" class="cf" align="right" valign="top">Membership Status:&nbsp;&nbsp;</td><td class="cfyellow">Expiring Soon!  To renew registration, use the "Apply Coupon" button at right.  If you do not have a coupon code, click <span style="font-weight:bold;"><a href="mailto:info@cyclefolsom.com?Subject=Cycle%20Folsom--Coupon%20Code%20Request">HERE</a> to request one.</td></tr>	<? }
		else { ?> <tr><td width="150" class="cf" align="right">Membership Status:&nbsp;&nbsp;</td><td class="cfyellow">Expiring Soon!</td></tr> <?  }
		}
		break;
		
		case "Unpaid":
		?><tr><td width="150" class="cf" align="right" valign="top">Membership Status:&nbsp;&nbsp;</td><td class="cfred">Unpaid - To complete registration, use the "Pay Fee" button at right.<br /><br />Note: If your registration is not completed within 30 days, including the acceptance of the Release of Liability waiver and payment (or coupon code), your registration profile will be removed from our database and you will need to restart the process from the beginning.</td></tr>
    	
    	<?
		
		break;
		
		case "Expired-Processed":
		case "Expired-Removed":
		case "Expired":
		if($item['coupon_user']=="Yes"){
		?><tr><td width="150" class="cf" align="right" valign="top">Membership Status:&nbsp;&nbsp;</td><td class="cfred">Expired - To renew registration, use the "Apply Coupon" button at right.  If you do not have a coupon code, click <span style="font-weight:bold;"><a href="mailto:info@cyclefolsom.com?Subject=Cycle%20Folsom--Coupon%20Code%20Request">HERE</a></span> to request one.</td></tr> <?
		} else { ?>
		<tr><td width="150" class="cf" align="right">Membership Status:&nbsp;&nbsp;</td><td class="cfred">Expired - To renew registration, use the "Renew" button at right.</td></tr>
	 <? } ?>
        
    	<tr><td width="150" class="cf" align="right">Expiration Date:&nbsp;&nbsp;</td><td class="cfred"><? echo ($item['expiration_date']=='') ? "" : date('n/j/y', (strtotime($item['expiration_date'])));?></td></tr>
    	<?
		
		break;
		
		case "Canceled":
		
		?><tr><td width="150" class="cf" align="right">Membership Status:&nbsp;&nbsp;</td><td class="cfred">Canceled</td></tr>
    	
    	<?
		
		break;
		
		case "Pending":
		
		?><tr><td width="150" class="cf" align="right">Membership Status:&nbsp;&nbsp;</td><td class="cfred">Pending administrator approval.</td></tr>
    	
    	<?
		
		break;
		
		case "No Waiver":
		
		?>
        <form action="sign_release_liability.php" name="liabform" id="liabform" method="post">
        <input type="hidden" name="account_id" value="<? echo $account_id; ?>" />
        <tr><td width="150" class="cf" align="right">Membership Status:&nbsp;&nbsp;</td><td class="cfred">Liability Waiver not submitted - Click <strong><a style="font-weight:bold;" href="javascript:document.liabform.submit();">HERE</a></strong> to submit.</form>
        </td></tr>
    	
    	<?
		
		break;
		
		default:
			
		?><tr><td width="150" class="cf" align="right">Status:&nbsp;&nbsp;</td><td class="cfred">ERROR--PLEASE CONTACT CYCLE FOLSOM ADMIN</td></tr>
    	<tr><td width="150" class="cf" align="right">Renewal Date:&nbsp;&nbsp;</td><td class="cfred">ERROR--PLEASE CONTACT CYCLE FOLSOM ADMIN</td></tr>
    	<?	 
	 }
	 
	 ?>
	
	
</table></div>
	<? 	// Here we account for whether the user completed all 3 steps of initial registration.  If the user's payment status is unpaid, that means they never complete all of the steps, so we dont show them the renew option and instead show them a Pay Membership option.
	if($item['payment_status']=="Pending" or $item['payment_status']=="No Waiver" or ($coupon_user="Yes" and $numdays > 90)) { 
	?>
     <div id="cfrightcolumn2">&nbsp;</div></div>
     <?
	 }
		else {
	if($item['payment_status']=="Unpaid") { 
	
		?>
        
        
        <div id="cfrightcolumn2"><form name="cf_renew" action="cf_resume_registration.php" method="post"><input type="hidden" name="account_id" id="account_id" value="<? echo $_SESSION['account_id']; ?>">    <input type="image" src="images/pay_fee.png" border="0" alt="Submit" /></form></div></div>
        <?	} else {
			
			if($item['coupon_user']=="Yes"){
			?>
                <div id="cfrightcolumn2"><form name="cf_renew_coupon" action="cf_renewal_coupon.php" method="post"><input type="hidden" name="account_id" id="account_id" value="<? echo $_SESSION['account_id']; ?>">    <input type="image" src="images/apply_coupon.png" border="0" alt="Submit" /></form></div></div>
	<? } 
	
	elseif ($item['membership_level']=="Ride Leader" OR $item['membership_level']=="Ride Leader Family" OR $item['membership_level']=="Sponsor")	{
		?>
    <div id="cfrightcolumn2"><form name="cf_renew" action="cf_renewal_ride_leader.php" method="post"><input type="hidden" name="account_id" id="account_id" value="<? echo $_SESSION['account_id']; ?>">    <input type="image" src="images/renew.png" border="0" alt="Submit" /></form></div></div>
	<? }
	else { ?>
    <div id="cfrightcolumn2"><form name="cf_renew" action="cf_renewal.php" method="post"><input type="hidden" name="account_id" id="account_id" value="<? echo $_SESSION['account_id']; ?>">    <input type="image" src="images/renew.png" border="0" alt="Submit" /></form></div></div>
    <? } } }?>
    
     <div id="cfwrapper">
    <h5 class="subtitle" style="margin-bottom:0;">Payment History</h5>
	       <hr class="cf">
    <div id="cfleftcolumn">
	<? $query  = "SELECT * FROM tblPaymentData where account_id='$account_id' order by payment_date desc";
	$result = mysql_query($query);
	echo "<table border='0' width='700'><tr bgcolor='#a20000'><th class='jtable'>Transaction Date</th><th class='jtable'>Transaction ID</th><th class='jtable'>Payment Type</th><th class='jtable' style='text-align:center;' >Print Receipt</th></tr>";
	while ($row = mysql_fetch_array($result)) {
	if($bgcolor=='#f4f4e9'){$bgcolor='#e0dfc9';}
	else{$bgcolor='#f4f4e9';}
	echo "<tr bgcolor=$bgcolor><td class='jtable'>".$row['payment_date']."</td><td class='jtable'>".$row['txn_id']."</td><td class='jtable'>".$row['payment_type']."</td>";
	if($row['payment_type']=='Coupon'){
	echo "<td class='jtable' align='center' width='100'>N/A</td></tr>";}
	else {
	echo "<td width='100' align='center' ><a href='print_receipt.php?txid=$row[txn_id]' target='_blank'><img height='20' src='images/print_printer.png'></a></td></tr>";}
	}
	echo "</table>";
	?>	
    </div>
    <div id="cfrightcolumn">&nbsp;</div>
    </div>
	
	<?
}
}//end while

function displayTempLogin($reset_code) {

//Look up temporary password based on reset code

	$pw_query = "SELECT * from tblResets WHERE reset_code = '$reset_code'";

	$rRow = mysql_fetch_array(mysql_query($pw_query)); 

	//$temp_pw = $rRow['temp_pw'];
	
	$temp_useremail = $rRow['email'];

	$expire_date = $rRow['expire_date'];
	

	if ($expire_date < date("Y-m-d")) {

		//Remove existing record
		
		
		mysql_query("DELETE FROM tblResets WHERE reset_code = '$reset_code'") or die(mysql_error());  

		echo "Your temporary password has expired.  You will need to reset your password again by clicking here - <a href='https://www.cyclefolsom.com/member-tools/reset_password.php'>Reset Password</a>"; }

		else { //Link has not expired, so allow password reset

		

	//echo"<br>".date('m/d/Y', (strtotime($expire_date)))."<br>";;

		

?>

<style type="text/css">

.new_pw {

	font-size: 11px;

	color: #F00;

}

.jtest {
	font-size: 24px;
}
</style>
<table class="padded-outside" width="450" border="2" cellpadding="0" cellspacing="1" bgcolor="#ffffff">

<tr>

<form id="templogin" method="post" action="password_reset_success.php">

<input type="hidden" id="username" name="username" value="<? echo $temp_useremail; ?>">

<td>
<table class="padded-table" width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">

<tr>
<td bgcolor="#a20000" colspan="3" style="color:#FFF"><strong>Password Reset</strong></td>

</tr>

<tr>

<td align="right">New Password<br><span class="new_pw">At least 6 characters</span></td>

<td>:</td>

<td><input name="password" type="password" id="password"></td>
</tr>
<tr>
<td align="right">Re-Enter New Password</td>
<td>:</td>
<td><input name="password-check" type="password" id="password-check"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td class="forgot_password">  <input type="submit" value="Submit" id="submit">
</td>
</tr>
</table>
</td>
</form>
<script type="text/javascript">
 var frmvalidator  = new Validator("templogin");
 frmvalidator.addValidation("password","req","Please enter your new password");
 frmvalidator.addValidation("password-check","req","Please re-enter your password");
  frmvalidator.addValidation("password","eqelmnt=password-check",
 "Your new passwords do not match. Please re-enter.");
 frmvalidator.addValidation("password","minlen=6","Your new password must be at least 6 characters in length.  Please re-enter.");
</script>

</tr>

</table>

<script type="text/javascript">

$(document).ready(function(){

$("#password").focus();

});

</script>

<? }  }

function displayLogin() {

?>
 <h1 class="Heading-1" style="margin-bottom:30px;">Login to Manage Your Profile or Renew Membership</h1>
 <span class="pagedesc">Welcome back to Cycle Folsom.</span>
 

<form method="post" action="index.php">

<p style="margin-top:25px;">E-Mail Address</p>
<input size="35" name="myusername" type="text" id="myusername">

<p style="margin-top:15px;" >Password</p>
<input size="35" name="mypassword" type="password" id="mypassword">
<br /><br /><a href="reset_password.php">Forgot your password?</a>
<br /><br /><br />
 <div style="margin-top:10px;"><div style="float:left; "><input type="image" src="images/login.png" alt="submit" value="submit" name="submit"/></div>  <div style="float:right;"><a href="/membership-tools.html"><img src="images/membership_tools.png"></a></div>       </div>    <div style="clear: both;"></div>
 


<div id="rcorners" style="background-color:#efefef; padding:10px; margin-top:25px;"><span class="subtitle" >Can't Login or Need an Account?</span><p style="margin-top:15px;">Only registered members of Cycle Folsom can login here. This is a different login than Meetup.com. If you are not a registered member of Cycle Folsom, <span style="font-weight:bold;"><a href="cf_register.php">click here to register</a></span>.</p><p style="margin-top:15px;">If you no longer have access to the e-mail address you registered with or need assistance with your account please e-mail <span style="font-weight:bold;"><a target="_blank"  href="mailto:info@cyclefolsom.com?Subject=Cycle%20Folsom--Login%20Help">info@cyclefolsom.com</a></span> to request an update to your Profile or request assistance.</p></div>
 
</form>


<script type="text/javascript">

$(document).ready(function(){

$("#myusername").focus();

});

</script>

<? } 

function displayFailedLoginAttempt() {

?>
 <h1 class="Heading-1" style="margin-bottom:30px;">Login to Manage Your Profile or Renew Membership</h1>
 <span class="pagedesc">A member profile has been setup for all members who joined prior to 9/29/13. We used the e-mail address that you provided when you joined (unless you provided a recent update). Log in using that e-mail address. For the initial launch of this system an e-mail was sent to that address together with a temporary password. Use that password or the password you created when editing your profile or joining though this system. If needed,
you can use the 'Forgot your password?' link below to reset your password.<br><br>If you no longer have access to the e-mail account that you registered with, please use the contact us form to submit a new address and request a change. </span>
 
<form method="post" action="">

<p style="margin-top:25px;">E-Mail Address</p>
<input size="35" name="myusername" type="text" id="myusername">

<p style="margin-top:35px;" ><span class="failed_login">Incorrect Password Entered</span><br /><br />Password</p>
<input size="35" name="mypassword" type="password" id="mypassword">
<br /><br /><a href="reset_password.php">Forgot your password?</a>
<br /><br /><br />


 <div style="margin-top:10px;"><div style="float:left; "><input type="image" src="images/login.png" alt="submit" value="submit" name="submit"/></div>  <div style="float:right;"><a href="/membership-tools.html"><img src="images/membership_tools.png"></a></a></div>       </div>    <div style="clear: both;"></div>

<div id="rcorners" style="background-color:#efefef; padding:10px; margin-top:25px;"><span class="subtitle">Can't Login?</span><p style="margin-top:15px;">Only registered members of Cycle Folsom can login here. This is a different login than Meetup.com. If you are not a registered member of Cycle Folsom, <span style="font-weight:bold;"><a href="cf_register.php">click here to register</a></span>.</p><p style="margin-top:15px;">If you no longer have access to the e-mail address you registered with, <span style="font-weight:bold;"><a target="_blank"  href="mailto:info@cyclefolsom.com?Subject=Cycle%20Folsom--Login%20Help">Contact Us</a></span> to request an update to your Profile.</p></div>
 
</form>

<? } 

function displayNoAccountScreen($bad_email) {

?>
 <h1 class="Heading-1" style="margin-bottom:30px;">Login Error</h1>
 <span class="pagedesc">There is no record of an account with the following email address:<p style="margin-top:25px; margin-left:20px; font-weight:bold; color:#a10000"><? echo "<strong>".$bad_email."</strong>"; ?></p></span>
 

<div id="rcorners" style="background-color:#efefef; padding:10px; margin-top:25px; margin-bottom:25px;"><span class="subtitle">Can't Login?</span><p style="margin-top:15px;">Only registered members of Cycle Folsom can login here. This is a different login than Meetup.com. If you are not a registered member of Cycle Folsom, <span style="font-weight:bold;"><a href="cf_register.php">click here to register</a></span>.</p><p style="margin-top:15px;">If you no longer have access to the e-mail address you registered with, <span style="font-weight:bold;"><a target="_blank"  href="mailto:info@cyclefolsom.com?Subject=Cycle%20Folsom--Login%20Help">Contact Us</a></span> to request an update to your Profile.</p></div>
 
<span class="pagedesc" style="margin-top:15px;"><a href="index.php">Click here to return to Login screen</a></span>
 
</form>


<script type="text/javascript">

$(document).ready(function(){
$("#mypassword").focus();


});

</script>

<? } 



function send_password_reset($user_email, $reset_code, $ip_add) {

include("connect.php");
require("../mailer/PHPMailerAutoload.php"); // path to the PHPMailerAutoload.php file.
			
		//email variables are set in /member-tools/connect.php
		$current_date = date("m-d-Y");
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->Mailer = "smtp";
		$mail->Host = "$email_server";
		$mail->Port = "465"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Username = "$email_username";
		$mail->Password = "$email_password";
		$mail->From     = "$email_from_address";
		$mail->FromName = "$email_from_name";
		//$mail->AddAddress($email_add);
		$mail->AddAddress($user_email);
		
		$mail->Subject  = "Cycle Folsom - Password Reset";
		$mail->Body     = "<html>
		
		<head>
		
		<title>Cycle Folsom Password Reset</title>
		
		</head>
		
		<body>
		
		You are receiving this email because you requested a password reset for the Cycle Folsom Membership Tools system. 
		
		<p>Please click on the following link to change your password.</p>
		
		<p><a href='https://www.cyclefolsom.com/member-tools/temp_password_reset.php?id=$reset_code'>Password Reset Link</a></p>
		
		<p>This request came from the IP address of ".$ip_add."</p>	 
		
		<p>If you did not make this request, please contact Cycle Folsom.</p>
		
		</body>
		
		</html>
		
		";

		    	$mail->AltBody = "This message requires HTML.";
		    $mail->WordWrap = 50;
			$mail->Send();


}

function send_password_reset_admin($user_fullname, $user_username, $ip_add) {

//require("../mailer/PHPMailerAutoload.php"); // path to the PHPMailerAutoload.php file.
		include("connect.php");		
		//email variables are set in /member-tools/connect.php
		$email_add = "info@cyclefolsom.com";
		$current_date = date("m-d-Y");
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->Mailer = "smtp";
		$mail->Host = "$email_server";
		$mail->Port = "465"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Username = "$email_username";
		$mail->Password = "$email_password";
		$mail->From     = "$email_from_address";
		$mail->FromName = "$email_from_name";
		//$mail->AddAddress($email_add);
		$mail->AddAddress($email_admin);
		
		$mail->Subject  = "Notification of Cycle Folsom Password Reset Request";
		
		$mail->Body     = "

<html>

<head>

<title>Cycle Folsom Password Reset</title>

</head>

<body>

The following user requested his/her email address on the Cycle Folsom Membership Tools System 

<p><strong>Name: ".$user_fullname."</strong></p>

<p><strong>Email: ".$user_username."</strong></p>

<p><strong>IP Address: ".$ip_add."</strong></p>	 </body>

</html>

";

		    $mail->AltBody = "This message requires HTML.";
		    $mail->WordWrap = 50;
			$mail->Send();
			

}

function displayPasswordReset() {

?>
<table class="padded-outside" width="450" border="2" cellpadding="0" cellspacing="1" bgcolor="#ffffff">

<tr>

<form method="post" action="">

<td>
<table class="padded-table" width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">

<tr>
<td bgcolor="#a20000" colspan="3" style="color:#FFF"><strong>Enter Email Address</strong></td>


</tr>

<tr>

<td align="right" width="78">Email</td>

<td width="6">:</td>

<td> <input size="35" name="myusername" type="text" id="myusername"></td>

</tr>

<tr>

<td>&nbsp;</td>

<td>&nbsp;</td>

<td ><input type="submit" name="submit" value="Reset">

</td>

</tr>
<tr>

<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>

<td>&nbsp;</td>

<td>&nbsp;</td>

<td class="blk"><a href="index.php">Back to Login Page</a></td>

</tr>

</table>

</td>

</form>

</tr>

</table>

<script type="text/javascript">

$(document).ready(function(){

$("#myusername").focus();

});

</script>

<? } 

function displayUsernameRequest() {

?>

<table width="400" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">

<tr>

<form method="post" action="">

<td>

<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">

<tr>

<td bgcolor="#BCC5D0" colspan="3"><strong>Username Request</strong></td>

</tr>

<tr>

<td width="43">Email</td>

<td width="6">:</td>

<td width="325"><input name="myemail" size="45" type="text" id="myemail"></td>

</tr>

<tr>

<td>&nbsp;</td>

<td>&nbsp;</td>

<td class="forgot_password"><input type="submit" name="submit" value="Request">

</td>

</tr>

<tr>

<td>&nbsp;</td>

<td>&nbsp;</td>

<td class="forgot_password"><a href="index.php">Back to Login Page</a></td>

</tr>



</table>

</td>

</form>

</tr>

</table>

<script type="text/javascript">

$(document).ready(function(){

$("#myemail").focus();

});

</script>

<? } function check_email_address($email) {

  // First, we check that there's one @ symbol, 

  // and that the lengths are right.

  if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {

    // Email invalid because wrong number of characters 

    // in one section or wrong number of @ symbols.

    return false;

  }

  // Split it into sections to make life easier

  $email_array = explode("@", $email);

  $local_array = explode(".", $email_array[0]);

  for ($i = 0; $i < sizeof($local_array); $i++) {

    if

(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&

↪'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",

$local_array[$i])) {

      return false;

    }

  }

  // Check if domain is IP. If not, 

  // it should be valid domain name

  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {

    $domain_array = explode(".", $email_array[1]);

    if (sizeof($domain_array) < 2) {

        return false; // Not enough parts to domain

    }

    for ($i = 0; $i < sizeof($domain_array); $i++) {

      if

(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|

↪([A-Za-z0-9]+))$",

$domain_array[$i])) {

        return false;

      }

    }

  }

  return true;

}

function genPassword($length) 
{
  // given a string length, returns a random password of that length
  $password = "";
  // define possible characters
  $possible = "0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $i = 0;
  // add random characters to $password until $length is reached
  while ($i < $length) {
    // pick a random character from the possible ones
   $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
    // we don't want this character if it's already in the password
    if (!strstr($password, $char)) {
      $password .= $char;
      $i++;
    }
  }
  return $password;
}

function genTempPassword($length) 
{
  // given a string length, returns a random password of that length
  $password = "";
  // define possible characters
  $possible = "123456789";
  $i = 0;
  // add random characters to $password until $length is reached
  while ($i < $length) {
    // pick a random character from the possible ones
   $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
    // we don't want this character if it's already in the password
    if (!strstr($password, $char)) {
      $password .= $char;
      $i++;
    }
  }
  return $password;
}

function record_user_action($user_username, $ip_add, $action) 

{

	mysql_query("INSERT INTO tblLog (username, ip_add, action) VALUES('$user_username', '$ip_add', '$action' ) ") or die(mysql_error());  

}

?>