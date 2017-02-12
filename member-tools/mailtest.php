<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Mail Test</title>
</head>

<body>
1
<?php

require("../mailer/PHPMailerAutoload.php"); // path to the PHPMailerAutoload.php file.
$ip_add = "4.2.2.2";
$reset_code = "shfskjh3";

$email_add = "mel@melwade.com";
$current_date = date("m-d-Y");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->Host = "cyclefolsom.com";
$mail->Port = "465"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Username = "mel@cyclefolsom.com";
$mail->Password = "v1sYWnVhrdxYHtZXX97e";
$mail->From     = "info@cyclefolsom.com";
$mail->FromName = "Cycle Folsom";
//$mail->AddAddress($email_add);
$mail->AddAddress($email_add);

$mail->Subject  = "Test EMAIL";
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
echo "2";
		    $mail->AltBody = "This message requires HTML.";
		    $mail->WordWrap = 50;
			$mail->Send();



?>


End of file.
</body>
</html>