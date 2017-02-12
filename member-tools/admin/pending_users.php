<?php
session_start(); // start up your PHP session! 
if ($_SESSION['isadmin']) {
	//First thing we do is delete any users who have not paid within 30 days
	include('connect.php');
	mysql_query("DELETE FROM tblUserData WHERE creation_date < DATE_SUB(NOW(), INTERVAL 30 DAY) and payment_status = 'Unpaid'") or die(mysql_error());
	?>
	<!DOCTYPE html>
	<html class="html">
        <head>
			<style>
				td.jtable {padding: 5px; font-size:14px;} /* or you can target individual cells */
				td.jtablered {padding: 5px; font-size:14px; color:#F00; font-style:italic;} /* or you can target individual cells */
				th.jtable {padding: 5px; font-size:14px; color:#FFF; text-align:center !important;} /* or you can target individual cells */
            </style>
            <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
            <meta name="generator" content="7.2.232.244"/>
            <title>Pending Users</title>
            <!-- CSS -->
            <link rel="stylesheet" type="text/css" href="css/site_global.css?272710960"/>
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
				<script LANGUAGE="JavaScript">
				function confirmSubmit2()
				{
					var agree=confirm("Are you sure you wish to send an email reminder to this member?");
					if (agree)
						return true ;
					else
						return false ;
				}
				// -->
            </script>
            <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
            <script type="text/javascript" src="js/message.js"></script>
            <link rel="stylesheet" type="text/css" href="js/message_default.css">
            <link rel="stylesheet" type="text/css" href="styles/style.css">
		</head>
	    <body>
            <? // HERE WE CHECK IF THE COUPON CODE WAS PASSED AND ITS STATUS
				$coupon_code_var=$_GET['code'];
				
				if($coupon_code_var=="member_deleted"){
					?><script>dhtmlx.alert("The user was removed successfully.");</script><? 
				}
				if($coupon_code_var=="member_not_deleted"){
					?><script>dhtmlx.alert("There was an error processing your request.");</script><? 
				}
				if($coupon_code_var=="email_sent"){
					?><script>dhtmlx.alert("Email sent successfully.");</script><? 
				}
				if($coupon_code_var=="email_not_sent"){
					?><script>dhtmlx.alert("There was an error processing your request.");</script><? 
				}
            ?>
            <? include('CF_header.php'); ?>
            <h1 class="Heading-1" style="margin-bottom:25px;">Pending Users</h1>
            <?
            	include ('connect.php');
				$result = mysql_query("SELECT id, fname, lname, email_add, approval_date, coupon_user, creation_date, reminder_date, payment_status, card_sent_date FROM tblUserData WHERE membership_processed='0' AND (payment_status='Paid' OR payment_status='Pending') ORDER BY creation_date DESC");
                echo "<table bgcolor='#a20000' border='1' width='900'><tr bgcolor='#a20000'><th class='jtable'>Date Added</th><th class='jtable'>Name</th><th class='jtable'>Email</th><th class='jtable'>Payment Status</th><th class='jtable'>Date Card Sent</th><th class='jtable'>Coupon?</th><th class='jtable'>Action</th><th class='jtable'>Reminder</th></tr>";
                while ($row = mysql_fetch_array($result)) {
            
                	if($bgcolor=='#f4f4e9'){$bgcolor='#e0dfc9';}
					else{$bgcolor='#f4f4e9';}
                        //Determine how many days it has been since they registered.  If 15 or more, show the email icon and make the row red in color
                        $cur_date = new DateTime(date("n/j/y"));
                        $reg_date = new DateTime(date('n/j/y', (strtotime($row['creation_date']))));
                        $interval = $cur_date->diff($reg_date);
                        $numdays = $interval->days;
                        if ($row['payment_status']=='Unpaid' and $numdays > 14) {
							echo "<tr bgcolor=$bgcolor >";
							echo "<td class='jtablered' align='center' width='60'>".date('n/j/y', (strtotime($row['creation_date'])))."</td>";
							echo "<td align='center' class='jtablered' width='180'>$row[fname]". " ". "$row[lname]</td>";
							echo "<td class='jtablered' align='center' width='200'>$row[email_add]</td>";
							echo "<td class='jtablered' align='center' width='80'>$row[payment_status]</td>";
							echo "<td class='jtablered' align='center' width='80'>";
							if ($row['card_sent_date']=='') {
								echo "&nbsp;</td>"; }
							else { echo date('n/j/y', (strtotime($row['card_sent_date'])))."</td>"; }
							echo "<td class='jtablered' align='center' width='70'>$row[coupon_user]</td>";
							
							echo "<td width='150' align='center'> <a href='edit_member.php?id=$row[id]'><img alt='Edit Item' width='18px' title='Edit User' src='images/edit-icon.png'></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick='return confirmSubmit()' href='delete_member.php?id=$row[id]'><img alt='Delete Item' title='Delete User' width='18px' src='images/delete-icon.png'></a></td>";
							//Here we see if the person is unpaid for more than 15 days AND has not already had a reminder sent.  
							
							if ($row['reminder_date']==''){
								echo "<td class='jtable' align='center'><a onclick='return confirmSubmit2()' href='remind_member.php?id=$row[id]'><img alt='Remind Member' title='Remind Member' src='images/email.png'></a></td></tr>";}
								else {//show the date the reminder was sent
								echo "<td class='jtablered' align='center'>".date('n/j/y', (strtotime($row['reminder_date'])))."</td></tr>";			
							}
				        }
                        // ELSE unpaid and less than 15 days or pending or no waiver status
                        else { 
							echo "<tr bgcolor=$bgcolor >";
							echo "<td class='jtable' align='center' width='60'>".date('n/j/y', (strtotime($row['creation_date'])))."</td>";
							echo "<td align='center' class='jtable' width='180'>$row[fname]". " ". "$row[lname]</td>";
							echo "<td class='jtable' align='center' width='200'>$row[email_add]</td>";
							echo "<td class='jtable' align='center' width='80'>$row[payment_status]</td>";
							echo "<td class='jtable' align='center' width='80'>";
							if ($row['card_sent_date']=='') {
								echo "&nbsp;</td>"; }
								else { echo date('n/j/y', (strtotime($row['card_sent_date'])))."</td>"; }
							echo "<td class='jtable' align='center' width='70'>$row[coupon_user]</td>";
							
							echo "<td width='150' align='center'> <a href='edit_member.php?id=$row[id]'><img alt='Edit Item' width='18px' title='Edit User' src='images/edit-icon.png'></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick='return confirmSubmit()' href='delete_member.php?id=$row[id]'><img alt='Delete Item' title='Delete User' width='18px' src='images/delete-icon.png'></a></td>";
							
							
							echo "<td>&nbsp;</td></tr>";
						}
                    }
                    echo "</table>";
				?><div style="margin-top:15px;"><a href='index.php'>Back to Admin Page</a></div>
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