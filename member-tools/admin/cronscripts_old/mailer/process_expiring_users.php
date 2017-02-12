<?php
	session_start(); // start up your PHP session! 
	//include('connect.php');
	require("PHPMailerAutoload.php"); // path to the PHPMailerAutoload.php file.
	
	$DBServer="localhost";
	$DBUser="censible_cfrider";
	$DBPass="cf2015$!Cycle";
	$DBName="censible_cfprod";
	
	$mysqli = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	
	$result0 = $mysqli->query("SELECT id, fname, lname, email_add, payment_status,
		DATEDIFF(DATE(expiration_date), CURDATE()) as 'DaysTillRenewal'
	FROM tblUserData
	WHERE
		DATEDIFF(DATE(expiration_date), CURDATE()) = '0' AND payment_status='Paid' AND
		1=1 ORDER BY DaysTillRenewal DESC");
	$rowcount0=mysqli_num_rows($result0);
	
	$mysqli = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	$result10 = $mysqli->query("SELECT id, fname, lname, email_add, payment_status,
		DATEDIFF(DATE(expiration_date), CURDATE()) as 'DaysTillRenewal'
	FROM tblUserData
	WHERE
		DATEDIFF(DATE(expiration_date), CURDATE()) = '10' AND payment_status='Paid' AND
		1=1 ORDER BY DaysTillRenewal DESC");
	$rowcount10=mysqli_num_rows($result10);
	
	
	$mysqli = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	$result30 = $mysqli->query("SELECT id, fname, lname, email_add, payment_status,
		DATEDIFF(DATE(expiration_date), CURDATE()) as 'DaysTillRenewal'
	FROM tblUserData
	WHERE
		DATEDIFF(DATE(expiration_date), CURDATE()) = '30' AND payment_status='Paid' AND
		1=1 ORDER BY DaysTillRenewal DESC");
	$rowcount30=mysqli_num_rows($result30);
	
	
	$mysqli = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
	$result60 = $mysqli->query("SELECT id, fname, lname, email_add, payment_status,
		DATEDIFF(DATE(expiration_date), CURDATE()) as 'DaysTillRenewal'
	FROM tblUserData
	WHERE
		DATEDIFF(DATE(expiration_date), CURDATE()) = '60' AND payment_status='Paid' AND
		1=1 ORDER BY DaysTillRenewal DESC");
	$rowcount60=mysqli_num_rows($result60);
	
	//Send email to admin with daily count of expiring users
		$email_add = "rogersjason92@gmail.com";
		$current_date = date("m-d-Y");
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
		
		$mail->Subject  = "Cycle Folsom - Expiring User List for $current_date";
		$mail->Body     = "Daily report of expiring user accounts:
			<br><br>
			Expiring Today - $rowcount0<br>
			Expiring in 10 Days - $rowcount10<br>
			Expiring in 30 Days - $rowcount30<br>
			Expiring in 60 Days - $rowcount60<br>
		</body>
		</html>
		";
		$mail->AltBody = "This message requires HTML.";
		$mail->WordWrap = 50;
		$mail->Send();
	//End Admin Email

	$result = $mysqli->query("SELECT id, fname, lname, email_add, payment_status,
		DATEDIFF(DATE(expiration_date), CURDATE()) as 'DaysTillRenewal'
		FROM tblUserData
		WHERE
			DATEDIFF(DATE(expiration_date), CURDATE()) IN (0, 10, 30, 60) AND payment_status='Paid' AND
			1=1 ORDER BY DaysTillRenewal DESC");
	
	while($row = $result->fetch_array()) {

		switch ($row['DaysTillRenewal']) {

			case 0: //send email for people that expired today
			
				//0 Day Reminder Email
				$email_add = $row['email_add'];
				$membername = $row['fname'];
				
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
				We're sorry to see you go, but <strong>your annual membership for Cycle Folsom has expired.</strong> We will be removing you from our Meetup site soon.<br><br>
				
				If you've changed your mind and you'd like to renew, visit <a href='https://www.cyclefolsom.com/member-tools/'>https://www.cyclefolsom.com/member-tools/</a>. If we have already removed you from our Meetup site prior to your renewal, you will need to request to join our Meetup group again using the 'Join Us' button in the navigation bar on our Meetup site.<br><br>
				
				Sincerely,<br><br>
				
				Mel Wade, Membership Manager<br>
				Cycle Folsom
				</body>
				</html>
				";
				$mail->AltBody = "This message requires HTML.";
				$mail->WordWrap = 50;
				$mail->Send();
				echo "<br>0 day sent to ".$email_add;
				
				break;
			
			case 10: //send email for people that expired today
			
				//10 Day Reminder Email
				$email_add = $row['email_add'];
				$membername = $row['fname'];
				$subject = "Cycle Folsom Membership has Expired";
				
				
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
				
				$mail->Subject  = "Final Expiration Notice / Cycle Folsom";
				$mail->Body     = "Dear $membername,<br><br>
				
				We'll be sorry to see you go, but this is your final notice. <strong>Your annual membership for Cycle Folsom will expire in 10 days, after which you'll lose access to our Meetup site.</strong><br><br>
				
				Please don't delay. Visit <a href='https://www.cyclefolsom.com/member-tools/'>https://www.cyclefolsom.com/member-tools/</a> to renew your membership.<br><br>
				
				Sincerely,<br><br>
				
				Mel Wade, Membership Manager<br>
				Cycle Folsom
				";
				$mail->AltBody = "This message requires HTML.";
				$mail->WordWrap = 50;
							//$mail->Send();
				echo "<br>10 day sent to ".$email_add;
				
				
				break;
			
			case 30: //send email for people that expired today
			
				//30 Day Reminder Email
				$email_add = $row['email_add'];
				//$to = "rogersjason92@gmail.com";
				$membername = $row['fname'];
				$subject = "Cycle Folsom Membership has Expired";
				
				
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
				
				$mail->Subject  = "30-Day Expiration Notice / Cycle Folsom";
				$mail->Body     = "Dear $membername,<br><br>
				
				Your annual membership for Cycle Folsom will expire in 30 days. If you’d like to maintain access to our Meetup site, please visit <a href='https://www.cyclefolsom.com/member-tools/'>https://www.cyclefolsom.com/member-tools/</a> to renew your membership. Any remaining days on your current membership will be added to your renewal, so please don’t delay.<br><br>
				
				For just $15/year, all members now receive Premium Member benefits, which include a 15% discount on most items at Folsom Bike, Town Center Bike & Tri, and Mikes Bikes, a 20% discount at ROL Wheels, a 20% discount at Petes Restraunt and Brewhouse, and more. For more offers, visit our sponsor page at <a href='http://www.cyclefolsom.com/sponsors.html'>http://www.cyclefolsom.com/sponsors.html</a>. Member dues also help cover the cost of liability insurance for club members and leadership, as well as $10,000 of supplemental medical coverage for each member.<br><br>
				
				<strong>If your membership expires, you will lose access to our Meetup site. So again, please don't delay.</strong><br><br>
				
				Sincerely,<br><br>
				
				Mel Wade, Membership Manager<br>
				Cycle Folsom<br><br>
				
				P.S. If you do not want to renew, you can simply let your membership lapse and we'll remove you from our Meetup site. You'll see another reminder at 10 days. To avoid that final reminder, reply to <a href='mailto:info@cyclefolsom.com'>info@cyclefolsom.com</a> and let us know that you'd like to cancel your membership.
				";
				$mail->AltBody = "This message requires HTML.";
				$mail->WordWrap = 50;
							//$mail->Send();
				echo "<br>30 day sent to ".$email_add;
				
				
				break;
			
			case 60: //send email for people that expired today
			
				//60 Day Reminder Email
				$email_add = $row['email_add'];
				//$to = "rogersjason92@gmail.com";
				$membername = $row['fname'];
				$subject = "Cycle Folsom Membership has Expired";
				
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
				
				$mail->Subject  = "Time to Renew Your Cycle Folsom Membership";
				$mail->Body     = "Dear $membername,<br><br>
				
				Your annual membership for Cycle Folsom will expire in 60 days. Please visit <a href='https://www.cyclefolsom.com/member-tools/'>https://www.cyclefolsom.com/member-tools/</a> as soon as possible and renew your membership. The cost is just $15/year and any remaining days on your current membership will be added to your renewal, so please don't delay.<br><br>
				
				All members now receive Premium Member benefits, which include a 15% discount on most items at Folsom Bike, Town Center Bike & Tri, and Mikes Bikes, a 20% discount at ROL Wheels, a 20% discount at Petes Restraunt and Brewhouse, and more. For offers, visit our sponsor page at <a href='http://www.cyclefolsom.com/sponsors.html'>http://www.cyclefolsom.com/sponsors.html</a>. Additionally, your membership dues help cover the cost of liability insurance for club members and leadership, as well as $10,000 of supplemental medical coverage for each member.<br><br>
				
				<strong>If your membership expires, you will lose access to our Meetup site. So again, please don't delay.</strong><br><br>
				
				Sincerely,<br><br>
				
				Mel Wade, Membership Manager<br>
				Cycle Folsom<br><br>
				
				P.S. If you do not want to renew, you can simply let your membership lapse and we'll remove you from our Meetup site. You'll see another reminder at 30 days and 10 days. To avoid those reminders, reply to <a href='mailto:info@cyclefolsom.com'>info@cyclefolsom.com</a> and let us know that you'd like to cancel your membership.
				";
				$mail->AltBody = "This message requires HTML.";
				$mail->WordWrap = 50;
							//$mail->Send();
				echo "<br>60 day sent to ".$email_add;
				
				
				break;
			
			default:
		}//End switch
	
	}//End while
		
?>