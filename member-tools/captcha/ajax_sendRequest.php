<?
if (!empty($_POST)) {
	require_once('../includes/sweetcaptcha.php');
	if (isset($_POST['sckey']) and isset($_POST['scvalue']) and $sweetcaptcha->check(array('sckey' => $_POST['sckey'], 'scvalue' => $_POST['scvalue'])) == "true") {
		//This is where you do all the stuff with the info given from the user
	} else {
		echo "CriticalError:{Incorrect Captcha}:CriticalError";
	}	
}
?>