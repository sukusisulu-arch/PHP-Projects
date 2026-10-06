<div style="display:">
    <?php 
        spl_autoload_register(function($className){
            $paths = ['control/','core/'];
            
            foreach ($paths as $path) {
                $file = $path.str_replace('\\','/'.$className).".php";
                if(file_exists($file)){
                    require $file;
                    return;
                }
            }
        });
    ?>
</div>
<?php
    $trigger = false;
    $msg = ""; 

    function display_message($init) { 
        if ($init === true) { 
            return "<span style='color:green'>MESSAGE SENT</span>"; 
        }
        if ($init === false) { 
            return "<span style='color:red'>ERROR SENDING MESSAGE</span>"; 
        } 
        return 'Nothing'; 
    }

    if (isset($_POST['send'])) { 
        $name = trim($_POST['name'] ?? ''); 
        $email = trim($_POST['email'] ?? ''); 
        $form_message = trim($_POST['message'] ?? ''); 
        
        if (!empty($name) && !empty($email) && !empty($form_message)) { 
            
            $stmt = $connection->prepare("INSERT INTO contact (Name, Email, Message, Published) VALUES (?, ?, ?, NOW())"); 
            $stmt->bind_param("sss", $name, $email, $form_message); 
            
            if ($stmt->execute()) {
                try { 
                    $mail->setFrom('no-reply@example.com', 'Testing Email'); 
                    $mail->addAddress($email); 
                    $mail->isHTML(true); 
                    $mail->Subject = "New Contact Form Submission"; 
                    $mail->Body = nl2br(htmlspecialchars($form_message)); 
                    $mail->AltBody = strip_tags($form_message); 
                    
                    $mail->send(); 
                    
                    $trigger = true;
                    $msg = display_message(true);                
                    
                } catch (Exception $e) { 
                    $trigger = true;
                    $msg = "<span style='color:orange'>{$mail->ErrorInfo}</span>";
                } 
                
            } else { 
                $trigger = true;
                $msg = display_message(false);
            } 
            $stmt->close(); 
        } else { 
            $trigger = true;
            $msg = display_message(false); 
        } 

        // --- NEW AJAX INTERCEPTOR ---
        // If the request came from JavaScript, echo the final message and stop script execution
        if (isset($_POST['AJAX'])) {
            echo $msg;
            exit; 
        }
    } 
?>