<?php
session_start(); // start up your PHP session! 
if ($_SESSION['isadmin']) {
?>
<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.2.232.244"/>
  <title>Edit  Member</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?272710960"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?4059369144"/>
  <link rel="stylesheet" type="text/css" href="cf_style.css" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
    <script src="js/jquery.zclip.js"></script>
<style media="screen">
		.z-clip-wrap { position: relative; display: inline-block; }
	</style>



  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>
<link href="assets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
	<!--Link the Spry TabbedPanels JavaScript library-->
	<script src="assets/SpryTabbedPanels.js" type="text/javascript"></script> 
    <SCRIPT LANGUAGE="JavaScript" SRC="js/CalendarPopup.js"></SCRIPT>
<script type="text/javascript" src="js/message.js"></script>
<link rel="stylesheet" type="text/css" href="js/message_default.css">


<link rel="stylesheet" type="text/css" href="styles/style.css">

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
<script src="js/gen_validatorv4.js" type="text/javascript"></script> 
	<SCRIPT LANGUAGE="JavaScript">
		var cal = new CalendarPopup();
		var cal2 = new CalendarPopup();
		var cal3 = new CalendarPopup();
		cal3.showYearNavigation();
		var cal4 = new CalendarPopup();
		var cal5 = new CalendarPopup();
		var cal6 = new CalendarPopup();
	</SCRIPT>
    
<script language="javascript">
//<!---------------------------------+
//  Developed by Roshan Bhattarai 
//  Visit http://roshanbh.com.np for this script and more.
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

 <script>
function Contact_Change(labelid) {
	document.getElementById(labelid).style.color = 'red';
		
	if (document.getElementById('contact_check').value!="Clicked") {
	$('#modified_contact').show(300).delay(8000);
	//$('#modified_contact').hide(300);
	//document.getElementById('jlist').style.display = "block";
	//dhtmlx.alert("Mailing List modified.  Claim must be saved in order to update the mailing list contacts.");
	}
	else {
	document.getElementById('contact_check').value="Clicked"; }
	
	
	}
	
	function Contact_Change2(labelid) {
	
	dhtmlx.alert({
    text: "If you modify the expiration date, please verify the Payment Status field is correct after.",
    callback: function() {
	cal3.select(document.forms['contactform'].expiration_date,'anchor3','MM/dd/yyyy');	
		}
});

	}
	
		function expire_notify() {
	
	dhtmlx.alert({
    text: "If you modify the expiration date, please verify the Payment Status field is correct after.",
    callback: function() {
	document.getElementById("expiration_date").focus();}
		
});

	}
	
	function AddressBlock() {
	dhtmlx.alert("<? echo "hello<br>goodbye<br>hi"; ?>");
	}
	//alertCorner("Mailing List Changed", "check", 4000);
</script>
<script type="text/javascript"> 

function stopRKey(evt) { 
  var evt = (evt) ? evt : ((event) ? event : null); 
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
} 

document.onkeypress = stopRKey; 

</script>

<style>
td.jtable {padding: 5px;} /* or you can target individual cells */
th.jtable {padding: 5px; color:#FFF} /* or you can target individual cells */
.messageboxhide{
display:none;
}

.messagebox{
 
 float:left;
 width:auto;
 height:20px;
 margin-right:30px;
 border:1px solid #c93;
 background:#ffc;
}

.messageboxok{
 float:left;
 width:auto;
 height:20px;
 margin-right:30px;
 border:1px solid #349534;
 background:#C9FFCA;
 font-weight:bold;
 color:#008000;
}
.messageboxerror{
 float:left;
 width:auto;
 height:20px;
 margin-right:30px;
 border:1px solid #CC0000;
 background:#F7CBCA;
 font-weight:bold;
 color:#CC0000;
}
</style>

   </head>
 <body>

  <? include('CF_header.php'); ?>




      <h1 class="Heading-1" style="margin-bottom:25px;">Edit Member</h1>

<div class="TabbedPanels" id="TabbedPanels1">
		<ul class="TabbedPanelsTabGroup">
			<li class="TabbedPanelsTab">Details</li> 
			<li class="TabbedPanelsTab">Payment Info</li> 
            
		</ul>

<div class="TabbedPanelsContentGroup">

<!--START CLAIM INFO TAB CONTENT -->
	<div class="TabbedPanelsContent">
<? //START PANEL 1 ?>
      
<?  
include ('connect.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$id = $_POST['SmartSearchID'];  
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
$id = $_GET['id'];  
}


$result = mysql_query("SELECT * from tblUserData where id=$id");
while ($item = mysql_fetch_array($result)) {
	$mailer_name=strtoupper($item['fname']." ".$item['lname']);
	$mailer_address1=strtoupper($item['street']);
	$mailer_address2=strtoupper($item['city'].", ".$item['state']." ".$item['zip']);
$user_account_id=$item['account_id'];
?>

			<!-- YOU NEED THIS SPAN -->
			<span class="z-clip-wrap">
				<textarea style="display:none;" id="jdynamic"><? echo $mailer_name."&#13;&#10;".$mailer_address1."&#13;&#10;".$mailer_address2; ?></textarea></span>
		
			<!-- YOU NEED THIS SPAN -->
			<span style="margin-top:5px; margin-bottom:10px;" class="z-clip-wrap">
				<a href="#copy" id="copy-dynamic">Copy Mailing Address to Clipboard</a>
			</span>
	
	  <table width="100%">
	
	<tr><td>
     
      <form name="contactform" action="edit_member_action.php" method="post">
      <input type="hidden" name="contact_check" id="contact_check">
      <input type="hidden" name="member_id" id="member_id" value="<?php echo $item['id']; ?>">
 <div style="display:none; margin-bottom:25px; color:#F00; font-weight:bold;" id="modified_contact">Member modified.  Record must be saved in order to save changes.</div>
<div class="_100">
<span id="msgbox" style="display:none"></span>
</div>
<div style="clear: both;"></div>
<!--<div style="margin-top:5px; margin-bottom:5px;" >

<br><br><a href="" onClick="AddressBlock(); return false;">Generate Address Block</a></div> -->
<div style="clear: both;"></div>
<div class="_33">
    <p class="contactform"><label class="bold_label" id="meetup_username_label" for="fname">Meetup Username</label><input autocomplete="off" class="contactform" id="meetup_username" onChange="Contact_Change('meetup_username_label');" name="meetup_username" type="text" value="<?php echo $item['meetup_username']; ?>"/></p>
    </div>
    
<div class="_33">
    <p class="contactform"><label class="bold_label" id="fname_label"  for="fname">First Name</label><input autocomplete="off" class="contactform" id="fname" onChange="Contact_Change('fname_label');" name="fname" type="text" value="<?php echo $item['fname']; ?>"/></p>
    </div>

<div class="_33">
    <p class="contactform"><label class="bold_label" id="lname_label" for="lname">Last Name</label><input autocomplete="off" class="contactform" id="lname" onChange="Contact_Change('lname_label');" name="lname" type="text" value="<?php echo $item['lname']; ?>"/></p>
    </div>
   <div style="clear: both;"></div>
   
<div class="_50">
    <p class="contactform"><label class="bold_label" id="street__label" for="street">Street</label><input autocomplete="off" class="contactform" id="street" onChange="Contact_Change('street__label');" name="street" type="text" value="<?php echo $item['street']; ?>"/></p>
    </div>  
<div class="_30">
    <p class="contactform"><label class="bold_label" id="city_label" for="city">City</label><input autocomplete="off" class="contactform" id="city" onChange="Contact_Change('city_label');"  name="city" type="text" value="<?php echo $item['city']; ?>"/></p></div>
<div class="_10">
    <p class="contactform"><label class="bold_label" id="state_label" for="state">State</label><input autocomplete="off" class="contactform" id="state" onChange="Contact_Change('state_label');" name="state" type="text" value="<?php echo $item['state']; ?>"/></p></div>
<div class="_10">
    <p class="contactform"><label class="bold_label" id="zip_label" for="zip">Zip</label><input autocomplete="off" class="contactform" id="zip" onChange="Contact_Change('zip_label');" name="zip" type="text" value="<?php echo $item['zip']; ?>"/></p></div>
  <div style="clear: both;"></div>   
  <div class="_25">
    <p class="contactform"><label class="bold_label" id="gender_label" for="phone">Gender</label> <select class="contactform" name="gender" onChange="Contact_Change('gender_label');" id="gender">
<option value="Male" <?  if ($item['gender']=="Male")	{echo " selected ";}?>>Male</option>
<option value="Female" <?  if ($item['gender']=="Female")	{echo " selected ";}?>>Female</option>
</select></p>
    </div>  

  <div class="_25">
    <p class="contactform"><label class="bold_label" id="phone_label" for="phone">Phone</label><input class="contactform" id="phone" onChange="Contact_Change('phone_label');" name="phone" type="text" value="<?php echo $item['phone']; ?>"/></p>
    </div>  
<div class="_50">
    <p class="contactform"><label class="bold_label" id="email_add_label" for="email_add">Email</label><input autocomplete="off" class="contactform" id="email_add" onChange="Contact_Change('email_add_label');" name="email_add" type="text" value="<?php echo $item['email_add']; ?>"/></p>
    </div>  <div style="clear: both;"></div>
    


<div class="_15cal">
    <p class="contactform"><label class="bold_label" id="approval_date_label" for="meetup_approval_date">Meetup Appr.</label><input autocomplete="off" class="contactform" id="approval_date" onChange="Contact_Change('approval_date_label');" name="approval_date" type="text" value="<? echo ($item['approval_date']=='') ? "" : date('m/d/Y', (strtotime($item['approval_date']))); ?>"/>
   </p> </div>
   <div class="_5cal"> <p class="contactform"><label class="bold_label" for="phone"><br /></label> <A tabindex="-1" HREF="#"
    onClick="cal.select(document.forms['contactform'].approval_date,'anchor1','MM/dd/yyyy'); Contact_Change('approval_date_label');  return false;"
    NAME="anchor1" ID="anchor1"><img border="0" src="images/cal.gif" /></A> <A tabindex="-1" HREF="#"
    onClick="clearit('approval_date');Contact_Change('approval_date_label');return false;"
    NAME="clear1" ID="clear1"><img border="0" src="images/clear.png" /></A></p></div>

<div class="_20">
    <p class="contactform"><label id="card_sent_label" class="bold_label" for="in_user">How Card Sent</label><?php
$query = "SELECT method FROM tblCardSentMethods order by method asc"; 
$result = mysql_query($query); 
echo "<select class='contactform' onChange=\"Contact_Change('card_sent_label');\" name='card_sent'>";
while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['method'] . "'";
	if ($row['method']==$item['card_sent'])
	{echo " selected ";}
	echo ">" . $row['method'] . "</option>";
}
echo "</select>";

?></p>
</div>

<div class="_15cal">
    <p class="contactform"><label id="card_sent_date_label" class="bold_label" for="card_sent_date">Date Card Sent</label><input autocomplete="off" class="contactform" id="card_sent_date" onChange="Contact_Change('card_sent_date_label');" name="card_sent_date" type="text" value="<? echo ($item['card_sent_date']=='') ? "" : date('m/d/Y', (strtotime($item['card_sent_date']))); ?>"/>
   </p> </div>
   <div class="_5cal"> <p class="contactform"><label class="bold_label" for="card_sent_date"><br /></label> <A tabindex="-1" HREF="#"
    onClick="cal4.select(document.forms['contactform'].card_sent_date,'anchor4','MM/dd/yyyy'); Contact_Change('card_sent_date_label'); return false;"
    NAME="anchor4" ID="anchor4"><img border="0" src="images/cal.gif" /></A>
     <A tabindex="-1" HREF="#"
    onClick="clearit('card_sent_date');Contact_Change('card_sent_date_label');return false;"
    NAME="clear4" ID="clear4"><img border="0" src="images/clear.png" /></A>
    </p></div>

<div class="_20">
    <p class="contactform"><label id="coupon_user_label" class="bold_label" for="in_user">Coupon User?</label>
    <select class="contactform" name="coupon_user" onChange="Contact_Change('coupon_user_label');" id="coupon_user">
<option value="Yes" <?  if ($item['coupon_user']=="Yes")	{echo " selected ";}?>>Yes</option>
<option value="No" <?  if ($item['coupon_user']=="No")	{echo " selected ";}?>>No</option>
</select>
    </p>
</div>

<div class="_15cal">
    <p class="contactform"><label id="cancel_date_label" class="bold_label" for="cancel_date">Date Canceled</label><input autocomplete="off" class="contactform" id="cancel_date" onChange="Contact_Change('cancel_date_label');" name="cancel_date" type="text" value="<? echo ($item['cancel_date']=='') ? "" : date('m/d/Y', (strtotime($item['cancel_date']))); ?>"/>
   </p> </div>
   <div class="_5cal"> <p class="contactform"><label class="bold_label" for="cancel_date"><br /></label> <A tabindex="-1" HREF="#"
    onClick="cal5.select(document.forms['contactform'].cancel_date,'anchor5','MM/dd/yyyy'); Contact_Change('cancel_date_label'); return false;"
    NAME="anchor5" ID="anchor5"><img border="0" src="images/cal.gif" /></A>
     <A tabindex="-1" HREF="#"
    onClick="clearit('cancel_date');Contact_Change('cancel_date_label');return false;"
    NAME="clear5" ID="clear5"><img border="0" src="images/clear.png" /></A>
    </p></div>

   <div style="clear: both;"></div>



<div class="_15cal">
    <p class="contactform"><label id="meetup_removal_date_label" class="bold_label" for="meetup_removal_date">Meetup Removal</label><input autocomplete="off" class="contactform" id="meetup_removal_date" onChange="Contact_Change('meetup_removal_date_label');" name="meetup_removal_date" type="text" value="<? echo ($item['meetup_removal_date']=='') ? "" : date('m/d/Y', (strtotime($item['meetup_removal_date']))); ?>"/>
   </p> </div>
   <div class="_5cal"> <p class="contactform"><label class="bold_label" for="meetup_removal_date"><br /></label> <A tabindex="-1" HREF="#"
    onClick="cal6.select(document.forms['contactform'].meetup_removal_date,'anchor6','MM/dd/yyyy'); Contact_Change('meetup_removal_date_label'); return false;"
    NAME="anchor6" ID="anchor6"><img border="0" src="images/cal.gif" /></A>
     <A tabindex="-1" HREF="#"
    onClick="clearit('meetup_removal_date');Contact_Change('meetup_removal_date_label');return false;"
    NAME="clear6" ID="clear6"><img border="0" src="images/clear.png" /></A>
    </p></div>

<div class="_15cal">
    <p class="contactform"><label id="expiration_date_label" class="bold_label" for="next_renewal_date">Expiration Date</label>
    <input type="hidden" id="expiration_date_original" name="expiration_date_original" VALUE="<? echo ($item['expiration_date']=='') ? "" : date('m/d/Y', (strtotime($item['expiration_date']))); ?>"/>
    <input autocomplete="off" onClick="expire_notify();" class="contactform" id="expiration_date" name="expiration_date" type="text" VALUE="<? echo ($item['expiration_date']=='') ? "" : date('m/d/Y', (strtotime($item['expiration_date']))); ?>"/>
   </p> </div>
   <div class="_5cal"> <p class="contactform"><label class="bold_label" for="next_renewal_date"><br /></label> <A tabindex="-1" HREF="#"
    onClick="Contact_Change2('expiration_date_label'); return false;"
    NAME="anchor3" ID="anchor3"><img border="0" src="images/cal.gif" /></A>
     <A tabindex="-1" HREF="#"
    onClick="clearit('expiration_date');Contact_Change('expiration_date_label');return false;"
    NAME="clear3" ID="clear3"><img border="0" src="images/clear.png" /></A>
    </p></div>    
               
<div class="_20">

    <p class="contactform"><label id="membership_level_label" class="bold_label" for="in_user">Membership Level</label><?php
include ('connect.php');	
$query = "SELECT level FROM tblMembershipLevels order by level asc"; 
$result = mysql_query($query); 
echo "<select class='contactform' onChange=\"Contact_Change('membership_level_label');\" name='membership_level'>";
while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['level'] . "'";
	if ($row['level']==$item['membership_level'])
	{echo " selected ";}
	echo ">" . $row['level'] . "</option>";
}



echo "</select>";

?></p>
</div>

    <div class="_20">
    <p class="contactform"><label id="payment_status_label" class="bold_label" for="in_user">Payment Status</label><?php
$query = "SELECT status FROM tblPaymentStatuses order by status asc"; 
$result = mysql_query($query); 
echo "<select class='contactform' onChange=\"Contact_Change('payment_status_label');\" name='payment_status' id='payment_status'>";
while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['status'] . "'";
	if ($row['status']==$item['payment_status'])
	{echo " selected ";}
	echo ">" . $row['status'] . "</option>";
}
echo "</select>";

