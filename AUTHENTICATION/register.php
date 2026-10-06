<?php
include 'config.php';

// Initialize messages to prevent undefined variable notices
$msg = ''; 

if (isset($_POST['submit'])) {
    // 1. Corrected input names to match the HTML form fields
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($name) && !empty($email) && !empty($password)) {
        
        // 2. Hash the password securely using standard modern hashing
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // 3. Fixed SQL column/placeholder count. Handled NOW() directly in the query.
        $stmt = $conn->prepare("INSERT INTO registering (name, email, password, created_at) VALUES (?, ?, ?, NOW())");
        
        if ($stmt) {
            $stmt->bind_param("sss", $name, $email, $hashed_password);
            
            // 4. Executed only once
            if ($stmt->execute()) {
                $msg = "<span style='color:green'>REGISTRATION SUCCESSFUL</span>";
                
                // Email setup (Optional background notification)
                $to = "admin@example.com";
                $subject = "New Registration Notification";
                $body = "Name: $name\nEmail: $email";
                $clean_email = filter_var($email, FILTER_VALIDATE_EMAIL);
                $headers = "From: " . ($clean_email ? $clean_email : "no-reply@example.com");
                // mail($to, $subject, $body, $headers);
                
            } else {
                $msg = "<span style='color:red'>ERROR CREATING ACCOUNT:</span> " . htmlspecialchars($stmt->error);
            }
            $stmt->close();
        } else {
            $msg = "<span style='color:red'>DATABASE ERROR:</span> Failed to prepare statement.";
        }
    } else {
        $msg = "<span style='color:red'>ERROR: All fields are required.</span>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        *{
            padding:0;
            margin:0;
            justify-content:center;
        }
        body{
            background:black;
            color:white;
            padding:20%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Register</h1>
        <nav>
            <a href="dashboard.php">Dashboard</a> | 
            <a href="logout.php">Logout</a> | 
            <a href="login.php">Login</a>
        </nav>
    </header>
    <main>
        <?php if (!empty($msg)): ?>
            <div id="notification-box">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>

        <!-- Secure password field implementation -->
        <form action="" method="post">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            
            <input type="submit" value="Register" name="submit">
        </form>
    </main>
    <footer>
    </footer>
</body>
</html>
