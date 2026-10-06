
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="">
        <?php 
            include __DIR__ . '/composer_files/vendor/autoload.php'; 
            include 'config.php'; 
            
            if (isset($_POST['submit'])) { 
                
                $sender   = trim($_POST['from'] ?? ''); 
                $receiver = trim($_POST['to'] ?? ''); 
                $heading  = trim($_POST['subject'] ?? ''); 
                $content  = trim($_POST['body'] ?? ''); 

                if (!empty($sender) && !empty($receiver) && !empty($heading) && !empty($content)) { 
                    
                    // Prepare the statement against your 'registering' table
                    // Note: You may want a dedicated 'messages' table later, but this matches your schema layout
                    $query = "INSERT INTO emailing (sender_name,reciever_email,message) VALUES (?, ?, ?)";
                    
                    if ($stmt = $conn->prepare($query)) { 
                        // Hashing content as a placeholder since it maps to the 'password' column in your current schema
                        $hashed_content = password_hash($content, PASSWORD_BCRYPT);
                        
                        $stmt->bind_param("sss", $sender, $receiver, $hashed_content); 
                        
                        if ($stmt->execute()) { 
                            
                            // Now that the database log succeeded, configure dynamic email fields and send
                            try {
                                $mail->setFrom('no-reply@example.com', 'Testing Email'); 
                                $mail->addAddress($receiver);
                            
                                $mail->isHTML(true);                         
                                $mail->Subject = $heading;
                                $mail->Body    = $content;
                                $mail->AltBody = strip_tags($content);
                            
                                $mail->send();
                                $message = "<span style='color:green'>Data saved and message sent successfully via Gmail!</span>";
                            } catch (Exception $e) {
                                $message = "<span style='color:orange'>Data saved, but Email failed. Mailer Error: {$mail->ErrorInfo}</span>";
                            }
                            
                            echo $message; 
                            
                        } else { 
                            echo "<span style='color:red'>ERROR CREATING RECORD:</span> " . htmlspecialchars($stmt->error); 
                        } 
                        
                        $stmt->close(); 
                    } else { 
                        echo "<span style='color:red'>DATABASE ERROR:</span> Failed to prepare statement: " . htmlspecialchars($conn->error); 
                    } 
                } else { 
                    echo "<span style='color:red'>ERROR: All fields are required.</span>"; 
                } 
            } 
            if($_POST){
                if(isset($_POST["truncate"])){truncating();};
                if(isset($_POST["clear"])){clearing();};
                if(isset($_POST["drop"])){dropping();};
            }
        ?>
    </div>
    <form action="" method="POST">
        <button type="submit" name="truncate" >Truncate</button>
        <button type="submit" name="clear">Clear</button>
        <button type="submit" name="drop">Drop</button>
    </form>

    <form action="" method="POST">
        <h1>Email</h1>
        Your Name: <br><input type="text" name="from" id=""><br>
        Reciever Email: <br> <input type="text" name="to" id=""><br>
        The Heading: <br> <input type="text" name="subject" id=""><br>
        Message: <br><input type="text" name="body" id=""><br><br>
        <input type="submit" name="submit" value="Send">
    </form><br><br>
    
    <div>
    <?php
        echo"<h1 style='font-family:Arial;'>Information</h1>";
        echo"<br><b><hr></b>";
        $sql = "SELECT id, sender_name, reciever_email,message,reg_date FROM emailing";
        $result = $conn->query($sql);
        
        try {
            // 1. Check if the query itself failed
            if ($result === false) {
                // Replace $conn with your actual database connection variable name if it's different
                die("Database Query Failed: " . $conn->error); 
            }
        
            // 2. If it passed, check if we got any results
            if ($result->num_rows > 0) {
                // Loop through and display each row
                while ($row = $result->fetch_assoc()) {
                    echo "<hr><b>Post: --> </b>" . $row["id"] . "<hr><br>";
                    echo "<b>MESSAGE: </b> || " . $row["message"] . " || <br>";
                    echo "<b>BY: </b> '<em>" . $row["sender_name"] . "</em>'<br>";
                    echo "<b>TO: </b> '<em>" . $row["reciever_email"] . "</em>'<br>"; 
                    echo "<b>Published: </b>" . $row["reg_date"] . "<br><br>";
                }
            } else {
                echo "<span style='color:red'>No Posts Just Yet.</span>";
            }
            echo "<br><hr>";
        } catch (Exception $e) {
            echo "There is an Error: " . $e->getMessage();
        }
        
        
    ?>
    </div>
    
</body>
</html>