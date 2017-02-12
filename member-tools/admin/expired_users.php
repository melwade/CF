<?php
session_start(); // start up your PHP session! 
include('connect.php');
  $result = mysql_query("SELECT id, expire_date, DATEDIFF( DATE( expire_date ) , CURDATE( ) ) AS Timer
FROM tblResets2
WHERE DATEDIFF( DATE( expire_date ) , CURDATE( ) ) < -3
AND 1 =1");
        
		while ($row = mysql_fetch_array($result)) {
		
		mysql_query("DELETE FROM tblResets2 WHERE id = '$row[id]'");
		}
			?>