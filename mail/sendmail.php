<?php
    $filepath = realpath(dirname(__FILE__));
    include $filepath . "/PHPMailer/src/PHPMailer.php";
    include $filepath . "/PHPMailer/src/Exception.php";
    include $filepath . "/PHPMailer/src/OAuth.php";
    include $filepath . "/PHPMailer/src/POP3.php";
    include $filepath . "/PHPMailer/src/SMTP.php";
     
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class Mailer
{
    public function datHangMail($tieude, $noidung, $mailDatHang)
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->CharSet = 'UTF-8';
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'clgtqwe1@gmail.com';                 // SMTP username
            $mail->Password = 'iomihkmuosdjwveq';                           // SMTP password
            $mail->SMTPSecure = 'tls';                           // SMTP password
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('clgtqwe1@gmail.com', 'Shop Laptop');
            $mail->addAddress($mailDatHang, 'Joe User');     // Add a recipient
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $tieude;
            $mail->Body    = $noidung;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
        }
    }
}
?>