<?
session_start();
?>
<style>
.divbox {
	height:35px;
	margin-left:10px;
}
.links {
	font-weight:bold;}
</style>
<?
$account_id=$_SESSION['account_id'];
$contact_id=$_POST['id'];
$current_date=date('Y-m-d');
include ('connect.php');

//First thing to do is check how many searches this user has done today.  If it's 5, display a message saying they've exceeded the daily limit.  Also send an email to the admin.
$count_query = mysql_query("SELECT COUNT(*) FROM tblMemberSearches WHERE searcher_id = '" . $account_id . "' and search_date = '" . $current_date . "' "); list($number) = mysql_fetch_row($count_query); 

if ($number>4){
	
//Check if member is searching for someone they already searched for.  If they are, allow the search.  If it's for a new person, don't allow it.

	$searched_array = array();
	$qry="SELECT searched_id FROM tblMemberSearches WHERE searcher_id = '" . $account_id . "' and search_date = '" . $current_date . "' ";
	$result=mysql_query($qry);
	while ($row = mysql_fetch_array($result)) {
	$searched_array[]=$row['searched_id'];	
	}
	if (! in_array($contact_id, $searched_array)) {
	echo "You've reached the maximum allowable daily searches of members.  Please <a href='mailto:info@cyclefolsom.com' target='_blank'>email</a> the Admin if you need assistance."; 
	//Send email to admin letting them know someone made 5 searches
	
	$user_qry="SELECT * from tblUserData WHERE account_id = '$account_id'";
	$userRow = mysql_fetch_array(mysql_query($user_qry)); 
	$user_fullname=$userRow['fname']." ".$userRow['lname'];
	$user_email=$userRow['email_add'];
	
	$to = "rogersjason92@gmail.com"; 
	$subject = "Cycle Folsom Alert - Notification of Excessive Member Searches";
	$message = "
	<html>
	<head>
	<title>Cycle Folsom Alert</title>
	</head>
	<body>
	The following user has tried to exceed 5 Member Searches:<BR><BR> 
	<p><strong>Name: ".$user_fullname."</strong></p>
	<p><strong>Email: ".$user_email."</strong></p>
	</html>
	";
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	// More headers
	$headers .= 'From: Cycle Folsom <info@cyclefolsom.com>' . "\r\n";
	mail($to,$subject,$message,$headers);

	exit;
	}
	else {
$qry = "SELECT * from tblUserData WHERE id = '$contact_id'";
$rRow = mysql_fetch_array(mysql_query($qry)); 
echo $rRow['fname']." ".$rRow['lname'];
if (!empty($rRow['email_add'])) {echo "<BR>$rRow[email_add]";}
if (!empty($rRow['phone'])) {echo "<BR>(".substr($rRow['phone'], 0, 3).") ".substr($rRow['phone'], 3, 3)."-".substr($rRow['phone'],6);


echo "<div style='margin-top:15px;' class='links'>reply by email:</div>";
echo "<div class='divbox' style='margin-top:10px;'><a style='text-decoration:none' target='_blank' href='mailto:$rRow[email_add]'>$rRow[email_add]</a></div>";

echo "<div style='margin-top:10px;' class='links'>webmail links:</div>";
echo "<div class='divbox' style='margin-top:10px;'><a style='text-decoration:none' target='_blank' href='https://mail.google.com/mail/?view=cm&amp;fs=1&amp;to=$rRow[email_add]'><img style='vertical-align:middle' src='images/gmail-icon.png'>&nbsp;&nbsp;Gmail</a></div>";
echo "<div class='divbox'><a style='text-decoration:none' target='_blank' href='http://compose.mail.yahoo.com/?to=$rRow[email_add]'><img style='vertical-align:middle' src='images/yahoo-mail.png'>&nbsp;&nbsp;Yahoo</a></div>";
echo "<div class='divbox'><a style='text-decoration:none' target='_blank' href='https://mail.live.com/default.aspx?rru=compose&amp;to=$rRow[email_add]'><img style='vertical-align:middle' src='images/hotmail.png'>&nbsp;&nbsp;Hotmail, Outlook, Live Mail</a></div>";
echo "<div class='divbox'><a style='text-decoration:none' target='_blank' href='http://mail.aol.com/mail/compose-message.aspx?to=$rRow[email_add]'><img style='vertical-align:middle' src='images/aol.jpg'>&nbsp;&nbsp;AOL</a></div>";

}

//Now we record a log entry showing who searched for this person

$log_qry="INSERT IGNORE into tblMemberSearches (searcher_id, searched_id, search_date) VALUES ('$account_id', '$contact_id', '$current_date')";
mysql_query($log_qry); }
}
else {//They've done less than 5 searches today.
$qry = "SELECT * from tblUserData WHERE id = '$contact_id'";
$rRow = mysql_fetch_array(mysql_query($qry)); 
echo $rRow['fname']." ".$rRow['lname'];
if (!empty($rRow['email_add'])) {echo "<BR><a target='_blank' href='mailto:".$rRow['email_add']."'>".$rRow['email_add']."</a>";}
if (!empty($rRow['phone'])) {echo "<BR>".$rRow['phone'];}

echo "<div style='margin-top:15px;' class='links'>reply by email:</div>";
echo "<div class='divbox' style='margin-top:10px;'><a style='text-decoration:none' target='_blank' href='mailto:$rRow[email_add]'>$rRow[email_add]</a></div>";

echo "<div style='margin-top:10px;' class='links'>webmail links:</div>";
echo "<div class='divbox' style='margin-top:10px;'><a style='text-decoration:none' target='_blank' href='https://mail.google.com/mail/?view=cm&amp;fs=1&amp;to=$rRow[email_add]'><img style='vertical-align:middle' src='images/gmail-icon.png'>&nbsp;&nbsp;Gmail</a></div>";
echo "<div class='divbox'><a style='text-decoration:none' target='_blank' href='http://compose.mail.yahoo.com/?to=$rRow[email_add]'><img style='vertical-align:middle' src='images/yahoo-mail.png'>&nbsp;&nbsp;Yahoo</a></div>";
echo "<div class='divbox'><a style='text-decoration:none' target='_blank' href='https://mail.live.com/default.aspx?rru=compose&amp;to=$rRow[email_add]'><img style='vertical-align:middle' src='images/hotmail.png'>&nbsp;&nbsp;Hotmail, Outlook, Live Mail</a></div>";
echo "<div class='divbox'><a style='text-decoration:none' target='_blank' href='http://mail.aol.com/mail/compose-message.aspx?to=$rRow[email_add]'><img style='vertical-align:middle' src='images/aol.jpg'>&nbsp;&nbsp;AOL</a></div>";

//Now we record a log entry showing who searched for this person

$log_qry="INSERT IGNORE into tblMemberSearches (searcher_id, searched_id, search_date) VALUES ('$account_id', '$contact_id', '$current_date')";
mysql_query($log_qry);
}
?>
<a style="text-decoration:none"
