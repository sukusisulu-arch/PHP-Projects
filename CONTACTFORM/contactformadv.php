<div class="php">
<?php
include 'connection.php';
$msg = "";
$trigger = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = $_POST['name'] ?? '';
    $email   = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    if (!empty($name) && !empty($email) && !empty($message)) {
        $stmt = $connection->prepare(
            "INSERT INTO contact (Name, Email, Message, Published) VALUES (?, ?, ?, NOW())"
        );
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            $msg     = "<span style='color:green'>MESSAGE SENT</span>";
            $trigger = true;
        } else {
            $msg = "<span style='color:red'>ERROR SENDING MESSAGE</span>";
        }
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
</head>


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
                    <input type="submit" value="Send" name="send" id="send" class="submit" onclick="showhide()">
                </form>
            </div>
            <div id="message"></div>
            <div>
                <div class="menu-div" id="menu" >
                    <menu>
                        <h1>Menu</h1>
                        <ul>
                            <a href="">Home</a>
                            <a href="">About</a>
                            <a href="">SignUp</a>
                                <a href="">Login</a>
                            <a href="login.php">Admin</a>  
                        </ul>
                    </menu>
                </div>
        </div>
    </main>
    
    <footer>
        <p>&copy;Copyright Reserved</p>
    </footer>
<style>
    * {
        margin: 0;
        padding: 0;
        font-family:Cambria;
    }
    .php{
        display:none;
    }
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
    #message{
        border:solid;
        height:max-content;
        width:max-content;
        position:absolute;
        font-size:Arial;
        font-size:30px;
        top: 10%;
        right:38%;
        z-index: 100;
        align-items: center;
        box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
        transform:ease 4s;
        padding: 1rem;
        background: #e8f5e9;
        border: 1px solid #4caf50;
        border-radius: 4px;
        
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
<script>
    var menu = document.getElementById('menu');

    function showhidemenu() {
        menu.classList.toggle('open');
    }   
</script>
<script>
    const msgDiv = document.getElementById('message');
    const trigger = <?php echo json_encode((bool)$trigger); ?>;
    const message = <?php echo json_encode($msg); ?>;

function showhide() {
    if (!trigger) return;

    const inputs = document.querySelectorAll('input');
    const allFilled = [...inputs].every(el => el.value.trim() !== '');

    if (allFilled) {
        msgDiv.innerHTML = message;
        msgDiv.style.display = 'block';
        msgDiv.style.overflow = 'hidden';
        msgDiv.style.height = 'max-content';
        msgDiv.style.transition = 'height 2s';

        // Force reflow, then animate to full height
        void msgDiv.offsetHeight;
        msgDiv.style.height = msgDiv.scrollHeight + 'px';

        setTimeout(() => {
            msgDiv.style.height = '0';
        }, 5000);
    } else {
        msgDiv.innerHTML = '<p>Enter something in all fields.</p>';
        msgDiv.style.display = 'block';
    }
}   
</script>

</body>
</html>