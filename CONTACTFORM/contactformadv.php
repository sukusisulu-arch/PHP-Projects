<div class="php">
<?php 
include 'connection.php'; 

$msg = ""; 

// Fix 1: Pass $msg by reference (&$msg) so changes stick globally
function message($trigger, &$msg){ 
    if($trigger === true){ 
        $msg = "<span style='color:green'>MESSAGE SENT</span>"; 
    } else { 
        $msg = "<span style='color:red'>ERROR SENDING MESSAGE</span>";
    } 
} 
function trigger($check){
    if($check){
        return true;
    }else{
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $name = $_POST['name'] ?? ''; 
    $email = $_POST['email'] ?? ''; 
    $message = $_POST['message'] ?? ''; 

    if (!empty($name) && !empty($email) && !empty($message)) { 
        $stmt = $connection->prepare("INSERT INTO contact (Name, Email, Message, Published) VALUES (?, ?, ?, NOW())"); 
        
        $stmt->bind_param("sss", $name, $email, $message); 
        
        if ($stmt->execute()) { 
            message(true, $msg); 

            // Email setup
            $to = "admin@example.com"; 
            $subject = "New Contact Form Submission"; 
            $body = "Name: $name\nEmail: $email\nMessage: $message"; 
            
            $clean_email = filter_var($email, FILTER_SANITIZE_EMAIL); 
            $headers = "From: " . (!empty($clean_email) ? $clean_email : "no-reply@example.com"); 
            // mail($to, $subject, $body, $headers); 
            trigger($stmt->execute());
            
        } else {
            message(false, $msg);
            $error = "Error: " . $stmt->error;
        }

        // Fix 2: Only close the statement if it was actually created
        $stmt->close(); 
    } else { 
        // Fix 3: Cleaned up the concatenation syntax error here
        message(false, $msg); 
        $error = "Error: All fields are required."; 
    } 
} 
?>

</div>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="shortcut icon" href="picture11.jpg" type="image/x-icon">
    <link rel="stylesheet" href="BOOTSTRAPWEB\css\bootstrap.min.css">
    <script src="BOOTSTRAPWEB\js\bootstrap.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family:Cambria;
        }
        .php{
            display: none;
        }
        .php.show{height:max-content;}
        .button{position:absolute;left:50%;}
        body {background:url('logo2.png');}
        

        /*Header*/
        header {
            backdrop-filter: blur(2px);
            display: flex;
            padding: 10px;
            position: sticky;
            /* Tells the element to stick when scrolling */
            top: 0;
            /* Specifies exactly where to stick (at the very top) */
            /* Ensures the header stretches across the screen */
            z-index: 100;
            align-items: center;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
            display:flexbox;
            background:rgba(0,0,0,0.3);
            justify-content:center; 
            color:white;font-size:30px;

        }
        .logo-div {
            width: 35%;
            justify-items: left;
            padding: 23px;
            background-image: url('logo2.png');
            background-repeat: no-repeat;
            background-size: contain;
            justify-content: center;
            height: 6vh;
            transition: color 0.2s ease, transform 0.2s ease;

        }
        .logo-div:hover{
            cursor:pointer;
            transform: scale(1.05);
        }

        .navigation {
            width: 60%;
            height: fit-content;
            color: white;
            text-align: center;
        }

        .navigation a {
            color: white;
            text-decoration: none;
            margin: 50px;
            font-size: 30px;
            font-family: Cambria;
            transition: ease 0.9s;
        }
        .navigation a:hover{
            font-weight: bolder;
            font-size: 36px;
            background-color: rgb(183, 183, 183,0.5);
            border-radius: 10px;
            padding: 3px;
        }

        /* Button wrapper to reset default browser styles */
        .menu-btn {
        background: none;
        border: none;
        cursor: pointer;
        padding: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
    
        /* Rotates the element 45 degrees clockwise */
        /*transform: rotate(90deg); */


        }

        /* SVG styling */
        .hamburger-icon {
        width: 40px;           /* Control width */
        height: 40px;          /* Control height */
        color: white;        /* Base icon color */
        transition: color 0.2s ease, transform 0.2s ease;
        }

        /* Hover effects */
        .menu-btn:hover .hamburger-icon {
        color: #007aff;        /* Changes color on hover */
        transform: scale(1.05); /* Subtle scale effect */
        }

        /* Active/Focus state for accessibility */
        .menu-btn:focus-visible {
        outline: 2px solid #007aff;
        border-radius: 4px;
        }


        /*Main*/
        main {
        }
        
        .container {
            display: flex;
            padding: 30px;
            backdrop-filter: blur(10px);
            margin: 0;
            overflow:hidden;
            background:rgba(0,0,0,0.6);

        }
        ::-webkit-scrollbar {
            display: none;
        }
        #menu {
            position: fixed;
            top: 0;
            right: -350px;          /* hidden off-screen */
            width: 300px;
            height: 100vh;
            background: #333;        
            color: linear-gradient(#fff,beige);
            padding: 1rem;
            transition: right 1s;
            z-index: 1000;
        } 
        #menu.open{
            right:0;
        }

        .menu-div h1{
            color: beige;
        }
        .menu-div a {
            text-decoration: none;
            color: white;
            display: flex;
            font-size: 30px;
        }
        .menu-div a:hover{
            color:blue;
            font-weight: 900;
        }
        
        .menu-div ul {
            justify-items: center;
            margin-top: 40px;
        }
        .form-div {
            justify-items:center;
            border-radius: 20px;
            background: rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            flex-wrap: wrap;
            width:100%;
            min-width: 0%;
            padding: 10vh;
            height:100%;
            color: rgb(242, 237, 237);
        }
        .form-div input {
            padding: 10px;
            width: 100%;
            min-width: 0%;
            flex-wrap: wrap;
            border-radius: 10px;
        }
        .form-div textarea {
            height: 50px;
            flex-wrap: wrap;
            width: 100%;
            min-width: 0%;
            border: none;
            border-radius:10px;
            font-family:Arial;
            padding:2px;
        }
        .form-div .submit{width:50%;min-width:10%;justify-content:center;flex-wrap: wrap;}
        #message,#message-container{
            border:solid;
            position:absolute;
            font-size:Arial;
            font-size:30px;
            top: 10%;
            right:38%;
            align-items: center;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
            transform:ease 4s;
            padding: 1rem;
            background: #e8f5e9;
            border: 1px solid #4caf50;
            border-radius: 4px;  
        }
        #notification-box {
            padding: 15px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin: 20px 0;
            width: max-content;
            position:absolute;
            font-size:Arial;
            font-size:30px;
            top: 10%;
            right:38%;
            
            /* Smooth fade animation settings */
            transition: opacity 0.5s ease;
            opacity: 1;
        }
        #notification-box {
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            margin-bottom: 15px;
            transition: opacity 0.5s ease; /* Takes 0.5 seconds to fade out smoothly */
        }

        
        /*Footer*/
        footer {
            background: rgb(37, 40, 37,1);
            justify-items: center;
            padding:10%;
        }
        footer p{
            color:white;
            font-size: 30px;
            font-family: fantasy;
        }

    </style>
    
