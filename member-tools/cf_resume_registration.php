<? session_start();
if ($_SESSION['myusername'] ) { 
include('paypal_config.php'); 
include ('connect.php');
?>
<!DOCTYPE html>
<html class="html">
 <head>
 <script src="js/gen_validatorv4.js" type="text/javascript"></script>
 
<? 
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
?>

      
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.2.232.244"/>
  <title>New Member Registration</title>
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
<? include('CF_header.php'); ?>
      <!-- content -->
      <h1 style="margin-bottom:30px;" class="Heading-1" >New Member Registration (step 2 of 3)</h1>
	  <span class="pagedesc">In this step, you'll need to accept our release of liability and confirm that you are at least 18 years of age.</span>
	<?  
	  //Get values passed by form and store them

	
include ('connect.php');
$id = $_POST['account_id']; 

$result = mysql_query("SELECT * from tblUserData where account_id='$id'");
while ($item = mysql_fetch_array($result)) {
		?>
		 <div id="cfwrapper">
		 <h5 class="subtitle" style="margin-bottom:0;">Member Name and Contact Info</h5>
	       <hr class="cf">
    <div id="cfleftcolumn">
	
	<table width="100%" border="0">
	<tr><td class="cf" width="300"><? echo $item['fname']." ".$item['lname']; ?></td><td class="cf" align="right">E-Mail Address:&nbsp;&nbsp;</td><td class="cf"><? echo $item['email_add'];?></td></tr>
	<tr><td class="cf" width="300"><? echo $item['street'];?></td><td class="cf" align="right">Cell Phone:&nbsp;&nbsp;</td><td class="cf"><? echo $item['phone'];?></td></tr>
	<tr><td class="cf" width="300"><? echo $item['city'].", ".$item['state']." ".$item['zip'];?></td><td class="cf" align="right">Profile Status:&nbsp;&nbsp;</td><td class="cf"><? echo $item['profile_type'];?></td></tr>
	<tr><td class="cf" width="300">&nbsp;</td><td class="cf" align="right">Opt In:&nbsp;&nbsp;</td><td class="cf"><? echo $item['opt_in'];?></td></tr></table></div>
    <div id="cfrightcolumn"><img src="images/edit_profile.png" /></div>
    </div>
	
	<?
}
?>
 <h5 class="subtitle" style="margin-bottom:0; margin-top:30px;">Membership Type </h5>
	       <hr class="cf">
		   
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
	  <form id="PaypalForm" name="PaypalForm" class="form" action="paypal_ec_redirect.php" method="POST">
      <input type="hidden" name="checkout">
      <input style="margin-left:18px;" type="checkbox" name="checker" value="on" id="checker">&nbsp;&nbsp;I am 18 years or older and I have read the Warning, Disclaimer, Acknowledgment & Release, and agree to its terms.
	 <h5 style="margin-top:50px;" class="subtitle">A Note About Riding in Groups</h5><hr class="cf">
	  <p>Group riding requires a distinct set of skills. Regardless of how strong or confident you are on your bike when riding alone, riding in a group requires an awareness of others. In fact, you may have ridden with other groups. That’s great, but please be aware that we pride ourselves on prioritizing safety as our #1 objective, followed by group cohesion and respect for others around you—including drivers, pedestrians, or other cyclists who may be on the road or trail. We really hope you’ll share these values with us.</p>
	  <h5 style="margin-top:50px;" class="subtitle">Complete Your Registration & Proceed to Payment Page</h5><hr class="cf">
	  <p>Click the 'Proceed to Checkout' button below to complete your registration and to proceed to our Payment Page, which is processed using the PayPal Secure Payment Platform (PayPal User Name not required; credit cards accepted).</p>
<span class="subtitle">Note:</span> Payee will be listed as Censible Marketing.<p style="margin-top:15px;">
Upon payment completion, you will be taken to a confirmation page with additional information and links for joining our Meetup.com site so you can see our complete calendar. Meetup.com is free, but you’ll need to become a Meetup member and then request to join our Meetup Group.</p> 
		   
	
      
                <input type="hidden" name="PAYMENTREQUEST_0_AMT" value="15.00"></input>
      <input type="hidden" name="currencyCodeType" value="USD"></input>
      <input type="hidden" name="paymentType" value="Sale"></input>
	  <input type="hidden" name="PAYMENTREQUEST_0_CUSTOM" value="<? echo $account_id; ?>"></input>
						
						<div id="cfwrapper"><div id="cfleftcolumn">
                       <br><input type="image" src="images/proceed_checkout.png" alt="Proceed to Checkout" value="Proceed to Checkout" /> <img src="images/paypal_types.jpg">
						
                      
            </form></div><div id="cfrightcolumn"><p style="margin-top:15px;"><a href="logout.php"><img src="images/logout.png"></a></p></div></div>
			 <script type="text/javascript">var frmvalidator  = new Validator("PaypalForm");
	   
	   frmvalidator.addValidation("checker","shouldselchk=on", "You must accept our release of liability and confirm that you are at least 18 years of age.");
	 

	   </script>
	   
			
			 
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
<?
}
else {
header( 'Location: https://www.cyclefolsom.com/member-tools/' ) ;
}?>