<?
include ('connect.php');
$validate_username = @mysql_query("SELECT * FROM tblUserData WHERE email_add='".$_POST['username']."' LIMIT 1");
$val_output = mysql_fetch_array($validate_username);

$val_mid = $val_output['email_add'];

if($val_mid != NULL){
echo "no";
}else{
echo "yes";
}
?>