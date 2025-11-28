<?php 
/**
 * Certificate Generation and Emailing.
 *
 * This file contains a function to generate a personalized certificate image with a name
 * and email it to a recipient.
 */

include('db.php');

/**
 * Generates and mails a certificate.
 *
 * This function creates a certificate image using a template and a specific font,
 * overlays the recipient's name, encodes the image as base64, and sends it as an
 * email attachment.
 *
 * @param string $name The name of the recipient to appear on the certificate.
 * @param string $email The email address of the recipient.
 * @param int $form_id The ID of the feedback form to retrieve the certificate template.
 * @return void
 */
function mail_certificate($name, $email, $form_id){
    global $conn;
    $font = "C:/xampp/htdocs/config/Roboto-Bold.ttf";
    // $image = imagecreatefrompng('config/certificate.png');
    $form = mysqli_query($conn, "SELECT * FROM feedback_forms WHERE id = ".$form_id) or die('error');
    $cert_uri = mysqli_fetch_assoc($form)['certificate_url']; 
    $image = imagecreatefrompng('C:\\xampp\\htdocs\\assets\\img\\certificates\\'.$cert_uri);
    $color = imagecolorallocate($image, 0, 0, 0);
    // $center = (-(strlen($name)+(imagesx($image)/2)));

    
    // Get Bounding Box Size
    $text_box = imagettfbbox(50,0,$font,$name);

    // Get your Text Width and Height
    $text_width = $text_box[2]-$text_box[0];
    $text_height = $text_box[7]-$text_box[1];

    // Calculate coordinates of the text
    $x = (imagesx($image)/2) - ($text_width/2);
    $y = (imagesx($image)/2) - ($text_height/2);

    imagettftext($image, 50, 0, $x, 657, $color, $font, $name);
    ob_start();
    imagepng($image);
    $contents = ob_get_contents();
    ob_end_clean();
    imagedestroy($image);
    $base64 = base64_encode($contents);
    
    $subject = "E-Certificate";


    $message = "The E-Certificate is attached to the email
    
    Regards,
    Advisor Zaroori Hai Team";

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (RFC)
    $eol = "\r\n";

    // main header (multipart mandatory)
    $headers = "From: Advisor Zaroori Hai <support@advisorzaroorihai.com>" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;

    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= $message . $eol;

    // attachment
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"certificate.png\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $base64 . $eol;
    $body .= "--" . $separator . "--";

    //SEND Mail
    if (mail($email, $subject, $body, $headers)) {
    } else {
        echo "mail send ... ERROR!";
        print_r( error_get_last() );
    }

}
// mail_certificate('HImanshu Gohil', 'himanshugohil234@gmail.com');
?>