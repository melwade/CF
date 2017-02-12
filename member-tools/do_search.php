<?php
session_start(); ?>

<style>
.tbox {position:absolute; display:none; padding:14px 17px; z-index:900}
.tinner {padding:15px; -moz-border-radius:5px; border-radius:5px; background:#fff url(images/preload.gif) no-repeat 50% 50%; border-right:1px solid #333; border-bottom:1px solid #333}
.tmask {position:absolute; display:none; top:0px; left:0px; height:100%; width:100%; background:#000; z-index:800}
.tclose {position:absolute; top:0px; right:0px; width:30px; height:30px; cursor:pointer; background:url(images/close.png) no-repeat}
.tclose:hover {background-position:0 -30px}

#error {background:#ff6969; color:#fff; text-shadow:1px 1px #cf5454; border-right:1px solid #000; border-bottom:1px solid #000; padding:0}
#error .tcontent {padding:10px 14px 11px; border:1px solid #ffb8b8; -moz-border-radius:5px; border-radius:5px}
#success {background:#2ea125; color:#fff; text-shadow:1px 1px #1b6116; border-right:1px solid #000; border-bottom:1px solid #000; padding:10; -moz-border-radius:0; border-radius:0}
#bluemask {background:#4195aa}
#frameless {padding:0}
#frameless .tclose {left:6px}
</style>
<script type="text/javascript" src="tinybox.js"></script>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<?
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

	
$count_query = mysql_query("SELECT COUNT(*) FROM tblUserData WHERE fname LIKE '%" . $word . "%' or lname LIKE '%" . $word . "%'  ORDER BY lname"); list($number) = mysql_fetch_row($count_query); 
if ($number>0){

		$query="SELECT id, fname, lname, phone, profile_type, email_add FROM tblUserData WHERE fname LIKE '%" . $word . "%' or lname LIKE '%" . $word . "%'  ORDER BY lname";

		$result = mysql_query($query);
	    $end_result = '';
		echo "<table bgcolor='#a20000' border='0' width='310'><tr bgcolor='#a20000'><th class='jtable'><font color='#fff'>Name</font></th><th class='jtable'><font color='#fff'>Details</font></th></tr>";
		while ($row = mysql_fetch_array($result)) {
			if($bgcolor=='#f4f4e9'){$bgcolor='#e0dfc9';}
			else{$bgcolor='#f4f4e9';}
            //$result         = $row['lname'];
            // we will use this to bold the search word in result
            //$bold           = '<span class="found">' . $word . '</span>';    
            //$thevalue     = str_ireplace($word, $bold, $result);   
			//$email_add_mod = str_replace("@"," AT ", $row['email_add']); 
			//$email_add_mod = str_replace("."," DOT ", $email_add_mod); 
			
			//Here we show different views based on whether they chose to have their profile public or private
			if ($row['profile_type']=="Private"){      
			echo "<tr bgcolor=$bgcolor ><td class='jtable' width='210'>$row[fname]". " ". "$row[lname]</td><td class='jtable' align='center' width='100'>*****PRIVATE*****</td></tr>";
			}
			else {
				    echo "<tr bgcolor=$bgcolor ><td class='jtable' width='210'>$row[fname]". " ". "$row[lname]</td><td class='jtable' align='center' width='100'><a href=\"#\" onclick=\"TINY.box.show({url:'show_member.php',post:'id=$row[id]',width:250,height:300,opacity:20,topsplit:3})\"><img src='images/info.png'></a></td></tr>";

			}
	        
			
        }
		echo "</table>";
		?>
         
        <?
    } else { 
			echo "No results found.";	}
}

	else {
		echo "Error - Accessing this page from a direct link"; }

?>