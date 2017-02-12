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

//Here we update the payment status to paid
$result = mysql_query("UPDATE tblUserData SET payment_status='Paid' WHERE account_id='$account_id'") 
or die(mysql_error());  
//We also need to send an email to Admin informing of a ride leader renewal
//Get user info for email
	$userqry = "SELECT fname, lname, email_add, meetup_username from tblUserData WHERE account_id = '".$account_id."'";
	$userRow = mysql_fetch_array(mysql_query($userqry)); 
	$fname = $userRow['fname'];
	$lname = $userRow['lname'];
	$email_add = $userRow['email_add'];
	$meetup_username = $userRow['meetup_username'];
	
//Need to add a payment entry for this user showing a ride leader renewal

		$current_date=date('m-d-Y');
		$paymentStatus='Completed';
		$paymentType="Ride Leader Renewal";		
		$transactionId = genPassword(15);//Can't have duplicates in transaction ID field
		$query="INSERT into tblPaymentData (payment_date, txn_id, payment_status, account_id, payment_type) VALUES ('$current_date', '$transactionId', '$paymentStatus', '$account_id', '$paymentType')";
	
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
$subject = "CF Ride Leader Renewal has Been Processed";
$message = "

<html>
<head>
<title>CF Ride Leader Renewal</title>
</head>
<body>
<p><strong>The following ride leader has just renewed his/her membership:</strong></p>
			<p>Ride Leader Information:</p>
			Name: $fname $lname<br>
			Email: $email_add<br>
			Meetup Username: $meetup_username
			<p>Thanks!</P>
			<p>The honchos at Cycle Folsom!</p>

</body>

</html>

";

// Always set content-type when sending HTML email

$headers = "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers

$headers .= 'From: Cycle Folsom <info@cyclefolsom.com>' . "\r\n";

mail($to,$subject,$message,$headers);

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
      
     
			
    		 <h1 class="Heading-1" style="margin-bottom:30px;">Renewal Complete</h1>
			
      <span class="pagedesc">Your renewal is now complete. You can now <a href="logout.php">logout</a>, <a href="index.php">manage your member profile</a>, visit the <a href="/membership-tools.html">membership tools</a> page, or return to the <a href="/index.html">Cycle Folsom home page</a>.</span>
      <div style="margin-top:15px;"><span class="txtboldred">Important note if you were removed from our Meetup site:</span>  
            <P style="margin-top:10px;">If you let your membership lapse and were removed from Cycle Folsom’s Meetup site, you’ll need to complete this renewal and then submit a new request from our site on <a href="http://www.meetup.com/cyclefolsom">Meetup.com/cyclefolsom</a>. </P>
           
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