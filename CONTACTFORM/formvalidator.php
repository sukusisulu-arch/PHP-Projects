<?php
    if(isset($_POST["send"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        
        // 2. Insert Query (Fixed quotes around strings and added missing closing parenthesis)
        $sql = "INSERT INTO contact (Name, Email, Message, Published)
                VALUES ('$name', '$email', '$message', NOW())";
        
        if($connection->query($sql)){
            echo "<span style='color:green; font-weight:900;' id='msg'>Message Sent</span><br>";
        } else {
            echo "Message Not Sent: " . $connection->error . "<br>"; // Fixed missing '>' in <br>
        }
        $connection->close();
    }
    else {
        echo '<span style="color:red">ContactForm: not Working</span><br>';
    }
?>
?<?php
    
?>