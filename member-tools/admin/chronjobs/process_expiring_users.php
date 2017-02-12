<?php
session_start(); // start up your PHP session! 
include('/home/censible/public_html/cyclefolsom.com/mailer/cfmailer.php');
require_once("/home/censible/public_html/cyclefolsom.com/mailer/PHPMailerAutoload.php"); // path to the PHPMailerAutoload.php file.

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

$admin_notice_body = "<html><body>Daily report of expiring user accounts:<br><br>Expiring Today - $rowcount0 <br>Expiring in 10 Days - $rowcount10 <br>Expiring in 30 Days - $rowcount30 <br>Expiring in 60 Days - $rowcount60 <br> </body></html>";
$admin_notice_subject = "Cycle Folsom - Expiring User List for $current_date - Success";

sendEmail("info@cyclefolsom.com", direct, $admin_notice_body, $admin_notice_subject);

//END Send email to admin with daily count of expiring users


$result = $mysqli->query("SELECT id, fname, lname, email_add, payment_status,
    DATEDIFF(DATE(expiration_date), CURDATE()) as 'DaysTillRenewal'
FROM tblUserData
WHERE
	DATEDIFF(DATE(expiration_date), CURDATE()) IN (0, 10, 30, 60) AND payment_status='Paid' AND
    1=1 ORDER BY DaysTillRenewal DESC");
	
	    while($row = $result->fetch_array()) {
			
		$membername = $row['fname'];
		$email_intro = "<p>Dear $membername,</p>";
		$email_add = $row['email_add'];

		switch ($row['DaysTillRenewal']) {

			case 0: //send email for people that expire today
			
				sendEmail($email_add, mixed, 2, "$email_intro");
				break;
			
			case 10: //send email for people that expired in 10 days
			
				sendEmail($email_add, mixed, 1, "$email_intro");
				break;
			
			case 30: //send email for people that expired in 30 days
			
				sendEmail($email_add, mixed, 3, "$email_intro");
				break;
							
			case 60: //send email for people that expired in 60 days
			
				sendEmail($email_add, mixed, 6, "$email_intro");
				break;
			
			default:
			}//End switch

		}//End while
		
?>