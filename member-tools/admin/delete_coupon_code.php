<?php
session_start(); // start up your PHP session! 
if ($_SESSION['isadmin']) {
include('connect.php');	
$delete_id=$_GET['id'];
$qry="DELETE from tblCouponCodes where id='$delete_id'";

$result=mysql_query($qry);
if($result)
{
header( 'Location: https://www.cyclefolsom.com/member-tools/admin/existing_coupon_codes.php?code=coupon_deleted' ) ;
}
else { header( 'Location: https://www.cyclefolsom.com/member-tools/admin/existing_coupon_codes.php?code=coupon_not_deleted' ) ;
}

}
else {
header( 'Location: https://www.cyclefolsom.com/member-tools/' ) ;
}?>