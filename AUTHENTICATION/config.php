<?php
// Connection
mysqli_report(MYSQLI_REPORT_OFF); 

$conn = new mysqli("localhost", "root", "", "my_database");

if ($conn->connect_error) {
    die('<span style="color:red">Cant Connect To DB: ' . htmlspecialchars($conn->connect_error) . '</span><br>');
}

// Create registering table if it doesn't exist
$registering = "CREATE TABLE IF NOT EXISTS emailing (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sender_name VARCHAR(50) NOT NULL UNIQUE,
    reciever_email VARCHAR(50) NOT NULL UNIQUE,
    message VARCHAR(50) NOT NULL UNIQUE,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
function truncating() { 
    global $conn; 
   if( $conn->query("TRUNCATE TABLE emailing")){
    echo "Truncated";
   }; 
}
function dropping() { 
    global $conn; 
    if($conn->query("DROP TABLE emailing")){
        echo "Table Dropped";
    }; 
}
function clearing() { 
    global $conn; 
    
    if( $conn->query("DELETE FROM emailing")){
        echo "DELETED Everything";
    }
}  
if($conn->query($registering)){
    echo '<span style="color:green;">Registering Created</span><br><br>';
}


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
