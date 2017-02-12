<?php
session_start(); // start up your PHP session! 
if ($_SESSION['isadmin']) {
include('connect.php');	
$remind_id=$_GET['id'];
$qry="UPDATE tblUserData SET reminder_date = now() where id='$remind_id'";
$result=mysql_query($qry);
if($result)
{
//Send email
			$result = mysql_query("SELECT * from tblUserData where id='$remind_id'");
			$row = mysql_fetch_array($result);
			$user_email=$row['email_add'];

			$to = $user_email;
			//$to = "rogersjason92@gmail.com";
			$subject = "Cycle Folsom Registration Reminder";
			$message = "
			<html>
			<head>
			<title>Cycle Folsom Registration Reminder</title>
			</head>
			<body>
			It's been 15 days since you started your membership registration process at CycleFolsom.com. We hope you'll login and complete your registration.  To keep our database clean and tidy, we will be deleting your unfinished registration as soon as 5 days from now. After that, you'll need to start the process from scratch again.  If you are no longer interested, no problem. This will be your last e-mail from our system.  If you'd like to complete your registration, click <a href='https://www.cyclefolsom.com/member-tools/'>here</a> and continue the process.<br><br>

Sincerely,<br><br>

Cycle Folsom
			</body>
			</html>
			";
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			// More headers
			$headers .= 'From: Cycle Folsom <info@cyclefolsom.com>' . "\r\n";
			mail($to,$subject,$message,$headers);
			
			
header( 'Location: https://www.cyclefolsom.com/member-tools/admin/pending_users.php?code=email_sent' ) ;
}
else { header( 'Location: https://www.cyclefolsom.com/member-tools/admin/pending_users.php?code=email_not_sent' ) ;
}

}
else {
header( 'Location: https://www.cyclefolsom.com/member-tools/' ) ;
}?>