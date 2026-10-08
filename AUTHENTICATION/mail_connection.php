<?php
// Setup PHPMailer
require_once __DIR__ . '/composer_files/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$message = '';

// Configure Gmail SMTP Server settings once
$mail->SMTPDebug  = 0;                              // Set to 2 if you need to debug errors
$mail->isSMTP();                                    // Send using SMTP
$mail->Host       = 'smtp.gmail.com';               // Google's SMTP Server
$mail->SMTPAuth   = true;                           // Enable SMTP authentication
$mail->Username   = 'sukusisulu@gmail.com';         // Your full Gmail address
$mail->Password   = 'gbdd hfhm zpls rnhb';         // Your 16-character App Password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Require TLS encryption
$mail->Port       = 587;                            // TCP port for STARTTLS
$mail->addReplyTo('sukusisulu@gmail.com', 'Help Desk');
?>
