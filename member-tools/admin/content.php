<style type="text/css">
table.padded-outside td { padding:4px; }
table.padded-table td { padding:4px; }
table.padded-table tr td.blk  {
	font-size:12;
}

</style>
<? 

function displayContent() {

	echo "<h2>CSM Online Binder</h2>"; //Show Files Here

echo "<div style='float: left; width:75%;'>To download the file to your computer, right click the file and select \"Save Link As\" (or similar wording depending on your browser).<br><br>Once downloaded, you can extract the contents of the ZIP file on your computer.  If your operating system is Windows Vista or later, or Mac OS X, simply double click on the downloaded ZIP file to open and extract.  If you are downloading this ZIP file directly to your iPad, the \"GoodReader\" application will open it.  If you encounter any difficulty opening the ZIP file, please contact Jason Rogers at (916) 323-8224 or jason.rogers@csm.ca.gov.</p>";

//NOTE:  You have to create the public link and click on it to get the link below

//echo "<a href='https://www.hightail.com/e?phi_action=app/directDownload&fl=SWhZekZucHY4NVUwTVc2Y3J3UFFIVE9yZWt5UmdteDRsUjJuWENHRzVZbz0'>January 24, 2014 Binder</a><span class='kb'>&nbsp;(.zip, 244MB)</span></div>";



echo "<a href='fd.php?file=binder_032715.zip'>March 27, 2015 Binder</a><span class='kb'>&nbsp;(.zip, 160MB)</span></div>";

//echo "<a href='binder_files/csm_files_loc/072613.zip'>July 26, 2013 Binder</a><span class='kb'>&nbsp;(.zip, 77MB)</span></div>";

echo "<div style='float: right;'><a href='logout.php'>Logout</a><br><br><a href='edit_account.php?account_id=$_SESSION[account_id]'>Edit My Account</a></div>";

}

function displayTempLogin($reset_code) {

//Look up temporary password based on reset code

	$pw_query = "SELECT * from tblResets WHERE reset_code = '$reset_code'";

	$rRow = mysql_fetch_array(mysql_query($pw_query)); 

	$temp_pw = $rRow['temp_pw'];

	$expire_date = $rRow['expire_date'];

	

	if ($expire_date < date("Y-m-d")) {

		//Remove existing record

		mysql_query("DELETE FROM tblResets WHERE reset_code = '$reset_code'") or die(mysql_error());  

		echo "Your temporary password has expired.  You will need to reset your password again by clicking here - <a href='https://www.csm.ca.gov/online_binder/reset_password.php'>Reset Password</a>"; }

		else { //Link has not expired, so allow password reset

		

	echo"<br>".date('m/d/Y', (strtotime($expire_date)))."<br>";;

		

?>

<style type="text/css">

.new_pw {

	font-size: 11px;

	color: #F00;

}

.jtest {
	font-size: 24px;
}
</style>
<table class="padded-outside" width="450" border="2" cellpadding="0" cellspacing="1" bgcolor="#ffffff">

<tr>

<form id="templogin" method="post" action="password_reset_success.php">

<input type="hidden" id="username" name="username" value="<? echo $rRow['username']; ?>">

<input type="hidden" id="temp_pw" name="temp_pw" value="<? echo $temp_pw; ?>">

<td>
<table class="padded-table" width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">

<tr>
<td bgcolor="#a20000" colspan="3" style="color:#FFF"><strong>Password Reset</strong></td>

</tr>

<tr>

<td align="right" width="163">Temporary Password</td>

<td width="3">:</td>

<td width="190"><input name="temp_password" type="text" id="temp_password"></td>

</tr>

<tr>

<td align="right">New Password<br><span class="new_pw">At least 6 characters</span></td>

<td>:</td>

<td><input name="password" type="password" id="password"></td>

</tr>

<tr>

<td align="right">Re-Enter New Password</td>

<td>:</td>

<td><input name="password-check" type="password" id="password-check"></td>

</tr>

<tr>

<td>&nbsp;</td>

<td>&nbsp;</td>

<td class="forgot_password">  <input type="submit" value="Submit" id="submit">

</td>

</tr>

</table>

</td>

</form>

<script type="text/javascript">

 var frmvalidator  = new Validator("templogin");

 frmvalidator.addValidation("temp_password","req","Please enter the temporary password");

 frmvalidator.addValidation("password","req","Please enter your new password");

 frmvalidator.addValidation("password-check","req","Please re-enter your password");

 frmvalidator.addValidation("temp_password","eqelmnt=temp_pw",

 "The temporary password you entered does not match the one sent to you in email.  Please re-enter.");

  frmvalidator.addValidation("password","eqelmnt=password-check",

 "Your new passwords do not match. Please re-enter.");

 frmvalidator.addValidation("password","minlen=6","Your new password must be at least 6 characters in length.  Please re-enter.");

 </script>

</tr>

</table>

<script type="text/javascript">

$(document).ready(function(){

$("#temp_password").focus();

});

</script>

<? }  }