?></p>
</div>

    <div class="_20">
    <p class="contactform"><label id="training_status_label" class="bold_label" for="in_user">Training Status</label><?php
$query = "SELECT * FROM tblTrainingStatuses order by id asc"; 
$result = mysql_query($query); 
echo "<select class='contactform' onChange=\"Contact_Change('training_status_label');\" name='training_status' id='training_status'>";
while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['id'] . "'";
	if ($row[id]==$item[training_status])
	{echo " selected ";}
	echo ">" . $row['status'] . "</option>";
}
echo "</select>";

?></p>
</div>
   
    
   <div style="clear: both;"></div>

<div class="_20">
    <p class="contactform"><label id="opt_in_label" class="bold_label" for="in_user">Opt In?</label>
    <select class="contactform" name="opt_in" onChange="Contact_Change('opt_in_label');" id="opt_in">
<option value="Yes" <?  if ($item['opt_in']=="Yes")	{echo " selected ";}?>>Yes</option>
<option value="No" <?  if ($item['opt_in']=="No")	{echo " selected ";}?>>No</option>
</select>
    </p>
</div>


<div class="_20">
    <p class="contactform"><label id="profile_type_label" class="bold_label" for="in_user">Profile Type</label><?php
$query = "SELECT profile_type FROM tblProfiles"; 
$result = mysql_query($query); 
echo "<select class='contactform' onChange=\"Contact_Change('profile_type_label');\" name='profile_type'>";
while ($row = mysql_fetch_array($result)) {
	 echo "<option value='" . $row['profile_type'] . "'";
	if ($row['profile_type']==$item['profile_type'])
	{echo " selected ";}
	echo ">" . $row['profile_type'] . "</option>";
}
echo "</select>";

