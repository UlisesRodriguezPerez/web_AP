<?php

namespace App\Models;
use App\Config;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Traversable;

require 'vendor/autoload.php';

class SendEmail{
    private static $mail = null;

    public static function sendEmail($emailReceptor, $titulo, $copia = null, $archivo = null, $subject = "", $body = ""){
        try {
            if(!self::$mail){
                self::$mail = new PHPMailer(true);
            }
            // self::$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            self::$mail->isSMTP();
            self::$mail->Host = Config::$hostMail;
            self::$mail->SMTPAuth = true;
            self::$mail->Username = Config::$usernameMail;
            self::$mail->Password = Config::$passwordMail;
            self::$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            self::$mail->Port = Config::$portMail;
            
            // ENVÍO
            self::$mail->setFrom(Config::$usernameMail, "AP");
            self::$mail->addAddress($emailReceptor, $titulo); //RECEPTOR DEL CORREO
            
            if($copia){
                self::$mail->AddCC($copia);
            }
            if($archivo){
                self::$mail->addAttachment($archivo);
            }
            
            self::$mail->isHTML(true);
            self::$mail->Subject = $subject;
            self::$mail->Body = $body;
            self::$mail->send();
            
            echo "Correo enviado";
            return true;
        } catch (\PDOException $ex) {
            throw new \Exception(self::$mail->ErrorInfo);
        }
    }

    public function bodyMail($correo, $password){
        $bodyMail = 
        "<img class=\"adapt-img\" src=\"https://media.awakenpa.com/media/2018/08/welcome.png\"alt=\"welcome\"  width=\"auto\" height=\"368\">

        <p>
            <strong>Credenciales para iniciar sesión:</strong>
        </p>
        <ul>
            <li>
                Correo: $correo
            </li>
            <li>
                Contraseña: $password
            </li>
        </ul>";

        return $bodyMail;
    }
}

?>