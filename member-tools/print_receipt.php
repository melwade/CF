<?php
session_start(); // start up your PHP session! 

$tx_id=$_GET['txid'];

//$tx_id="//4L060694U6716721M";
	include ('connect.php');
	//Get payment info
	$query = "SELECT * from tblPaymentData WHERE txn_id = '".$tx_id."'";
	$rRow = mysql_fetch_array(mysql_query($query)); 
	$sv = mysql_query($query) or die(mysql_error()); 
	$totalRows_sv = mysql_num_rows($sv); 
	if ($totalRows_sv == 1) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript">
        function PrintWindow()
        {                     
           window.print();            
           CheckWindowState(); 
        }
        
        function CheckWindowState()
        {            
            if(document.readyState=="complete")
            {
                window.close();  
            }
            else
            {            
                setTimeout("CheckWindowState()", 2000)
            }
        }    
        
       PrintWindow();
</script>
<head>
<style type="text/css">

@page
{
size: portrait;
margin: 3cm;
}
body {
	font-size: 10pt;
}

</style>
<style type="text/css" media="print">
@page
{
size: portrait;
margin: 3cm;
}
body {
	font-size: 10pt;
}

</style>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Payment Receipt</title>
<style type="text/css">
<!--
.style1 {
	font-size: 18pt;
	font-weight: bold;
}
.style2 {
	font-size: 14pt;
	font-weight: bold;
	margin-top:30px;
}
-->
</style>
</head>
<body>
<?
	$payment_date = $rRow['payment_date'];
	$payment_type = $rRow['payment_type'];
	$account_id = $rRow['account_id'];
	$payment_status = $rRow['payment_status'];
	$payment_amount = "$15.00";
	//Get member fname, lname
	$query = "SELECT fname, lname from tblUserData WHERE account_id = '".$account_id."'";
	$mRow = mysql_fetch_array(mysql_query($query)); 
	$firstName = $mRow['fname'];
	$lastName = $mRow['lname'];	
?>

<table style="margin-bottom:30px;" width="99%" border="0" bgcolor="#ffffff"><tr><td width="50%" align="left" bgcolor="#ffffff"><img src="images/receipt_left_corner.png" /></td><td width="50%" align="right" bgcolor="#ffffff"><img src="images/receipt_right_corner.png" /></td>
</tr></table>
<table width="99%" border="0" ><tr><td><div align="center" class="style2">Cycle Folsom PayPal Receipt</div></td>
</tr></table>
<table style="margin-top:25px;" width="99%" cellpadding="3" border="0">
<tr><td align="right" width="30%"><strong>Member Name:</strong></td>
<td><? echo $firstName." ".$lastName; ?></td></tr>
<tr><td align="right" width="30%"><strong>Payment Amount:</strong></td>
<? if ($payment_type=="Ride Leader Renewal") { 
?> <td><? echo "N/A"; ?></td></tr> <? } 
else {
?> <td><? echo $payment_amount; ?></td></tr> <? } ?>

<tr><td align="right" width="30%"><strong>Payment Date:</strong></td>
<td><? echo $payment_date; ?></td></tr>
<tr><td align="right" width="30%"><strong>Transaction ID:</strong></td>
<td><? echo $tx_id; ?></td></tr>
<tr><td align="right" width="30%"><strong>Payment Status:</strong></td>
<td><? echo $payment_status; ?></td></tr>
<tr><td align="right" width="30%"><strong>Payment Type:</strong></td>
<td><? echo $payment_type; ?></td></tr>

</table>
<div style="margin-top:40px;">
<strong><? echo $fname ?></strong></div>
<div style="margin-top:10px; margin-bottom:25px;">

<p>Please be sure to review our Premium member discounts at <a href="http://www.cyclefolsom.com/sponsors.html">http://www.cyclefolsom.com/sponsors.html</a>. As you might expect,
we add and remove sponsors from time to time, so take advantage of any special offers they provide while you can. You'll
receive your Premium Membership Card in the mail within the next couple of weeks.</p>

<p><strong>IMPORTANT INFORMATION FOR NEW MEMBERS</strong>: We try to make this abundantly clear, but in addition to your registration at
CycleFolsom.com, you'll need to join our Meetup group at <a href="http://www.Meetup.com/CycleFolsom">http://www.Meetup.com/CycleFolsom</a> (requires that you
sign up for Meetup.com, which is free). Once you've registered at CycleFolsom.com and joined our Meetup group, you'll be
ready to join us for some great rides. If you're like many of our members, you'll become addicted.</p>

<p>We look forward to seeing you out there.</p>

Sincerely,<br />
Stan Schultz<br />
Chief Evangelist<br />
Cycle Folsom<br />
</div>
<? }
else {
	echo "ERROR"; } ?>

</body>
</html>
