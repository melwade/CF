<?php
session_start();
//if we got something through $_POST
if (isset($_POST['search2'])) {
    // here you would normally include some database connection
   // include('db.php');


//connection to the database

include('connect.php');

    // never trust what user wrote! We must ALWAYS sanitize user input
    $word2 = mysql_real_escape_string($_POST['search2']);
    $word2 = htmlentities($word2);
	echo "Word is ".$word2;
    // get results

	
		$query="SELECT phone, email_add FROM tblUserData WHERE id = '" . $word2 . "' ";

		$result = mysql_query($query);
	    $end_result = '';
		echo "<table bgcolor='#a20000' border='0' width='650'><tr bgcolor='#a20000'><th class='jtable'><font color='#fff'>Phone</font></th><th class='jtable'><font color='#fff'>Email</font></th></tr>";
		while ($row = mysql_fetch_array($result)) {
			if($bgcolor=='#f4f4e9'){$bgcolor='#e0dfc9';}
			else{$bgcolor='#f4f4e9';}
			
			
				echo "<tr bgcolor=$bgcolor ><td class='jtable' align='center' width='150'>$row[phone]</td><td class='jtable' align='center' width='300'>$row[email_add]</td></tr>";
			
        }
		echo "</table>";
		?>
         
        <?
    
}

	else {
		echo "Error - Accessing this page from a direct link"; }

?>