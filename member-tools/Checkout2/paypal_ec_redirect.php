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
   include('header.php');
?>
   <div class="span4">
   </div>
   <div class="span5">
            <!--Form containing item parameters and seller credentials needed for SetExpressCheckout Call-->
            <form class="form" action="paypal_ec_mark.php" method="POST">
			 <input type="hidden" name="L_PAYMENTREQUEST_0_AMT" value="<?php echo $_POST["PAYMENTREQUEST_0_AMT"]; ?>">
               <div class="row-fluid">
                  <div class="span6 inner-span">
                          <table>
             			
                        					
					<tr><td colspan="2">
						<input id="paypal_payment_option" value="paypal_express" type="radio" name="paymentMethod" title="PayPal Express Checkout" class="radio" checked>
						<img src="https://fpdbs.paypal.com/dynamicimageweb?cmd=_dynamic-image&amp;buttontype=ecmark&amp;locale=en_US" alt="Acceptance Mark" class="v-middle">&nbsp;
						<a href="https://www.paypal.com/us/cgi-bin/webscr?cmd=xpt/Marketing/popup/OLCWhatIsPayPal-outside" onclick="javascript:window.open('https://www.paypal.com/us/cgi-bin/webscr?cmd=xpt/Marketing/popup/OLCWhatIsPayPal-outside','olcwhatispaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, ,left=0, top=0, width=400, height=350'); return false;">What is PayPal?</a>
					</td></tr>
					
					<tr><td>&nbsp;</td></tr>

                        </table>
                        <input type="submit" id="placeOrderBtn" class="btn btn-primary btn-large" name="PlaceOrder" value="Place Order" />
                  </div>
               </div>
            </form>
   </div>
   <div class="span3">
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
