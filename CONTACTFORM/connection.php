<?php
    // Connection
    mysqli_report(MYSQLI_REPORT_OFF); 

    $connection = new mysqli("localhost", "root", "", "my_database");
    
    if ($connection->connect_error) {
        die('<span style="color:red">Cant Connect To DB: ' . htmlspecialchars($connection->connect_error) . '</span><br>');
    } else {
        echo '<span style="color:green">Connected to DB</span><br>';
    }
    
    // Tables
    $table1 = "CREATE TABLE IF NOT EXISTS contact(
        Post_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(255) NOT NULL,
        Email VARCHAR(150) NOT NULL,
        Message TEXT NOT NULL,
        Published TIMESTAMP NULL DEFAULT NULL
    )";
    
    $table2 = "CREATE TABLE IF NOT EXISTS secure_contacts (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        message TEXT NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    $table3 = "CREATE TABLE IF NOT EXISTS tasks (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        task VARCHAR(50) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    $pictures = "CREATE TABLE IF NOT EXISTS pics (
        id INT AUTO_INCREMENT PRIMARY KEY,
        image_path VARCHAR(255) DEFAULT NULL
    )";
    
    $register = "CREATE TABLE IF NOT EXISTS register (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        phone VARCHAR(255) NOT NULL,
        dob VARCHAR(255) NOT NULL,
        gender VARCHAR(255) NOT NULL,
        country VARCHAR(255) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    // Table Maintenance Functions (Fixed scope issues using 'global')
    function trunc() { 
        global $connection; 
        $connection->query("TRUNCATE TABLE register"); 
    }
    function drop() { 
        global $connection; 
        $connection->query("DROP TABLE register"); 
    }
    function clear() { 
        global $connection; 
        $connection->query("DELETE FROM register"); 
    }  

    // Run table executions first
    if ($connection->query($table1)) {
        echo '<span style="color:green">Table 1 Created or Already Exists</span><br><br>';
    } else {
        echo '<span style="color:red">Table 1 Creation Failed: </span>' . $connection->error . "<br>";
    }

    if ($connection->query($table2)) {
        echo '<span style="color:green">Table 2 Created or Already Exists</span><br><br>';
    } else {
        echo '<span style="color:red">Table 2 Creation Failed: </span>' . $connection->error . "<br>";
    }

    if ($connection->query($table3)) {
        echo '<span style="color:green">Table 3 Created or Already Exists</span><br><br>';
    } else {
        echo '<span style="color:red">Table 3 Creation Failed: </span>' . $connection->error . "<br>";
    }

    if ($connection->query($pictures)) {
        echo '<span style="color:green">Table Pictures Created or Already Exists</span><br><br>';
    } else {
        echo '<span style="color:red"> Table Pictures Creation Failed: </span>' . $connection->error . "<br>";
    }

    if ($connection->query($register)) {
        echo '<span style="color:green">Registering Table Created or Already Exists</span><br><br>';
    } else {
        echo '<span style="color:red">Registering Creation Failed: </span>' . $connection->error . "<br>";
    }

    // Now it is safe to execute maintenance routines since the table exists
    //trunc();
    //clear();
    //drop();
?>
