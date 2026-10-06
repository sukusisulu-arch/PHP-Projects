<div style="display:non;">
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
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="shortcut icon" href="picture11.jpg" type="image/x-icon">
    <link rel="stylesheet" href="\Projects\BOOTSTRAPWEB\css\bootstrap.min.css">
    <script src="BOOTSTRAPWEB\js\bootstrap.min.js"></script>
    <style>
        * { margin: 0; padding: 0; font-family: Cambria; }
        body { background: blac; }
        
        /*Header*/
        header { backdrop-filter: blur(2px); display: flex; padding: 10px; position: sticky; top: 0; z-index: 100; align-items: center; box-shadow: 10px 10px 10px rgba(0,0,0,0.2); display: flexbox; background: rgba(0,0,0,0.3); justify-content: center; color: white; font-size: 30px; }
        .logo-div { width: 35%; justify-items: left; padding: 23px; background-image: url('logo2.png'); background-repeat: no-repeat; background-size: contain; justify-content: center; height: 6vh; transition: color 0.2s ease, transform 0.2s ease; margin: 10px; }
        .logo-div:hover { cursor: pointer; transform: scale(1.05); }
        .navigation { width: 60%; height: fit-content; color: white; text-align: center; }
        .navigation a { color: white; text-decoration: none; margin: 50px; font-size: 30px; font-family: Cambria; transition: ease 0.9s; }
        .navigation a:hover { font-weight: bolder; font-size: 36px; background-color: rgb(183,183,183,0.5); border-radius: 10px; padding: 3px; }
        .menu-btn { background: none; border: none; cursor: pointer; padding: 8px; display: inline-flex; align-items: center; justify-content: center; margin-right: 20px; }
        .hamburger-icon { width: 40px; height: 40px; color: white; transition: color 0.2s ease, transform 0.2s ease; }
        .menu-btn:hover .hamburger-icon { color: #007aff; transform: scale(1.05); }
        .menu-btn:focus-visible { outline: 2px solid #007aff; border-radius: 4px; }
        
        /*Main*/
        main { background: rgba(0,0,0,0.7); }
        .container { display: flex; padding: 30px; backdrop-filter: blur(10px); margin: 0; background: rgba(0,0,0,0.7); width: 100vw; }
        ::-webkit-scrollbar { display: none; }
        #menu { position: fixed; top: 0; right: -350px; width: 300px; height: 100vh; background: #333; color: linear-gradient(#fff,beige); padding: 1rem; transition: right 1s; z-index: 1000; }
        #menu.open { right: 0; }
        .menu-div h1 { color: lightgrey; }
        .menu-div a { text-decoration: none; color: white; display: flex; font-size: 30px; }
        .menu-div a:hover { color: bisque; font-weight: 900; }
        .menu-div ul { justify-items: center; margin-top: 40px; }
        .form-div { justify-items: center; border-radius: 20px; background: rgba(225, 225, 225, 0.2); backdrop-filter: blur(10px); flex-wrap: wrap; width: 100%; min-width: 0%; padding: 10vh; height: 100%; color: rgb(242, 237, 237); }
        .form-div input { padding: 10px; width: 100%; min-width: 0%; flex-wrap: wrap; border-radius: 10px; }
        .form-div textarea { height: 50px; flex-wrap: wrap; width: 100%; min-width: 0%; border: none; border-radius: 5px; font-family: cambria; padding: 2px; border: solid #eefffe; }
        .form-div .submit { width: 50%; min-width: 10%; justify-content: center; flex-wrap: wrap; }
        #message { position: absolute; font-size: Arial; font-size: 30px; top: 2%; right: 10%; transform: ease 4s; }
        #notification-box { padding: 15px; margin: 20px 0; width: max-content; position: absolute; font-size: Arial; font-size: 30px; top: 2%; right: 10%; padding: 10px; color: #155724; margin-bottom: 15px; transition: opacity 0.5s ease; }
        
        /*Footer*/
        footer { background: rgb(37, 40, 37, 1); justify-items: center; padding: 6%; }
        footer p { color: white; font-size: 30px; font-family: fantasy; }
    </style>  
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
                    <line x1="`4" y1="18" x2="20" y2="18" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button>
        </div> 
    </header>
    
    <main class="container-fluid">
            <div class="form-div">
                <span id="message">
                    <?php if ($trigger === true) { echo $msg;} ?>
                </span>
                <form action="" method="POST" id="mail-form">
                    <label for=""><h2>Who To Message??</h2></label><br>
                    Enter Your Name:<br><br><input type="text" name="name" required id="name"><br><br>
                    Enter Receiver's Email:<br><br><input type="email" name="email" required id="email"><br><br>
                    Enter Your Message:<br><br><textarea name="message" id="" cols="30" rows="10"id="message" class="btn btn-outline-secondary" type="message"></textarea><br><br>
                    <input type="submit" value="Send" name="send" id="send" class="submit btn btn-secondary" >
                </form>
            </div>

            <div class="jumbotron jumbotron-fluid menu-div" id="menu">
                <menu>
                    <h1 class="btn btn-outline-secondary" onclick="showhidemenu()">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" >
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </h1>
                    <ul>
                        <a href="" class="col btn btn-outline-dark">Home</a>
                        <a href="" class="col btn btn-outline-dark">About</a>
                        <a href="" class="col btn btn-outline-dark">SignUp</a>
                        <a href="" class="col btn btn-outline-dark">Login</a>
                        <a href="/Projects\CONTACTFORM\FINALPRODUCT\view\login.php" class="col">Admin</a><br>
                    </ul>
                </menu>
            </div>
    </main>
    
    <footer>
        <p>&copy;Copyright Reserved</p>
    </footer>
 
    <script>
         var menu = document.querySelector('#menu');
    
        const send = document.querySelector('#send');
        const span = document.querySelector('#message');
        
        const alertBox = document.querySelector('#notification-box');
        var mailForm = document.querySelector('#mail-form');
        
        function showhidemenu() {
            menu.classList.toggle('open');
        }   

        // 4. CLIENT-SIDE VALIDATION (Before submission)
        if (send) {
            send.addEventListener("click", function(event) {
                const inputs = document.querySelectorAll('input, textarea');
                const allFilled = [...inputs].every(el => el.value.trim() !== '');
                
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
                
        if (alertBox && alertBox.innerText.trim() !== "") {
            setTimeout(() => {
                alertBox.style.opacity = '0';
                setTimeout(() => { alertBox.style.display = 'none'; }, 500);
            }, 5000); // 5000ms = 5 seconds
        }


        mailForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevents the traditional page reload

            const statusContainer = document.getElementById('message');
            const formData = new FormData(this);
            
            // Append the mandatory form flags so PHP knows it's submitted via AJAX
            formData.append('send', 'true');
            formData.append('AJAX', 'true');

            // 1. Instantly display your loading state
            statusContainer.innerHTML = "<span style='color: #3498db;'>Sending...</span>";
            statusContainer.style.opacity = "1";

            // 2. Submit data to the current page URL behind the scenes
            fetch('/CONTACTFORM/FINALPRODUCT/control/auth.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(phpOutput => {
                // 3. Replace "Sending..." with your exact $msg generated by PHP
                if (phpOutput) {
                    statusContainer.style.display = 'inline-block'; 
                    statusContainer.style.opacity = '1';
                    statusContainer.style.transition = 'opacity 0.5s ease';
                    
                    statusContainer.innerHTML = phpOutput;
                    
                    //Clear all input fields after sending
                    this.querySelectorAll('input, textarea').forEach(el => {
                        el.value = ""; 
                    });
                    document.querySelector('#send').value = "Send";
                    // FIX 2: Move the timeout inside the error block so it only runs when empty
                    setTimeout(() => {
                        // Step A: Fade the message out smoothly using opacity
                        statusContainer.style.opacity = '0';
                        
                        // Step B: Completely hide it from layout after the fade finishes (0.5s)
                        setTimeout(() => {
                            statusContainer.style.display = 'none';
                        }, 500);
                        
                    }, 5000); // 5000 milliseconds = 5 seconds
                }
                
            })
            .catch(error => {
                statusContainer.innerHTML = "<span style='color:red'>An error occurred on the client side.</span>";
            });
        });

    </script>

</body>
</html>
