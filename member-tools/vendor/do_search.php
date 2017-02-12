<?php
session_start();
//if we got something through $_POST
if (isset($_POST['search'])) {
    // here you would normally include some database connection
   // include('db.php');


//connection to the database

include('connect.php');

    // never trust what user wrote! We must ALWAYS sanitize user input
    $word = mysql_real_escape_string($_POST['search']);
    $word = htmlentities($word);
    // get results
	$result = mysql_query("SELECT fname, lname, payment_status, membership_level, expiration_date FROM tblUserData WHERE fname LIKE '%" . $word . "%' or lname LIKE '%" . $word . "%'  ORDER BY lname");
        $end_result = '';
		echo "<table bgcolor='#a20000' border='0' width='750'><tr bgcolor='#a20000'><th class='jtable'><font color='#fff'>Name</font></th><th class='jtable'><font color='#fff'>Payment Status</font></th><th class='jtable'><font color='#fff'>Membership Type</font></th><th class='jtable'><font color='#fff'>Expiration Date</font></th></tr>";
		while ($row = mysql_fetch_array($result)) {
			if($bgcolor=='#f4f4e9'){$bgcolor='#e0dfc9';}
			else{$bgcolor='#f4f4e9';}
            //$result         = $row['lname'];
            // we will use this to bold the search word in result
            //$bold           = '<span class="found">' . $word . '</span>';    
            //$thevalue     = str_ireplace($word, $bold, $result);            
			echo "<tr bgcolor=$bgcolor ><td class='jtable' width='200'>$row[fname]". " ". "$row[lname]</td>";
			 switch ($row['payment_status']) {
				case "Paid":
				echo "<td class='jtable' align='center' width='150'>Active/Current</td>";
				break;
				case "Expired":
				echo "<td class='jtable' align='center' width='150'>Expired</td>";
				break;
				case "Unpaid":
				echo "<td class='jtable' align='center' width='150'>Unpaid</td>";
				break;
				case "Canceled":
				echo "<td class='jtable' align='center' width='150'>Canceled</td>";
				break;
				case "Pending":
				echo "<td class='jtable' align='center' width='150'>Pending Admin Approval</td>";
				break;
				case "No Waiver":
				echo "<td class='jtable' align='center' width='150'>Pending Admin Approval</td>";
				break;
				default:
				echo "<td class='jtable' align='center' width='150'>Error</td>";}
				
			echo "<td class='jtable' align='center' width='200'>$row[membership_level]</td>";
			echo "<td class='jtable' width='200' align='center'>";
			echo ($row['expiration_date']=='') ? "" : date('n/j/y', (strtotime($row['expiration_date'])));
			echo "</td></tr>";
            
			
        }
		echo "</table>";
    } 
	else {
		echo "Error - Accessing this page from a direct link"; }

?>