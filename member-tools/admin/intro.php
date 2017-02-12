
<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.2.232.244"/>
  <title>General FAQ's</title>
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

<link rel="stylesheet" type="text/css" href="message_default.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<style>
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

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu9501-3"><!-- group -->
     <div class="clearfix browser_width grpelem" id="u9501-3"><!-- content -->
      <p>&nbsp;</p>
     </div>
     <a class="nonblock nontext grpelem" id="u5509" href="index.html"><!-- simple frame --></a>
     <div class="clip_frame grpelem" id="u5510"><!-- image -->
      <img class="block" id="u5510_img" src="images/cf-dot-com-logo.png" alt="" width="230" height="50"/>
     </div>
     <div class="Quick-Links-Style clearfix grpelem" id="u5512-10"><!-- content -->
      <p>Quick Links: <a class="nonblock" href="http://www.meetup.com/cyclefolsom" target="_blank">CF Meetup.com Site</a>&nbsp;| <a class="nonblock" href="http://app.strava.com/clubs/cycle-folsom" target="_blank">CF Strava Club<span id="u5512-6"></span></a></p>
     </div>
     <ul class="MenuBar clearfix grpelem" id="menuu15352"><!-- horizontal box -->
      <li class="MenuItemContainer clearfix grpelem" id="u15473"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu Main-Menu-Items clearfix colelem" id="u15474" href="index.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u15475-4"><!-- content --><p>Home</p></div></a>
      </li>
      <li class="MenuItemContainer clearfix grpelem" id="u15353"><!-- vertical box -->
       <div class="MenuItem MenuItemWithSubMenu Main-Menu-Items clearfix colelem" id="u15354"><!-- horizontal box -->
        <div class="MenuItemLabel NoWrap clearfix grpelem" id="u15356-4"><!-- content -->
         <p>About</p>
        </div>
        <div class="clip_frame grpelem" id="u15357"><!-- image --></div>
       </div>
       <div class="SubMenu  MenuLevel1 clearfix" id="u15358"><!-- vertical box -->
        <ul class="SubMenuView clearfix colelem" id="u15359"><!-- vertical box -->
         <li class="MenuItemContainer clearfix colelem" id="u15374"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u15377" href="our-mission.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u15378-4"><!-- content --><p>Our Mission</p></div></a>
         </li>
         <li class="MenuItemContainer clearfix colelem" id="u15367"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u15370" href="our-groups.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u15373-4"><!-- content --><p>Our Groups</p></div></a>
         </li>
         <li class="MenuItemContainer clearfix colelem" id="u15381"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u15382" href="our-ride-leaders.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u15384-4"><!-- content --><p>Our Ride Leaders</p></div></a>
         </li>
         <li class="MenuItemContainer clearfix colelem" id="u15360"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u15361" href="our-history.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u15362-4"><!-- content --><p>Our History</p></div></a>
         </li>
        </ul>
       </div>
      </li>
      <li class="MenuItemContainer clearfix grpelem" id="u15424"><!-- vertical box -->
       <div class="MenuItem MenuItemWithSubMenu Main-Menu-Items clearfix colelem" id="u15455"><!-- horizontal box -->
        <div class="MenuItemLabel NoWrap clearfix grpelem" id="u15456-4"><!-- content -->
         <p>Membership</p>
        </div>
        <div class="clip_frame grpelem" id="u15457"><!-- image --></div>
       </div>
       <div class="SubMenu  MenuLevel1 clearfix" id="u15425"><!-- vertical box -->
        <ul class="SubMenuView clearfix colelem" id="u15426"><!-- vertical box -->
         <li class="MenuItemContainer clearfix colelem" id="u15434"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu Sub-Menu-Items clearfix grpelem" id="u15437" href="membership.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap Sub-Menu-Item clearfix grpelem" id="u15439-4"><!-- content --><p>Step 1: Overview</p></div></a>
         </li>
         <li class="MenuItemContainer clearfix colelem" id="u15441"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u15442" href="join.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u15444-4"><!-- content --><p>Step 2: Join, Upgrade, or Renew</p></div></a>
         </li>
         <li class="MenuItemContainer clearfix colelem" id="u15448"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u15451" href="meetup.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u15452-4"><!-- content --><p>Step 3: How to Join Our Meetup</p></div></a>
         </li>
         <li class="MenuItemContainer clearfix colelem" id="u15427"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u15430" href="guest.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u15433-4"><!-- content --><p>Invited Guest Liability Waiver</p></div></a>
         </li>
        </ul>
       </div>
      </li>
      <li class="MenuItemContainer clearfix grpelem" id="u15403"><!-- vertical box -->
       <div class="MenuItem MenuItemWithSubMenu Main-Menu-Items clearfix colelem" id="u15404"><!-- horizontal box -->
        <div class="MenuItemLabel NoWrap clearfix grpelem" id="u15407-4"><!-- content -->
         <p>Safety, FAQ's &amp; More</p>
        </div>
        
       </div>
       <div class="SubMenu  MenuLevel1 clearfix" id="u15408"><!-- vertical box -->
        <ul class="SubMenuView clearfix colelem" id="u15409"><!-- vertical box -->
         <li class="MenuItemContainer clearfix colelem" id="u15691"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu Sub-Menu-Items clearfix grpelem" id="u15692" href="safety-guidelines.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap Sub-Menu-Item clearfix grpelem" id="u15693-4"><!-- content --><p>Safety Guidelines</p></div></a>
         </li>
         <li class="MenuItemContainer clearfix colelem" id="u15410"><!-- horizontal box -->
		 <!-- NOTE PUT MuseMenuActive as class to highlight it -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu Sub-Menu-Items clearfix grpelem" id="u15413" href="general-faq-s.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap Sub-Menu-Item clearfix grpelem" id="u15415-4"><!-- content --><p>General FAQ's</p></div></a>
         </li>
         <li class="MenuItemContainer clearfix colelem" id="u15417"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu Sub-Menu-Items clearfix grpelem" id="u15418" href="uploading-routes-to-garmins.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap Sub-Menu-Item clearfix grpelem" id="u15419-4"><!-- content --><p>Uploading Routes to Garmins</p></div></a>
         </li>
        </ul>
       </div>
      </li>
      <li class="MenuItemContainer clearfix grpelem" id="u15459"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu Main-Menu-Items clearfix colelem" id="u15460" href="apparel.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u15461-4"><!-- content --><p>Apparel</p></div></a>
      </li>
      <li class="MenuItemContainer clearfix grpelem" id="u15480"><!-- vertical box -->
       <div class="MenuItem MenuItemWithSubMenu Main-Menu-Items clearfix colelem" id="u15504"><!-- horizontal box -->
        <div class="MenuItemLabel NoWrap clearfix grpelem" id="u15505-4"><!-- content -->
         <p>Video &amp; Reading</p>
        </div>
        <div class="clip_frame grpelem" id="u15506"><!-- image --></div>
       </div>
       <div class="SubMenu  MenuLevel1 clearfix" id="u15481"><!-- vertical box -->
        <ul class="SubMenuView clearfix colelem" id="u15482"><!-- vertical box -->
         <li class="MenuItemContainer clearfix colelem" id="u15497"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu Sub-Menu-Items clearfix grpelem" id="u15498" href="cf-video-library.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap Sub-Menu-Item clearfix grpelem" id="u15499-4"><!-- content --><p>CF Video Library</p></div></a>
         </li>
         <li class="MenuItemContainer clearfix colelem" id="u15490"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu Sub-Menu-Items clearfix grpelem" id="u15491" href="instructional-videos.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap Sub-Menu-Item clearfix grpelem" id="u15492-4"><!-- content --><p>Instructional Videos</p></div></a>
         </li>
         <li class="MenuItemContainer clearfix colelem" id="u15483"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu Sub-Menu-Items clearfix grpelem" id="u15484" href="reading-library.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap Sub-Menu-Item clearfix grpelem" id="u15487-4"><!-- content --><p>Reading Library</p></div></a>
         </li>
        </ul>
       </div>
      </li>
      <li class="MenuItemContainer clearfix grpelem" id="u15466"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu Main-Menu-Items clearfix colelem" id="u15467" href="contact.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u15470-4"><!-- content --><p>Contact</p></div></a>
      </li>
     </ul>
    </div>
    <div class="clearfix colelem" id="pu1131"><!-- group -->
     <div class="browser_width grpelem" id="u1131"><!-- group -->
      <div class="clearfix" id="u1131_align_to_page">
       <div class="grpelem" id="u1258"><!-- simple frame --></div>
       
      </div>
     </div>
     <div class="browser_width grpelem" id="u3488"><!-- simple frame --></div>
     <div class="grpelem" id="accordionu15508wrapper"><!-- vertical box -->
      
     </div>
   
     </div>
  
     <div class="clearfix grpelem" id="u6619-194"><!-- content -->
      <h1 class="Heading-1">Add New Member</h1>
	  <table width="100%"><tr><td>
      <form name="contactform" action="add_contact_action.php" method="post">
