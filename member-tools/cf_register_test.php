
<!DOCTYPE html>
<html class="html">
 <head>
 

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.2.232.244"/>
  <title>New Member Registration (step 1 of 3)</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?272710960"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?4059369144"/>
  <link rel="stylesheet" type="text/css" href="cf_style.css" id="pagesheet"/>
  <!-- Other scripts -->
  <script src="js/gen_validatorv4.js" type="text/javascript"></script>

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
	$("#email_add").blur(function()
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
			  $("#email_add").val('');
			  $('#email_add').focus();
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
  li {
    list-style-type: square;
	list-style:square;
	margin-left:30px;
}
  .subtitle{
  color: #A10000;
  font-family: source-sans-pro, sans-serif;
  font-size: 14px;
  font-weight: 600;
  line-height: 1.35;
  padding: 8px 0px 0px;
  }
  .subtitle_follow{
	    color: #000000;
  font-style: italic;}
  .jbutton{
	    z-index: 263;
  width: 194px;
  min-height: 39px;
  background-color: #A10000;
  border-radius: 4px;
  line-height: 0.88;
  text-align: center;
  font-size: 18px;
  color: #FFFFFF;
  font-family: source-sans-pro, sans-serif;
  font-weight: 400;
  margin-left: 18px;
  margin-top: 27px;
  position: relative;
  }
  .reqfield{
	  margin-top:30px;
	  color:#a10000;
	  font-size:11px;
	  font-weight:bold;}
  .asterisk{
	  color: #a00000;
	  font-size:13px;
  }
  .fieldexplain{
	  font-size:11px;
	  font-style:italic;
  }
  .fieldlabel{
	  font-size:11px;
	   font-style:italic;
	  line-height:.5;
	  margin:0;
	  padding:0;
  }
 .pagedesc {
	font-size: 17px;
	color: #232323;
	font-family: source-sans-pro, sans-serif;
	line-height: 1.4;

	 }
 
.tip {
	font-size:11px}
/* Add this attribute to the element that needs a tooltip */
[data-tooltip] {
	position: relative;
	z-index: 2;
	cursor: pointer;
}

/* Hide the tooltip content by default */
[data-tooltip]:before,
[data-tooltip]:after {
  visibility: hidden;
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
	filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
	opacity: 0;
	pointer-events: none;
}

/* Position tooltip above the element */
[data-tooltip]:before {
	position: absolute;
	bottom: 150%;
	left: 50%;
	margin-bottom: 5px;
	margin-left: -80px;
	padding: 7px;
	width: 160px;
	-webkit-border-radius: 3px;
	-moz-border-radius:    3px;
	border-radius:         3px;
	background-color: #000;
	background-color: hsla(0, 0%, 20%, 0.9);
	color: #fff;
	content: attr(data-tooltip);
	text-align: center;
	font-size: 14px;
	line-height: 1.2;
}

/* Triangle hack to make tooltip look like a speech bubble */
[data-tooltip]:after {
	position: absolute;
	bottom: 150%;
	left: 50%;
	margin-left: -5px;
	width: 0;
	border-top: 5px solid #000;
	border-top: 5px solid hsla(0, 0%, 20%, 0.9);
	border-right: 5px solid transparent;
	border-left: 5px solid transparent;
	content: " ";
	font-size: 0;
	line-height: 0;
}

/* Show tooltip content on hover */
[data-tooltip]:hover:before,
[data-tooltip]:hover:after {
	visibility: visible;
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	opacity: 1;
}
</style>
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
.pwtext {
	font-size: 12px;
	color: #F00;
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
    <div class="clearfix grpelem" id="u6619-194">
      <!-- content -->
      <h1 class="Heading-1" style="margin-bottom:30px;">New Member Registration (step 1 of 3)</h1>
      <span class="pagedesc">In this step, you are creating a User Profile for CycleFolsom.com web site and registering as a member of the Cycle Folsom Bike Club. This registration is required and is separate from your Meetup.com Membership. The user account created here will be used maintain club membership, profile information, and club dues. You can edit your profile at any time after registration. Credit card info is NOT kept on file and contact info is not disclosed without your approval, except in emergencies.</span>
      <p style="margin-top:25px;"><span class="reqfield" style="margin-top:25px; margin-bottom:25px; margin-left:18px;">*All fields are required.</span></p>
      
      <table style="margin-top:20px;" width="100%">
        <tr>
          <td><form name="contactform" action="cf_register_action.php" method="post">
         
            <div class="_100"> <span id="msgbox" style="display:none"></span> </div>
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
           
            <div class="_25">
              <p class="contactform">
                <label class="bold_label" for="fname">First Name</label>
                <input autocomplete="off" class="contactform" id="fname" name="fname" type="text" value=""/>
              </p>
            </div>
            <div class="_25">
              <p class="contactform">
                <label class="bold_label" for="lname">Last Name</label>
                <input autocomplete="off" class="contactform" id="lname" name="lname" type="text" value=""/></p>
              </div>
              <div class="_50">
              <p class="contactform">
                <label class="bold_label" for="email_add">Email</label>&nbsp;<a class="tip" href="#" data-tooltip="Your e-mail address will not be given away or sold. You may unsubscribe at any time.">Info</a>&nbsp;<span class="fieldexplain">(you will use this for site login)</span>
                <input style="margin-bottom:0; padding-bottom:0;" autocomplete="off" class="contactform" id="email_add" name="email_add" type="text" value=""/></p>
            </div>
            <div style="clear: both; "></div>
            <div class="_50">
              <p class="contactform">
                <label class="bold_label" for="street">Street Address</label>
                <input autocomplete="off" class="contactform" id="street" name="street" type="text" value=""/>
              </p>
            </div>
            <div class="_30">
              <p class="contactform">
                <label class="bold_label" for="city">City</label>
                <input autocomplete="off" class="contactform" id="city"  name="city" type="text" value=""/>
              </p>
            </div>
            <div class="_10">
              <p class="contactform">
                <label class="bold_label" for="state">State</label>
                <input autocomplete="off" class="contactform" id="state" name="state" type="text" value="CA"/>
              </p>
            </div>
            <div class="_10">
              <p class="contactform">
                <label class="bold_label" for="zip">Zip</label>
                <input autocomplete="off" class="contactform" id="zip" name="zip" type="text" value=""/>
              </p>
            </div>
            <div style="clear: both;"></div>
            <div class="_20">
              <p class="contactform">
                <label class="bold_label" for="phone">Cell Phone</label>&nbsp;<a class="tip" href="#" data-tooltip="Cell phone numbers are used for emergencies only and will not be disclosed without your permission.">Info</a>
                <input class="contactform" id="phone" name="phone" type="text" value=""/>
              </p>
            </div>
            
            <div class="_20">
              <p class="contactform">
                <label class="bold_label" for="in_user">Opt In?</label>
                &nbsp;<a class="tip" href="#" data-tooltip="Select Yes to receive emails from the administrator.">Info</a>
                <select class="contactform" name="opt_in" id="opt_in">
                  <option value="Yes" selected>Yes</option>
                  <option value="No">No</option>
                </select>
              </p>
            </div>
            <div class="_20">
              <p class="contactform">
                <label class="bold_label" for="in_user">Profile Type</label>
                &nbsp;<a class="tip" href="#" data-tooltip="Select &quot;Public&quot; to allow other registered members to see your e-mail address and cell phone number. Select &quot;Private&quot; and only your name will be displayed.">Info</a>
                <select class="contactform" name="profile_type" id="profile_type">
                  <option value="Public" selected>Public</option>
                  <option value="Private">Private</option>
                </select>
              </p>
            </div>
            <div style="clear: both;"></div>
            <div class="_30">
              <p class="contactform">
                <label class="bold_label" for="street">Password <span class="pwtext">(at least 6 characters)</span></label>
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
            <input class="jbutton" style="margin-top:25px;" type="submit" name="Complete Registration" id="Complete Registration" value="Proceed to Next Step">            <div style="clear: both;"></div>
            <!--<INPUT TYPE="image" SRC="images/add_contact_sm.png" style="margin-top:30px;"  />
<a href="index.php"><img src="images/cancel.png" border="0"></a>-->


          </form></td>
        </tr>
      </table>
      <h5 class="subtitle">Member Name and Contact Info <span class="subtitle_follow">(you can edit your profile later, if desired)</span></h5><hr>
      
      <table width="100%"><tr><td width="50"><img src="images/checkmark.jpg" height="30"></td><td style="font-size:14px; font-weight:bold;">Premium Membership<span style="font-weight:normal;"> (annual $15 registration fee)</span></td></tr>
      <tr><td>&nbsp;</td><td>Premium membership fee helps cover:</td></tr>
      <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td><td><ul><li>Club operating expenses and support for special events</li>
      <li>Liability insurance protection for all members, including you.</li>
      <li>Liability protection for Ride Leaders and Club Managers</li>
      <li>Supplemental medical insurance for all members, including you.</li></ul></td></tr>
      <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>&nbsp;</td><td>Premium Members can obtain a Premium Membership card, which can be used to receive discounts from various sponsors, including a 15% discount at Folsom Bike and Town Center Bike & Tri, 20% off at ROL Wheels, 20% off at Pete’s Restaurant & Brewhouse and more. Some sponsors sometimes make special offers available to members or host special events exclusively for Premium Members. Learn more about discounts offered by our sponsors and discounts.</td></tr>
            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td><td>Your Premium Membership Card will typically be mailed to you within a week or less.</td></tr>
            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr><td width="50"><img src="images/checkmark_clear.jpg" height="30" ></td><td style="font-size:14px; color:#a0a0a0; font-weight:bold;">Basic Membership<span style="font-weight:normal; font-style:italic; color:#a10000"> (no longer available)</span></td></tr>
      </table>
     
      <h5 style="margin-top:50px;" class="subtitle">Release of Liability — <span class="subtitle_follow"> WARNING, DISCLAIMER, ACKNOWLEDGMENT & RELEASE</span></h5>
      <div style="height: 250px; width: 870px; margin-left:17px; margin-top:20px; margin-bottom:30px; padding:5px; overflow: auto; border:1px solid #ccc;">IN CONSIDERATION of being permitted to participate in any way in Cycle Folsom ("Club") sponsored Bicycling Activities ("Activity") I, for myself, my personal representatives, assigns, heirs, and next of kin: <br/><br/>1. ACKNOWLEDGE, agree, and represent that I understand the nature of Bicycling Activities and that I am qualified, in good health, and in proper physical condition to participate in such Activity. I further acknowledge that the Activity will be conducted over public roads and facilities open to the public during the Activity and upon which the hazards of traveling are to be expected. I further agree and warrant that if, at any time, I believe conditions to be unsafe, I will immediately discontinue further participation in the Activity.</br></br>2. FULLY UNDERSTAND that (a) BICYCLING ACTIVITIES INVOLVE RISKS AND DANGERS OF SERIOUS BODILY INJURY, INCLUDING PERMANENT DISABILITY, PARALYSIS AND DEATH ("Risks"); (b) these Risks and dangers may be caused by my own actions or inactions, the actions or inactions of others participating in the Activity, the conditions in which the Activity takes place, or THE NEGLIGENCE OF THE "RELEASEES" NAMED BELOW; (c) there may be OTHER RISKS AND SOCIAL AND ECONOMIC LOSSES either not known to me or not readily foreseeable at this time; and I FULLY ACCEPT AND ASSUME ALL SUCH RISKS AND ALL RESPONSIBILITY FOR LOSSES, COSTS, AND DAMAGES I may incur as a result of my participation in the Activity.</br></br>3. HEREBY RELEASE, DISCHARGE, AND COVENANT NOT TO SUE the Club, the League of American Bicyclists, its respective administrators, directors, agents, officers, members, volunteers, and employees, other participants, any sponsors, advertisers, and, if applicable, owners and lessors of premises on which the Activity takes place, (each considered one of the "RELEASEES" herein) FROM ALL LIABILITY, CLAIMS, DEMANDS, LOSSES, OR DAMAGES ON MY ACCOUNT CAUSED OR ALLEGED TO BE CAUSED IN WHOLE OR IN PART BY THE NEGLIGENCE OF THE "RELEASEES" OR OTHERWISE, INCLUDING NEGLIGENT RESCUE OPERATIONS. And, I FURTHER AGREE that if, despite this RELEASE AND WAIVER OF LIABILITY, ASSUMPTION OF RISK, AND INDEMNITY AGREEMENT I, or anyone on my behalf, makes a claim against any of the Releasees, I WILL INDEMNIFY, SAVE, AND HOLD HARMLESS EACH OF THE RELEASEES from any litigation expenses, attorney fees, loss, liability, damage, or cost which any may incur as the result of such claim.</br></br>4. FULLY UNDERSTAND that Cycle Folsom's Owners, Ride Leaders and Members are not, nor do we claim to be, experts in biking, or biking safety. We cannot and do not guarantee your safety, while participating in any/all Cycle Folsom events, activities or group rides.</br></br>I AM 18 YEARS OF AGE OR OLDER, HAVE READ AND UNDERSTAND THE TERMS OF THIS AGREEMENT, UNDERSTAND THAT I AM GIVING UP SUBSTANTIAL RIGHTS BY SIGNING THIS AGREEMENT, HAVE SIGNED IT VOLUNTARILY AND WITHOUT ANY INDUCEMENT OR ASSURANCE OF ANY NATURE AND INTEND IT TO BE A COMPLETE AND UNCONDITIONAL RELEASE OF ALL LIABILITY TO THE GREATEST EXTENT ALLOWED BY LAW. I AGREE THAT IF ANY PORTION OF THIS AGREEMENT IS HELD TO BE INVALID, THE BALANCE, NOTWITHSTANDING, SHALL CONTINUE IN FULL FORCE AND EFFECT.</div>
      <input style="margin-left:18px;" type="checkbox" name="checker" id="checker">&nbsp;&nbsp;I am 18 years or older and I have read the Warning, Disclaimer, Acknowledgment & Release, and agree to its terms.

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

	   frmvalidator.addValidation("fname","req","Please enter your First Name");
	   frmvalidator.addValidation("password1","minlen=6","Your password must be at least 6 characters");
	   frmvalidator.addValidation("lname","req","Please enter your Last Name");
	   frmvalidator.addValidation("street","req","Please enter your Street Address");
	   frmvalidator.addValidation("city","req","Please enter your City");
	   frmvalidator.addValidation("state","req","Please enter your State");
	   frmvalidator.addValidation("zip","req","Please enter your Zip");
	   frmvalidator.addValidation("phone","req","Please enter your Cell Phone");
	   frmvalidator.addValidation("email_add","req","Please enter your Email");
	   frmvalidator.addValidation("email_add","email", "Not a valid email address");
	 

	   </script>
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
