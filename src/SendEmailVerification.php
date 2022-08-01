<?php
namespace chandachewe\php_email_verification;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('vendor/phpmailer/phpmailer/src/Exception.php');
require_once('vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once('vendor/phpmailer/phpmailer/src/SMTP.php');
require_once('libs/config.php');

class SendEmailVerification{


  public static $smtphost = SMTP_HOST;
  protected static $smtpuser = SMTP_USER;
  protected static $smtppass = SMTP_PASS;
  protected static $smtpsecure = SMTP_SECURE;
  protected static $smtpport = SMTP_PORT;
  protected static $sender_name = EMAIL_SENDER_NAME;



  public static function send_verification_email($email,$name,$verification_key){
        $subject = "Verify Your Account"; 
        $mail = new PHPMailer(); 
        $mail->isSMTP();
        $mail->Host =self::$smtphost;
        $mail->SMTPAuth = true;
        $mail->Username = self::$smtpuser;
        $mail->Password = self::$smtppass;
        $mail->SMTPSecure = self::$smtpsecure;
        $mail->Port = self::$smtpport;
        $mail->IsHTML(true);
        $mail->setFrom(self::$smtpuser, self::$sender_name);
        $mail->addAddress($email, $name); 
    
        $mail->Subject = $subject;
        $mail->Body    = str_replace('$verification_key',URL."?key=".$verification_key,file_get_contents('body.php',true));
    
        // Send Verification Email Now
        if(!$mail->send()) {
          $msg = "<span class='text-success'>Whoops something went wrong!!! Registered Failed. Please try again!</span>";
		  return $msg;
        } elseif($mail->send())  {

           echo "WE HAVE SENT AN EMAIL VERIFICATION TO YOUR EMAIL ADDRESS!!!";
            
        }
    else{
    $msg = "User registration failed";
    return $msg;
    }	
    
    }
}


      

    ?>