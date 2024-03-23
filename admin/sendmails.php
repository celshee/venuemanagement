<?php
require '../phpEmail/PHPMailer/src/Exception.php';
require '../phpEmail/PHPMailer/src/PHPMailer.php';
require '../phpEmail/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



    if (isset($_SESSION["deletedmail"], $_SESSION["userid"], $_SESSION["bid"])) 
    $umail = $_SESSION["deletedmail"];
    $uid = $_SESSION["userid"];
    $bid = $_SESSION["bid"];

        $subject = "Notification: Changes to Your Venue Booking";
        $message = "I hope this message finds you well.
        We regret to inform you that your booking for the venue by ' $uid ' has been canceled by the administration. We understand the inconvenience this may cause and apologize for any disruption to your plans.
        For further details and assistance, please feel free to contact us at your earliest convenience. We are here to address any questions or concerns you may have regarding this matter.
        Thank you for your understanding and cooperation.";

        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sheenaxelin@gmail.com';
            $mail->Password = 'eurfvompeehkyslu';
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->isHTML(true);
            $mail->setFrom('sheenaxelin@gmail.com', 'ADMIN'); // Set from address
            $mail->addAddress($umail); // Add recipient
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
   

?>
