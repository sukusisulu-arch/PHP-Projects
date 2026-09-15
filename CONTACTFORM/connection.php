<?php
    //Connection Establishment
    $connection = new mysqli("localhost","root","","my_database");
    if ($connection->connect_error) {
    die('<span style="color:red">Cant Connect To DB. $connection->connect_error</span><br>');
    }else{
        echo '<span style="color:green">Connected to DB</span><br>';
    }
    
    //Table Creation
    $table1 = "CREATE TABLE IF NOT EXISTS contact(
        Post_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(255) NOT NULL,
        Email VARCHAR(150) NOT NULL,
        Message TEXT NOT NULL,
        Published TIMESTAMP NULL DEFAULT NULL
    )";
    
    $table2 = "CREATE TABLE IF NOT EXISTS secure_contacts (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        message TEXT NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    // Confirm Table Creation
    if ($connection->query($table2)) {
        echo '<br><span style="color:green">Table 2 Created or Already Exists</span><br><br>';
    } else {
        echo '<span style="color:red">Table 1 Creation Failed: </span>' . $connection->error . "<br>";
    }
    
    if ($connection->query($table2)) {
        echo '<span style="color:green">Table 2 Created or Already Exists</span><br><br>';
    } else {
        echo '<span style="color:red">Table 2 Creation Failed: </span>' . $connection->error . "<br>";
    }
?>
