<?	  
session_start();
//If there's an active session, continue with page load.  If not, redirect
if ($_SESSION['myusername'] ) {  ?>
<!DOCTYPE html>
<html class="html">
 <head>
 

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.2.232.244"/>
  <title>CF Member Lookup</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?272710960"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?4059369144"/>
  <link rel="stylesheet" type="text/css" href="cf_style.css" id="pagesheet"/>
  <!-- Other scripts -->

  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>
<script type="text/javascript" src='message.js'></script>



<link rel="stylesheet" type="text/css" href="message_default.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
 <link rel="stylesheet" type="text/css" href="member_tools_style.css" />
<style>

td.jtable {padding: 5px; font-size:14px;} /* or you can target individual cells */
th.jtable {padding: 5px; font-size:14px; text-align:center !important;} /* or you can target individual cells */
body{ font-family:Arial, Helvetica, sans-serif; }
*{ margin:0;padding:0; }
#container {width: 600px; }
a { color:#DF3D82; text-decoration:none }
a:hover { color:#DF3D82; text-decoration:underline; }
ul.update { list-style:none;font-size:1.1em; margin-top:10px }
ul.update li{ height:30px; border-bottom:#dedede solid 1px; text-align:left;}
ul.update li:first-child{ border-top:#dedede solid 1px; height:30px; text-align:left; }
#flash { margin-top:20px; text-align:left; }
#searchresults { text-align:left; margin-top:20px; display:none; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000; }
.word { font-weight:bold; color:#000000; }
#search_box { padding:4px; border:solid 1px #666666; width:300px; height:30px; font-size:18px;-moz-border-radius: 6px;-webkit-border-radius: 6px; }
.search_button { border:#000000 solid 1px; padding: 9px; color:#000; font-weight:bold; font-size:16px;-moz-border-radius: 6px;-webkit-border-radius: 6px; }
.found { font-weight: bold; font-style: italic; color: #ff0000; }
h2 { margin-right: 70px; }
</style> 
  <style>
 a.nav:link {color: #FFF; text-decoration: none; }
a.nav:visited {color: #FFF; text-decoration: none; }
a.nav:hover {color: #FFF; text-decoration: none; }
a.nav:active {color: #FFF; text-decoration: none; }
 
</style>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
 <script type="text/javascript">
 
$(function() {
 
    $(".search_button").click(function() {
		$(".search_button").attr('disabled',true);
        // getting the value that user typed
        var searchString    = $("#search_box").val();
        // forming the queryString
        var data            = 'search='+ searchString;
         
        // if searchString is not empty
        if(searchString) {
            // ajax call
            $.ajax({
                type: "POST",
                url: "do_search.php",
                data: data,
                beforeSend: function(html) { // this happens before actual call
                    $("#results").html(''); 
                    //$("#searchresults").fadeIn(8000);
                    $(".word").html(searchString);
               },
               success: function(html){ // this happens after we get results
                    $("#results").fadeIn(8000);
                    $("#results").append(html);
					$(".search_button").attr('disabled',false);
              }
            });    
        }
        return false;
    });
});
</script>


   </head>
 <? include('CF_header.php'); ?>
      <!-- content -->
      <h1 class="Heading-1" style="margin-bottom:30px;">Cycle Folsom Member Lookup</h1>
<div class="pagedesc">Enter the first or last name of the member you are searching for. </div>
			<div id="container">
<div style="margin-top:25px;">
<form method="post" action="do_search.php">
    <input type="text" name="search" id="search_box" class='search_box'/>
    <input type="submit" value="Search" class="search_button" /><br />
</form>
</div>      
<div>
 
<div id="searchresults">Search results :</div>
<div id="results" style="margin-top:20px;"></div></div>
<div style="margin-top:50px;"><a href="logout.php"><img src="images/logout.png"></a><p style="margin-top:25px;"><a href="/membership-tools.html"><img src="images/membership_tools.png"></a></p></div>


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
{header( 'Location: error.php?');}
}