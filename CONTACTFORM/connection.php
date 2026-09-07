<?php
    //Connection Establishment
    $connection = new mysqli("localhost","root","","my_database");
    if ($connection->connect_error) {
    die('<span style="color:red">Cant Connect To DB. $connection->connect_error</span><br>');
    }else{
        echo '<span style="color:green">Connected to DB</span><br>';
    }
    
    //Table Creation
    $contactTable = "CREATE TABLE IF NOT EXISTS contact(
        Post_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(255) NOT NULL,
        Email VARCHAR(150) NOT NULL,
        Message TEXT NOT NULL,
        Published TIMESTAMP NULL DEFAULT NULL
    )";

    // Confirm Table Creation
    if ($connection->query($contactTable)) {
        echo '<span style="color:green">Table Created or Already Exists</span><br>';
    } else {
        echo '<span style="color:red">Table Creation Failed: </span>' . $connection->error . "<br>";
    }
?>
