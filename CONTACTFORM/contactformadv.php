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
        <div class="logo-div">
        </div>
        <nav class="navigation">
           
        </nav>

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
                <form action="" method="post">
                    <label for=""><h2>Who To Message??</h2></label><br>
                    Enter Name:<br><br><input type="text" name="name" required id="name"><br><br>
                    Enter Email:<br><br><input type="text" name="email" required id="email"><br><br>
                    Enter Your Message:<br><br><textarea name="message" id="" cols="30" rows="10"id="message"></textarea><br><br>
                    <input type="submit" value="Send" name="send" id="send" class="submit">
                </form>
            </div>
            
            
            
            <div class="menu-container" id="menu">
            
                    <div class="menu-div" >
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
        </div>
    </main>
    
    <footer>
        <p>&copy;Copyright Reserved</p>
    </footer>
    <style>
        * {
    margin: 0;
    padding: 0;
}
body {background:radial-gradient(red,green,blue,white);height:max-content;justify-content:center;display: flexbox;background-size:300%;}

/*Header*/
header {
    backdrop-filter: blur(10px);
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
    display:flexbox;background:rgba(0,0,0,0.6);
    justify-content:center; 
    color:white;font-size:30px;

}
.logo-div {
    width: 35%;
    justify-items: left;
    padding: 23px;
    background-image: url('logo1.png');
    background-repeat: no-repeat;
    background-size: 100%;
    background-position: -50%;
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
    background:linear-gradient(skyblue,green);
    backdrop-filter: blur(10px);
}

.container {
    display: flex;
    padding: 30px;
    backdrop-filter: blur(10px);
    margin: 0;
    overflow:hidden;
}
.whole-menu{
    position: fixed;
    width: 100px;
    min-width: 100%;
    border:solid green;
    height: 100vh;
}
.menu-container {
    width: 200px;
    flex-wrap: wrap;
    box-shadow: 1px 1px 1px rgba(2, 2, 2, 0.5); 
    overflow: hidden;
    position: fixed;
    height:100vh;
}
::-webkit-scrollbar {
    display: none;
}
.menu-div {
    position: relative;
    display: flex;
    height: 100vh;
    text-align: center;
    justify-content: top;
    font-family: cambria;
    font-size: 20px;
    flex-direction: column;
    background: linear-gradient(
    rgba(5, 116, 12, 0.9),rgba(255, 213, 1, 0.9));
    box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    width: 250px;
}
.menu-div h1{
    color: skyblue;
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
.menu-div button:hover{
    padding: 3px;
    background: greenyellow;
}
.menu-div button{
    padding: 6%;
    background: greenyellow;
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
    border: double;
    border-color:linear-gradient(blue,magenta);
}
.form-div .submit{width:50%;min-width:10%;justify-content:center;flex-wrap: wrap;}
/*Footer*/
footer {
    background: rgb(37, 40, 37);
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
    var statusButton = document.getElementById('status-button');


    menu.style.right = '-150vh';
    
    var display1 = 0;
    function showhidemenu() {

        if (display1 == 0) {
            menu.style.right = '-150vh';
            menu.style.transition = '1s';
            status = false;
            display1 = 1;
            return 1;

        } else {
            menu.style.right = '0vh';
            menu.style.transition = '1s';
            status = true;
            display1 = 0;
            return 0;
            console.log(display1);
        }


    }

   

</script>

</body>
</html>