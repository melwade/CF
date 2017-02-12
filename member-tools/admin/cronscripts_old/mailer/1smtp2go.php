<?php
	session_start(); // start up your PHP session! 
	include('connect.php');
	
   require("PHPMailerAutoload.php"); // path to the PHPMailerAutoload.php file.
   
   function genPassword($length) 
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

$query = "SELECT id, fname, lname, email_add 
FROM tblUserData
WHERE cfpw = ''
LIMIT 50
	";
$result = mysql_query($query);
if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
        
	while ($row = mysql_fetch_array($result)) {
			$cfpw = genPassword(6);
			$to = $row['email_add'];
			$membername = $row['fname'];
			$email_add = $row['email_add'];
			$memberid = $row['id'];
							

		   $mail = new PHPMailer();
		   $mail->IsSMTP();
		   $mail->Mailer = "smtp";
		   $mail->Host = "mail.smtp2go.com";
		   $mail->Port = "587"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
		   $mail->SMTPAuth = true;
		   $mail->SMTPSecure = 'tls';
		   $mail->Username = "stan@censible.com";
		   $mail->Password = "Dfcp2csc";
		
		   $mail->From     = "info@cyclefolsom.com";
		   $mail->FromName = "Cycle Folsom";
		   $mail->AddAddress($email_add);
		   //$mail->AddReplyTo("Your Reply-to Address", "Sender's Name");
			
		   $mail->Subject  = "Cycle Folsom Registration";
		   $mail->Body     = "Dear $membername,<br><br>
			
			<strong>PLEASE READ CAREFULLY!!!</strong> <br>
			<strong>Your future access to Cycle Folsom's Meetup site depends on it.</strong><br><br>
			Cycle Folsom's new registration system has launched today, October 6th.<br><br>
			<strong>It is important that you are aware of the following:</strong><br>
			<ul><li>Your CycleFolsom.com membership is separate from your Meetup membership</li>
			<li>A CycleFolsom.com membership is required in order to maintain access to our Meetup.com site</li>
			<li>We are changing from 'voluntary' membership renewal donations to 'mandatory' annual membership dues. Your dues will help cover expenses such as club liability insurance, supplemental medical insurance, and occasional special events.</li>
			<li>Membership dues are just $15/<u>year</u></li>
			<li>You have already been entered into our CycleFolsom.com database, but you'll need to review/edit your profile info</li>
			<li>All members will automatically have 90 days to renew their membership</li>
			<li>If your current membership expires after October 6th, 2015, 90 days will automatically be added to your membership  (does not include members who registered after September 28th)</li>
			<li>Members who let their CycleFolsom.com memberships expire will be removed from the Meetup.com site within 30 days of expiration.</li></ul><br><br>
			<strong>PLEASE DO THIS ASAP:</strong><br><br>
			<ol><li>Visit <a href='https://www.cyclefolsom.com/membership-tools.html'>https://www.cyclefolsom.com/membership-tools.html</a></li>
			<li>Click on Manage Member Profile in the accordion menu</li>
			<li>Click on the Manage Profile button</li>
			<li>Login using the following credentials</li>
			<ul><li>e-mail address: $email_add - Please make note of this</li>
			<li>Password: $cfpw (you can change your password after login)</li></ul>
			<li>Review your profile and edit as desired.</li>
			<li>Check your expiration date. Some members will need to renew in as few as 90 days</li>
			<li>Renew your membership if needed by clicking the 'Renew' button</li>
			<ul><li>Review/Edit your profile info</li>
			<li>Check the box to confirm you're 18 years old or older</li>
			<li>Click the 'Renew Membership' button</li>
			<li>Follow the prompts to complete Payment (payment not required for Ride Leaders, Ambassadors, or those with coupons)</li></ul>
			<li>Log out of the system. You can log in again at any time.</li></ol>
			
			<br><br>
			Again, please compete this request a.s.a.p.<br><br>		
		
			Sincerely,<br><br>
			
			Stan Schultz<br>
			Cycle Folsom";
   $mail->AltBody = "This message requires HTML.";
   $mail->WordWrap = 50;

   if(!$mail->Send()) {
		$mailresult = mysql_query("UPDATE tblUserData set migration_success = 'Fail' WHERE id='$memberid' ");
		echo "<BR>FAILURE - ".$email_add;
		echo 'Mailer error: ' . $mail->ErrorInfo;
		exit;
   } else {
	   		echo "<BR>SUCCESS - ".$email_add;
			$new_pw=md5($cfpw);
			$pw_result = mysql_query("UPDATE tblUserData set cfpw = '$new_pw' WHERE id='$memberid'	");
			$mailresult = mysql_query("UPDATE tblUserData set migration_success = 'Success' WHERE id='$memberid' ");
   }
   
			} //END WHILE
?>