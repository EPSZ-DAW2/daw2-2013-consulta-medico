<?php
		$mail=Yii::app()->Smtpmail;
		$mail->SetFrom("giisidaw@gmail.com","GIISI");
		$mail->Subject="Mi asunto";
		$mail->MsgHTML("<h1>Hola como estas<h1>");
		$mail->AddAddress("jllavec@gmail.com","Carlos Fco");
		if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }else {
            echo "Message sent!";
        }
?>