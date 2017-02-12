<!DOCTYPE HTML>
<?php include('header.php');
      include('paypal_config.php'); ?>
   <div class="span5">
            <!--Form containing item parameters and seller credentials needed for SetExpressCheckout Call-->
            <form id="PaypalForm" name="PaypalForm" class="form" action="paypal_ec_redirect.php" method="POST">
                <input type="hidden" name="PAYMENTREQUEST_0_AMT" value="15.00"></input>
      <input type="hidden" name="currencyCodeType" value="USD"></input>
      <input type="hidden" name="paymentType" value="Sale"></input>
	  <input type="hidden" name="PAYMENTREQUEST_0_CUSTOM" value="1234567"></input>
                        <div id="myContainer"></div>
                        <br><input type="image" src="images/proceed_checkout.png" alt="Proceed to Checkout" value="Proceed to Checkout" name="checkout"/>
                        
            </form>
   </div>
   <div class="span2">
   </div>
   
   <div class="span1">
   </div>
   <!--Script to dynamically choose a seller and buyer account to render on index page-->
   <script type="text/javascript">
      function getRandomNumberInRange(min, max) {
          return Math.floor(Math.random() * (max - min) + min);
      }


      var buyerCredentials = [{"email":"ron@hogwarts.com", "password":"qwer1234"},
                        {"email":"sallyjones1234@gmail.com", "password":"p@ssword1234"},
                        {"email":"joe@boe.com", "password":"123456789"},
                        {"email":"hermione@hogwarts.com", "password":"123456789"},
                        {"email":"lunalovegood@hogwarts.com", "password":"123456789"},
                        {"email":"ginnyweasley@hogwarts.com", "password":"123456789"},
                        {"email":"bellaswan@awesome.com", "password":"qwer1234"},
                        {"email":"edwardcullen@gmail.com", "password":"qwer1234"}];
      var randomBuyer = getRandomNumberInRange(0,buyerCredentials.length);

      document.getElementById("buyer_email").value =buyerCredentials[randomBuyer].email;
      document.getElementById("buyer_password").value =buyerCredentials[randomBuyer].password;


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

<?php include('footer.php') ?>
