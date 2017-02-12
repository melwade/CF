<?	  
session_start(); // start up your PHP session! 
if ($_SESSION['myusername'] ) { 
include ('connect.php');	
//Get post values

$account_id = addslashes($_POST['account_id']);
//This tells us if the user updated their password
$password_status = addslashes($_POST['password_status']);

//get values of old and new passwords
$pw_orig_md5 = addslashes($_POST['pw_orig_md5']);
$pw_new_md5 = addslashes($_POST['pw_new_md5']);
$pw_new2_md5 = addslashes($_POST['pw_new2_md5']);

$fname = ucwords(addslashes($_POST['fname']));
$lname = ucwords(addslashes($_POST['lname']));
$meetup_username = addslashes($_POST['meetup_username']);
$gender = addslashes($_POST['gender']);
$street = addslashes($_POST['street']);
$city = addslashes($_POST['city']);
$state = addslashes($_POST['state']);
$zip = addslashes($_POST['zip']);
$phone = addslashes($_POST['phone']);
$opt_in = addslashes($_POST['opt_in']);
$profile_type = addslashes($_POST['profile_type']);

$query = "update tblUserData
             set fname = '".$fname."',
             lname = '".$lname."',
			 gender = '".$gender."',
			 meetup_username = '".$meetup_username."',
             street = '".$street."',
			 city = '".$city."',
			 state = '".$state."',
   		     zip = '".$zip."',
			 phone = '".$phone."',
			 opt_in = '".$opt_in."',
			 profile_type = '".$profile_type."'";
			 
if ($password_status=="pwchange" && !empty($pw_new_md5) && strlen($pw_new_md5) > 5 && $pw_new_md5==$pw_new2_md5) {
			 $query .= ", cfpw = '$pw_new_md5' where account_id = '$account_id'"; }
			 else {
				 $query .= " where account_id = '$account_id'"; 
			 }

$result=mysql_query($query);

if ($result) {
	//Query ran successfully
	header( 'Location: edit_success.php?');}
	else  //problem in query
	{header( 'Location: edit_failure.php?');}

?>
<?
}
else {
header( 'Location: https://www.cyclefolsom.com/member-tools/' ) ;
}?>