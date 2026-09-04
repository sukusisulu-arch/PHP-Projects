
<?php
    
    function formReport(){
    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        
        echo "<br>Submission Working<br>";

    }else{
        echo "Submission Not Working";
    } 
}

function dbConnection(){
                    // Enable error reporting for MySQLi to catch connection issues

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                
    try {
        // Create connection
        echo "<br>Connected successfully to Data Base<br>";
    }catch (Exception $e) {
        echo "<br>Connection failed: " . $e->getMessage()."<br>";
    }
}

function tableCreation(){
    // Assume $conn is an existing database connection

    // SQL command to create a 'blog_posts' table
    $connection = new mysqli("localhost", "root", "", "suku_database");

    $table1 = "CREATE TABLE table_1 (
        post_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(150) NOT NULL,
        content TEXT NOT NULL,
        author_email VARCHAR(100),
        published_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        is_published BOOLEAN DEFAULT FALSE
    )";
    
    if($connection->query($table1)) {
        echo"<p>Table1 Creation Succesful</p>";
    }else {
        echo "Table1 Creation Failed".$conn->error;
    };
    
    
    $table2 = "CREATE TABLE table_2(
        names VARCHAR(50) NOT NULL,
        surnames VARCHAR(50) NOT NULL
    )";
    
    if($connection->query($table2)) {
        echo"<p>Table2 Creation Succesful</p>";
    }else {
        echo "Table2 Creation Failed".$conn->error;
    }
    
}

function submitOutput(){
    echo "Hello";
    // Prepare the SQL insert using placeholders
    $stmt = $connection->prepare("INSERT INTO $table1 (title, content, author_email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $name, $email);


    // Run the insert
    if ($stmt->execute()) {
        echo "New blog post '$title' created by " . $email . '<br>';
    } else {
        echo "Error saving post.";
    }
    
    $stmt->close();
    $conn->close();
}

?>