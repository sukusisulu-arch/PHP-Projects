<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
           <?php echo "Greetings There" ?>
        </header>
        <main>
            <div class="form-div">
                <form action="indexing.php" method="POST">
                        <input type="text" name="inside" id="Name" placeholder="Some Input" class="input">
                        <input type="submit" value="Send" class="submit">
                       
                        <textarea name="output" id="output" row="4">
                                
                        </textarea>
                </form> 
                <button>+</button>
                <button>/</button>
                <button>-</button>
                <button>*</button>
                
                <div class="output-div">
                    
                    <?php echo "Greetings There";
                          echo "<br>".date("Y-m-d H:i:s")
                          
                            
                    ?>
                </div>
                    <div>
                        <h1>Some Connection Successfulness</h1><br>
                        <?php
                            $servername = "localhost";
                            $username = "sukus";
                            $password = "Mawas";
                            $dbname = "sukus_server";
                            
                            $conn = new mysqli($servername, $username, $password, $dbname); 
                            if ($conn->connect_error) {
                                die("There is a DB error". $conn->connect_error);
                            }
                                echo "Connection Succesful";
                            
                            $conn->close();
                        ?>
                    </div>
                     
                </div>
            </div>
        </main>
        <footer>
            
        </footer>
      
        
    </body>
    
</html>