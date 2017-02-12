<?php
session_start(); // start up your PHP session! 
include('connect.php');

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

$result = mysql_query("SELECT id, fname, lname, email_add 
FROM tblUserData
WHERE id < '40' and cfpw = ''
	");
        
		while ($row = mysql_fetch_array($result)) {

						
			$to = $row['email_add'];
			$membername = $row['fname'];
			$email_add = $row['email_add'];
			$memberid = $row['id'];
			$subject = "IMPORTANT - Cycle Folsom Registration";
			$message = "
			<html>
			<head><title>IMPORTANT - Cycle Folsom Registration</title>
			</head>
			<body>
			Dear $membername,<br><br>
			Test Email			
			</body>
			</html>
			";
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			// More headers
			$headers .= 'From: Cycle Folsom <info@cyclefolsom.com>' . "\r\n";
			$emailresult = mail($to, $subject, $message, $headers);
			echo "<br>Email sent to: ".$email_add;
			
		}//End while
		
?>