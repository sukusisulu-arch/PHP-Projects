gi
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <form action="" method="post">
            <h1>Welcome Admin</h1>
            <label for="name">Enter Your Name</label>
            <input type="text" id="name" name="name">
            <label for="password">Enter Your Password</label>
            <input type="password" id="password" name="password">
            <button id="login" name="login">Login</button>
            <button id="loging"></button>
            <div id="login-div">
                
            </div>
        </form>
        
       <style>
            *{margin:0;padding:0;font-family:Arial;}
            form{display:flex;flex-direction:column;background:pink;border:solid;padding:200px;}
            form input{width:200px;padding:10px;border:none;border-radius:3px;margin: 5px;}
            form label{margin-top:10px;}
            form button{width:100px;margin:10px;padding:10px;}
        </style>
        <div>
            
            <?php
                include 'adminloginvalidator.php';
                $functional;
            ?>
        </div>
        
    </div>
    
    
    
    


    
<script>
        
    var loginButton = document.getElementById('login');
    var loginDiv = document.getElementById('login-div');

    loginDiv.innerHTML = '<p>Login</p>';

    loginButton.addEventListener("click", function() {
    // 1. FIXED: Added .value to grab the text inside the inputs
    var name = document.getElementById('name').value;
    var password = document.getElementById('password').value;
    
    var validName = "Suku";
    var validPassword = "Mawa";
    
    // Reset opacity instantly just in case it was hidden from a previous attempt
    loginDiv.style.opacity = '1';
    loginDiv.style.transition = 'none';

    // 2. FIXED: Comparing raw string text values directly
    if (name === validName && password === validPassword) {
        loginDiv.innerHTML = '<h3 style="color:green;">Login Success</h3>';
        
        // Trigger smooth fade out
        startFadeOut(loginDiv);
    } else {
        // 3. FIXED: Catch-all fallback if ANY input string is wrong
        loginDiv.innerHTML = '<h3 style="color:red;">Enter Correct Stuff</h3>';
        
        // Trigger smooth fade out
        startFadeOut(loginDiv);
    }
    });

    // Helper function to handle the smooth disappearing act
    function startFadeOut(element) {
        // Wait 1 second before starting the fade out sequence
        setTimeout(function() {
            element.style.transition = 'opacity 3s ease'; // Tell CSS to animate opacity over 3s
            element.style.opacity = '0';                 // Dim it down to invisible
        }, 10000);
    }

</script>     

<script>
    var loginButton = document.getElementById('loging');
    var loginDiv = document.getElementById('login-div');

    loginDiv.innerHTML = '<p>Login</p>';

    loginButton.addEventListener("click", function() {
        var name = document.getElementById('name').value;
        var password = document.getElementById('password').value;
        
        var validName = "Suku";
        var validPassword = "Mawa";
        
        // Reset opacity instantly for fresh attempts
        loginDiv.style.opacity = '1';
        loginDiv.style.transition = 'none';

        if (name === validName && password === validPassword) {
            loginDiv.innerHTML = '<h3 style="color:green;">Login Success</h3>';
            
            // 1. Fade out the login box
            startFadeOut(loginDiv, function() {
                // 2. REDIRECT: Changes the page URL to your status page file after the fade completes
                window.location.href = 'status.php'; 
            });
        } else {
            loginDiv.innerHTML = '<h3 style="color:red;">Enter Correct Stuff</h3>';
            
            // Just fade out the error message so they can try typing again
            startFadeOut(loginDiv);
        }
    });

    // Updated helper function that accepts an optional task to do after fading
    function startFadeOut(element, callback) {
        setTimeout(function() {
            element.style.transition = 'opacity 3s ease';
            element.style.opacity = '0';
            
            // If a redirect rule was passed, wait for the 3s animation to finish before moving pages
            if (callback) {
                setTimeout(callback, 3000); 
            }
        }, 1000);
    }

</script>
</body>
</html>