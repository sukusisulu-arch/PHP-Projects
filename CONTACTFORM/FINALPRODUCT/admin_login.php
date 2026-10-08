<?php 
$message = '<p></p>'; 
$message_color = 'black'; 
$trigger_fade = false; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $name = htmlspecialchars($_POST['name'] ?? ''); 
    $password = htmlspecialchars($_POST['password'] ?? ''); 
    $validName = 's'; 
    $validPassword = 'm'; 

    if ($name === $validName && $password === $validPassword) { 
        $message = '<h3>Login Success</h3>'; 
        $message_color = 'green'; 
        $trigger_fade = true; 
        header('Refresh: 2; url=status.php');
        $validName = ''; 
        $validPassword = '';  
    } else { 
        $message = '<h3>Enter Correct Stuff</h3>'; 
        $message_color = 'red'; 
    } 
} 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Admin Login</title> 
    <link rel="stylesheet" href="/Projects/BOOTSTRAPWEB/css/bootstrap.min.css"> 
    <script src="/Projects/BOOTSTRAPWEB/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://w3.org' viewBox='0 0 100 100'><text y='0.9em' font-size='90'>💭</text></svg>">
 
    <style> 
        * { margin: 0; padding: 0; font-family: Arial, sans-serif; } 
        
        body { 
            background: linear-gradient(grey, navy, black); 
            -ms-overflow-style: none; 
            scrollbar-width: none; 
            overflow-y: scroll; 
        } 
        header{
            background: rgba(0,0,0,0.6); 
            align-items:center;
            padding:30px;
            color:white;
        }
        
        .container-fluid { 
            height: 4vh; 
            display: flex; 
            flex-direction: column; 
            background: rgba(0,0,0,0.6); 
            align-items: center; 
            color: white; 
            font-size: 50px; 
            padding-top:25px;
        } 
        
        /* FIXED: Applied the dynamic PHP color directly into the message text styling */
        .login-div h3 { 
            color: <?php echo $message_color; ?>; 
            text-align: center; 
        } 
        
        .container { 
            display: flex; 
            flex-direction: column; 
            background: rgba(0,0,0,0.7); 
            text-align: center; 
            height: 76vh; 
            padding: 10vw; 
        } 
        
        /* FIXED: Matched the fade duration to your 2-second PHP refresh timer */
        .fade-out { 
            animation: fadeEffect 2s forwards; 
            animation-delay: 0.5s; 
        } 
        
        @keyframes fadeEffect { 
            from { opacity: 1; } 
            to { opacity: 0; } 
        } 
        
        /* FIXED: Added semicolons at the end of properties to follow strict CSS rules */
        input { 
            border: none; 
            border-radius: 3px; 
            padding: 2vh; 
            margin: 20px; 
            width: 30vh; 
            height: 50px; 
            font-size: 20px; 
        }
    </style> 
</head>
<body>
    <header>
        <h1>Welcome Admin</h1>
        <a class="btn btn-outline-secondary" href="contactform.php">Home</a>
        
        <div class=" <?php echo $trigger_fade ? 'fade-out' : ''; ?>">
        <div class="login-div">
            <?php echo $message; ?>
        </div>
    </div>
    </header>
    <!-- The class is injected dynamically here to trigger the CSS keyframes -->
    

    <div class="container <?php echo $trigger_fade ? 'fade-out' : ''; ?>">
    <form action="" method="POST" id="loginForm">
        <input type="text" name="name" placeholder="Username" id="usernameInput" required>
        <input type="password" name="password" placeholder="Password" id="passwordInput" required>
        <br>
        <input type="submit" id="submitBtn" value="Login" style="background: #007bff; color: white; cursor: pointer;">
    </form>
</div>




</body>
</html>
