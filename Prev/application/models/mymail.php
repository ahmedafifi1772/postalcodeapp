q<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

class Mymail extends MY_Model{



/*
* send email 
* return false or true
*/
function mailhandler($to, $subject, $body , $from=NULL){
require("PHPMailer_5.2.0/class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->SMTPDebug  = 1;                                    // set mailer to use SMTP

$mail->Host = "smtpout.secureserver.net";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "info@yourpostalcode.com";  // SMTP username
$mail->Password = "688522511"; // SMTP password
	
	if(isset($from))
		$mail->From = $from;
	else
	$mail->From = "info@yourpostalcode.com";

$mail->FromName = "YourPostalCode.com";

$mail->AddAddress($to);
//echo $to;
//$mail->AddAddress("mahmoud.mano@yahoo.com");                  // name is optional

$mail->WordWrap = 600;                                 // set word wrap to 50 characters

$mail->CharSet = 'UTF-8';                             //utf-8 encoding

$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $body;
//$mail->MsgHTML=$body;
$mail->AltBody = "This is the body in plain text for non-HTML mail clients......";

if(!$mail->Send())
{
	return false;
   
}

return true;

}


}