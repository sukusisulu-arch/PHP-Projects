<?php
$connection = new mysqli("127.0.0.1","root","","my_database");

function conn(){
            if ($connection->connect_error) {
                die("Cant Connect: ". $connection->connect_error);
            }
            else {
                echo "DB connected";
                
            }
}
function db() {
$taskDB = "CREATE TABLE tasking(
                task_number INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                task VARCHAR(150) NULL,
                published_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                test VARCHAR(150) NULL
            )";
            
            if($connection->query($taskDB)) {
                echo "<br>Table:taskDB--Created<br>";
            }else{
                echo "<br>Table:taskDB--Failed".$connection->error;
            }
}       
 ?>           