?></p>
</div>

<div class="_20">
    <p class="contactform"><label id="user_level_label" class="bold_label" for="in_user">User Level</label><?php
$query = "SELECT level FROM tblUserLevels order by level asc"; 
$result = mysql_query($query); 
echo "<select class='contactform' onChange=\"Contact_Change('user_level_label');\" name='user_level'>";
while ($row = mysql_fetch_array($result)) {
	 echo "<option value='" . $row['level'] . "'";
	if ($row['level']==$item['user_level'])
	{echo " selected ";}
	echo ">" . $row['level'] . "</option>";
}
echo "</select>";

?></p>
</div>
<div style="clear: both; margin-top:15px;"></div>
            <div class="_30">
              <p class="contactform">
                <label class="bold_label" for="street">Password <span class="pwtext2">(at least 6 characters)</span></label>
                <input autocomplete="off" class="contactform" id="password1" name="password1" type="password" value=""/>
              </p>
            </div>
            <div class="_30">
              <p class="contactform">
                <label class="bold_label" for="city">Re-Enter Password</label>
                <input autocomplete="off" class="contactform" id="password2"  name="password2" type="password" value=""/>
              </p>
            </div>

      <div style="clear: both;"></div>
<? 
$all_Groups = array("Doctor", "Management", "Medic", "Nurse");
$groups= explode(',',$item['groups']);