<div class="_100">
<span id="msgbox" style="display:none"></span>
</div>
<div style="clear: both;"></div>
<!--<div class="_20">
    <p class="contactform"><label class="bold_label" for="in_user">Title</label><?php
/*$query = "SELECT title FROM tblTitles order by title asc"; 
$result = mysql_query($query); 
echo "<select class='contactform' name='title'><option value=''>----NONE----</option>";
while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['title'] . "'>" . $row['title'] . "</option>";
}
echo "</select>";
*/
?></p>
</div>-->

<div class="_33">
    <p class="contactform"><label class="bold_label" for="fname">Username</label><input autocomplete="off" class="contactform" id="username" name="username" type="text" value=""/></p>
    </div>
    
<div class="_33">
    <p class="contactform"><label class="bold_label" for="fname">First Name</label><input autocomplete="off" class="contactform" id="fname" name="fname" type="text" value=""/></p>
    </div>

<div class="_33">
    <p class="contactform"><label class="bold_label" for="lname">Last Name</label><input autocomplete="off" class="contactform" id="lname" name="lname" type="text" value=""/></p>
    </div>
   <div style="clear: both;"></div>
   
<div class="_50">
    <p class="contactform"><label class="bold_label" for="street">Street</label><input autocomplete="off" class="contactform" id="street" name="street" type="text" value=""/></p>
    </div>  
