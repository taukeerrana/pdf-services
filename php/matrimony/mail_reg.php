<?php
session_start(); @ob_start();

class regmail
{
	function rmail(){
		require_once "Mail.php";
		$from = "info@bride&groom.com";
		$to = $_SESSION['EmailId'];
		$subject = "Bride&groom Registration Confirmation";
		$body.="Dear <b>".$_SESSION['LoginId'].",</b><br /><br />
		Thanks for your registration,To continue please click : <a href='Bride&groom.com'>Bride&groom.com</a>";
		$host = "mail.benivolent.com";
		$username = "bst@benivolent.com";
		$password = "admin";
		$headers = "From:$from\n";
		$headers .= "CC:$cc\n";
		$headers.= "MIME-Version: 1.0\n";
		$headers.= "Content-Type: text/html;" ;
		ini_set("sendmail_from","webmaster@".$_SERVER["SERVER_NAME"]);
		mail($to, $subject, $body, $headers);

	}
}
$regmail = new regmail();
$regmail->rmail();
?>