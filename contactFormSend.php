<?php
/**
 * Created by PhpStorm.
 * User: Sari
 * Date: 11/9/2019
 * Time: 1:41 PM
 */

    $salesEmail = "Sales@BTMIndustrial.com";

    $name = $_POST['name'];
    $visitor_email = $_POST['email'];
    $message = "EMAIL SENT USING BTM's website form.\r\n";
    $message .= "Company: ".$_POST['company']."\r\n";
    $message .= "Contact Number: ".$_POST['phone']."\r\n";
    $message .= "Heard about us from: ".$_POST['selectComment']."\r\n";
    $message .= "Other: ".$_POST['comment']."\r\n";
    $message .= $_POST['message'];
    $subject = $_POST['subject'];
    $headers = "From: $visitor_email \r\n";
    $headers .= "Reply-To: $visitor_email \r\n";
    $headers = "MIME-Version: 1.0\r\n";
    $boundary = md5("specialToken$4332"); // boundary token to be used
    $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n";
try{
    mail($salesEmail,$subject,$message,$headers);

    $costomerMessage = "Thank you for emailing BTM Industrial. We will be contacting you shortly. \r\n";
    $costomerMessage .= "\r\n\r\n Email Submitted to $salesEmail below: \r\n\r\n ";
    $costomerMessage .= $message;

    $headers = "From: $salesEmail \r\n";
    mail($_POST['email'],"[Replay] ".$subject,$costomerMessage,$headers);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>BTM Industrial - Contact Form</title>
    <link rel="shortcut icon" href="Images/favicon.png">
    <link rel="icon" type="image/png" href="Images/favicon.png" />
</head>
<body>
<div id="wrapper">
    <?php include_once "nav.php" ?>
    <section id="maincontent">
        <div class="container">

            <div class="row">
                <div class="span12">
                    <div class="call-action">
                        <div class="text">
                            <h2>Thank you for your email.</h2>
                            <p>
                                Your email was sent to <?php echo $salesEmail;?> and someone will contact you shortly.
                            </p>
                        </div>
                        <div class="cta">
                            <a class="btn btn-large btn-theme" href="index.php">
                                <i class="icon-arrow-left"></i>Back to Home Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>

    <?php
}catch (Exception $ex){
    echo "Error has occurred: ".$ex;
}

include_once "footer.php";
