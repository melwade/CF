<?	  
session_start(); ?>
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
                    $("#searchresults").show();
                    $(".word").html(searchString);
               },
               success: function(html){ // this happens after we get results
                    $("#results").show();
                    $("#results").append(html);
					$(".search_button").attr('disabled',false);
              }
            });    
        }
        return false;
    });
});
</script>
<style>
.messageboxhide{
display:none;
}



.messageboxok{

 width:auto;
 height:20px;
 margin-right:30px;
 border:1px solid #349534;
 background:#a10000;
 font-weight:bold;
 color:#ffffff;
}
.messageboxerror{
	text-align:center;
 float:left;
 height:90px;
 border:1px solid #CC0000;
 background:#a10000;
 font-weight:bold;
 color:#ffffff;
}
.pwtext {
	font-size: 12px;
	color: #a10000;
}
</style>

   </head>
 <body>

  <?
  include('CF_header.php');
  ?>
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
<ul id="results" class="update">
</ul>
 
</div>
</div>


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
