<? session_start();
if ($_SESSION["member_registered"] == TRUE) {
	echo "<BR>";	
	?>
	<script type="text/javascript" src='message.js'></script>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="message_default.css">
	<script>
	dhtmlx.alert({
		text: "An error has ocurred while processing your request.  Click OK to return to the home page.",
		callback: function() {
			window.location = "https://www.cyclefolsom.com/member-tools/";	
		}
	});</script>
	<? exit;
}


if(isset($_POST['fname']))//Make sure user got here from the form.  If not, redirect them back.
   {
include('paypal_config.php'); 
include ('connect.php');
?>
<!DOCTYPE html>
<html class="html">
<head>
	<script src="js/gen_validatorv4.js" type="text/javascript"></script>
    
    <? 
    function genPassword($length) {
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
    ?>
    
      
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
    <meta name="generator" content="7.2.232.244"/>
    <title>Cycle Folsom Account Registration</title>
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
        
        
    
    <link rel="stylesheet" type="text/css" href="message_default.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
      
    
    <link rel="stylesheet" type="text/css" href="member_tools_style.css" />
</head>


<? include('CF_header.php'); 


//CHECK IF USER USED A COUPON CODE AND IF IT'S VALID
$coupon_code=trim($_POST['coupon_code']);
if (!empty($coupon_code)) {

	$sql="SELECT * FROM tblCouponCodes WHERE  code='$coupon_code'";
	$rRow = mysql_fetch_array(mysql_query($sql)); 
	
	$result=mysql_query($sql);
	
	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);
	
	// Not found after entering a coupon code
	if($count<>1){  ?>
		<h1 class="Heading-1" style="margin-bottom:30px;">Invalid Page Access</h1>
		An error has ocurred while accessing this page.  The coupon code you provided is not valid. Please contact the Cycle Folsom Administrator 
			<a href="mailto:info@cyclefolsom.com">here</a><br />
		
			
			<a class="anchor_item grpelem" id="thequestion"></a> </div>
			<div class="verticalspacer"></div>
			<div class="clearfix colelem" id="u1130"><!-- group -->
			 <div class="clearfix grpelem" id="u6597-4"><!-- content -->
			  <p>© 2013 Cycle Folsom | Site Design by Stan Schultz</p>
			 </div>
			 <div class="clearfix grpelem" id="u6598-7"><!-- content -->
			  <p>Special thanks to longtime CF member Carl Costas for contributing many of the professional photos on this site. See Carl's work at 
				<a class="nonblock" href="http://www.carlcostas.com" target="_blank">CarlCostas.com</a>.</p>
			 </div>
			</div>
		   </div>
		  </div>
		  <!-- JS includes -->
		  <script type="text/javascript">
		   if (document.location.protocol != 'https:') 
		   	document.write('\x3Cscript src="http://musecdn2.businesscatalyst.com/scripts/4.0/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
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
			
			 
		<? 
		exit; 
	} 
	
	else {
		$using_coupon=true;
		$rowid=$rRow['id'];
		//Delete the coupon code from the database
		$delqry="DELETE from tblCouponCodes where id = $rowid";
		$result=mysql_query($delqry);
	}
}
    
 ?>
 		
 
<!-- content -->
<? if($using_coupon) { 
	echo "<h1 style='margin-bottom:30px;' class='Heading-1' >New Member Registration (step 2 of 2)</h1>";
} 
else {
echo "<h1 style='margin-bottom:30px;' class='Heading-1' >New Member Registration (step 2 of 3)</h1>";} ?>

<span class="pagedesc">In this step, you'll need to accept our release of liability and confirm that you are at least 18 years of age.  You must complete this step and check out through PayPal within 15 days of registering or your account will be removed from our database.</span>
<?  
//Get values passed by form and store them

	  
		$meetup_username = addslashes($_POST['meetup_username']);
		$fname = ucwords(addslashes($_POST['fname']));
		$lname = ucwords(addslashes($_POST['lname']));
		$street = addslashes($_POST['street']);
		$city = addslashes($_POST['city']);
		$state = addslashes($_POST['state']);
		$zip = addslashes($_POST['zip']);
		$phone = addslashes($_POST['phone']);
		$gender = addslashes($_POST['gender']);
		$email_add = addslashes($_POST['email_add']);
		$opt_in = $_POST['opt_in'];
		$profile_type = $_POST['profile_type'];
		$password = md5($_POST['password1']);
		$ip_add = $_SERVER["REMOTE_ADDR"];
		//Default values
		$membership_level = "Premium";
        //If using coupon, set status to No Waiver.  Once they confirm this page it goes to Pending
        if($using_coupon==true){$payment_status="No Waiver"; $coupon_user="Yes";} else {$payment_status = "Unpaid";$coupon_user="No";}
		$card_sent = "N/A";
		$user_level = "Normal";
		$account_id = genPassword(30);
		//		
		
	   //DO A QUICK CHECK TO MAKE SURE EMAIL DOES NOT EXIST. IF IT DOES, REDIRECT USER TO LOGIN PAGE
		$email_sql="SELECT * FROM tblUserData WHERE email_add='$email_add'";
		$email_result=mysql_query($email_sql);
	
		// Mysql_num_row is counting table row
		$count=mysql_num_rows($email_result);
		if($count==1){ //There is an account for this user
		//Show login screen
		echo "<BR><BR><strong>A system error has ocurred.  Please click the following link to return to the home page.</strong>";
		echo "<BR><a href='index.php'>Return to Home Page</a>";
		exit;		}
		
		
		
		//Add user to database
		$result=mysql_query("INSERT into tblUserData (account_id, meetup_username, fname, lname, street, city, state, zip, phone, gender, email_add, membership_level, coupon_user, payment_status, card_sent, opt_in, profile_type, cfpw, ip_add, user_level) VALUES ('$account_id', '$meetup_username', '$fname', '$lname', '$street', '$city', '$state', '$zip', '$phone', '$gender', '$email_add', '$membership_level', '$coupon_user', '$payment_status', '$card_sent', '$opt_in', '$profile_type', '$password', '$ip_add', '$user_level')");
		
		//SET SESSION VARIABLE TO TRACK THAT A RECORD FOR THIS MEMBER HAS ALREADY BEEN INSERTED.  USED TO REDIRECT MEMBER IF THEY TRY TO COME BACK TO THIS PAGE
		$_SESSION["member_registered"] = TRUE;
		
		//Send admin email of new user registration ONLY if they are NOT using a coupon.  For coupon, we send AFTER they agree to release.
		if(!$using_coupon) {
			$to = "info@cyclefolsom.com";
			$subject = "New CF Registration has Been Submitted";
			$message = "
			<html>
			<head>
			<title>New Cycle Folsom Registration</title>
			</head>
			<body>
			<p><strong>A New Member Registration has been submitted. Please log in to the CF Registration System Admin Tools page to pocess this user</strong></p>
			<p>User Information:</p>
			Name: $fname $lname<br>
			Email: $email_add<br>
			Meetup Username: $meetup_username<br>
			Coupon User: $coupon_user
			<p>Thanks!</P>
			<p>The honchos at Cycle Folsom!</p>
			
			</body>
			</html>
			";
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			// More headers
			$headers .= 'From: Cycle Folsom <info@cyclefolsom.com>' . "\r\n";
			//We no longer send here.  Only after payment.
			//mail($to,$subject,$message,$headers);	
			}
		
	if(!$result){
		echo "There was a problem adding you to the database.  Please contact the administrator";
		
		//Finish processing page
		?>
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
		<?
		exit;
	}//End if
		
	
	?>
	
	<?  
    
$_SESSION['myusername']=true; 
$_SESSION['account_id']=$account_id;
include ('connect.php');
$result = mysql_query("SELECT * from tblUserData where account_id='$account_id'");
while ($item = mysql_fetch_array($result)) {
	?><div style="margin-top: 50px;">
	 <h5 class="subtitle" style="margin-bottom:0;">Member Name and Contact Info <span class="subtitle_follow">(you can edit your profile later, if desired)</span></h5>
	       <hr class="cf">
	<table width="600">
	<tr><td width="300"><? echo $item['fname']." ".$item['lname']; ?></td><td align="right">E-Mail Address:&nbsp;&nbsp;</td><td><? echo $item['email_add'];?></td></tr>
	<tr><td width="300"><? echo $item['street'];?></td><td align="right">Cell Phone:&nbsp;&nbsp;</td><td><? echo $item['phone'];?></td></tr>
	<tr><td width="300"><? echo $item['city'].", ".$item['state']." ".$item['zip'];?></td><td align="right">Profile Status:&nbsp;&nbsp;</td><td><? echo $item['profile_type'];?></td></tr>
	<tr><td width="300">&nbsp;</td><td align="right">Opt In:&nbsp;&nbsp;</td><td><? echo $item['opt_in'];?></td></tr></table></div>
	
	<?
}
?>
 <h5 class="subtitle" style="margin-bottom:0; margin-top:30px;">Membership Type </h5>
	       <hr class="cf">
		  <? if($using_coupon) { ?> 
		   <table width="100%"><tr><td width="50"><img src="images/checkmark.jpg" height="30"></td><td style="font-size:14px; font-weight:bold;">Complimentary Premium Membership<span style="font-weight:normal;"> ($15 annual fee waived)</span></td></tr>
      <tr><td>&nbsp;</td><td>Complimentary Premium Membership includes:</td></tr>
      <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
	  <tr><td>&nbsp;</td><td><ul>
      <li>Liability insurance protection for all members, including you.</li>
      <li>Liability protection for Ride Leaders and Club Managers</li>
      <li>Supplemental medical insurance for all members, including you.</li></ul></td></tr>
      <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
      <tr><td>&nbsp;</td><td>Complimentary Premium Members can obtain a Premium Membership card, which can be used to receive discounts from various
sponsors, including a 15% discount at Folsom Bike and Town Center Bike & Tri, 20% off at ROL Wheels, 20% off at Pete’s Restaurant
& Brewhouse and more. Some sponsors sometimes make special offers available to members or host special events exclusively for
Premium Members. Learn more about discounts offered by our sponsors and discounts.</td></tr>
            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td><td>Your Premium Membership Card will typically be mailed to you within a week or less.</td></tr>
            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr><td width="50"><img src="images/checkmark_clear.jpg" height="30" ></td><td style="font-size:14px; color:#a0a0a0; font-weight:bold;">Basic Membership<span style="font-weight:normal; font-style:italic; color:#a10000"> (no longer available)</span></td></tr>
      </table>
      <? } else { ?>
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
      
      <? } ?>
     
      <h5 style="margin-top:50px;" class="subtitle">Release of Liability — <span class="subtitle_follow"> WARNING, DISCLAIMER, ACKNOWLEDGMENT & RELEASE</span></h5>
      <div style="height: 250px; width: 870px; margin-left:17px; margin-top:20px; margin-bottom:30px; padding:5px; overflow: auto; border:1px solid #ccc;">IN CONSIDERATION of being permitted to participate in any way in Cycle Folsom ("Club") sponsored Bicycling Activities ("Activity") I, for myself, my personal representatives, assigns, heirs, and next of kin: <br/><br/>1. ACKNOWLEDGE, agree, and represent that I understand the nature of Bicycling Activities and that I am qualified, in good health, and in proper physical condition to participate in such Activity. I further acknowledge that the Activity will be conducted over public roads and facilities open to the public during the Activity and upon which the hazards of traveling are to be expected. I further agree and warrant that if, at any time, I believe conditions to be unsafe, I will immediately discontinue further participation in the Activity.</br></br>2. FULLY UNDERSTAND that (a) BICYCLING ACTIVITIES INVOLVE RISKS AND DANGERS OF SERIOUS BODILY INJURY, INCLUDING PERMANENT DISABILITY, PARALYSIS AND DEATH ("Risks"); (b) these Risks and dangers may be caused by my own actions or inactions, the actions or inactions of others participating in the Activity, the conditions in which the Activity takes place, or THE NEGLIGENCE OF THE "RELEASEES" NAMED BELOW; (c) there may be OTHER RISKS AND SOCIAL AND ECONOMIC LOSSES either not known to me or not readily foreseeable at this time; and I FULLY ACCEPT AND ASSUME ALL SUCH RISKS AND ALL RESPONSIBILITY FOR LOSSES, COSTS, AND DAMAGES I may incur as a result of my participation in the Activity.</br></br>3. HEREBY RELEASE, DISCHARGE, AND COVENANT NOT TO SUE the Club, the League of American Bicyclists, its respective administrators, directors, agents, officers, members, volunteers, and employees, other participants, any sponsors, advertisers, and, if applicable, owners and lessors of premises on which the Activity takes place, (each considered one of the "RELEASEES" herein) FROM ALL LIABILITY, CLAIMS, DEMANDS, LOSSES, OR DAMAGES ON MY ACCOUNT CAUSED OR ALLEGED TO BE CAUSED IN WHOLE OR IN PART BY THE NEGLIGENCE OF THE "RELEASEES" OR OTHERWISE, INCLUDING NEGLIGENT RESCUE OPERATIONS. And, I FURTHER AGREE that if, despite this RELEASE AND WAIVER OF LIABILITY, ASSUMPTION OF RISK, AND INDEMNITY AGREEMENT I, or anyone on my behalf, makes a claim against any of the Releasees, I WILL INDEMNIFY, SAVE, AND HOLD HARMLESS EACH OF THE RELEASEES from any litigation expenses, attorney fees, loss, liability, damage, or cost which any may incur as the result of such claim.</br></br>4. FULLY UNDERSTAND that Cycle Folsom's Owners, Ride Leaders and Members are not, nor do we claim to be, experts in biking, or biking safety. We cannot and do not guarantee your safety, while participating in any/all Cycle Folsom events, activities or group rides.</br></br>I AM 18 YEARS OF AGE OR OLDER, HAVE READ AND UNDERSTAND THE TERMS OF THIS AGREEMENT, UNDERSTAND THAT I AM GIVING UP SUBSTANTIAL RIGHTS BY SIGNING THIS AGREEMENT, HAVE SIGNED IT VOLUNTARILY AND WITHOUT ANY INDUCEMENT OR ASSURANCE OF ANY NATURE AND INTEND IT TO BE A COMPLETE AND UNCONDITIONAL RELEASE OF ALL LIABILITY TO THE GREATEST EXTENT ALLOWED BY LAW. I AGREE THAT IF ANY PORTION OF THIS AGREEMENT IS HELD TO BE INVALID, THE BALANCE, NOTWITHSTANDING, SHALL CONTINUE IN FULL FORCE AND EFFECT.</div>
	   <? if($using_coupon) { ?>
        <form id="PaypalForm" name="PaypalForm" class="form" action="confirm_reg_c.php" method="POST"><input type="hidden" name="checkout">
        <input type="hidden" name="account_id" id="account_id" value="<? echo $account_id; ?>" /> <? } else { ?>
        <form id="PaypalForm" name="PaypalForm" class="form" action="paypal_ec_redirect.php" method="POST"> <input type="hidden" name="checkout">
        <? } ?>
      <input style="margin-left:18px;" type="checkbox" name="checker" value="on" id="checker">&nbsp;&nbsp;I am 18 years or older and I have read the Warning, Disclaimer, Acknowledgment & Release, and agree to its terms.
	  <h5 style="margin-top:50px;" class="subtitle">A Note About Riding in Groups</h5><hr class="cf"/>
	  <p>Group riding requires a distinct set of skills. Regardless of how strong or confident you are on your bike when riding alone, riding in a group requires an awareness of others. In fact, you may have ridden with other groups. That’s great, but please be aware that we pride ourselves on prioritizing safety as our #1 objective, followed by group cohesion and respect for others around you—including drivers, pedestrians, or other cyclists who may be on the road or trail. We really hope you’ll share these values with us.</p>

        <? if($using_coupon) { ?>
             <h5 style="margin-top:50px;" class="subtitle">Complete Your Registration</h5><hr class="cf">
	  <p>Click the “Register” button below to complete your registration.</p>
<p style="margin-top:15px;">
Upon completion, you will be taken to a confirmation page with additional information and links for joining our Meetup.com site so you can see our complete calendar. Meetup.com is free, but you’ll need to become a Meetup member and then request to join our Meetup Group.</p> 
		   
            <br><input type="image" src="images/register.png" alt="Register" value="Register" name="register"/> </form>
            <? }
            else {?>
            
	  <h5 style="margin-top:50px;" class="subtitle">Complete Your Registration & Proceed to Payment Page</h5><hr class="cf">
	  <p>Click the “Proceed to Checkout” button below to complete your registration and to proceed to our Payment Page, which is processed using the PayPal Secure Payment Platform (PayPal User Name not required; credit cards accepted).</p>
<span class="subtitle">Note:</span> Payee will be listed as Censible Marketing.<p style="margin-top:15px;">
Upon payment completion, you will be taken to a confirmation page with additional information and links for joining our Meetup.com site so you can see our complete calendar. Meetup.com is free, but you’ll need to become a Meetup member and then request to join our Meetup Group.</p> 
		   
	
      
                <input type="hidden" name="PAYMENTREQUEST_0_AMT" value="15.00"></input>
      <input type="hidden" name="currencyCodeType" value="USD"></input>
      <input type="hidden" name="paymentType" value="Sale"></input>
	  <input type="hidden" name="PAYMENTREQUEST_0_CUSTOM" value="<? echo $account_id; ?>"></input>
						
						
                       <br><input type="image" src="images/proceed_checkout.png" alt="Proceed to Checkout" value="Proceed to Checkout" /> <img src="images/paypal_types.jpg">
						
                  <? } ?>    
            </form>
			 <script type="text/javascript">var frmvalidator  = new Validator("PaypalForm");
	   
	   frmvalidator.addValidation("checker","shouldselchk=on", "You must accept our release of liability and confirm that you are at least 18 years of age.");
	 

	   </script>
	       
            <? if(!$using_coupon) { ?>
			 <h5 style="margin-top:50px;" class="subtitle">...or log out and return later to complete your payment.</h5><hr class="cf">
			 <p>You may log out and return later to pay for membership.</p>
			<p style="margin-top:15px;">Since you've already created a User Profile, when you return you'll log into this site and select "Renew Membership"</p>
			<p style="margin-top:15px;"><a href="logout.php"><img src="images/logout.png"></a></p> <? } ?>
			 
             <script type="text/javascript">
   window.paypalCheckoutReady = function () {
       paypal.checkout.setup('<?php echo($merchantID); ?>', {
           container: 'myContainer',
           environment: '<?php echo($env); ?>'
       });
   };
   </script>
   <script src="//www.paypalobjects.com/api/checkout.js" async></script>
	
	   
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
<? }
else {
	header( 'Location: https://www.cyclefolsom.com/member-tools/' ) ;
}
?>