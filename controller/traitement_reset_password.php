<?php

require('../modele/connexion_bdd.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//require ('../controller/include/php-mailer/composer.json');

require '../vendor/autoload.php';

session_start();

$email = htmlspecialchars($_POST['email']);

try {
    $stmt = $bdd->prepare('SELECT * FROM user WHERE user_email = :user_email');
    $stmt->execute([':user_email' => $email]);
    $recordset = $stmt->fetch();
    if ($recordset) {
        $token = md5($email).rand(10,9999);
        date_default_timezone_set('Europe/Paris');
        $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
        $expDate = date("Y-m-d H:i:s",$expFormat);
        try{
            $stmt=$bdd->prepare('UPDATE user SET reset_link_token = :token, exp_date =:expdate WHERE user_email = :user_email');
            $stmt->execute([':token'=>$token,':expdate'=>$expDate, ':user_email' => $email]);
        }catch (PDOException $e){
            echo $e->getMessage();
            die();
        }
        $link = "../vue/reset_password.php?key=$email&token=$token";

        $to = $email; 
        $from = "noreply.unpeudefrancais@gmail.com";
        $subject = "Demande de réinitialisation de mot de passe";
        $msg='<p>Bonjour,</p><br>';
        $msg.="<p>Vous avez oublié votre mot de passe ?<br>Nous avons reçu une demande de réinitialisation pour votre compte.</p>";
        $msg.="<p>Pour réinitialiser votre mot de passe, veuillez cliquer sur le bouton ci-dessous :</p>";
        $msg.= "<div><a href='".$link."'><button style='background-color:grey;border:none;border-radius:5px;cursor:pointer;font-size: large;padding:15px;color:white;font-weight:bold;'>Réinitialiser le mot de passe</button></a></div>";
        $msg.="<p>ou copier-collez le lien dans votre navigateur :<br>";
        $msg.="<a href='".$link."'>".$link."</a><br><br>";
        $msg.="<p>Si vous n'êtes pas à l'origine de cette demande, veuillez ignorer ce mail.</p>";
        $msg.="<br>";
        $msg.="<p>Unpeudefrancais</p><br>";

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0; // Enable verbose debug output
            // 2 for debug, 0 to avoid the error "headers already sent"
            $mail->CharSet = "UTF-8";
            $mail->isSMTP(); // Send using SMTP
            $mail->Host       = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth   = true; // Enable SMTP authentication
            $mail->Username   = 'noreply.unpeudefrancais@gmail.com'; // SMTP username
            $mail->Password   = 'Unpeudefrancais.44200'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
            $mail->Port       = 465; // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($from, 'Unpeudefrancais');
            $mail->addAddress($to); // Add a recipient
            
            //Attachments

            //Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Demande de réinitialisation de mot de passe';
            $mail->Body    = $msg;
            $mail->AltBody = $msg;
            $mail->send();
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        header('Location:../vue/password_forgot_page.php?success=MailSent'); // ne fonctionne pas, Cannot modify header information - headers already sent by (output started at C//wamp64/www/unpeudefrancais/vendor/phpmailer/src/SMTP.php:282) ... on line 81

        /*echo("<script>window.location.assign('../vue/password_forgot_page.php?success=MailSent')</script>");
*/
    }else{
        header('Location:../vue/password_forgot_page.php?error=WrongLogIds');
    }

}catch(PDOException $e){
    echo $e->getMessage();
    die();
}