<!doctype html>
<html>
<head>
<meta http-equiv="refresh" content="2; URL='report_messages.php'" />
<meta charset="utf-8">
<title>Edit Message Result</title>
</head>

<body>


    <?php
    include ('connect.php');

    $ud_ID = (int)$_POST["id"];

    $ud_firstname = mysql_real_escape_string($_POST["name"]);
    $ud_subject = mysql_real_escape_string($_POST["subject"]);
    $ud_message = mysql_real_escape_string($_POST["message"]);



    $query="UPDATE tblEmailMessages
            SET subject = '$ud_subject', message = '$ud_message' 
            WHERE id=$ud_ID";


mysql_query($query)or die(mysql_error());
if(mysql_affected_rows()>=1){
    echo "<p>($ud_ID) Record Updated<p>";
}else{
    echo "<p>($ud_ID) Not Updated<p>";
}
?>


</body>
</html>