<div class="_30">
    <p class="contactform"><label class="bold_label" for="city">City</label><input autocomplete="off" class="contactform" id="city"  name="city" type="text" value=""/></p></div>
<div class="_10">
    <p class="contactform"><label class="bold_label" for="state">State</label><input autocomplete="off" class="contactform" id="state" name="state" type="text" value="CA"/></p></div>
<div class="_10">
    <p class="contactform"><label class="bold_label" for="zip">Zip</label><input autocomplete="off" class="contactform" id="zip" name="zip" type="text" value=""/></p></div>
  <div style="clear: both;"></div>   
  <div class="_50">
    <p class="contactform"><label class="bold_label" for="phone">Phone</label><input class="contactform" id="phone" name="phone" type="text" value=""/></p>
    </div>  
<div class="_50">
    <p class="contactform"><label class="bold_label" for="email_add">Email</label><input autocomplete="off" class="contactform" id="email_add" name="email_add" type="text" value=""/></p>
    </div>  <div style="clear: both;"></div>
<div class="_30">
    <p class="contactform"><label class="bold_label" for="meetup_name">Meetup Username</label><input autocomplete="off" class="contactform" id="meetup_name" name="meetup_name" type="text" value=""/></p>
    </div>
<div class="_15cal">
    <p class="contactform"><label class="bold_label" for="meetup_approval_date">Approval Date</label><input autocomplete="off" class="contactform" id="meetup_approval_date" name="meetup_approval_date" type="text" value=""/>
   </p> </div>
   <div class="_5cal"> <p class="contactform"><label class="bold_label" for="phone"><br /></label> <A HREF="#"
    onClick="cal.select(document.forms['contactform'].meetup_approval_date,'anchor1','MM/dd/yyyy'); return false;"
    NAME="anchor1" ID="anchor1"><img border="0" src="images/cal.gif" /></A> <A HREF="#"
    onClick="clearit('meetup_approval_date');return false;"
    NAME="clear1" ID="clear1"><img border="0" src="images/clear.png" /></A></p></div>
    
<div class="_20">
    <p class="contactform"><label class="bold_label" for="in_user">Membership Level</label><?php
include ('connect.php');	
$query = "SELECT level FROM tblMembershipLevels order by level asc"; 
$result = mysql_query($query); 
echo "<select class='contactform' name='membership_level'><option value=''>----NONE----</option>";
while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['level'] . "'>" . $row['level'] . "</option>";
}
echo "</select>";

?></p>
</div>
<div class="_20">
    <p class="contactform"><label class="bold_label" for="meetup_name">Payment Amount</label><input autocomplete="off" class="contactform" id="payment_amount" name="payment_amount" type="text" value=""/></p>
    </div>
   <div style="clear: both;"></div>
<div class="_20">
    <p class="contactform"><label class="bold_label" for="in_user">Payment Status</label><?php
$query = "SELECT status FROM tblPaymentStatuses order by status asc"; 
$result = mysql_query($query); 
echo "<select class='contactform' name='payment_status'><option value=''>----NONE----</option>";
while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['status'] . "'>" . $row['status'] . "</option>";
}
echo "</select>";

?></p>
</div>

<div class="_15cal">
    <p class="contactform"><label class="bold_label" for="payment_accepted">Accepted</label><input autocomplete="off" class="contactform" id="payment_accepted" name="payment_accepted" type="text" value=""/>
   </p> </div>
   <div class="_5cal"> <p class="contactform"><label class="bold_label" for="phone"><br /></label> <A HREF="#"
    onClick="cal2.select(document.forms['contactform'].payment_accepted,'anchor2','MM/dd/yyyy'); return false;"
    NAME="anchor2" ID="anchor2"><img border="0" src="images/cal.gif" /></A>
    <A HREF="#"
    onClick="clearit('payment_accepted');return false;"
    NAME="clear2" ID="clear2"><img border="0" src="images/clear.png" /></A>
    </p></div>
    
