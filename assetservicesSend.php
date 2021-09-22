<?php
/**
 * Created by PhpStorm.
 * User: Sari
 * Date: 11/9/2019
 * Time: 1:41 PM
 */

//$salesEmail = "Sales@BTMIndustrial.com";
$salesEmail = "SirRahal55@gmail.com";

$message = getMessage();
$subject = "[Online Form Filled]";
$headers = "MIME-Version: 1.0\r\n";
$headers .= "From:Sales@BTMIndustrial.com\r\n";
$headers .= "Reply-To: " . $_POST['email'] . "" . "\r\n";
try{
    if ($_POST && isset($_FILES['infile'])) {
        $sender_name = filter_var($_POST["name"], FILTER_SANITIZE_STRING); //capture sender name
        $sender_message = filter_var($message, FILTER_SANITIZE_STRING); //capture message
        $attachments = $_FILES['infile'];
        $file_count = count($attachments['name']); //count total files attached

        $boundary = md5("specialToken$4332"); // boundary token to be used

        if ($file_count > 0) { //if attachment exists
            //header
            $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n";

            //message text
            $body = "--$boundary\r\n";
            $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
            $body .= "Content-Transfer-Encoding: base64\r\n\r\n";

            $body .= chunk_split(base64_encode($sender_message));

            //attachments
            for ($x = 0; $x < $file_count; $x++) {
                if (!empty($attachments['name'][$x])) {
                    //get file info
                    $file_name = $attachments['name'][$x];
                    $file_size = $attachments['size'][$x];
                    $file_type = $attachments['type'][$x];

                    //read file
                    $handle = fopen($attachments['tmp_name'][$x], "r");
                    $content = fread($handle, $file_size);
                    fclose($handle);
                    $encoded_content = chunk_split(base64_encode($content)); //split into smaller chunks (RFC 2045)

                    $body .= "--$boundary\r\n";
                    $body .= "Content-Type: $file_type; name=" . $file_name . "\r\n";
                    $body .= "Content-Disposition: attachment; filename=" . $file_name . "\r\n";
                    $body .= "Content-Transfer-Encoding: base64\r\n";
                    $body .= "X-Attachment-Id: " . rand(1000, 99999) . "\r\n\r\n";
                    $body .= $encoded_content;
                }
            }
        } else { //send plain email otherwise
            $headers = "From:" . $_POST['email'] . "\r\n" .
                "Reply-To: " . $_POST['email'] . "\n" .
                "X-Mailer: PHP/" . phpversion();
            $body = $sender_message;
        }

        $sentMail = @mail($salesEmail, $subject, $body, $headers);

    }else{
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $boundary = md5("specialToken$4332"); // boundary token to be used
        $sentMail = @mail($salesEmail, $subject, $message, $headers);
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>BTM Industrial - Asset Service</title>
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
                                    Your email was sent to Sales@BTMIndustrial.com and someone will contact you shortly.
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

/**
 * Uses the post data to build the message of the email
 * @return string
 */
function getMessage(){
    $message = "Email was sent using BTMs website form.\r\n\r\n";
    $message .= "Senders Name: ".$_POST['name']."\r\n";
    $message .= "Senders Email: ".$_POST['email']."\r\n";
    $message .= "Company: ".$_POST['company']."\r\n";
    $message .= "Contact Number: ".$_POST['phone']."\r\n";
    $message .= "Machine Condition: ".$_POST['condition']."\r\n";
    $message .= "Machine Condition More info: ".$_POST['condition_info']."\r\n";
    $message .= "Zip of Machinery: ". $_POST['zip']."\r\n";
    if(isset($_POST['localLoader'])){
        $message .= "Local Loader Available: Yes\r\n";
    }else{
        $message .= "Local Loader Available: No\r\n";
    }
    $message .= "Removal Date: ".$_POST['date']."\r\n";
    $message .= "Description: ".$_POST['description'];
    return $message;
}