<?	  
session_start();
if ($_SESSION['isadmin']) {
include('../connect.php');
require("../../mailer/PHPMailerAutoload.php"); // path to the PHPMailerAutoload.php file.
$code = addslashes($_POST['coupon_code']);
$coupon_type = addslashes($_POST['coupon_type']);
$emailadd = addslashes($_POST['email_add']);

//do a count to make sure a record for this email doesn't already exist.

$sql="SELECT * FROM tblCouponCodes WHERE emailadd='$emailadd'";
	$rRow = mysql_fetch_array(mysql_query($sql)); 
	$result=mysql_query($sql);
	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);
	if($count>0){
		$existing=$rRow['code'];
header( 'Location: https://www.cyclefolsom.com/member-tools/admin/index.php?code=duplicate&existing='.$existing.'' ) ;
exit;	}
else {		
$qry="INSERT into tblCouponCodes (code, emailadd) values ('$code', '$emailadd')";
$result = mysql_query($qry);
if($result){//success

//Send admin email

	$email_admin = "info@cyclefolsom.com";
	$subject = "Notification of Cycle Folsom Coupon Code";
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
	$mail->Subject  = "$subject";
	$mail->Body     = "<html>
		<head>
		<title>Cycle Folsom Coupon Code</title>
		</head>
		<body>
		The following coupon code was just created: 
		<p><strong>Email: ".$emailadd."</strong></p>
		<p><strong>Code: ".$code."</strong></p>
		</body>
		</html>
		";
		$mail->AltBody = "Requires HTML Email";
		$mail->WordWrap = 50;
		$mail->Send();


//Now send email to actual member


	if($coupon_type=="New Member"){
	$message = "
	<html>
	<head>
	<title>Cycle Folsom Coupon Code</title>
	</head>
	<body>
	The following Cycle Folsom registration coupon code has been generated for you: $code<br>
	<br>To use the code:
	<br>1. Visit <a href='https://www.cyclefolsom.com/membership-tools.html'>https://www.cyclefolsom.com/membership-tools.html</a> and click the 'Join as New Member' button in the New Membership section.
	<br>2. Click the 'Yes' checkbox where it says 'Do you have a coupon code?' An empty field will appear.
	<br>3. Enter the coupon code and continue the registration process.
	<br>4. Entering the coupon code will bypass the payment portion of the process.
	<br><br>After you've registered with your coupon code, if you are not already a member of our Meetup site you'll need to sign up with <a href='http://meetup.com'>Meetup.com</a>, or if you're a Meetup member, log in to Meetup and then request to join our Meetup group at <a href='http://www.Meetup.com/CycleFolsom'>http://www.Meetup.com/CycleFolsom</a>.
	<br><br>
	Sincerely,
	<br><br>
	Mel Wade, Membership Manager
	<br>Cycle Folsom
	</body>
	</html>
	";}
	else {
	$message = "
	<html>
	<head>
	<title>Cycle Folsom Coupon Code</title>
	</head>
	<body>
	The following Cycle Folsom renewal coupon code has been generated for you: $code<br>
	<br>To use the code:
	<br>1. Visit <a href='https://www.cyclefolsom.com/membership-tools.html'>https://www.cyclefolsom.com/membership-tools.html</a> and click the 'Manage Profile' button in the Manage Member Profile section.
	<br>2. After logging in, click the 'Apply Coupon' button in the 'Membership Status' section.
	<br>3. Enter the coupon code and check the box indicating you have agreed to the Release of Liability.
	<br>4. Entering the coupon code will bypass the payment portion of the process.
	<br><br>After you've renewed with your coupon code, if you are not already a member of our Meetup site you'll need to sign up with <a href='http://meetup.com'>Meetup.com</a>, or if you're a Meetup member, log in to Meetup and then request to join our Meetup group at <a href='http://www.Meetup.com/CycleFolsom'>http://www.Meetup.com/CycleFolsom</a>.
	<br><br>
	Sincerely,
	<br><br>
	Mel Wade, Membership Manager
	<br>Cycle Folsom
	</body>
	</html>
	";}


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
	$mail->AddAddress($emailadd);
	$mail->Subject  = "$subject";
	$mail->Body     = "$message";
	
	$mail->AltBody = "Requires HTML Email";
	$mail->WordWrap = 50;
	$mail->Send();


//Redirect back to index  
header( 'Location: https://www.cyclefolsom.com/member-tools/admin/index.php?code=success' ) ;
}
else {
header( 'Location: https://www.cyclefolsom.com/member-tools/admin/index.php?code=error' ) ;
}
}
?>
<?
}
else {
header( 'Location: https://www.cyclefolsom.com/member-tools/' ) ;
}?>