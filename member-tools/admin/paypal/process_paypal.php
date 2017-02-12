<?
session_start();
$payer_email=$_POST['payer_email'];
$payment_date=$_POST['payment_date'];
$payment_amount=$_POST['payment_gross'];
$transaction_id=$_POST['txn_id'];
$payment_status=$_POST['payment_status'];
$id=$_POST['custom'];

include('connect.php');

mysql_query("INSERT INTO tblPaymentData (payer_email, payment_date, payment_gross, txn_id, payment_status, user_id) VALUES('$payer_email','$payment_date','$payment_amount','$transaction_id','$payment_status','$id')");

?>