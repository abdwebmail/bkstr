<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/3/2019
 * Time: 12:07 PM
 */
require_once(APPPATH . 'PHPMailer/src/Exception.php');
require_once(APPPATH . 'PHPMailer/src/PHPMailer.php');
require_once(APPPATH . 'PHPMailer/src/SMTP.php');
require_once(APPPATH . '/PHPMailer/vendor/autoload.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Sendemails
{
   function __construct()
   {
      $this->ci =& get_instance();
   }

   /**********************************************
    * Send Email 
    **********************************************/
    public function sendEmail($email, $header, $message)
    {
        $mail = new PHPMailer(true);

        $body = $message;
        $altbody = "";
        $subject = $header;
        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();

            $mail->Host = 'localhost';
            $mail->Port = 25;
            $mail->SMTPAuth = false;
            $mail->SMTPSecure = false;

            $mail->SMTPOptions = array('ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true));

            $mail->Username =  'info@phonebechdou.com'; // SMTP username
            $mail->Password = 'info@phonebechdou';

            $mail->setFrom('info@phonebechdou.com', 'PhoneBechDou');

            $mail->addAddress($email);
            $mail->addReplyTo('info@phonebechdou.com', 'PhoneBechDou');

            $mail->isHTML(true);
            $mail->Subject = '' . $subject . '';
            $mail->Body = $body;
            $mail->AltBody = $altbody;
            if ($mail->send()) {
                return true;
            }
            else {
                return 'Email Could not sent.';
            }
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }
}