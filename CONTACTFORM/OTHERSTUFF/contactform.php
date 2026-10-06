<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    
    <header>
        <button onclick="showhidemenu()" >Menu</button>
        <h1>Welcome To this Webpage</h1>  
    </header>
    
    <main>
        <div class="container-div">
            <menu id="menu">
                <div class="menu-nav">
                    <h3>Menu</h3>
                    <a href="">Login</a>
                    <a href="">SignUp</a>
                    <a href="">About US</a>
                    <button class="status-button" onclick="showhidestatus()">Show Status</button>
                </div>
            </menu>
                    
                <div class="status-div" id="status-div">
                    <table>
                        <br>
                        <tr>
                            <button id="sqlButton" style="background-color: red; color: white;">Delete Data</button>
                        </tr><br><br>
                        <h1>
                            <tr>Status</tr>
                        </h1>
                        <tr>
                            <div id="statusMessage"></div>
                        </tr><br>
                        <!--Connection Establishment-->
                        <tr>
                            <div><?php include 'connection.php'?></div>
                        </tr><br>
                        <!--Form Validator Div-->
                        <tr>
                            <div><?php include'formvalidator.php'?></div>
                        </tr><br>
                    </table>
                </div>
            </menu>
            
            <div class="form-div">
                <br><br>
                <h2>Fill Out</h2>
                <form action="" method="post">
                    Enter Name:<br><br><input type="text" name="name"  required id="name"><br><br>
                    Enter Email:<br><br><input type="text" name="email"  required id="email"><br><br>
                    Enter Your Message:<br><br><textarea name="message" id="" cols="30" rows="10" id="message"></textarea><br><br>
                    <input type="submit" value="Send Message" name="send" id="send" class="submit">
                </form>
            </div>
        </div>
    </main>
    
    <footer>
        <h1>This is a Footer</h1>
    </footer>
    
    <style>
        *{
    padding:0;
    margin:0;
    box-sizing: border-box;
}

header{
    background:grey;
    height:100px;
    text-align:center;
    padding:10px;
    display:flex;
    gap:20%;
    position: sticky;      /* Tells the element to stick when scrolling */
    top: 0;                /* Specifies exactly where to stick (at the very top) */
    width: 100%;           /* Ensures the header stretches across the screen */
    z-index: 100;   
}
a{text-decoration:none;margin:10px;color:white;
    font-family:white; font-size:1.5rem;
    padding:4px;border-radius:10px;transition:ease-out 0.1s;
    display: flex;
    flex-direction:row;
    text-align:center;
}
    
a:hover{
    background-color: rgba(255, 255, 255, 0.25); 
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(8px); 
    box-shadow: 10px 10px 10px 1px rgba(0,0,0,0.1);
}
.form-div{
    align-content:center;
    width: 50%;
    padding:50px;
    height:max-content;
    border-radius:10px;
    backdrop-filter: blur(10px);
    background-color: rgba(255, 255, 255, 0.25); 
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(8px); 
    box-shadow: 10px 10px 10px 1px rgba(0,0,0,0.1);
    color:white;
    font-family:cambria;
    position: absolute;
    right: 0%;
    display: flex;
    flex-direction: column;
    
}
main{
    background-image:url(picture11.jpg);
    background-repeat:no-repeat;
    background-size:cover;   
    border: solid;
    height: 1000px;
    gap: 10%;
    display: flex;
    width:100%;
    display: flex;
    flex-wrap: wrap;
    
  
}
.container-div{
    border: solid;
    width:100%;
    max-width: 45%;
    border-radius:30px; 
}
.menu-nav{
    background: rgb(150, 150, 150);
    display: flex;
    flex-direction: column;
    padding: 20px; 
    width: 200px;
    gap: 20px;
    width:100%;
    flex-wrap: wrap;
}
.status-div{
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    border: solid;  
    font-size: larger;
    padding: 20px;  
    display: flex;
    flex-direction: column-reverse;
}
menu{
    position: absolute;
    text-align: center;
    height: 519.5px;
    width: 50%;
    display: flex;
    flex-direction:row;
    color: aliceblue;
    backdrop-filter: blur(10px);
    background: rgba(0,0,0,0.1);
    h3{font-size: 40px;}
    a{color: rgb(12, 12, 12);text-decoration:none;font-family:arial;
        font-size:20px;
    }
    a:hover{background: whitesmoke;}
    .status-button{background:rgba(0,0,0,0.1);backdrop-filter:blur(10px); padding: 5px; font-family: arial black;}
    .status-button:hover{background: white;}
    
}
.form-div input{
    padding:10px;
    width:100%;
    max-width: 45%;
    border-radius:30px; 
    display: flex;
    flex-wrap: wrap;
}
.submit{
    border-radius:10px;
    width:100%;
    max-width: 45%;
    border-radius:30px; 
    display: flex;
    flex-wrap: wrap;  
}
textarea{
    background:red;
    width:100%;
    max-width: 100%;
    border-radius:30px; 
    display: flex;
    flex-wrap: wrap;
    height:50px;
}
footer{
    background-color: rgba(255, 255, 255, 0.25); 
    height:100px;  
    text-align:center; 
}

    </style>
    <script src="scriptfile.js"></script>
</body>
</html>