?>
<div class="_100">
    <p class="contactform"><label id="groups_label" class="bold_label" for="email">Groups</label><br>
<?
foreach ($all_Groups as $group) {
 
     if(in_array($group,$groups)) {
      echo "<input name=\"group[]\" type=\"checkbox\" onChange=\"Contact_Change('groups_label');\" value=\"$group\" CHECKED>$group &nbsp;&nbsp;&nbsp";
	  } else
          {
      echo "<input name=\"group[]\" type=\"checkbox\" onChange=\"Contact_Change('groups_label');\" value=\"$group\">$group &nbsp;&nbsp;&nbsp";
                  }

              }
 ?>
    </p>
    </div>  <div style="clear: both;"></div>
    

<div class="_100">
<p style="margin-top:15px;" class="contactform"><label id="cancel_reason_label" class="bold_label" for="notes">Payment Info</label></p>
<? $query  = "SELECT * FROM tblPaymentData where account_id='$user_account_id' order by payment_date desc";
	$result = mysql_query($query);
	echo "<table border='0' width='500'><tr bgcolor='#a20000'><th class='jtable'>Payment Date</th><th class='jtable'>Transaction ID</th><th class
	='jtable'>Payment Type</th></tr>";
	while ($row = mysql_fetch_array($result)) {
	if($bgcolor=='#f4f4e9'){$bgcolor='#e0dfc9';}
	else{$bgcolor='#f4f4e9';}
	echo "<tr bgcolor=$bgcolor><td class='jtable'>".$row['payment_date']."</td><td class='jtable'>".$row['txn_id']."</td><td class='jtable'>".$row['payment_type']."</td></tr>";
	}
	echo "</table>";
	?>	
    </div>
    
    <div style="clear: both;"></div>


    <div class="_100">
    <p style="margin-top:15px;" class="contactform"><label id="notes_label" class="bold_label" for="notes">Notes</label><textarea rows="4" class="contactform" id="notes" onChange="Contact_Change('notes_label');" name="notes" value="<?php echo stripslashes($item['notes']); ?>"/><?php echo stripslashes($item['notes']); ?></textarea></p></div>
     <div style="clear: both;"></div>	
     
      <div class="_100">
    <p style="margin-top:15px;" class="contactform"><label id="cancel_reason_label" class="bold_label" for="notes">Member Reason for Canceling</label><textarea rows="2" class="contactform" id="cancel_reason" onChange="Contact_Change('cancel_reason_label');" name="cancel_reason" value="<?php echo stripslashes($item['cancel_reason']); ?>"/><?php echo stripslashes($item['cancel_reason']); ?></textarea></p>
