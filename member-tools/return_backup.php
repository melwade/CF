<? session_start();
include('paypal_config.php'); 
include('connect.php'); 
?>
<!DOCTYPE html>
<html class="html">
 <head>
  <style>
  .pagedesc {
	font-size: 17px;
	color: #232323;
	font-family: source-sans-pro, sans-serif;
	line-height: 1.4;

	 }
	 .txtboldred{
	font-weight:bold;
	font-size: 16px;
	color:#A10000;
	
}
.txtred {

	font-size: 16px;
	color:#A10000;

}
	 </style>
 
<link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
      
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.2.232.244"/>
  <title>PayPal Payment Complete</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?272710960"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?4059369144"/>
  <link rel="stylesheet" type="text/css" href="cf_style.css" id="pagesheet"/>
  <!-- Other scripts -->

  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>

  

<link rel="stylesheet" type="text/css" href="message_default.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
 

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
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu Main-Menu-Items clearfix colelem" id="u15474" href="/index.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u15475-4"><!-- content --><p>Home</p></div></a>
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
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u15377" href="/our-mission.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u15378-4"><!-- content --><p>Our Mission</p></div></a>
         </li>
         <li class="MenuItemContainer clearfix colelem" id="u15367"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u15370" href="/our-groups.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u15373-4"><!-- content --><p>Our Groups</p></div></a>
         </li>
         <li class="MenuItemContainer clearfix colelem" id="u15381"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u15382" href="/our-ride-leaders.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u15384-4"><!-- content --><p>Our Ride Leaders</p></div></a>
         </li>
         <li class="MenuItemContainer clearfix colelem" id="u15360"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u15361" href="/our-history.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u15362-4"><!-- content --><p>Our History</p></div></a>
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
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu Sub-Menu-Items clearfix grpelem" id="u15437" href="/membership.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap Sub-Menu-Item clearfix grpelem" id="u15439-4"><!-- content --><p>Step 1: Overview</p></div></a>
         </li>
         <li class="MenuItemContainer clearfix colelem" id="u15441"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u15442" href="/join.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u15444-4"><!-- content --><p>Step 2: Join, Upgrade, or Renew</p></div></a>
         </li>
         <li class="MenuItemContainer clearfix colelem" id="u15448"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u15451" href="/meetup.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u15452-4"><!-- content --><p>Step 3: How to Join Our Meetup</p></div></a>
         </li>
         <li class="MenuItemContainer clearfix colelem" id="u15427"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u15430" href="/guest.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u15433-4"><!-- content --><p>Invited Guest Liability Waiver</p></div></a>
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
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu Sub-Menu-Items clearfix grpelem" id="u15692" href="/safety-guidelines.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap Sub-Menu-Item clearfix grpelem" id="u15693-4"><!-- content --><p>Safety Guidelines</p></div></a>
         </li>
         <li class="MenuItemContainer clearfix colelem" id="u15410"><!-- horizontal box -->
		 <!-- NOTE PUT MuseMenuActive as class to highlight it -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu Sub-Menu-Items clearfix grpelem" id="u15413" href="/general-faq-s.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap Sub-Menu-Item clearfix grpelem" id="u15415-4"><!-- content --><p>General FAQ's</p></div></a>
         </li>
         <li class="MenuItemContainer clearfix colelem" id="u15417"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu Sub-Menu-Items clearfix grpelem" id="u15418" href="/uploading-routes-to-garmins.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap Sub-Menu-Item clearfix grpelem" id="u15419-4"><!-- content --><p>Uploading Routes to Garmins</p></div></a>
         </li>
        </ul>
       </div>
      </li>
      <li class="MenuItemContainer clearfix grpelem" id="u15459"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu Main-Menu-Items clearfix colelem" id="u15460" href="/apparel.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u15461-4"><!-- content --><p>Apparel</p></div></a>
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
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu Sub-Menu-Items clearfix grpelem" id="u15498" href="/cf-video-library.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap Sub-Menu-Item clearfix grpelem" id="u15499-4"><!-- content --><p>CF Video Library</p></div></a>
         </li>
         <li class="MenuItemContainer clearfix colelem" id="u15490"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu Sub-Menu-Items clearfix grpelem" id="u15491" href="/instructional-videos.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap Sub-Menu-Item clearfix grpelem" id="u15492-4"><!-- content --><p>Instructional Videos</p></div></a>
         </li>
         <li class="MenuItemContainer clearfix colelem" id="u15483"><!-- horizontal box -->
          <a class="nonblock nontext MenuItem MenuItemWithSubMenu Sub-Menu-Items clearfix grpelem" id="u15484" href="/reading-library.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap Sub-Menu-Item clearfix grpelem" id="u15487-4"><!-- content --><p>Reading Library</p></div></a>
         </li>
        </ul>
       </div>
      </li>
      <li class="MenuItemContainer clearfix grpelem" id="u15466"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu Main-Menu-Items clearfix colelem" id="u15467" href="/contact.html"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u15470-4"><!-- content --><p>Contact</p></div></a>
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
      
      <?php 
	/*
	* Call to GetExpressCheckoutDetails and DoExpressCheckoutPayment APIs
	*/

	require_once ("paypal_functions.php"); 

	/*
	* The paymentAmount is the total value of the shopping cart(in real apps), here it was set 
    * in paypalfunctions.php in a session variable 
	*/
	
	$finalPaymentAmount =  $_SESSION["Payment_Amount"];
	if(!isset($_SESSION['payer_id']))
	{
		$_SESSION['payer_id'] =	$_GET['PayerID'];
	}


	// Check to see if the Request object contains a variable named 'token'	or Session object contains a variable named TOKEN 
	$token = "";
	
	if (isset($_REQUEST['token']))
	{
		$token = $_REQUEST['token'];
	} else if(isset($_SESSION['TOKEN']))
	{
		$token = $_SESSION['TOKEN'];
	}
	
	// If the Request object contains the variable 'token' then it means that the user is coming from PayPal site.	
	if ( $token != "" )
	{
		/*
		* Calls the GetExpressCheckoutDetails API call
		*/
		$resArrayGetExpressCheckout = GetShippingDetails( $token );
		$ackGetExpressCheckout = strtoupper($resArrayGetExpressCheckout["ACK"]);	 
		if( $ackGetExpressCheckout == "SUCCESS" || $ackGetExpressCheckout == "SUCESSWITHWARNING") 
		{
			/*
			* The information that is returned by the GetExpressCheckoutDetails call should be integrated by the partner into his Order Review 
			* page		
			*/
			$account_id 		= $resArrayGetExpressCheckout["PAYMENTREQUEST_0_CUSTOM"]; // ' User Account ID
			$mylinky 		    = $resArrayGetExpressCheckout["PAYMENTREQUEST_0_INVNUM"]; // ' Email address of payer.
			$itemde 			= $resArrayGetExpressCheckout["L_PAYMENTREQUEST_0_NAME0"]; // ' Email address of payer.
			$email 				= $resArrayGetExpressCheckout["EMAIL"]; // ' Email address of payer.
			$payerId 			= $resArrayGetExpressCheckout["PAYERID"]; // ' Unique PayPal customer account identification number.
			$payerStatus		= $resArrayGetExpressCheckout["PAYERSTATUS"]; // ' Status of payer. Character length and limitations: 10 single-byte alphabetic characters.
			$firstName			= $resArrayGetExpressCheckout["FIRSTNAME"]; // ' Payer's first name.
			$lastName			= $resArrayGetExpressCheckout["LASTNAME"]; // ' Payer's last name.
			$cntryCode			= $resArrayGetExpressCheckout["COUNTRYCODE"]; // ' Payer's country of residence in the form of ISO standard 3166 two-character country codes.
			$shipToName			= $resArrayGetExpressCheckout["PAYMENTREQUEST_0_SHIPTONAME"]; // ' Person's name associated with this address.
			$shipToStreet		= $resArrayGetExpressCheckout["PAYMENTREQUEST_0_SHIPTOSTREET"]; // ' First street address.
			$shipToCity			= $resArrayGetExpressCheckout["PAYMENTREQUEST_0_SHIPTOCITY"]; // ' Name of city.
			$shipToState		= $resArrayGetExpressCheckout["PAYMENTREQUEST_0_SHIPTOSTATE"]; // ' State or province
			$shipToCntryCode	= $resArrayGetExpressCheckout["PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE"]; // ' Country code. 
			$shipToZip			= $resArrayGetExpressCheckout["PAYMENTREQUEST_0_SHIPTOZIP"]; // ' U.S. Zip code or other country-specific postal code.
			$addressStatus 		= $resArrayGetExpressCheckout["ADDRESSSTATUS"]; // ' Status of street address on file with PayPal 
			$totalAmt   		= $resArrayGetExpressCheckout["PAYMENTREQUEST_0_AMT"]; // ' Total Amount to be paid by buyer
			$currencyCode       = $resArrayGetExpressCheckout["CURRENCYCODE"]; // 'Currency being used 
			$shippingAmt        = $resArrayGetExpressCheckout["PAYMENTREQUEST_0_SHIPPINGAMT"]; // 'Shipping amount 
			/*
			* Add check here to verify if the payment amount stored in session is the same as the one returned from GetExpressCheckoutDetails API call
			* Checks whether the session has been compromised
			*/
			if($_SESSION["Payment_Amount"] != $totalAmt || $_SESSION["currencyCodeType"] != $currencyCode)
			exit("Parameters in session do not match those in PayPal API calls");
		} 
		else  
		{
			//Display a user friendly Error on the page using any of the following error information returned by PayPal
			$ErrorCode = urldecode($resArrayGetExpressCheckout["L_ERRORCODE0"]);
			$ErrorShortMsg = urldecode($resArrayGetExpressCheckout["L_SHORTMESSAGE0"]);
			$ErrorLongMsg = urldecode($resArrayGetExpressCheckout["L_LONGMESSAGE0"]);
			$ErrorSeverityCode = urldecode($resArrayGetExpressCheckout["L_SEVERITYCODE0"]);

			echo "GetExpressCheckoutDetails API call failed. ";
			echo "Detailed Error Message: " . $ErrorLongMsg;
			echo "Short Error Message: " . $ErrorShortMsg;
			echo "Error Code: " . $ErrorCode;
			echo "Error Severity Code: " . $ErrorSeverityCode;
		}
	}
	/* Review block start */
	
	if(!USERACTION_FLAG && !isset($_SESSION['EXPRESS_MARK'])){
	if(isset($_POST['shipping_method']))
		$new_shipping = $_POST['shipping_method']; //need to change this value, just for testing
		if($shippingAmt > 0){
			$finalPaymentAmount = ($totalAmt + $new_shipping) - $_SESSION['shippingAmt'];
			$_SESSION['shippingAmt'] = $new_shipping;
		}
	}
	
	/* Review block end */
	/*
	* Calls the DoExpressCheckoutPayment API call
	*/
	//$resArrayDoExpressCheckout = ConfirmPayment ( $newTotalAmt );
	$resArrayDoExpressCheckout = ConfirmPayment ( $finalPaymentAmount );
	$ackDoExpressCheckout = strtoupper($resArrayDoExpressCheckout["ACK"]);
	
	//session_unset();   // free all session variables
	//session_destroy(); //destroy session
	if( $ackDoExpressCheckout == "SUCCESS" || $ackDoExpressCheckout == "SUCCESSWITHWARNING" )
	{
		$transactionId		= $resArrayDoExpressCheckout["PAYMENTINFO_0_TRANSACTIONID"]; // ' Unique transaction ID of the payment. Note:  If the PaymentAction of the request was Authorization or Order, this value is your AuthorizationID for use with the Authorization & Capture APIs. 
		$transactionType 	= $resArrayDoExpressCheckout["PAYMENTINFO_0_TRANSACTIONTYPE"]; //' The type of transaction Possible values: l  cart l  express-checkout 
		$paymentType		= $resArrayDoExpressCheckout["PAYMENTINFO_0_PAYMENTTYPE"];  //' Indicates whether the payment is instant or delayed. Possible values: l  none l  echeck l  instant 
		$orderTime 			= $resArrayDoExpressCheckout["PAYMENTINFO_0_ORDERTIME"];  //' Time/date stamp of payment
		$amt				= $resArrayDoExpressCheckout["PAYMENTINFO_0_AMT"];  //' The final amount charged, including any shipping and taxes from your Merchant Profile.
		$currencyCode		= $resArrayDoExpressCheckout["PAYMENTINFO_0_CURRENCYCODE"];  //' A three-character currency code for one of the currencies listed in PayPay-Supported Transactional Currencies. Default: USD. 
		/*
		* Status of the payment: 
		* Completed: The payment has been completed, and the funds have been added successfully to your account balance.
		* Pending: The payment is pending. See the PendingReason element for more information. 
		*/
		
		$paymentStatus	= $resArrayDoExpressCheckout["PAYMENTINFO_0_PAYMENTSTATUS"]; 

		/*
		* The reason the payment is pending 
		*/
		$pendingReason	= $resArrayDoExpressCheckout["PAYMENTINFO_0_PENDINGREASON"];  

		/*
		* The reason for a reversal if TransactionType is reversal 
		*/
		$reasonCode		= $resArrayDoExpressCheckout["PAYMENTINFO_0_REASONCODE"];   
		?>
			<?
			// Register $myusername, $mypassword 
			$_SESSION['myusername']=true; 
			//$_SESSION['account_id']=$account_id; 
			$account_id=$_SESSION['account_id'];
			// Lookup member info
			$query = "SELECT fname, lname, email_add, meetup_username, approval_date from tblUserData WHERE account_id = '$account_id'";
			$tRow = mysql_fetch_array(mysql_query($query)); 
			$firstName = ($tRow['fname']);
			$lastName = ($tRow['lname']);
			$email_add = ($tRow['email_add']);
			$meetup_username = ($tRow['meetup_username']);
			$approval_date = ($tRow['approval_date']);
			
			//Send email to admin notifying of new user payment or renewal
			
			if ($approval_date==''){
				$subject = "PayPal Payment Processed - NEW CF Registration";				
				}
				else {
					
				$subject = "PayPal Payment Processed - CF Renewal";
				}
				
			$to = "info@cyclefolsom.com";

			$message = "
			<html>
			<head>
			<title>New Cycle Folsom Registration</title>
			</head>
			<body>
			<p><strong>A New Member Registration & Payment has been submitted. Please log in to the CF Registration System Admin Tools page and...</strong></p>
			<ul><li>Look up the member using the 'Pending Users' button, then click the 'Edit Member' button</li>
				<li>Confirm that payment is listed in the member’s payment info.</li>
				<li>Match up with related Meetup request on Meetup.com in Pending tab and Approve member.</li>
				<ul><li>Note: If Meetup request has not been received, stop here and wait for Meetup join request to be received.</li>
					<li>Be aware the Meetup profile names can sometimes be slightly different that member’s first and last name, so consider this during your review.</li></ul>
					<li>After approving member on <a href='http://meetup.com'>Meetup.com</a>, go back to Admin Tools page and enter date of Meetup approval.</li>
					<li>Mail Premium Membership Card</li>
					<li>Indicate how card was distributed using 'How Card Sent' pull-down menu</li>
					<li>Enter date card sent in 'Date Card Sent' field</li>
					<li>Save changes to member profile</li></ul>
			<p>User Information:</p>
			Name: $firstName $lastName<br>
			Email: $email_add<br>
			Meetup Username: $meetup_username<br>
			Status: Paid<br>
			Coupon User: No
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
			mail($to,$subject,$message,$headers);
			//End IF
			?>
    		 <h1 class="Heading-1" style="margin-bottom:30px;">PayPal Payment Complete</h1>
			 <p style="margin-bottom:15px;"><a href="print_receipt.php?txid=<? echo $transactionId; ?>" target="_blank"><img src="images/print_printer.png"> - Print Receipt</a></p>
      <span class="pagedesc">Your PayPal payment has been successfully processed.  You will receive an email with your payment details.  Please <a href='print_receipt.php?txid=<? echo $transactionId; ?>' target="_blank">PRINT</a> this page as receipt for your payment.   You can now <a href="logout.php">logout</a>, <a href="index.php">manage your member profile</a>, visit the <a href="/membership-tools.html">membership tools</a> page, or return to the <a href="/index.html">Cycle Folsom home page</a>.</span>
			
    		<div class="hero-unit" style="padding:20px; margin-top:25px;">
    			    			
				<table width="500"><tr><td width="150" align="right">Member:</td><td>&nbsp;<?php echo($firstName); ?>
    				<?php echo($lastName);?></td></tr>
                    <tr><td align="right">Transaction ID:</td><td>&nbsp;<?php  echo($transactionId);?></td></tr>
                    <tr><td align="right">Payment Amount:</td><td>&nbsp;$15.00</td></tr>
                    <tr><td align="right">Payment Status:</td><td>&nbsp;<?php  echo($paymentStatus);?></td></tr>
                    <tr><td align="right">Payment Type:</td><td>&nbsp;<?php  echo($paymentType);?></td></tr></table>
                    
    			</div>
    		<div><span class="txtboldred">New Members:</span>  <span class="txtred">ONE FINAL STEP REQUIRED</span><BR><span class="txtred">Request to Join Our Meetup Group</span>
            <P style="margin-top:10px;">We use Meetup.com to manage our calendar of events and allow members to to RSVP for rides. </P>
            <p style="margin-top:10px;"><span style="font-weight:bold;">If you are NOT yet a member of Meetup.com</span><br> Visit Meetup.com and sign up for free. Then, after you’re logged in to Meetup, visit our specific Meetup group at: <a href="http://www.Meetup.com/CycleFolsom">http://www.Meetup.com/CycleFolsom</a> and click the “Join Us” button on the right side of the navigation bar. Answer a few profile questions and submit your request. We’ll match up your Meetup request with the registration you just completed here and approve you as soon as possible (please allow up to 48 hours).</p>
            <p style="margin-top:10px;"><span style="font-weight:bold;">If you are already a member of Meetup.com</span><br>Log into Meetup, visit our specific Meetup group at: <a href="http://www.Meetup.com/CycleFolsom">http://www.Meetup.com/CycleFolsom</a> and click the “Join Us” button on the right side of the navigation bar. Answer a few profile questions and submit your request. We’ll match up your Meetup request with the registration you just completed here and approve you as soon as possible (please allow up to 48 hours).</p>
           
            </div>
    		
		<?php
		//Insert a payment record for this transaction tied to the user
		$current_date=date('m-d-Y');
		$query="INSERT IGNORE into tblPaymentData (payment_date, txn_id, payment_status, account_id, payment_type) VALUES ('$current_date', '$transactionId', '$paymentStatus', '$account_id', '$paymentType')";
		$result=mysql_query($query);
		//Set session variables that user is logged in and with their account id
		$_SESSION['myusername']=true; 
		$_SESSION['user_id']=$account_id; 
		
		//Update user to show payment status as paid and expiration date to 1 year out
		//Clear out meetup_removal_date, cancel_date
			$todays_date=date('Y-m-d');
			$query = "SELECT expiration_date from tblUserData WHERE account_id = '$account_id'";
			$rRow = mysql_fetch_array(mysql_query($query)); 
			$expiry_date = ($rRow['expiration_date']);
			if(empty($expiry_date)){ //empty value means a new registration so add 1 year to current date
			$new_expiry_date=date('Y-m-d', strtotime('+1 year')); }
			else {
				//check if expiry date is in the past.  If it is, add 1 year to todays date
				if($todays_date>$expiry_date) {//user renewed after expiration, so add 1 year to todays date
					$new_expiry_date=date('Y-m-d', strtotime('+1 year')); }
		
					else {//user is rewnewing for a future date, so add one year to future renewal date
					$newdate = strtotime ( '+1 year' , strtotime ( $expiry_date ) ) ;
					$new_expiry_date = date ( 'Y-m-j' , $newdate );	
					}
				}

			
		$payment_status="Paid";
		$query="update tblUserData set expiration_date='$new_expiry_date', coupon_user='No', reminder_date=NULL, payment_status='$payment_status', meetup_removal_date = NULL, cancel_date = NULL where account_id='$account_id'";
		$result=mysql_query($query);
		
		
	}
	else  
	{
		//Display a user friendly Error on the page using any of the following error information returned by PayPal

		$ErrorCode = urldecode($resArrayDoExpressCheckout["L_ERRORCODE0"]);
		$ErrorShortMsg = urldecode($resArrayDoExpressCheckout["L_SHORTMESSAGE0"]);
		$ErrorLongMsg = urldecode($resArrayDoExpressCheckout["L_LONGMESSAGE0"]);
		$ErrorSeverityCode = urldecode($resArrayDoExpressCheckout["L_SEVERITYCODE0"]);

		if($ErrorCode == 10486)  //Transaction could not be completed error because of Funding failure. Should redirect user to PayPal to manage their funds.
		{
			?>
			<!--<div class="hero-unit">
    			 Display the Transaction Details
    			<h4> There is a Funding Failure in your account. You can modify your funding sources to fix it and make purchase later. </h4>
    			Payment Status:-->
    			<?php  //echo($resArrayDoExpressCheckout["PAYMENTINFO_0_PAYMENTSTATUS"]);
						RedirectToPayPal ( $resArray["TOKEN"] );
    			?>
    			<!--<h3> Click <a href='https://www.sandbox.paypal.com/'>here </a> to go to PayPal site.</h3> <!--Change to live PayPal site for production-->
    		<!--</div>-->
			<?php
		}
		else
		{
			echo "DoExpressCheckout API call failed. ";
			echo "Detailed Error Message: " . $ErrorLongMsg;
			echo "Short Error Message: " . $ErrorShortMsg;
			echo "Error Code: " . $ErrorCode;
			echo "Error Severity Code: " . $ErrorSeverityCode;
		}
	}		
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
