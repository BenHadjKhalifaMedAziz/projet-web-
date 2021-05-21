<?php

require '../../front/mailer/PHPMailer/src/Exception.php';
require '../../front/mailer/PHPMailer/src/PHPMailer.php';
require '../../front/mailer/PHPMailer/src/SMTP.php';
include('includes/dbconnection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
$mail = new PHPMailer();

    $sujet=$_POST['sujet'];
    $textM=$_POST['textM'];
    $html=$_POST['html'];
    echo $sujet;
    echo $textM;
    echo $html;

    try {
        $ret=mysqli_query($con,"select * from  abonnements");
        $cnt=1;
        $sujet=$_POST['sujet'];
        $textM=$_POST['textM'];
        $html=$_POST['html'];
        while ($row=mysqli_fetch_array($ret)){
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->SMTPSecure = "tls";
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'hamza.ghariani@esprit.tn';
        $mail->Password   = '191JMTx3375';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $sujet;
        if(strlen($textM)==0){
        $mail->isHTML(true);
        $mail->Body = $html;
        }
        else{
        $mail->isHTML(false);
        $mail->Body = $textM;
        } 
        $mail->setFrom('MiniArt@MiniArt.tn', 'MiniArt');    
        $mail->addAddress($row['email'], 'NewsLetter');
        $mail->send();}
    echo "<script>alert('Message Envoyer.');</script>";
    }

    catch (Exception $e){
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    echo "<script>
window.location.href = 'dashboard.php';
</script>"; 
?>