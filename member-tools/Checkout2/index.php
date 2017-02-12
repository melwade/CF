<!DOCTYPE HTML>
<?php include('header.php');
      include('paypal_config.php'); ?>
   <div class="span5">
            <!--Form containing item parameters and seller credentials needed for SetExpressCheckout Call-->
            <form class="form" action="paypal_ec_redirect.php" method="POST">
                <input type="hidden" name="PAYMENTREQUEST_0_AMT" value="15.00"></input>
      <input type="hidden" name="currencyCodeType" value="USD"></input>
      <input type="hidden" name="paymentType" value="Sale"></input>
	  
	  <br>Custom<br><input type="text" name="PAYMENTREQUEST_0_INVNUM" value="Cycle Folsom"></input>

        <br>Custom<br><input type="text" name="PAYMENTREQUEST_0_CUSTOM" value="Cycle Folsom"></input>


                        
                        <br><input type="Submit" alt="Proceed to Checkout" class="btn btn-primary btn-large" value="Proceed to Checkout" name="checkout"/>
                        
            </form>
   </div>
   
 
   

   <script type="text/javascript">
   window.paypalCheckoutReady = function () {
       paypal.checkout.setup('<?php echo($merchantID); ?>', {
           container: 'myContainer',
           environment: '<?php echo($env); ?>'
       });
   };
   </script>
   <script src="//www.paypalobjects.com/api/checkout.js" async></script>

<?php include('footer.php') ?>
