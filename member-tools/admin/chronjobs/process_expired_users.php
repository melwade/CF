<?php
session_start(); // start up your PHP session! 
include('connect.php');
  $result = mysql_query("SELECT id, payment_status, expiration_date
FROM tblUserData
WHERE
	DATEDIFF(DATE(expiration_date), CURDATE()) < 0 AND payment_status='Paid' AND
    1=1 ORDER BY expiration_date DESC");
        
		while ($row = mysql_fetch_array($result)) {
		
		mysql_query("UPDATE tblUserData SET payment_status = 'Expired' WHERE id = '$row[id]'");
		}
			?>