<?php
    try{
        // Connection
        mysqli_report(MYSQLI_REPORT_OFF); 

        $connection = new mysqli("localhost", "root", "", "my_database");
        
        if ($connection->connect_error) {
            die('<br><hr><span style="color:red">Cant Connect To DB: ' . htmlspecialchars($connection->connect_error) . '</span><hr><br><br>');
        } else {
            echo '<br><hr><span style="color:green">Connected to DB</span><hr><br><br>';
        }
        
        // Tables
        $contact = "CREATE TABLE IF NOT EXISTS contact(
            Post_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            Name VARCHAR(255) NOT NULL,
            Email VARCHAR(150) NOT NULL,
            Message TEXT NOT NULL,
            Published TIMESTAMP NULL DEFAULT NULL
        )";
        
        $secure_contacts = "CREATE TABLE IF NOT EXISTS secure_contacts (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            email VARCHAR(50) NOT NULL,
            message TEXT NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        $tasks = "CREATE TABLE IF NOT EXISTS tasks (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            task VARCHAR(50) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        
        $pics = "CREATE TABLE IF NOT EXISTS pics (
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
    // Table Maintenance Functions (Uniform Layout) 
    function trunc($table) { 
        global $connection; 
        if ($connection->query("TRUNCATE TABLE `{$table}`")) { 
            echo "Truncated table: " . htmlspecialchars($table) . "<br>"; 
        } 
    } 

    function drop($table) { 
        global $connection; 
        if ($connection->query("DROP TABLE IF EXISTS `{$table}`")) { 
            echo "Dropped table: " . htmlspecialchars($table) . "<br>"; 
        } 
    } 

    function clear($table) { 
        global $connection; 
        if ($connection->query("DELETE FROM `{$table}`")) { 
            echo "Cleared all data from table: " . htmlspecialchars($table) . "<br>"; 
        } 
    }

        // Run table executions first
        if ($connection->query($contact)) {
            echo '<hr><span style="color:green">Table: contact --> Created or Already Exists</span><hr><br><br>';
        } else {
            echo '<hr><span style="color:red">Table: contact --> Creation Failed: </span>' . $connection->error . "<hr><br>";
        }

        if ($connection->query($secure_contacts)) {
            echo '<hr><span style="color:green">Table: secure_contacts --> Created or Already Exists</span><hr><br><br>';
        } else {
            echo '<hr><span style="color:red">Table: secure_contacts --> Creation Failed: </span>' . $connection->error . "<hr><br>";
        }

        if ($connection->query($tasks)) {
            echo '<hr><span style="color:green">Table: tasks --> Created or Already Exists</span><hr><br><br>';
        } else {
            echo '<hr><span style="color:red">Table: tasks --> Creation Failed: </span>' . $connection->error . "<hr><br>";
        }

        if ($connection->query($pics)) {
            echo '<hr><span style="color:green">Table :pics --> Created or Already Exists</span><hr><br><br>';
        } else {
            echo '<hr><span style="color:red"> Table: pics --> Creation Failed: </span>' . $connection->error . "<hr><br>";
        }

        if ($connection->query($register)) {
            echo '<hr><span style="color:green">Table: register --> Created or Already Exists</span><hr><br><br>';
        } else {
            echo '<hr><span style="color:red">Table: register --> Creation Failed: </span>' . $connection->error . "<hr><br>";
        }
        if($connection->query($register)){
            echo '<hr><span style="color:green;">Table: registering --> Created</span><hr><br><br>';
        }
    }catch(Exception $error){
        echo "An error ocurred".$error->getMessage();
    }
?>