<input style="margin-bottom:10px;" type="image" name="Save Changes" id="Save Changes" src="images/save_changes.png"><br style="margin-top:25px;">
<a href="index.php">
 <img src="images/exit_wo_save.png">
</a>
    
    </div>
     <div style="clear: both;"></div>	
<!--<INPUT TYPE="image" SRC="images/add_contact_sm.png" style="margin-top:30px;"  />
<a href="index.php"><img src="images/cancel.png" border="0"></a>-->
</form></td></tr></table>



<script>function DoCustomValidation()
{
  var frm = document.forms["contactform"];
  if(frm.password1.value != frm.password2.value)
  {
    sfm_show_error_msg('The passwords entered do not match',frm.password1);
    return false;
  }
  
  else
  {
    return true;
  }
}


</script>
	   <script type="text/javascript">var frmvalidator  = new Validator("contactform");
	   frmvalidator.setAddnlValidationFunction(DoCustomValidation);
	   </script>
       
<? } ?>
    
     </div><? //END PANEL 1?>
		
		<? //START PANEL 2 ?>
		<div class="TabbedPanelsContent">
        <? $query  = "SELECT * FROM tblPaymentData where account_id='$user_account_id' order by payment_date desc";
	$result = mysql_query($query);
	echo "<table border='0' width='500'><tr bgcolor='#a20000'><th class='jtable'>Payment Date</th><th class='jtable'>Transaction ID</th><th class='jtable'>Payment Type</th></tr>";
	while ($row = mysql_fetch_array($result)) {
	if($bgcolor=='#f4f4e9'){$bgcolor='#e0dfc9';}
	else{$bgcolor='#f4f4e9';}
	echo "<tr bgcolor=$bgcolor><td class='jtable'>".$row['payment_date']."</td><td class='jtable'>".$row['txn_id']."</td><td class='jtable'>".$row['payment_type']."</td></tr>";
	}
	echo "</table>";
	?>	
        </div>		<? //END PANEL 2 ?>

 

		</div><? //END TabbedPanelsContentGroup DIV ?>	
       
</div><? //END TabbedPanels DIV ?>

<script type="text/javascript">
/*var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1", { defaultTab: 0}); */

var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1", { defaultTab: 0}); 

</script> 


     <a class="anchor_item grpelem" id="thequestion"></a>
    
    </div>
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
<script>
    $(document).ready(function(){
        $("#copy-dynamic").zclip({
           path:"js/ZeroClipboard.swf",
           copy:function(){return $("#jdynamic").val();}
        });
    });
</script>
   </body>
</html>
<?
}
else {
header( 'Location: https://www.cyclefolsom.com/member-tools/' ) ;
}?>