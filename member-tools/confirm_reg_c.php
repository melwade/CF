<? session_start();
if ($_SESSION['myusername'] ) { 
include('connect.php'); 
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
$account_id=$_POST['account_id'];
//Here we update the payment status to pending because we know they confirmed the registration and agreed to the liability waiver
$result = mysql_query("UPDATE tblUserData SET payment_status='Pending' WHERE account_id='$account_id'") 
or die(mysql_error());  
//We also need to send an email to Admin informing of a new user being added
//Get user info for email
	$userqry = "SELECT fname, lname, email_add from tblUserData WHERE account_id = '".$account_id."'";
	$userRow = mysql_fetch_array(mysql_query($userqry)); 
	$fname = $userRow['fname'];
	$lname = $userRow['lname'];
	$email_add = $userRow['email_add'];
	$meetup_username = $userRow['meetup_username'];
	
//Need to add a payment entry for this user showing a coupon was applied

		$current_date=date('m-d-Y');
		$transactionId = genPassword(15);//Can't have duplicates in transaction ID field
		$paymentStatus='Completed';
		$paymentType="Coupon";
		$query="INSERT IGNORE into tblPaymentData (payment_date, txn_id, payment_status, account_id, payment_type) VALUES ('$current_date', '$transactionId', '$paymentStatus', '$account_id', '$paymentType')";
		$result=mysql_query($query);

		//Update user to show payment status as paid and expiration date to 1 year out
		//Clear out meetup_removal_date, cancel_date
			$todays_date=date('Y-m-d');
			$query = "SELECT expiration_date from tblUserData WHERE account_id = '$account_id'";
			$rRow = mysql_fetch_array(mysql_query($query)); 
			$expiry_date = ($rRow['expiration_date']);
			if(empty($expiry_date)){ //empty value means a new registration so add 1 year to current date
			$new_expiry_date=date('Y-m-d', strtotime('+1 year')); }
			else {
				//check if expiry date is in the past.  If it is, add 1 year to todays date
				if($todays_date>$expiry_date) {//user renewed after expiration, so add 1 year to todays date
					$new_expiry_date=date('Y-m-d', strtotime('+1 year')); }
		
					else {//user is rewnewing for a future date, so add one year to future renewal date
					$newdate = strtotime ( '+1 year' , strtotime ( $expiry_date ) ) ;
					$new_expiry_date = date ( 'Y-m-j' , $newdate );	
					}
				}

			
		$query="update tblUserData set expiration_date='$new_expiry_date' where account_id='$account_id'";
		$result=mysql_query($query);
				

//Send Admin email notifying of new coupon user
$to = "info@cyclefolsom.com";
$subject = "CF Coupon Registration has Been Submitted";
$message = "

<html>
<head>
<title>New Cycle Folsom Registration</title>
</head>
<body>
<p><strong>A Coupon has been used for a New Registration. Please log in to the CF Registration System Admin Tools page and process this user</strong></p>
			<p>User Information:</p>
			Name: $fname $lname<br>
			Email: $email_add<br>
			Meetup Username: $meetup_username
			

</body>

</html>

";

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
	$mail->AddAddress($email_add);
	$mail->Subject  = "$subject";
	$mail->Body     = "$message";
	$mail->AltBody = "Requires HTML Email";
	$mail->WordWrap = 50;
	$mail->Send();


//Also need to handle No Waiver people

?>
<!DOCTYPE html>
<html class="html">
 <head>
  <style>
   .txtboldred{
	font-weight:bold;
	font-size: 16px;
	color:#A10000;
	
}
.txtred {

	font-size: 16px;
	color:#A10000;

}
  .pagedesc {
	font-size: 17px;
	color: #232323;
	font-family: source-sans-pro, sans-serif;
	line-height: 1.4;

	 }
	 </style>
 
<link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
      
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.2.232.244"/>
  <title>Registration Complete</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?272710960"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?4059369144"/>
  <link rel="stylesheet" type="text/css" href="cf_style.css" id="pagesheet"/>
  <!-- Other scripts -->

  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>

  

<link rel="stylesheet" type="text/css" href="message_default.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
 

   </head><? include('CF_header.php'); ?>
 <body>

  
      <!-- content -->
      
     
			
    		 <h1 class="Heading-1" style="margin-bottom:30px;">Registration Complete</h1>
			
      <span class="pagedesc">Your registration is now complete pending administrator approval. You can now <a href="logout.php">logout</a>, <a href="index.php">manage your member profile</a>, visit the <a href="/membership-tools.html">membership tools</a> page, or return to the <a href="/index.html">Cycle Folsom home page</a>.</span>
      <div style="margin-top:15px;"><span class="txtboldred">New Members:</span>  <span class="txtred">ONE FINAL STEP REQUIRED</span><BR><span class="txtred">Request to Join Our Meetup Group</span>
            <P style="margin-top:10px;">We use Meetup.com to manage our calendar of events and allow members to to RSVP for rides. </P>
            <p style="margin-top:10px;"><span style="font-weight:bold;">If you are NOT yet a member of Meetup.com</span><br> Visit Meetup.com and sign up for free. Then, after you’re logged in to Meetup, visit our specific Meetup group at: <a href="http://www.Meetup.com/CycleFolsom">http://www.Meetup.com/CycleFolsom</a> and click the “Join Us” button on the right side of the navigation bar. Answer a few profile questions and submit your request. We’ll match up your Meetup request with the registration you just completed here and approve you as soon as possible (please allow up to 48 hours).</p>
            <p style="margin-top:10px;"><span style="font-weight:bold;">If you are already a member of Meetup.com</span><br>Log into Meetup, visit our specific Meetup group at: <a href="http://www.Meetup.com/CycleFolsom">http://www.Meetup.com/CycleFolsom</a> and click the “Join Us” button on the right side of the navigation bar. Answer a few profile questions and submit your request. We’ll match up your Meetup request with the registration you just completed here and approve you as soon as possible (please allow up to 48 hours).</p>
           
            </div>

	   
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