<?php
session_start(); // start up your PHP session! 
if ($_SESSION['isadmin']) {
//check if GET variable exists
if(isset($_GET['sortmethod']) && isset($_GET['sortorder'])) {
	$sortmethod=$_GET['sortmethod'];
	$sortorder=$_GET['sortorder'];
	
}
else
{$sortmethod="creation_date";
	$sortorder="DESC";}

include('connect.php');
?>
<!DOCTYPE html>
<html class="html">
 <head>
 <style>
 td.jtable {padding: 5px; font-size:14px;} /* or you can target individual cells */
  td.jtablered {padding: 5px; font-size:14px; color:#F00; font-style:italic;} /* or you can target individual cells */
th.jtable {padding: 5px; font-size:14px; color:#FFF; text-align:center !important;} /* or you can target individual cells */
th.jtable_bold {padding: 5px; font-size:14px; font-style:italic; font-weight:bold; color:#FFF; text-align:center !important;} /* or you can target individual cells */
</style>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.2.232.244"/>
  <title>Member List</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?272710960"/>
  <link href="css/simplePagination.css" type="text/css" rel="stylesheet"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?4059369144"/>
  <link rel="stylesheet" type="text/css" href="cf_style.css" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>
<script LANGUAGE="JavaScript">
function confirmSubmit()
{
var agree=confirm("Are you sure you wish to delete this member?");
if (agree)
	return true ;
else
	return false ;
}
// -->
</script>

<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery.simplePagination.js"></script>
<script type="text/javascript" src="js/message.js"></script>
<link rel="stylesheet" type="text/css" href="js/message_default.css">

<link rel="stylesheet" type="text/css" href="styles/style.css">
       <style>
#pager {
    display: none;
}
</style>
<script>
$(window).load(function () {
    $('#pager').show();
});
</script>

   </head>
 <body>
 <? // HERE WE CHECK IF THE DELETE PROCESS WAS SUCCESSFUL
$coupon_code_var=$_GET['code'];

if($coupon_code_var=="member_deleted"){
?><script>dhtmlx.alert("The user was removed successfully.");</script><? 
}
if($coupon_code_var=="member_not_deleted"){
?><script>dhtmlx.alert("There was an error processing your request.");</script><? 
}

include('CF_header.php'); ?>

      <h1 class="Heading-1" style="margin-bottom:25px;">Member List</h1><div id="pager"><div id="pagination"></div>
	  <?
		include ('connect.php');
		
      $result = mysql_query("SELECT id, fname, lname, email_add, approval_date, coupon_user, creation_date, reminder_date, payment_status FROM tblUserData ORDER BY $sortmethod $sortorder");

		echo "<table id='tcontent' bgcolor='#a20000' border='1' width='925'><tr bgcolor='#a20000'><th ".($sortmethod=="creation_date" ? "class='jtable_bold'" : "class='jtable'").">Date Added</th><th ".($sortmethod=="fname" ? "class='jtable_bold'" : "class='jtable'").">FirstName</th><th ".($sortmethod=="lname" ? "class='jtable_bold'" : "class='jtable'").">Last Name</th><th ".($sortmethod=="email_add" ? "class='jtable_bold'" : "class='jtable'").">Email</th><th ".($sortmethod=="payment_status" ? "class='jtable_bold'" : "class='jtable'").">Payment Status</th><th ".($sortmethod=="approval_date" ? "class='jtable_bold'" : "class='jtable'").">Meetup Approved</th><th ".($sortmethod=="coupon_user" ? "class='jtable_bold'" : "class='jtable'").">Coupon User?</th><th ".($sortmethod=="reminder_date" ? "class='jtable_bold'" : "class='jtable'").">Reminder Added</th><th class='jtable'>Action</th></tr>";

		echo "<tr><td align='center'>";
		if($sortmethod=="creation_date")
			{ 
			if($sortorder=="DESC"){
			echo "<a href='report_all_users.php?sortmethod=creation_date&sortorder=ASC'><img src='images/arrow_up.png' width='15'></a></td>";}
			else 
				{
				echo "<a href='report_all_users.php?sortmethod=creation_date&sortorder=DESC'><img src='images/arrow_down.png' width='15'></a></td>";
				}
				}
		
		
			else {
				echo "<a href='report_all_users.php?sortmethod=creation_date&sortorder=ASC'><img src='images/arrow_up.png' width='15'></a>&nbsp;&nbsp;&nbsp;<a href='report_all_users.php?sortmethod=creation_date&sortorder=DESC'><img src='images/arrow_down.png' width='15'></a></td>";	
				}
		
		echo "<td align='center'>";
		if($sortmethod=="fname")
			{ 
			if($sortorder=="DESC"){
			echo "<a href='report_all_users.php?sortmethod=fname&sortorder=ASC'><img src='images/arrow_up.png' width='15'></a></td>";}
			else 
				{
				echo "<a href='report_all_users.php?sortmethod=fname&sortorder=DESC'><img src='images/arrow_down.png' width='15'></a></td>";
				}
				}
		
		
			else {
				echo "<a href='report_all_users.php?sortmethod=fname&sortorder=ASC'><img src='images/arrow_up.png' width='15'></a>&nbsp;&nbsp;&nbsp;<a href='report_all_users.php?sortmethod=fname&sortorder=DESC'><img src='images/arrow_down.png' width='15'></a></td>";	
				}

		echo "<td align='center'>";
		if($sortmethod=="lname")
			{ 
			if($sortorder=="DESC"){
			echo "<a href='report_all_users.php?sortmethod=lname&sortorder=ASC'><img src='images/arrow_up.png' width='15'></a></td>";}
			else 
				{
				echo "<a href='report_all_users.php?sortmethod=lname&sortorder=DESC'><img src='images/arrow_down.png' width='15'></a></td>";
				}
				}
		
		
			else {
				echo "<a href='report_all_users.php?sortmethod=lname&sortorder=ASC'><img src='images/arrow_up.png' width='15'></a>&nbsp;&nbsp;&nbsp;<a href='report_all_users.php?sortmethod=lname&sortorder=DESC'><img src='images/arrow_down.png' width='15'></a></td>";	
				}

		echo "<td align='center'>";
		if($sortmethod=="email_add")
			{ 
			if($sortorder=="DESC"){
			echo "<a href='report_all_users.php?sortmethod=email_add&sortorder=ASC'><img src='images/arrow_up.png' width='15'></a></td>";}
			else 
				{
				echo "<a href='report_all_users.php?sortmethod=email_add&sortorder=DESC'><img src='images/arrow_down.png' width='15'></a></td>";
				}
				}
		
		
			else {
				echo "<a href='report_all_users.php?sortmethod=email_add&sortorder=ASC'><img src='images/arrow_up.png' width='15'></a>&nbsp;&nbsp;&nbsp;<a href='report_all_users.php?sortmethod=email_add&sortorder=DESC'><img src='images/arrow_down.png' width='15'></a></td>";	
				}

		echo "<td align='center'>";
		if($sortmethod=="payment_status")
			{ 
			if($sortorder=="DESC"){
			echo "<a href='report_all_users.php?sortmethod=payment_status&sortorder=ASC'><img src='images/arrow_up.png' width='15'></a></td>";}
			else 
				{
				echo "<a href='report_all_users.php?sortmethod=payment_status&sortorder=DESC'><img src='images/arrow_down.png' width='15'></a></td>";
				}
				}
		
		
			else {
				echo "<a href='report_all_users.php?sortmethod=payment_status&sortorder=ASC'><img src='images/arrow_up.png' width='15'></a>&nbsp;&nbsp;&nbsp;<a href='report_all_users.php?sortmethod=payment_status&sortorder=DESC'><img src='images/arrow_down.png' width='15'></a></td>";	
				}

		echo "<td align='center'>";
		if($sortmethod=="approval_date")
			{ 
			if($sortorder=="DESC"){
			echo "<a href='report_all_users.php?sortmethod=approval_date&sortorder=ASC'><img src='images/arrow_up.png' width='15'></a></td>";}
			else 
				{
				echo "<a href='report_all_users.php?sortmethod=approval_date&sortorder=DESC'><img src='images/arrow_down.png' width='15'></a></td>";
				}
				}
		
		
			else {
				echo "<a href='report_all_users.php?sortmethod=approval_date&sortorder=ASC'><img src='images/arrow_up.png' width='15'></a>&nbsp;&nbsp;&nbsp;<a href='report_all_users.php?sortmethod=approval_date&sortorder=DESC'><img src='images/arrow_down.png' width='15'></a></td>";	
				}

		echo "<td align='center'>";
		if($sortmethod=="coupon_user")
			{ 
			if($sortorder=="DESC"){
			echo "<a href='report_all_users.php?sortmethod=coupon_user&sortorder=ASC'><img src='images/arrow_up.png' width='15'></a></td>";}
			else 
				{
				echo "<a href='report_all_users.php?sortmethod=coupon_user&sortorder=DESC'><img src='images/arrow_down.png' width='15'></a></td>";
				}
				}
		
		
			else {
				echo "<a href='report_all_users.php?sortmethod=coupon_user&sortorder=ASC'><img src='images/arrow_up.png' width='15'></a>&nbsp;&nbsp;&nbsp;<a href='report_all_users.php?sortmethod=coupon_user&sortorder=DESC'><img src='images/arrow_down.png' width='15'></a></td>";	
				}

		echo "<td align='center'>";
		if($sortmethod=="reminder_date")
			{ 
			if($sortorder=="DESC"){
			echo "<a href='report_all_users.php?sortmethod=reminder_date&sortorder=ASC'><img src='images/arrow_up.png' width='15'></a></td>";}
			else 
				{
				echo "<a href='report_all_users.php?sortmethod=reminder_date&sortorder=DESC'><img src='images/arrow_down.png' width='15'></a></td>";
				}
				}
		
		
			else {
				echo "<a href='report_all_users.php?sortmethod=reminder_date&sortorder=ASC'><img src='images/arrow_up.png' width='15'></a>&nbsp;&nbsp;&nbsp;<a href='report_all_users.php?sortmethod=reminder_date&sortorder=DESC'><img src='images/arrow_down.png' width='15'></a></td>";	
				}
echo"<td>&nbsp;</td></tr>";
		
		while ($row = mysql_fetch_array($result)) {

			if($bgcolor=='#f4f4e9'){$bgcolor='#e0dfc9';}
			else{$bgcolor='#f4f4e9';}
			
			// ELSE unpaid and less than 15 days or pending or no waiver status
						echo "<tr class='paginate' bgcolor=$bgcolor >";
			echo "<td class='jtable' align='center' width='60'>".date('n/j/y', (strtotime($row['creation_date'])))."</td>";
			echo "<td class='jtable' align='center' width='120'>$row[fname]</td>";
			echo "<td class='jtable' align='center' width='120'>$row[lname]</td>";
			echo "<td class='jtable' align='center' width='230'>$row[email_add]</td>";
			echo "<td class='jtable' align='center' width='80'>$row[payment_status]</td>";
			echo "<td class='jtable' align='center' width='80'>";
			if ($row['approval_date']=='') {
				echo "&nbsp;</td>"; }
				else { echo date('n/j/y', (strtotime($row['approval_date'])))."</td>"; }
			echo "<td class='jtable' align='center' width='70'>$row[coupon_user]</td>";
			echo "<td class='jtable' align='center' width='80'>";
			if ($row['reminder_date']=='') {
				echo "&nbsp;</td>"; }
				else { echo date('n/j/y', (strtotime($row['reminder_date'])))."</td>"; }
			echo "<td width='80' align='center'> <a href='edit_member.php?id=$row[id]'><img alt='Edit Item' width='18px' title='Edit User' src='images/edit-icon.png'></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick='return confirmSubmit()' href='delete_member_all_reports.php?id=$row[id]'><img alt='Delete Item' title='Delete User' width='18px' src='images/delete-icon.png'></a></td>";
			
			
			echo "</tr>";}
        
		echo "</tbody></table>";
		
     ?>
     
     </div>
      <script>/*$(window).load(function () {

            jQuery(function($) {
                var items = $("#tcontent tbody tr");

                var numItems = items.length;
                var perPage = 15;

                // only show the first 10 (or "first per_page") items initially
                items.slice(perPage).hide();

                // now setup pagination
                $("#pagination").pagination({
                    items: numItems,
                    itemsOnPage: perPage,
					displayedPages: 10,
                    cssStyle: "light-theme",
                    onPageClick: function(pageNumber) { // this is where the magic happens
                        // someone changed page, lets hide/show trs appropriately
                        var showFrom = perPage * (pageNumber - 1);
                        var showTo = showFrom + perPage;

                        items.hide() // first hide everything, then show for the new page
                             .slice(showFrom, showTo).show();
                    }
                });
				
				
				
            });
			    
});*/
        </script>
         <script>
            jQuery(function($) {
                // i've got a little refreshed notice in there - remove it after a second
               
                var items = $(".paginate");

                var numItems = items.length;
                var perPage = 15;

                // only show the first 2 (or "first per_page") items initially
                items.slice(perPage).hide();

                // now setup pagination
                $("#pagination").pagination({
                    items: numItems,
                    itemsOnPage: perPage,
                    cssStyle: "light-theme",
                    onPageClick: function(pageNumber) { // this is where the magic happens
                        // someone changed page, lets hide/show trs appropriately
                        var showFrom = perPage * (pageNumber - 1);
                        var showTo = showFrom + perPage;

                        items.hide() // first hide everything, then show for the new page
                             .slice(showFrom, showTo).show();
                    }
                });

                // next we'll create a function to check the url fragment and change page if necessary
                // we're storing this function in a variable so we can reuse it
                var checkFragment = function() {
                    // if there's no hash, make sure we go to page 1
                    var hash = window.location.hash || "#page-1";

                    // we'll use regex to check the hash string as follows:
                    // ^            strictly from the beginning of the string (i.e. succeed "#page-3" but fail "hi!#page-3")
                    // #page-       exactly match the text "#page-"
                    // (            start a matching group (so we can access what's in these parentheses on their own)
                    //      \d      any digit ([0-9])
                    //      +       one or more of the previous literal (one or more digits)
                    // )            end the matching group
                    // $            we should now be at the end of the string - if not, then don't match (i.e. fail "#page-3hi!")
                    hash = hash.match(/^#page-(\d+)$/);

                    if(hash)
                        // the selectPage function is one of many described in the documentation
                        // we've captured the page number in a regex group: (\d+)
                        $("#pagination").pagination("selectPage", parseInt(hash[1]));
                };

                // we'll call this function whenever the back or forward buttons are pressed
                // thanks to mike o'connor for highlighting the need for this
                $(window).bind("popstate", checkFragment);
                
                // and we'll also call it to check right now!
                checkFragment();
            });
        </script>
     
    <div style="margin-top:15px;"><a href='reports.php'>Back to Reports Page</a></div>
     <div style="margin-top:15px;"><a href='index.php'>Back to Admin Page</a></div>
     </div>
     <a class="anchor_item grpelem" id="thequestion"></a>
    
    </div>
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