function resetPassword() {

?>

<style type="text/css">

.new_pw {

	font-size: 11px;

	color: #F00;

}

</style>

<table width="400" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">

<tr>

<form id="changepw" method="post" action="">

<td>

<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">

<tr>

<td bgcolor="#BCC5D0" colspan="3"><strong>Change Password</strong></td>

</tr>

<tr>

<td align="right" width="163">Existing Password</td>

<td width="3">:</td>

<td width="190"><input name="existing_password" type="password" id="existing_password"></td>

</tr>

<tr>

<td align="right">New Password<br><span class="new_pw">At least 6 characters</span></td>

<td>:</td>

<td><input name="password" type="password" id="password"></td>

</tr>

<tr>

<td align="right">Re-Enter New Password</td>

<td>:</td>

<td><input name="password-check" type="password" id="password-check"></td>

</tr>

<tr>

<td>&nbsp;</td>

<td>&nbsp;</td>

<td class="forgot_password">  <input type="submit" name="submit" value="Submit" id="submit">

</td>

</tr>

<tr>

<td>&nbsp;</td>

<td>&nbsp;</td>

<td class="forgot_password"><a href="index.php">Back to Online Binder</a></td>

</tr>

</table>

</td>

</form>

<script type="text/javascript">

 var frmvalidator  = new Validator("changepw");

 frmvalidator.addValidation("existing_password","req","Please enter your existing password");

 frmvalidator.addValidation("password","req","Please enter your new password");

 frmvalidator.addValidation("password-check","req","Please re-enter your password");

 frmvalidator.addValidation("password","minlen=6","Your new password must be at least 6 characters in length.  Please re-enter.");

 </script>

</tr>

</table>

<script type="text/javascript">

$(document).ready(function(){

$("#existing_password").focus();

});

</script>

<? }

