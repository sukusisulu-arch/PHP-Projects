<?php
// Database connection
include 'connection.php';
// Create table if not exists
$connection->query($table2);

// Handle form submission
if(isset($_POST['submit'])){
    $name = $connection->real_escape_string($_POST['name']);
    $email = $connection->real_escape_string($_POST['email']);
    $message = $connection->real_escape_string($_POST['message']);

    // Insert into database
    $sql = "INSERT INTO secure_contacts (name, email, message) VALUES ('$name', '$email', '$message')";
    if($connection->query($sql) === TRUE){
        // Send email
        $to = "admin@example.com";
        $subject = "New Contact Form Submission";
        $body = "Name: $name\nEmail: $email\nMessage: $message";
        $headers = "From: $email";

        mail($to, $subject, $body, $headers);

        $success = "Thank you! Your message has been sent.";
    } else {
        $error = "Error: " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form (PHP + MySQL)</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        input, textarea { width: 300px; padding: 5px; margin: 5px 0; }
        input[type=submit] { width: auto; }
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
    <h2>Contact Form (store in DB + email)</h2>

    <?php
    if(isset($success)) echo "<p class='success'>$success</p>";
    if(isset($error)) echo "<p class='error'>$error</p>";
    ?>

    <form method="post" action="">
        Name: <br><input type="text" name="name" required><br>
        Email: <br><input type="email" name="email" required><br>
        Message: <br><textarea name="message" rows="5" required></textarea><br>
        <input type="submit" name="submit" value="Send Message">
    </form>
</body>
</html>
