<?php
session_start(); // start up your PHP session! 
if ($_SESSION['isadmin']) {
?>
<!DOCTYPE html>
<html class="html">
<head>
	<!--<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>-->
    
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
    <meta name="generator" content="7.2.232.244"/>
    <title>Edit  Email Messages</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/site_global.css?272710960"/>
    <link rel="stylesheet" type="text/css" href="css/master_a-master.css?4059369144"/>
    <link rel="stylesheet" type="text/css" href="cf_style.css" id="pagesheet"/>
    <link rel="stylesheet" type="text/css" href="js/message_default.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
    <!-- Other scripts -->
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
    <script src="js/jquery.zclip.js"></script>
    <style>
		.z-clip-wrap { position: relative; display: inline-block; }
		td.jtable {padding: 5px;} /* or you can target individual cells */
		th.jtable {padding: 5px; color:#FFF} /* or you can target individual cells */


    </style>

</head>
<body>

	<? include('CF_header.php'); ?>
    <h1 class="Heading-1" style="margin-bottom:25px;">Edit Email Message</h1>
<?php
	include ('connect.php');
	$UID = $_GET[id];
	
	$query = mysql_query("SELECT * FROM tblEmailMessages WHERE id = $UID")
	or die(mysql_error());  
	
	while($row = mysql_fetch_array($query)) {
		$id = $row['id'];
		$name = $row['name'];
		$subject = $row['subject'];
		$message = $row['message'];
	};

?>    
    

    <form name="messageform" action="edit_message_action.php" method="post">
        <div style="clear: both;"></div>
        <div style="clear: both;"></div>
        <div class="_100">
        	<input type="hidden" name="id" value="<?php echo $id; ?>">
        	<p class="contactform"><label class="bold_label" id="name__label" for="name">Name</label><input autocomplete="off" class="contactform" id="name" name="name" type="text" value="<?php echo $name; ?>" readonly /></p>
        </div>  
        
        <div style="clear: both;"></div>
        
        <div class="_100">
        	<p class="contactform"><label class="bold_label" id="description_label" for="description">Message Suject</label><input autocomplete="off" class="contactform" id="subject" name="subject" type="text" value="<?php echo $subject; ?>"/></p></div>
        <div style="clear: both;"></div>
        
        <div class="_100">
        	<p class="contactform"><label class="bold_label" id="message_label" for="message">Message</label><textarea class="contactform" id="message" name="message" rows="10"><?php echo $message; ?></textarea>
            <script>CKEDITOR.replace( 'message' );</script>
            </p></div>
        <div style="clear: both;"></div>

        <br />&nbsp;</p>
        <!-- Save Buttons  --------------------  ----------------------------  -->
        
        <p>
        <input style="margin-bottom:10px;" type="image" name="Save Changes" id="Save Changes" src="images/save_changes.png"><br style="margin-top:25px;">
        <a href="index.php">
        <img src="images/exit_wo_save.png">
        </a>
        
        </p>
        </div>  <div style="clear: both;"></div>
    </form>



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

   </body>
</html>
<?
}
else {
header( 'Location: https://www.cyclefolsom.com/member-tools/' ) ;
}?>