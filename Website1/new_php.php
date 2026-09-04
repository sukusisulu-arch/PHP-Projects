<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <div>
            <h1>Test 1</h1>
            <?php 
                echo "This is the first one";
                
                $servername = "sukus_server";
                $username = "sukus";
                $password = "Mawas";
                $dbname = "my_db";
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                if( $conn->connect_error ) {
                    die("There is a problem". $conn->connect_error);
                }
                echo "Connection Success";
                print_r(get_loaded_extensions());
                
                $conn->close();
            
                
            ?>
        </div>
        <div>
           <h1>Test 2</h1> 
           <?php
                echo "This is the Second one"
            ?>  
            
        </div>
        <div>
            <h1>Test 3</h1> 
            <?php
                echo "This is the Third one"
            ?>    
         </div>
    </main>
</body>
 <style>
    div{
        border: solid brown;
        background: white;
        height: 300px;
        justify-items: center;
    }
  
 </style>
</html>