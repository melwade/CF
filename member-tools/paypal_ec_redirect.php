<? session_start();
include('paypal_config.php'); 
?>
<!DOCTYPE html>
<html class="html">
 <head>
 
<link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
      
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.2.232.244"/>
  <title>PayPal Payment Complete</title>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
   </head>
 <body>     
      <?php

   require_once("paypal_functions.php");
  
   //Call to SetExpressCheckout using the shopping parameters collected from the shopping form on index.php and few from config.php 

   $returnURL = RETURN_URL;
   $cancelURL = CANCEL_URL; 
   
   if(isset($_POST["PAYMENTREQUEST_0_ITEMAMT"]))
		$_POST["L_PAYMENTREQUEST_0_AMT0"]=$_POST["PAYMENTREQUEST_0_ITEMAMT"];
  
   if(!isset($_POST['Confirm']) && isset($_POST['checkout'])){

		if($_REQUEST["checkout"] || isset($_SESSION['checkout'])) {
			$_SESSION['checkout'] = $_POST['checkout'];
		}
	$_SESSION['post_value'] = $_POST;
	
	//Assign the Return and Cancel to the Session object for ExpressCheckout Mark
	$returnURL = RETURN_URL_MARK;
	$_SESSION['post_value']['RETURN_URL'] = $returnURL;
	$_SESSION['post_value']['CANCEL_URL'] = $cancelURL;
	$_SESSION['EXPRESS_MARK'] = 'ECMark';
 //  include('header.php');
?>
  
  
            <form id="PaypalForm" class="form" action="paypal_ec_mark.php" method="POST">
			 <input type="hidden" name="L_PAYMENTREQUEST_0_AMT" value="<?php echo $_POST["PAYMENTREQUEST_0_AMT"]; ?>">
                 
						<input id="paypal_payment_option" value="paypal_express" type="hidden" name="paymentMethod" title="PayPal Express Checkout" class="radio" checked>
				
                        <br><input type="image" id="placeOrderBtn" src="images/clear_paypal.png" alt="Proceed to Checkout" value="Proceed to Checkout" name="PlaceOrder" value="Place Order"/> 
					  
						<? //<input type="submit" id="placeOrderBtn" class="btn btn-primary btn-large" name="PlaceOrder" value="Place Order" /> ?>
               
            </form>
   </div>
  
    <script src="//www.paypalobjects.com/api/checkout.js" async></script>
      <script type="text/javascript">
      window.paypalCheckoutReady = function () {
          paypal.checkout.setup('<?php echo($merchantID); ?>', {
              button: 'placeOrderBtn',
              environment: '<?php echo($env); ?>',
              condition: function () {
                      return document.getElementById('paypal_payment_option').checked === true;
                  }
          });
      };
      </script>
   <?php
   } else {

   $resArray = CallShortcutExpressCheckout ($_POST, $returnURL, $cancelURL);
   $ack = strtoupper($resArray["ACK"]);
   if($ack=="SUCCESS" || $ack=="SUCCESSWITHWARNING")  //if SetExpressCheckout API call is successful
   {
		RedirectToPayPal ( $resArray["TOKEN"] );
   } 
   else  
   {
   	//Display a user friendly Error on the page using any of the following error information returned by PayPal
   	$ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
   	$ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
   	$ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
   	$ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);
   	
   	echo "SetExpressCheckout API call failed. ";
   	echo "Detailed Error Message: " . $ErrorLongMsg;
   	echo "Short Error Message: " . $ErrorShortMsg;
   	echo "Error Code: " . $ErrorCode;
   	echo "Error Severity Code: " . $ErrorSeverityCode;
   }
   }
   
?>

 
 <script>
 $(document).ready(function(){

document.getElementById('PaypalForm').submit();
});
 </script>	 	   
 </body>