function registerAccount() {

?>

<style type="text/css">

.new_pw {

	font-size: 11px;

	color: #F00;

}

</style>

<table width="450" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">

<tr>

<form id="newAccount" method="post" action="">

<td>

<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">

<tr>

<td bgcolor="#BCC5D0" colspan="3"><strong>Create Account</strong></td>

</tr>

<tr>

<td align="right" width="163">Username</td>

<td width="3">:</td>

<td width="240"><input size="30" value="" autocomplete="off" name="username" type="text" id="username"><br>

<span id="msgbox" style="display:none"></span></td>

</tr>

<tr>

<td align="right" width="163">First Name</td>

<td width="3">:</td>

<td width="240"><input size="30" value="" autocomplete="off" name="fname" type="text" id="fname"></td>

</tr>

<tr>

<td align="right" width="163">Last Name</td>

<td width="3">:</td>

<td width="240"><input size="30" value="" autocomplete="off" name="lname" type="text" id="lname"></td>

</tr>

<tr>

<td align="right" width="163">Email</td>

<td width="3">:</td>

<td width="240"><input size="30" value="" autocomplete="off" name="email" type="text" id="email"></td>

</tr>

<tr>

<td align="right">New Password<br><span class="new_pw">At least 6 characters</span></td>

<td>:</td>

<td><input size="30" value="" autocomplete="off" name="password" type="password" id="password"></td>

</tr>

<tr>

<td align="right">Re-Enter New Password</td>

<td>:</td>

<td><input size="30" value="" autocomplete="off" name="password-check" type="password" id="password-check"></td>

</tr>

<tr>

<td>&nbsp;</td>

<td>&nbsp;</td>

<td class="forgot_password">  <input type="submit" name="submit" value="Register">

</td>

</tr>

<tr>

<td>&nbsp;</td>

<td>&nbsp;</td>

<td class="forgot_password"><a href="index.php">Back to Login Page</a></td>

</tr>

</table>

</td>

</form>

<script type="text/javascript">

 var frmvalidator2  = new Validator("newAccount");

 frmvalidator2.addValidation("username","req","Please enter a username");

 frmvalidator2.addValidation("fname","req","Please enter your first name");

 frmvalidator2.addValidation("lname","req","Please enter your last name");

 frmvalidator2.addValidation("email","req", "Please enter an email address");

 frmvalidator2.addValidation("email","email", "Please enter a valid email address");

 frmvalidator2.addValidation("password","req","Please enter a password"); 

 frmvalidator2.addValidation("password-check","req","Please re-enter your password");

 frmvalidator2.addValidation("password","eqelmnt=password-check",

 "Your new passwords do not match. Please re-enter.");

 frmvalidator2.addValidation("password","minlen=6","Your new password must be at least 6 characters in length.  Please re-enter.");

 </script>

</tr>

</table>

<script type="text/javascript">

$(document).ready(function(){

$("#username").focus();

});

</script>

<? }  

function displayLogin() {

?>

<table class="padded-outside" width="450" border="2" cellpadding="0" cellspacing="1" bgcolor="#ffffff">

<tr>

<form method="post" action="">

<td>


<table class="padded-table" width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">

<tr>

<td bgcolor="#a20000" colspan="3" style="color:#FFF"><strong>Enter Credentials</strong></td>

</tr>

<tr>

<td align="right" width="78">Email</td>

<td width="6">:</td>

<td><input size="35" name="myusername" type="text" id="myusername"></td>

</tr>

<tr>

<td align="right">Password</td>

<td>:</td>

<td><input size="35" name="mypassword" type="password" id="mypassword"></td>

</tr>

<tr>

<td>&nbsp;</td>

<td>&nbsp;</td>

<td class="forgot_password"><input type="submit" name="submit" value="Login">

</td>

</tr>

<tr>

<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>

<td>&nbsp;</td>

<td>&nbsp;</td>

<td class="blk" style="margin-top:25px;"><a href="reset_password.php">Forgot your password?</a></td>

</tr>

<tr>

<td>&nbsp;</td>

<td>&nbsp;</td>

<td class="blk"><a href="cf_register.php">Register for an Account</a></td>

</tr>

</table>

</td>

</form>

</tr>

</table>

<script type="text/javascript">

$(document).ready(function(){

$("#myusername").focus();

});

</script>

<? } 

function sendNewRegistrationEmail() {

	

	$to = "jason.rogers@csm.ca.gov,jason.hone@csm.ca.gov";

$subject = "CSM Online Binder Registration Request";

$message = "

<html>

<head>

<title>CSM Online Binder Registration Request</title>

</head>

<body>

A new registration form has been submitted for an account to access the CSM Online Binder System.

<p>You can login to the admin panel here - <a href='https://www.csm.ca.gov/online_binder/admin/index.php'>Admin Panel</a></p>

	 

</body>

</html>

";

// Always set content-type when sending HTML email

$headers = "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers

$headers .= 'From: <csminfo@csm.ca.gov>' . "\r\n";

mail($to,$subject,$message,$headers);

}



