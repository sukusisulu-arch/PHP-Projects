<?php
    $message = "<p></p>";
    $message_color = "black";
    $trigger_fade = false;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST['name'] ?? '';
        $password = $_POST['password'] ?? '';
        
        $validName = "s";
        $validPassword = "m";
        
        if ($name === $validName && $password === $validPassword) {
            $message = "<h3>Login Success</h3>";
            $message_color = "green";
            $trigger_fade = true; // Signals the HTML to start the CSS fade-out animation

            // FIXED SERVER REDIRECT: Tells the server to wait 3 seconds, then push to status.php
            header("Refresh: 3; url=status.php");
        } else {
            $message = "<h3>Enter Correct Stuff</h3>";
            $message_color = "red";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="BOOTSTRAPWEB\css\bootstrap.min.css">
    <script src="BOOTSTRAPWEB\js\bootstrap.min.js"></script>
    <!-- Outputs the redirect tag only if the login succeeds -->
    <style>
        *{margin:0;padding:0;font-family:Arial;}
        body {background:linear-gradient(grey,brown,navy,black);}
        section{height:30vh;display:flex;flex-direction:column;background:rgba(0,0,0,0.6);align-items:center;color:white;font-size:30px;}
        .login-div{text-align: center;}
        .container{display: flex;flex-direction:column;background:rgba(0,0,0,0.7);text-align:center;height:70vh;padding:10vw;}
        .fade-out {animation: fadeEffect 3s forwards;animation-delay: 1s;}
        @keyframes fadeEffect {from { opacity: 1; } to { opacity: 0; }}
        .container input{border:none;border-radius:3px;padding:20px;margin:20px;width:30vh}
        .container button{width:100px;margin:1px;padding:10px;font-size:20px;border:white;display:flex;}
        form button:hover{border-radius:10px;background:green;}
        .home:hover{background:magenta;}
        .home{position:relative;top:-2%;right:-27%;width:100px;padding:1vh;}
    </style>
</head>
<body>
    <section>
        <br>
        <a class="home" href="contactformadv.php" style="text-decoration:none;background:white;border-radius:10px;">Home</a>
            <H1>Welcome Admin</H1>
        </form>
    </section>
    
    <div class="container">

        <form method="POST" action="login.php">
            <div id="login-div" class="login-div <?php echo ($trigger_fade) ? 'fade-out' : ''; ?>" style="color: <?php echo $message_color; ?>;">
                <?php echo $message; ?>
            </div><br>
            <input type="text" id="name" name="name" placeholder="Enter Name" required>

            <input type="password" id="password" name="password" placeholder="Enter Password" required>

            <button type="submit" id="login">Login</button>
        </form>

    </div>
    <div class="progress">
            <div class="progress-bar" style="width: 10%;"></div>
        </div>
</body>
</html>





   