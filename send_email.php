<?php
$sender_email = $_POST['sender_email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$recipient_email = 'recipient@example.com';

$file_tmp_path = $_FILES['pdf_file']['tmp_name'];
$file_name = $_FILES['pdf_file']['name'];

$to = $recipient_email;
$subject = $subject;
$message = $message;

$content = file_get_contents($file_tmp_path);
$content = chunk_split(base64_encode($content));

$uid = md5(uniqid(time()));

$header = "From: ".$sender_email."\r\n";
$header .= "Reply-To: ".$sender_email."\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

$body = "--".$uid."\r\n";
$body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
$body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$body .= $message."\r\n\r\n";
$body .= "--".$uid."\r\n";
$body .= "Content-Type: application/pdf; name=\"".$file_name."\"\r\n";
$body .= "Content-Transfer-Encoding: base64\r\n";
$body .= "Content-Disposition: attachment; filename=\"".$file_name."\"\r\n\r\n";
$body .= $content."\r\n\r\n";
$body .= "--".$uid."--";

if (mail($to, $subject, $body, $header)) {
    echo "Email sent successfully!";
} else {
    echo "Failed to send email. Please try again later.";
}
?>
