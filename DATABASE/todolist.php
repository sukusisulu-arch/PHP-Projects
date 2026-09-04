<!DOCTYPE html>
<html lang="en">
<head>
    <title>db todo list</title>
    <link rel="stylesheet" href="dbstyle.css">
    <script src="dbscript.js"></script>
</head>
<body>
    
    
    <div>
        <h1>CRUD To Do List</h1>
        
        
        <?php
            
            
            
            include"database.php";
            conn();
        
            // Sample data, often received from a form
            
            db();
            
            
            $form = 
                '<br><form action="" method="post">
                Add A New Task<input type="text" name="task">
                <input type="submit" name="submit">
                </form><br>
                ';
                if (isset($_POST["submit"])) {
                    $task = $_POST["task"];
                    
                    echo "Working--Submit";
                    echo $task;
                    
                    $valid = [$task];
                       
                }else{
                    echo "Not Working--Submssion";
                };
                

                if ($valid == null) {
                        echo'<h1>No Tasks Yet Or Enter </h1><br>';
                        echo $form;
                }
                else {
                    // Prepare the SQL insert using placeholders
                    #
                    $testing = "Hello";
                        $stmt = $connection->prepare("INSERT INTO tasks (task,test) VALUES (?)");
                        $stmt->bind_param("sss", $taskk, $testing);
        
                    // Run the insert
                    if ($stmt->execute()) {
                        echo "New Task".$task;
                    } else {
                        echo "Error saving post.";
                    }
                        $stmt->close();
                }
                
                // Get all blog posts from the 'posts' table
                $sql = "SELECT task_number, task FROM tasks";
                $result = $connection->query($sql);

                // Check if we got any results
                if ($result->num_rows > 0) {
                    // Loop through and display each row
                    while ($row = $result->fetch_assoc()) {
                        echo "Post #" . $row["task_number"] . " - " . $row["task"] .
                            " by " . $row[""] . " (Published: " . $row["published_at"] . ")<br>";
                    }
                } else {
                    echo "No blog posts found.";
                }

            // Output:
            // Post #1 - Hello World by admin@example.php (Published: 2025-07-02 12:38:59)
            // Post #2 - Tips for PHP Beginners by jdoe@example.php (Published: 2025-07-02 12:39:41)
            ?>
                        
           
            
            
            
        ?>
        
        
    </div>
    
    <div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <button id="error-display-button" onclick="errorDisplay()">
            Error Report
        </button>
        
        
        <div class="error-display" id="error-display-div">
                <div>
                    <h4>The Form Report</h4>
                    <hr>
                    <?phpformReport($status);?>   
                </div>
        
                <div>
                    <h4>Connection To Data BAse Report</h4>
                    <hr>
                    <?php 
                         print_r(get_loaded_extensions());
                    ?>
                </div>
                
                <div>
                    <h4>DB TABLE Creation Report</h4>
                    <hr>
                    <?php
                        
                    ?>
                </div>
                
                <div>
                    <h4>Testing</h4>
                    <hr>
                    <?php
                      include 'testing.php '; 
                    ?>
                </div>
                
                
                
                
        </div>
        
    </div>
  <script src="dbscript.js"></script>
</body>
</html>