</head>
     <!-- Simple Bootstrap Layout Structure -->
     <div class="container my-5 text-center">
                🎉 <h1>Welcome</h1>
    </div>
        
    <header>
        <div class="logo-div"></div>
        <nav class="navigation"></nav>

        <div class="menu-button-div" onclick="showhidemenu()">
            <button class="menu-btn" aria-label="Toggle Menu">
                <svg class="hamburger-icon" viewBox="0 0 24 24" width="24" height="24">
                        <!-- Top Bar -->
                        <line x1="4" y1="6" x2="20" y2="6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        <!-- Middle Bar -->
                        <line x1="4" y1="12" x2="20" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        <!-- Bottom Bar -->
                        <line x1="`4" y1="18" x2="20" y2="18" stroke="currentColor" stroke-width="2" stroke-linecap="round" />```
                </svg>
            </button>
        </div> 
    </header>
    
    <main>
        <div class="container">
            <div class="form-div">
                <form action="" method="POST">
                    <label for=""><h2>Who To Message??</h2></label><br>
                    Enter Name:<br><br><input type="text" name="name" required id="name"><br><br>
                    Enter Email:<br><br><input type="text" name="email" required id="email"><br><br>
                    Enter Your Message:<br><br><textarea name="message" id="" cols="30" rows="10"id="message"></textarea><br><br>
                    <input type="submit" value="Send" name="send" id="send" class="submit" >
                </form>
            </div>
          
                  
            
            <?php if (!empty($msg)): ?>
                <div id="notification-box">
                    <?php echo $msg; ?>
                </div>
            <?php endif; ?>

            <span id="message"></span>
            
                <div class="jumbotron jumbotron-fluid menu-div" id="menu">
                    <menu>
                        <h1>Menu</h1>
                        <ul>
                            <a href="" class="col">Home</a>
                            <a href="" class="col">About</a>
                            <a href="" class="col">SignUp</a>
                            <a href="" class="col">Login</a>
                            <a href="login.php" class="col">Admin</a>
                            <button id="close" onclick="showhidemenu()" class="col">Close Menu</button>  
                        </ul>
                    </menu>
                </div>
        </div>
    </main>
    
    <footer>
        <p>&copy;Copyright Reserved</p>
    </footer>

    
<script>
    var menu = document.getElementById('menu');

    function showhidemenu() {
        menu.classList.toggle('open');
    }   
</script>
<script>
    const send = document.getElementById('send');
    const span = document.querySelector('#message');
    const notification = document.querySelector('#notification-box');
    // 4. CLIENT-SIDE VALIDATION (Before submission)
    if (send) {
        send.addEventListener("click", function(event) {
            const inputs = document.querySelectorAll('input, textarea');
            const allFilled = [...inputs].every(el => el.value.trim() !== '');
            
            if(allFilled){
                if (notification) {
                    // Wait 5000 milliseconds (5 seconds), then start the fade out
                    setTimeout(() => {
                        notification.style.opacity = '0';
                        
                        // Wait an extra 500ms for the animation to finish, then remove it completely
                        setTimeout(() => {
                            notification.remove();
                        }, 500);
                        
                    }, 5000);
                }
            }

            if (!allFilled) {
                // Stop the form from submitting to PHP because it's empty
                event.preventDefault(); 
                
                if (span) {
                    // FIX 1: Reset styles so the warning shows up if they click a second time
                    span.style.display = 'inline-block'; // or 'block' depending on layout
                    span.style.opacity = '1';
                    span.style.transition = 'opacity 0.5s ease';
                    
                    // Set the warning text
                    span.innerHTML = '<p style="color:red">Enter something in all fields.</p>';
                    
                    // FIX 2: Move the timeout inside the error block so it only runs when empty
                    setTimeout(() => {
                        // Step A: Fade the message out smoothly using opacity
                        span.style.opacity = '0';
                        
                        // Step B: Completely hide it from layout after the fade finishes (0.5s)
                        setTimeout(() => {
                            span.style.display = 'none';
                        }, 500);
                        
                    }, 5000); // 5000 milliseconds = 5 seconds
                }
            }
        });
    }


</script>

</body>
</html>
