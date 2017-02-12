<?php

include_once('includes/connect.php');

//CONVERT GET TO POST IF GET WAS USED
if($_GET) {
	foreach($_GET as $key=>$val) {
		$_POST[$key] = $val;	
	}
}

//GET VALUES SENT FROM PAYPAL
$status = $_POST['status'];

$Email = $_POST['payer_email'];
$First_Name = $_POST['first_name'];
$Last_Name = $_POST['last_name'];
$custom = $_POST['custom'];
$Customer_Name=$First_Name." ".$Last_Name;



//PARSE VALUES
$customArr = explode("|", $custom);
$SeatingID = $customArr[0];
$token = $customArr[1];

//DELETE THESE AFTER TESTING
//$Email = "Jason@sierraothg.com";
//$Customer_Name="Jason R Rogers";
//$SeatingID = "235";
//$token = "335897213";


//VALIDATES ENTRY
$query = "SELECT Seats, num_seats, EventDay FROM tbl_reserved WHERE ID = '$SeatingID' AND Token = '$token' AND Paid = '0' LIMIT 1;";

$result = $db->query($query);
$count = $result->num_rows;
if(!$count) {
	//YOU MAY WANT TO HAVE IT SEND YOU AN EMAIL HERE SINCE ENTRY DOESNT EXIST OR TOKEN DOESNT MATCH
	exit();
} else {
	//UPDATES DATABSE TO SHOW RESERVATIONS HAS BEEN PAID
	$record = $result->fetch_assoc();
	$Seats = $record['Seats'];
	$NumSeats = $record['num_seats'];
	$EventDay = $record['EventDay'];
	$query = "
		UPDATE tbl_reserved SET
			Paid = '1',
			Email = '$Email',
			Customer_Name = '$Customer_Name',
			TimePaid = NOW()
		WHERE
			ID = '$SeatingID' AND
			Token = '$token'
	;";
	//echo $query."<br />";
	$result = $db->query($query);
	
	//SEND EMAIL TO CUSTOMER
	
	
$to = $Email;
$subject = "Placer Food Bank Bingo Registration Confirmation";

$message = "
<html>
<head>
<title>Confirmation Email</title>
</head>
<body>
<img src='http://placerfoodbank.org/bingo/images/top_logo.jpg'>
<p>This email is your registration confirmation for the Placer Food Bank Bingo event.  Please print a copy of this email and take it with you as proof of your registration. </p>
Grand Oaks Bingo<br>
7919 Auburn Blvd.<br>
Citrus Heights, CA 95621<br>";

switch ($EventDay) {

case "nyd_s":
$message .= "<p>January 1, 2015 - Smoking Room</p>";
$total_paid=$NumSeats*30;
break;

case "nyd_ns":
$message .= "<p>January 1, 2015 - Non-Smoking Room</p>";
$total_paid=$NumSeats*30;
break;

case "nye_s":
$message .= "<p>December 31, 2014 - Smoking Room</p>";
$total_paid=$NumSeats*55;
break;

case "nye_ns":
$message .= "<p>December 31, 2014 - Non-Smoking Room</p>";
$total_paid=$NumSeats*55;
break;
	
}

$message .="<p>You have the following seat(s) reserved:</p>";

$seatvalues = unserialize($Seats);

 foreach($seatvalues as $key => $val)
   {
$message .= "<br>Seat ".$key." - ".$val;
   }

$message .="<p>Total amount paid - $".$total_paid."</p>";
$message .="Number of seats reserved - ".$NumSeats;
$message .= "<p>You can print a copy of the room layouts using the following links:</p><p><a href='http://placerfoodbank.org/bingo/assets/NonSmoking_Room.pdf'>Non-Smoking Room</a></p><p><a href='http://placerfoodbank.org/bingo/assets/Smoking_Room.pdf'>Smoking Room</a></p>";   

$message .= "<p><strong>IMPORTANT:  Refunds will not be given after December 18th.  If you need to request a refund, please contact Karen Coates at 916-783-0481 or email her at <a href='mailto:karen@placerfoodbank.org'>Karen@placerfoodbank.org</a>.</p>";


$message .= "
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Placer Food Bank <info@placerfoodbank.org>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

// "<br>Email Message is ".$message;

mail($to,$subject,$message,$headers);

//SEND EMAIL TO PFB STAFF

$to_staff = "Diana@placerfoodbank.org, stevedye@mac.com, Karen@placerfoodbank.org";
//$to_staff = "jason@sierraothg.com";

$subject_staff = "FYI - Placer Food Bank Bingo Registration Confirmation";

$message_staff = "
<html>
<head>
<title>Confirmation Email</title>
</head>
<body>
The following registration has just been submitted:<br>";

switch ($EventDay) {

case "nyd_s":
$message_staff .= "<p>January 1, 2015 - Smoking Room</p>";
$total_paid=$NumSeats*30;
break;

case "nyd_ns":
$message_staff .= "<p>January 1, 2015 - Non-Smoking Room</p>";
$total_paid=$NumSeats*30;
break;

case "nye_s":
$message_staff .= "<p>December 31, 2014 - Smoking Room</p>";
$total_paid=$NumSeats*55;
break;

case "nye_ns":
$message_staff .= "<p>December 31, 2014 - Non-Smoking Room</p>";
$total_paid=$NumSeats*55;
break;
	
}

$message_staff .="<p>The following seat(s) were reserved:</p>";

$seatvalues = unserialize($Seats);

 foreach($seatvalues as $key => $val)
   {
$message_staff .= "<br>Seat ".$key." - ".$val;
   }

$message_staff .="<p>Total amount paid - $".$total_paid."</p>";
$message_staff .="Number of seats reserved - ".$NumSeats;
$message_staff .="<p>Use the following links to view current seating charts:</p>";
$message_staff .="<a href='http://placerfoodbank.org/bingo/show_seats_nye_s.php'>December 31st - Smoking Room</a>";
$message_staff .="<br><a href='http://placerfoodbank.org/bingo/show_seats_nye_ns.php'>December 31st - Non Smoking Room</a>";
$message_staff .="<br><a href='http://placerfoodbank.org/bingo/show_seats_nyd_s.php'>January 1st - Smoking Room</a>";
$message_staff .="<br><a href='http://placerfoodbank.org/bingo/show_seats_nyd_ns.php'>January 1st - Non Smoking Room</a>";
$message_staff .="<br><br><strong>Reservation Stats:</strong>";

include_once('includes/include.php');

//Get count of reserved seats by day and room
$nyes_result = mysql_query("SELECT SUM(num_seats) AS nyes_value_sum FROM tbl_reserved WHERE EventDay = 'nye_s'"); 
$nyes_row = mysql_fetch_assoc($nyes_result); 
$nyes_sum = $nyes_row['nyes_value_sum'];

$nyens_result = mysql_query("SELECT SUM(num_seats) AS nyens_value_sum FROM tbl_reserved WHERE EventDay = 'nye_ns'"); 
$nyens_row = mysql_fetch_assoc($nyens_result); 
$nyens_sum = $nyens_row['nyens_value_sum'];

$nyds_result = mysql_query("SELECT SUM(num_seats) AS nyds_value_sum FROM tbl_reserved WHERE EventDay = 'nyd_s'"); 
$nyds_row = mysql_fetch_assoc($nyds_result); 
$nyds_sum = $nyds_row['nyds_value_sum'];

$nydns_result = mysql_query("SELECT SUM(num_seats) AS nydns_value_sum FROM tbl_reserved WHERE EventDay = 'nyd_ns'"); 
$nydns_row = mysql_fetch_assoc($nydns_result); 
$nydns_sum = $nydns_row['nydns_value_sum'];

$message_staff .="<br><br>Reserved Seats for December 31 - Smoking Room - ".$nyes_sum;
$message_staff .="<br>Reserved Seats for December 31 - Non-Smoking Room - ".$nyens_sum;
$message_staff .="<br>Reserved Seats for January 1 - Smoking Room - ".$nyds_sum;
$message_staff .="<br>Reserved Seats for January 1 - Non-Smoking Room - ".$nydns_sum;

$message_staff .= "
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Placer Food Bank <info@placerfoodbank.org>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

// "<br>Email Message is ".$message;

mail($to_staff,$subject_staff,$message_staff,$headers);
	
	/*if($result) {
		echo "Successfully reserved the following seats:<br>";
		$seatsArr = unserialize($Seats);
		foreach($seatsArr as $seat) {
			echo $seat."<br>";
		}
	}*/
}


?>