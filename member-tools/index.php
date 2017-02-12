<? 
ob_start(); // Initiate the output buffer
session_start();
include('content.php');
?>
<!DOCTYPE html>
<html class="html">
 <head>


  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.2.232.244"/>
  <title>Cycle Folsom Membership</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?272710960"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?4059369144"/>
  <link rel="stylesheet" type="text/css" href="cf_style.css" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>
<script type="text/javascript" src='message.js'></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<SCRIPT LANGUAGE="JavaScript" SRC="js/CalendarPopup.js"></SCRIPT>

<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
<script>
jQuery(function($){
   $("#phone").mask("(999) 999-9999");
});
</script>
<script>
function clearit(date_val)
{
var panel = document.getElementById(date_val);
panel.value='';
}
</script>

	<SCRIPT LANGUAGE="JavaScript">
		var cal = new CalendarPopup();
		var cal2 = new CalendarPopup();
		var cal3 = new CalendarPopup();
		cal3.showYearNavigation();
		var cal4 = new CalendarPopup();
	</SCRIPT>
    
<script language="javascript">
//<!---------------------------------+
//  Developed by Roshan Bhattarai 
//  Visit https://roshanbh.com.np for this script and more.
//  This notice MUST stay intact for legal use
// --------------------------------->
$(document).ready(function()
{
	$("#username").blur(function()
	{
		if( $(this).val() ) {  
		//remove all the class add the messagebox classes and start fading
		$("#msgbox").removeClass().addClass('messagebox').text('Checking Availability...').fadeIn("slow");
		//check the username exists or not from ajax
		$.post("username_availability.php",{ username:$(this).val() } ,function(data)
        {
		  if(data=='no') //if username not avaiable
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('This username already exists').addClass('messageboxerror').fadeTo(900,1);
			  $("#username").val('');
			  $('#username').focus();
			});		
          }
		  else
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Username is available.').addClass('messageboxok').fadeTo(900,1);	
			 
			});
		  }
		 setTimeout(function() { $("#msgbox").fadeOut(); }, 8000);		
        });
		}
	});
	
});
</script>

<link rel="stylesheet" type="text/css" href="message_default.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
 

 <link rel="stylesheet" type="text/css" href="member_tools_style.css" />
</head>

      <!-- content -->
      <!--<h1 class="Heading-1" style="margin-bottom:30px;">CF Member Login</h1> -->
      
      <?php
if ($_SESSION['myusername'] and $_SESSION['account_id'] ) { //User has existing active session
include('CF_header.php');
displayContent();

}
else {
	
   if(isset($_POST['myusername']))
   {
	include ('connect.php');
	// username and password sent from form 
	$myusername=$_POST['myusername']; 
	$mypassword=$_POST['mypassword']; 
	//$remember_me=$_POST['remember_me'];
		
	// To protect MySQL injection 
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = md5(mysql_real_escape_string($mypassword));
	$sql="SELECT * FROM tblUserData WHERE email_add='$myusername' and cfpw='$mypassword'";
	$rRow = mysql_fetch_array(mysql_query($sql)); 
	$ip_add = $_SERVER["REMOTE_ADDR"];	

	$result=mysql_query($sql);
	
	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);
	
	if($count==1){ //Successful login

// Register $myusername, $mypassword 
$_SESSION['myusername']=true; 
$_SESSION['account_id']=$rRow['account_id'];
$_SESSION['account_un']=$myusername;

// Check if Admin Level and grant admin session if so

if ($rRow['user_level']=="Admin"){
	$_SESSION['isadmin']=true;
	}

//Create log entry for sign in
record_user_action($myusername, $ip_add,"Logon");

//mysql_query("INSERT INTO tblLog (username, ip_add, action) VALUES('$myusername', '$ip_add', 'Logon' ) ") or die(mysql_error());  

//Check if remember me was checked to keep user logged in for 60 days
//if ($remember_me==1) {//User checked Remember Me box
//$expire=time()+60*60*24*60;
//setcookie("csmbinder", "CSM", $expire);
//}
include('CF_header.php'); 
displayContent();
}
else {
include('CF_header.php'); 
//Failed login attempt
//Create failed log in entry
record_user_action($myusername, $ip_add,"Failed Logon");
//mysql_query("INSERT INTO tblLog (username, ip_add, action) VALUES('$myusername', '$ip_add', 'Failed Logon' ) ") or die(mysql_error()); 

//check and see if an email address exists for user.  If no email, show link to have them create an account.  If an email, show failed login screen
	$email_sql="SELECT * FROM tblUserData WHERE email_add='$myusername'";
	//$emailRow = mysql_fetch_array(mysql_query($email_sql)); 
	$email_result=mysql_query($email_sql);
	
	// Mysql_num_row is counting table row
	$count=mysql_num_rows($email_result);
	if($count==1){ //There is an account for this user
		//Show login screen
		displayFailedLoginAttempt(); }
		else {
		displayNoAccountScreen($myusername); 
		}

}//end else

   } // End Post Check

else {
	include('CF_header.php'); 
	unset($_SESSION['myusername']);
	unset($_SESSION['account_id']);
	session_unset(); 
	session_destroy();
	displayLogin();
} }?>
      
      <a class="anchor_item grpelem" id="thequestion"></a> </div>
    <div class="verticalspacer"></div>
    <div class="clearfix colelem" id="u1130"><!-- group -->
     <div class="clearfix grpelem" id="u6597-4"><!-- content -->
      <p>© 2013 Cycle Folsom | Site Design by Stan Schultz</p>
     </div>
     <div class="clearfix grpelem" id="u6598-7"><!-- content -->
      <p>Special thanks to longtime CF member Carl Costas for contributing many of the professional photos on this site. See Carl's work at <a class="nonblock" href="http://www.carlcostas.com" target="_blank">CarlCostas.com</a>.</p>
     </div>
    </div>
   </div>
  </div>
  <!-- JS includes -->
  <script type="text/javascript">
   if (document.location.protocol != 'https:') document.write('\x3Cscript src="http://musecdn2.businesscatalyst.com/scripts/4.0/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script type="text/javascript">
   window.jQuery || document.write('\x3Cscript src="scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script src="scripts/museutils.js?3880880085" type="text/javascript"></script>
  <script src="scripts/jquery.tobrowserwidth.js?152985095" type="text/javascript"></script>
  <script src="scripts/jquery.musemenu.js?32367222" type="text/javascript"></script>
  <script src="scripts/webpro.js?33264525" type="text/javascript"></script>
  <script src="scripts/musewpdisclosure.js?250538392" type="text/javascript"></script>
  <script src="scripts/jquery.watch.js?4199601726" type="text/javascript"></script>
  <!-- Other scripts -->
  <script type="text/javascript">
   $(document).ready(function() { try {
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
$('.browser_width').toBrowserWidth();/* browser width elements */
Muse.Utils.prepHyperlinks(false);/* body */
Muse.Utils.initWidget('.MenuBar', function(elem) { return $(elem).museMenu(); });/* unifiedNavBar */
Muse.Utils.initWidget('#accordionu15508', function(elem) { return new WebPro.Widget.Accordion(elem, {canCloseAll:true,defaultIndex:-1}); });/* #accordionu15508 */
Muse.Utils.fullPage('#page');/* 100% height page */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
} catch(e) { Muse.Assert.fail('Error calling selector function:' + e); }});
</script>
   </body>
</html>
