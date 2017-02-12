<?
	include ('connect.php');
    $result = mysql_query("SELECT id, fname, lname, email_add, 
    DATEDIFF(DATE(expiration_date), CURDATE()) as 'DaysTillRenewal'
	FROM tblUserData
	WHERE
	DATEDIFF(DATE(expiration_date), CURDATE()) IN (0, 10, 30, 60) AND
    1=1 ");
        
	while ($row = mysql_fetch_array($result)) {
         
			

//60 Day Reminder Email
//$to = $row['email_add'];
$to = "stan@censible.com";
$membername = $row['fname'];
$subject = "Time to Renew Your Cycle Folsom Membership";
$message = "
<html>
<head><title>Time to Renew Your Cycle Folsom Membership</title>
</head>
<body>
Dear $membername,<br><br>

Your annual membership for Cycle Folsom will expire in 60 days. Please visit <a href='https://www.cyclefolsom.com/member-tools/'>https://www.cyclefolsom.com/member-tools/</a> as soon as possible and renew your membership. The cost is just $15/year and any remaining days on your current membership will be added to your renewal, so please don't delay.<br><br>

All members now receive Premium Member benefits, which include a 15% discount on most items at Folsom Bike and Town Center Bike & Tri, a 20% discount at ROL Wheels, a 20% discount at Peet's Coffee, and more. For offers, visit our sponsor page at <a href='http://www.cyclefolsom.com/sponsors.html'>http://www.cyclefolsom.com/sponsors.html</a>. Additionally, your membership dues help cover the cost of liability insurance for club members and leadership, as well as $10,000 of supplemental medical coverage for each member.<br><br>

<strong>If your membership expires, you will lose access to our Meetup site. So again, please don't delay.</strong><br><br>

Sincerely,<br><br>

Stan Schultz<br>
Cycle Folsom<br><br>

P.S. If you do not want to renew, you can simply let your membership lapse and we'll remove you from our Meetup site. You'll see another reminder at 30 days and 10 days. To avoid those reminders, reply to <a href='mailto:info@cyclefolsom.com'>info@cyclefolsom.com</a> and let us know that you'd like to cancel your membership.</body>
</html>
";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
// More headers
$headers .= 'From: Cycle Folsom <info@cyclefolsom.com>' . "\r\n";
mail($to,$subject,$message,$headers);



//30 Day Reminder Email
//$to = $row['email_add'];
$to = "stan@censible.com";
$membername = $row['fname'];
$subject = "30-Day Expiration Notice / Cycle Folsom";
$message = "
<html>
<head><title>30-Day Expiration Notice / Cycle Folsom</title>
</head>
<body>
Dear $membername,<br><br>

Your annual membership for Cycle Folsom will expire in 30 days. If you’d like to maintain access to our Meetup site, please visit <a href='https://www.cyclefolsom.com/member-tools/'>https://www.cyclefolsom.com/member-tools/</a> to renew your membership. Any remaining days on your current membership will be added to your renewal, so please don’t delay.<br><br>

For just $15/year, all members now receive Premium Member benefits, which include a 15% discount on most items at Folsom Bike and Town Center Bike & Tri, a 20% discount at ROL Wheels, a 20% discount at Peet's Coffee, and more. For more offers, visit our sponsor page at <a href='http://www.cyclefolsom.com/sponsors.html'>http://www.cyclefolsom.com/sponsors.html</a>. Member dues also help cover the cost of liability insurance for club members and leadership, as well as $10,000 of supplemental medical coverage for each member.<br><br>

<strong>If your membership expires, you will lose access to our Meetup site. So again, please don't delay.</strong><br><br>

Sincerely,<br><br>

Stan Schultz<br>
Cycle Folsom<br><br>

P.S. If you do not want to renew, you can simply let your membership lapse and we'll remove you from our Meetup site. You'll see another reminder at 10 days. To avoid that final reminder, reply to <a href='mailto:info@cyclefolsom.com'>info@cyclefolsom.com</a> and let us know that you'd like to cancel your membership.</body>
</html>
";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
// More headers
$headers .= 'From: Cycle Folsom <info@cyclefolsom.com>' . "\r\n";
mail($to,$subject,$message,$headers);



//10 Day Reminder Email
//$to = $row['email_add'];
$to = "stan@censible.com";
$membername = $row['fname'];
$subject = "Final Expiration Notice / Cycle Folsom";
$message = "
<html>
<head><title>Final Expiration Notice / Cycle Folsom</title>
</head>
<body>
Dear $membername,<br><br>

We'll be sorry to see you go, but this is your final notice. <strong>Your annual membership for Cycle Folsom will expire in 10 days, after which you'll lose access to our Meetup site.</strong><br><br>

Please don't delay. Visit <a href='https://www.cyclefolsom.com/member-tools/'>https://www.cyclefolsom.com/member-tools/</a> to renew your membership.<br><br>

Sincerely,<br><br>

Stan Schultz<br>
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



//0 Day Reminder Email
//$to = $row['email_add'];
$to = "stan@censible.com";
$membername = $row['fname'];
$subject = "Cycle Folsom Membership has Expired";
$message = "
<html>
<head><title>Cycle Folsom Membership has Expired</title>
</head>
<body>
Dear $membername,<br><br>

We're sorry to see you go, but <strong>your annual membership for Cycle Folsom has expired.</strong> We will be removing you from our Meetup site soon.<br><br>

If you've changed your mind and you'd like to renew, visit <a href='https://www.cyclefolsom.com/member-tools/'>https://www.cyclefolsom.com/member-tools/</a>. If we have already removed you from our Meetup site prior to your renewal, you will need to request to join our Meetup group again using the 'Join Us' button in the navigation bar on our Meetup site.<br><br>

Sincerely,<br><br>

Stan Schultz<br>
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

        }
?>