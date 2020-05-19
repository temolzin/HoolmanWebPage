<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// Load Composer's autoloader
require '../../vendor/autoload.php';

class SendEmailController
{
    /*Función para envíar el correo al cliente confirmando que se recibió correctamente su mensaje*/
    function sendemailclient($arrayData)
    {
        $name = $arrayData['name'];
        $email = $arrayData['email'];
        $phone = $arrayData['phone'];
        $subject = $arrayData['subject'];
        $mesagge = $arrayData['message'];

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
//            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'mail.refividrio.com.mx';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'programadorzn@refividrio.com.mx';                     // SMTP username
            $mail->Password = 'Z0n@n0rt3#17';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->CharSet = 'UTF-8';

            //Código para agregar una imagen y después se manda a llamar con <img src=""/>
            $mail->AddEmbeddedImage('../../img/logohoolman.png', 'emailimg', 'attachment', 'base64', 'image/png');
            $mail->AddEmbeddedImage('../../img/favicon.png', 'favicon', 'attachment', 'base64', 'image/png');

            //Recipients
            $mail->setFrom('programadorzn@refividrio.com.mx');
            $mail->addAddress($email);

            $html = '';
            $html .= '<!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="utf-8">
                    <link rel="icon" href="img/favicon.png" type="image/png" />
                    <title>Hoolman</title>
                </head>
                <body style="background-color: black ">
                
                <!--Copia desde aquí-->
                <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 0">
                            <a href="https://www.hoolman.com">
                                <img src="cid:emailimg" class="img-logo" />
                            </a>
                        </td>
                    </tr>
                
                    <tr>
                        <td style="background-color: #ecf0f1">
                            <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
                                <h2 style="color: #93001a; margin: 0 0 7px">Hi, '.$name.'!</h2><br>
                                <p style="margin: 2px; font-size: 15px">
                                    We have received your message correctly. <br>
                                    We will try to give you an answer as soon as possible
                                    
                                    <br>
                                    <br>
                                    <br>
                                    Remember that we have different products with excellent quality and good price:
                                </p>
                                <ul style="font-size: 15px;  margin: 10px 0">
                                    <li>Truck chest p/in p-star exportation</li>
                                    <li>Grill P/Cacs 125 c/mosuito net crom</li>
                                    <li>Headlight p/fr col 120 c/smooth lisa</li>
                                    <li>Defense cover p/fr Casc 125 cent crom</li>
                                    <li>and more...</li>
                                </ul>
                                <br>
                                <p style="margin: 2px; font-size: 15px; text-align: center">
                                    Thanks for your preference
                                </p><br>
                                <div style="width: 100%; text-align: center">
                                    <a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #3498db" href="https://www.hoolman.com">Visit Us</a>
                                </div>
                                <p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0"> Copyright &copy; <img width="16px" height="16px" src="cid:favicon"> Hoolman 2020</p>
                            </div>
                        </td>
                    </tr>
                </table>
                <!--hasta aquí-->
                
                </body>
            </html>';

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Message received: ' . $subject;
            $mail->Body = $html;

            $mail->send();
            echo 'ok';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    /*Función para envíar el correo a la empresa*/
    function sendemaiself($arrayData)
    {
        $name = $arrayData['name'];
        $email = $arrayData['email'];
        $phone = $arrayData['phone'];
        $subject = $arrayData['subject'];
        $mesagge = $arrayData['message'];

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
//            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'mail.refividrio.com.mx';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'programadorzn@refividrio.com.mx';                     // SMTP username
            $mail->Password = 'Z0n@n0rt3#17';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->CharSet = 'UTF-8';

            //Código para agregar una imagen y después se manda a llamar con <img src=""/>
            $mail->AddEmbeddedImage('../../img/logohoolman.png', 'emailimg', 'attachment', 'base64', 'image/png');
            $mail->AddEmbeddedImage('../../img/favicon.png', 'favicon', 'attachment', 'base64', 'image/png');

            //Recipients
            $mail->setFrom($email);
            $mail->addAddress('programadorzn@refividrio.com.mx');
            $html = "";

            $html .= '<!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="utf-8">
                    <link rel="icon" href="img/favicon.png" type="image/png" />
                    <title>Hoolman</title>
                </head>
                <body style="background-color: black ">
                
                <!--Copia desde aquí-->
                <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
                
                    <tr>
                        <td style="padding: 0">
                            <a href="https://www.hoolman.com">
                                <img style="padding: 0; display: block; alignment: center;" src="cid:emailimg" width="50%">
                            </a>
                        </td>
                    </tr>
                
                    <tr>
                        <td style="background-color: #ecf0f1">
                            <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
                                <h2 style="color: #93001a; margin: 0 0 7px">Hi, Hoolman!</h2><br>
                                <i style="margin: 2px; font-size: 15px">
                                    A customer just sent a message through the page <i><a href="https://www.hoolman.com">HOOLMAN</a></i>
                                    <br>
                                    <br>
                                    <br>
                                    The message data is:
                                </p>
                                <ul style="font-size: 15px;  margin: 10px 0">
                                    <li>Email: '. $email .'</li>
                                    <li>Subjetc: '. $subject .'</li>
                                    <li>Phone Number: '. $phone .'</li>
                                    <li>Subject: '. $subject .'</li>
                                    <li>Message: '. $mesagge .'</li>
                                </ul>
                                <br>
                                <p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0"> Copyright &copy; <img src="cid:favicon" width="4%"> Hoolman 2020</p>
                            </div>
                        </td>
                    </tr>
                </table>
                <!--hasta aquí-->
                
                </body>
            </html>';

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject . " " . $name;
            $mail->Body = $html;

            $mail->send();
            echo 'ok';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