<div class="_15cal">
    <p class="contactform"><label class="bold_label" for="next_renewal_date">Renewal Date</label><input autocomplete="off" class="contactform" id="next_renewal_date" name="next_renewal_date" type="text" value=""/>
   </p> </div>
   <div class="_5cal"> <p class="contactform"><label class="bold_label" for="next_renewal_date"><br /></label> <A HREF="#"
    onClick="cal3.select(document.forms['contactform'].next_renewal_date,'anchor3','MM/dd/yyyy'); return false;"
    NAME="anchor3" ID="anchor3"><img border="0" src="images/cal.gif" /></A>
     <A HREF="#"
    onClick="clearit('next_renewal_date');return false;"
    NAME="clear3" ID="clear3"><img border="0" src="images/clear.png" /></A>
    </p></div>

<div class="_20">
    <p class="contactform"><label class="bold_label" for="in_user">Card Sent</label><?php
$query = "SELECT method FROM tblCardSentMethods order by method asc"; 
$result = mysql_query($query); 
echo "<select class='contactform' name='card_sent_method'><option value=''>----NONE----</option>";
while ($row = mysql_fetch_array($result)) {
	if ($row['method']=='Mail'){
	echo "<option selected='selected' value='" . $row['method'] . "'>" . $row['method'] . "</option>";	
	}
	else {
    echo "<option value='" . $row['method'] . "'>" . $row['method'] . "</option>"; }
}
echo "</select>";

?></p>
</div>

<div class="_15cal">
    <p class="contactform"><label class="bold_label" for="card_sent_date">Sent</label><input autocomplete="off" class="contactform" id="card_sent_date" name="card_sent_date" type="text" value=""/>
   </p> </div>
   <div class="_5cal"> <p class="contactform"><label class="bold_label" for="card_sent_date"><br /></label> <A HREF="#"
    onClick="cal4.select(document.forms['contactform'].card_sent_date,'anchor4','MM/dd/yyyy'); return false;"
    NAME="anchor4" ID="anchor4"><img border="0" src="images/cal.gif" /></A>
     <A HREF="#"
    onClick="clearit('card_sent_date');return false;"
    NAME="clear4" ID="clear4"><img border="0" src="images/clear.png" /></A>
    </p></div
    
    
   ><div style="clear: both;"></div>

<div class="_25">
    <p class="contactform"><label class="bold_label" for="in_user">Opt In?</label>
    <select class="contactform" name="newsletter" id="newsletter">
<option value="Yes" selected>Yes</option>
<option value="No">No</option>
</select>
    </p>
</div>

<div class="_25">
    <p class="contactform"><label class="bold_label" for="in_user">Profile Type</label>
    <select class="contactform" name="profile_status" id="profile_status">
<option value="Public" selected>Public</option>
<option value="Private">Private</option>
</select>
    </p>
</div>

<div class="_25">
    <p class="contactform"><label class="bold_label" for="in_user">User Level</label><?php
$query = "SELECT level FROM tblUserLevels order by level asc"; 
$result = mysql_query($query); 
echo "<select class='contactform' name='user_level'><option value=''>----NONE----</option>";
while ($row = mysql_fetch_array($result)) {
	if ($row['level']=='Normal'){
	echo "<option selected='selected' value='" . $row['level'] . "'>" . $row['level'] . "</option>";	
	}
	else {
    echo "<option value='" . $row['level'] . "'>" . $row['level'] . "</option>"; }
}
echo "</select>";

?></p>
</div>


      <div style="clear: both;"></div>

<div class="_100">
    <p class="contactform"><label class="bold_label" for="email">Groups</label><br>
    <input  name="groups[]" type="checkbox" id="groups[]" style="margin-top:5px;" value="Doctor">Doctor
    <input  name="groups[]" type="checkbox" id="groups[]" style="margin-left:20px; margin-top:5px;" value="Management">Management
    <input  name="groups[]" type="checkbox" id="groups[]" style="margin-left:20px; margin-top:5px;" value="Medic">Medic
    <input  name="groups[]" type="checkbox" id="groups[]" style="margin-left:20px; margin-top:5px;" value="Nurse">Nurse

    </p>
    </div>  <div style="clear: both;"></div>
    



    <div class="_100">
    <p style="margin-top:15px;" class="contactform"><label class="bold_label" for="notes">Notes</label><textarea rows="5" class="contactform" id="notes" name="notes"></textarea></p>
     <div style="clear: both;"></div>	
<!--<INPUT TYPE="image" SRC="images/add_contact_sm.png" style="margin-top:30px;"  />
<a href="index.php"><img src="images/cancel.png" border="0"></a>-->
</form></td></tr></table>
     </div>
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
   </body>
</html>
