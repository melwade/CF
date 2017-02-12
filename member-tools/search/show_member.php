<?
$contact_id=$_POST['id'];
include ('connect.php');
$qry = "SELECT * from tblUserData WHERE id = '$contact_id'";
$rRow = mysql_fetch_array(mysql_query($qry)); 
echo $rRow['fname']." ".$rRow['lname'];
if (!empty($rRow['email_add'])) {echo "<BR><a href='mailto:".$rRow['email_add']."'>".$rRow['email_add']."</a>";}
if (!empty($rRow['phone'])) {echo "<BR>".$rRow['phone'];}
?>

