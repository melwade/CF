<?
$rewnewal_date='2014-03-01';
$formatted_date=date('n/j/y', (strtotime($rewnewal_date)));
$current_date=date('Y-m-d');
$formatted_current_date=date('n/j/y');
echo "Renewal Date from DB: ".$rewnewal_date;
echo "<BR>";
echo "Renewal Date Displayed: ".$formatted_date;
echo "<BR>";
echo "Current Date is ".$current_date;
echo "<BR>";
echo "Formatted Current Date is ".$formatted_current_date;
echo "<BR>";


echo "<BR>";echo "<BR>";

if ($rewnewal_date >= $current_date) {
		echo "<BR>Renewal date is greater than or equal to current date.  Add 1 year to Renewal Date";
		// add 7 days to the date above
		$NewDate = date('Y-m-d', strtotime($rewnewal_date . " +365 day"));
		echo "<BR>Renewal date will be ".$NewDate;

}
else {	echo "<BR>Renewal date is less than current date.  Add 1 year to Current Date"; 
		// add 7 days to the date above
		$NewDate = date('Y-m-d', strtotime($current_date . " +365 day"));
		echo "<BR>Renewal date will be ".$NewDate;
}
?>