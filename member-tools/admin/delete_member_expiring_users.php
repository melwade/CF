<?php
session_start(); // start up your PHP session! 
if ($_SESSION['isadmin']) {
include('connect.php');	
$delete_id=$_GET['id'];
$qry="DELETE from tblUserData where id='$delete_id'";

$result=mysql_query($qry);
if($result)
{
header( 'Location: https://www.cyclefolsom.com/member-tools/admin/report_expiring_users.php?code=member_deleted' ) ;
}
else { header( 'Location: https://www.cyclefolsom.com/member-tools/admin/report_expiring_users.php?code=member_not_deleted' ) ;
}

}
else {
header( 'Location: https://www.cyclefolsom.com/member-tools/' ) ;
}?>