function send_user_username($username, $myemail, $ip_add) {

	

	$to = $myemail;

$subject = "CSM Username Request";

$message = "

<html>

<head>

<title>CSM Username Request</title>

</head>

<body>

You are receiving this email because you requested your username for the CSM Online Binder system. 

<p><strong>Your username is: ".$username."</strong></p>

	 

<p>This request came from the IP address of ".$ip_add."</p>

<p>If you did not make this request, please contact the Commission office at 916-323-3562.  Thank you.</p>

</body>

</html>

";

// Always set content-type when sending HTML email

$headers = "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers

$headers .= 'From: <csminfo@csm.ca.gov>' . "\r\n";

mail($to,$subject,$message,$headers);

}

function send_user_username_admin($username, $ip_add) {

	

	$to = "jason.rogers@csm.ca.gov,jason.hone@csm.ca.gov";

$subject = "Notification of CSM Username Request";

$message = "

<html>

<head>

<title>CSM Username Request</title>

</head>

<body>

The following user requested his/her username on the CSM Online Binder System

<p><strong>Username: ".$username."</strong></p>

<p><strong>IP Address: ".$ip_add."</strong></p>	 

</body>

</html>

";

// Always set content-type when sending HTML email

$headers = "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers

$headers .= 'From: <csminfo@csm.ca.gov>' . "\r\n";

mail($to,$subject,$message,$headers);

}

function sendChangedEmailNotification($email,$oldemail,$ip_add) {

	

	$to = $oldemail;

$subject = "CSM Online Binder Account Modification";

$message = "

<html>

<head>

<title>CSM Online Binder Account Modification</title>

</head>

<body>

You are receiving this email because you requested a change to your email address for the CSM Online Binder system. 

<p><strong>Your updated email is: ".$email."</strong></p>

<p>This request came from the IP address of ".$ip_add."</p>

	 

If you did not make this request, please contact the Commission office at 916-323-3562.  Thank you.

</body>

</html>

";

// Always set content-type when sending HTML email

$headers = "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers

$headers .= 'From: <csminfo@csm.ca.gov>' . "\r\n";

mail($to,$subject,$message,$headers);

}

function sendChangedEmailNotificationAdmin($username,$email,$oldemail,$ip_add) {

	

	$to = "jason.rogers@csm.ca.gov,jason.hone@csm.ca.gov";

$subject = "Notification of CSM Online Binder Account Modification";

$message = "

<html>

<head>

<title>CSM Online Binder Account Modification</title>

</head>

<body>

The following user changed his/her email address on the CSM Online Binder System

<p><strong>Username: ".$username."</strong></p>

<p><strong>IP Address: ".$ip_add."</strong></p>	 

<p><strong>Old Email Address: ".$oldemail."</strong></p>	 

<p><strong>New Email Address: ".$email."</strong></p>	 

</body>

</html>

";

// Always set content-type when sending HTML email

$headers = "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers

$headers .= 'From: <csminfo@csm.ca.gov>' . "\r\n";

mail($to,$subject,$message,$headers);

}



function send_password_reset($user_email, $temp_pass, $reset_code, $ip_add) {

	

$to = $user_email;

$subject = "CSM Password Reset Request";

$message = "

<html>

<head>

<title>CSM Password Reset</title>

</head>

<body>

You are receiving this email because you requested a password reset for the CSM Online Binder system. 

<p><strong>Your temporary password is: ".$temp_pass."</strong></p>

<p>Please click on the following link and enter the temporary password above.  The temporary password must be changed within 72 hours or it will expire.</p>

<p><a href='https://www.csm.ca.gov/online_binder/temp_password_reset.php?id=$reset_code'>Password Reset Link</a></p>

<p>This request came from the IP address of ".$ip_add."</p>	 

<p>If you did not make this request, please contact the Commission office at 916-323-3562.  Thank you.</p>

</body>

</html>

";

// Always set content-type when sending HTML email

$headers = "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers

$headers .= 'From: <csminfo@csm.ca.gov>' . "\r\n";

mail($to,$subject,$message,$headers);

}

