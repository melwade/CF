<?php
require_once "connect.php";
$q = strtolower($_GET["q"]);
if (!$q) return;

$q_array = explode(" ", $q);
$q_first = $q_array[0];
$q_second = $q_array[1];

$sql = "
	select id, lname, fname, email_add from tblUserData where 
	( 
	(lname LIKE '%$q%') OR 
	(fname LIKE '%$q%')	OR
	(email_add LIKE '%$q%')
	) 
	
	"
;

$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	$id = $rs['id'];
	$fname = $rs['fname'];
	$lname = $rs['lname'];
	$email_add = $rs['email_add'];
	
	$result = "";
	
	if(!empty($fname)) {
		$result .= " $fname";
	}
	
	if(!empty($lname)) {
		$result .= " $lname, ";
	}

	if(!empty($email_add)) {
		$result .= " $email_add";
	}

	$result .= "|$id\n";
	
	echo $result;
}
?><!--<p><? //echo $sql; ?></p>--><p>End of Results</p>