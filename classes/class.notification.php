<?php
	class Notification
	{
		public static function sendNotification($message){
            
            ini_set("SMTP","smtp.mkem.sk" );
            ini_set('smtp_port', 25);
            ini_set('sendmail_from', 'monitoring@mkem.sk');

    
            $from   = "monitoring@mkem.sk";
            $to     = "0917233088@smsdirect.telekom.sk, 0910764170@smsdirect.telekom.sk, 0911984318@smsdirect.telekom.sk, 0908067544@smsdirect.telekom.sk";
            $subject= "Vysoka teplota!!!";

            mb_internal_encoding('UTF-8');

            $encoded_subject    = mb_encode_mimeheader($subject, 'UTF-8', 'B', "\r\n", strlen('Subject: '));
            $msg                = $message;               
            $headers            = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <'.$from.'>' . "\r\n";

            mail($to,$encoded_subject,$msg,$headers);
            
        }
        
	}
?>
 