<?php
class Mail{
	
	public static function send($from,String $nameFrom=null,$to,String $nameTo=null,$asunto,$mensaje){
		require(_util_."phpmailer/class.phpmailer.php");
		require(_util_."phpmailer/class.smtp.php");
	
		$mail = new PHPMailer();
	
	
		//echo 'SERVIDOR DE CORREO : '.SERVER_CORREO."<br/>";
		//echo 'SERVIDOR MAIL USER : '.SERVER_EMAIL_USER."<br/>";
		//echo 'SERVIDOR MAIL PASS : '.SERVER_EMAIL_PASS."<br/>";
		
		//$mail->IsSMTP();  // telling the class to use SMTP
		$mail->Host     = SERVER_CORREO; // SMTP server mail.develoweb.net
		//$mail->Port 	= 25;
		$mail->CharSet	= "UTF-8";
		
		$mail->IsHTML(true);
		
		$mail->From     = $from;
		$mail->FromName = $nameFrom;
		
		
		$correos = explode(",",$to);
		$nombre = explode(",",$nameTo);
		$ncorreos = count($correos);
		for($i=0;$i<$ncorreos;$i++){
			$mail->AddAddress($correos[$i],$nombres[$i]);
		}
		$mail->Username = SERVER_EMAIL_USER;  // SMTP username
		$mail->Password = SERVER_EMAIL_PASS; // SMTP password
		$mail->SMTPAuth = true;
	
		$mail->Subject  = $asunto;
		$mail->Body     = $mensaje;
		$mail->WordWrap = 50;
	
		if(!$mail->Send()) {
		  echo 'Correo no fue enviado.<br/>';
		  echo 'Error: ' . $mail->ErrorInfo;
		  return false;
		} else {
		  return true;
		  //echo 'Correo enviado correctamente.<br/>';
		}
	}
	
}
?>