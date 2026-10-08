<div style="display:none;">
    <?php
        include 'db_connection.php';
        include 'C:\Users\user\Documents\PHP\name\htdocs\Projects\AUTHENTICATION\mail_connection.php';
    ?>
</div>
<?php
// 1. Silent File Imports (Keep out of HTML wrappers so they don't pollute AJAX strings)
include 'db_connection.php';
include 'C:\Users\user\Documents\PHP\name\htdocs\Projects\AUTHENTICATION\mail_connection.php';

$trigger = false;
$msg = ""; 

if (isset($_POST['send'])) { 
    $name = htmlspecialchars(trim($_POST['name'] ?? '')); 
    $email = htmlspecialchars(trim($_POST['email'] ?? '')); 
    $form_message = htmlspecialchars(trim($_POST['message'] ?? '')); 
    
    if (!empty($name) && !empty($email) && !empty($form_message)) { 
        
        $stmt = $connection->prepare("INSERT INTO contact (Name, Email, Message, Published) VALUES (?, ?, ?, NOW())"); 
        $stmt->bind_param("sss", $name, $email, $form_message); 
        
        if ($stmt->execute()) {
            try { 
                $mail->setFrom('no-reply@example.com', 'Testing Email'); 
                $mail->addAddress($email); 
                $mail->isHTML(true); 
                $mail->Subject = "New Contact Form Submission"; 
                // Using internal message variables directly since raw text was already escaped
                $mail->Body = nl2br($form_message); 
                $mail->AltBody = strip_tags($form_message); 
                
                $mail->send(); 
                
                $trigger = true;
                $msg = "<span style='color:green'>MESSAGE SENT</span>";                
                
            } catch (Exception $e) { 
                $trigger = true;
                // Avoid breaking layouts with raw unescaped error strings
                $msg = "<span style='color:orange'>" . htmlspecialchars($mail->ErrorInfo) . "</span>";
            } 
            
        } else { 
            $trigger = true;
            $msg = "<span style='color:red'>ERROR RECORDING MESSAGE</span>";
        } 
        $stmt->close(); 
    } else { 
        $trigger = true;
        $msg = "<span style='color:red'>ALL FIELDS REQUIRED</span>"; 
    } 

    // 2. FIXED AJAX INTERCEPTOR: Intercept immediately before page content renders
    if (isset($_POST['AJAX'])) {
        // Clear any previous output buffer spacing just in case
        if (ob_get_length()) ob_clean(); 
        echo $msg;
        exit; 
    }
} 
?>