function send_password_reset_admin($user_username, $ip_add) {

	

$to = "jason.rogers@csm.ca.gov,jason.hone@csm.ca.gov";

$subject = "Notification of CSM Password Reset Request";

$message = "

<html>

<head>

<title>CSM Password Reset</title>

</head>

<body>

The following user requested his/her email address on the CSM Online Binder System

<p><strong>Username: ".$user_username."</strong></p>

<p><strong>IP Address: ".$ip_add."</strong></p>	 </body>

</html>

";

// Always set content-type when sending HTML email

$headers = "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers

$headers .= 'From: <csminfo@csm.ca.gov>' . "\r\n";

mail($to,$subject,$message,$headers);

}

function displayPasswordReset() {

?>
<table class="padded-outside" width="450" border="2" cellpadding="0" cellspacing="1" bgcolor="#ffffff">

<tr>

<form method="post" action="">

<td>
<table class="padded-table" width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">

<tr>
<td bgcolor="#a20000" colspan="3" style="color:#FFF"><strong>Enter Email Address</strong></td>


</tr>

<tr>

<td align="right" width="78">Email</td>

<td width="6">:</td>

<td> <input size="35" name="myusername" type="text" id="myusername"></td>

</tr>

<tr>

<td>&nbsp;</td>

<td>&nbsp;</td>

<td ><input type="submit" name="submit" value="Reset">

</td>

</tr>
<tr>

<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>

<td>&nbsp;</td>

<td>&nbsp;</td>

<td class="blk"><a href="index.php">Back to Login Page</a></td>

</tr>

</table>

</td>

</form>

</tr>

</table>

<script type="text/javascript">

$(document).ready(function(){

$("#myusername").focus();

});

</script>

<? } 

function displayUsernameRequest() {

?>

<table width="400" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">

<tr>

<form method="post" action="">

<td>

<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">

<tr>

<td bgcolor="#BCC5D0" colspan="3"><strong>Username Request</strong></td>

</tr>

<tr>

<td width="43">Email</td>

<td width="6">:</td>

<td width="325"><input name="myemail" size="45" type="text" id="myemail"></td>

</tr>

<tr>

<td>&nbsp;</td>

<td>&nbsp;</td>

<td class="forgot_password"><input type="submit" name="submit" value="Request">

</td>

</tr>

<tr>

<td>&nbsp;</td>

<td>&nbsp;</td>

<td class="forgot_password"><a href="index.php">Back to Login Page</a></td>

</tr>



</table>

</td>

</form>

</tr>

</table>

<script type="text/javascript">

$(document).ready(function(){

$("#myemail").focus();

});

</script>

<? } function check_email_address($email) {

  // First, we check that there's one @ symbol, 

  // and that the lengths are right.

  if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {

    // Email invalid because wrong number of characters 

    // in one section or wrong number of @ symbols.

    return false;

  }

  // Split it into sections to make life easier

  $email_array = explode("@", $email);

  $local_array = explode(".", $email_array[0]);

  for ($i = 0; $i < sizeof($local_array); $i++) {

    if

(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&

↪'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",

$local_array[$i])) {

      return false;

    }

  }

  // Check if domain is IP. If not, 

  // it should be valid domain name

  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {

    $domain_array = explode(".", $email_array[1]);

    if (sizeof($domain_array) < 2) {

        return false; // Not enough parts to domain

    }

    for ($i = 0; $i < sizeof($domain_array); $i++) {

      if

(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|

↪([A-Za-z0-9]+))$",

$domain_array[$i])) {

        return false;

      }

    }

  }

  return true;

}

function genPassword($length) 
{
  // given a string length, returns a random password of that length
  $password = "";
  // define possible characters
  $possible = "0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $i = 0;
  // add random characters to $password until $length is reached
  while ($i < $length) {
    // pick a random character from the possible ones
   $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
    // we don't want this character if it's already in the password
    if (!strstr($password, $char)) {
      $password .= $char;
      $i++;
    }
  }
  return $password;
}

function record_user_action($user_username, $ip_add, $action) 

{

	mysql_query("INSERT INTO tblLog (username, ip_add, action) VALUES('$user_username', '$ip_add', '$action' ) ") or die(mysql_error());  

}

?>