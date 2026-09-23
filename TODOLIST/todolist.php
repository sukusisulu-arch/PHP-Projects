<div style="display:none;">
    

<?php 
include 'C:\Users\user\Documents\PHP\name\htdocs\Projects\CONTACTFORM\connection.php'; 

$msg = ""; // Initialise message variable to prevent undefined variable notices

function message($trigger, $msg){ 
    if($trigger === true){$msg = "<span style='color:green; display:block; margin-bottom:10px;'>MESSAGE SENT</span>"; 
    }else { 
        $msg = "<span style='color:red; display:block; margin-bottom:10px;'>ERROR SENDING MESSAGE</span>"; 
    } 
} 

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['add'])) { 
    $task = $_POST['task'] ?? ''; 
    if (!empty($task)) { 
        // FIX: Removed the invalid NOW() syntax
        $stmt = $connection->prepare("INSERT INTO tasks (task) VALUES (?)"); 
        ($stmt->bind_param("s",$task)); 
        
        if ($stmt->execute()) { 
            message(true,$msg); 
        } else {
            echo "Error: " .$stmt->error;
        } 
        $stmt->close(); 
    } else { 
        message(false,$msg); $error = "Error: All fields are required."; 
    } 
}

?> 
</div>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Task Manager</title> 
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <style> 
        * { padding: 0; margin: 0; box-sizing: border-box; } 
        header { background: #0d6efd; min-height: 100px; } 
        main { background: #eef; min-height: calc(100vh - 200px); padding: 20px 0; } 
        footer { min-height: 100px; background: #eee; } 
        #tasks-div { 
            border: 1px solid #ccc; 
            height: 0; 
            margin: 10px auto; 
            background-color: antiquewhite; 
            transition: height 0.5s ease; 
            overflow-y: auto; 
            width: 90%; 
            display: flex; 
            flex-direction: column; 
        } 
        #tasks-div::-webkit-scrollbar { display: none; } 
        #tasks-div { scrollbar-width: none; -ms-overflow-style: none; } 
        #tasks-div.open { height: 50vh; } 
        .contain { min-height: 60px; display: flex; align-items: center; margin: 5px auto; justify-content: space-between; width: 95%; } 
        .task-text { font-size: 100%; width: 70%; word-wrap: break-word; } 
        .delete-button { font-size: 100%; width: 25%; } 
    </style> 
</head> 
<body> 
    <header class="container-fluid"></header> 
    <main class="container-fluid"> 
        <div class="container"> 
            <h1>Tasks</h1> 
            
            <!-- Display the success or error message from PHP -->
            <?php echo $msg; ?>

            <div class="mb-3"> 
                <span id="no-tasks" class="d-block mb-2">There are no Tasks Just Yet</span> 
                
                <!-- FIX: Form now correctly wraps inputs and actions for proper submission -->
                <form action="" method="POST" class="d-flex gap-2 align-items-center"> 
                    <input type="text" placeholder="Add Task Here" id="task" name="task" class="form-control w-50" required> 
                    <button id="add-task-button" class="btn btn-success" type="submit" name="add">Add Task</button> 
                    <button id="view-tasks" class="btn btn-info" type="button">View Tasks</button> 

                </form>
            </div> 
            
            <div id="tasks-div"> 
                <ul id="ul" class="list-unstyled p-1"></ul> 
            </div> 
        </div> 
        
        <form action="" method="POST"><button class="btn btn-info" type="submit" name="view-tasks">View in DATA BASE</button></form> 

        
        <div id="success-alert" style="padding: 10px;" class="container-fluid">           
            <div class="mb-3 d-flex gap-2 align-items-center mg-tp container">
                <form action="" method="POST"><button id="add-task-button" class="btn btn-success" name="clear-all">Delete All</button></form>
            </div>
            
           <?php
               if (isset($_POST['view-tasks'])){
                
                echo "<br><h1 style='font-family:Arial;'>Tasks Table</h1>";
                echo "<br><hr>";
                $sql3 = "SELECT id, task, reg_date FROM tasks"; 
                $result = $connection->query($sql3);
                
                if ($result === false) {
                    echo "<span style='color:red;'>SQL Error: " . $connection->error . "</span>";
                } else {
                    if ($result->num_rows > 0) {
                        // Open file once before the loop begins
                        // CHANGED: Use 'a' to append logs, or keep 'w' if you always want only the current table state
                        $file = fopen('storage.txt', 'w'); 
                        
                        if ($file) {
                            while ($row = $result->fetch_assoc()) {
                                // Render to the browser UI
                                echo "Post: " . htmlspecialchars($row["id"]) . "" .
                                     " TASK- || " . htmlspecialchars($row["task"])." ||<br>" . 
                                     " (Published: " . htmlspecialchars($row["reg_date"]) . ")<hr>";
                        
                                // Write clean plaintext data to your file backup (stripped HTML tags for cleaner file logs)
                                $txtLine = "Post: " . $row["id"] . " TASK- || " . $row["task"] . " || (Published: " . $row["reg_date"] . ")\n";
                                fwrite($file, $txtLine);
                            }
                            // FIXED: Close the file stream HERE, after all rows are written
                            fclose($file); 
                        } else {
                            echo "<span style='color:red'>Error Opening File for Writing</span><br>";
                            
                            // Fallback loop to display items on screen even if text file storage fails
                            while ($row = $result->fetch_assoc()) {
                                echo "Post: " . htmlspecialchars($row["id"]) . "" .
                                     " TASK- || " . htmlspecialchars($row["task"])." ||<br>" . 
                                     " (Published: " . htmlspecialchars($row["reg_date"]) . ")<hr>";
                            }
                        }
                    }else {
                        echo "<span style='color:red'>No Posts Just Yet.</span>";
                    }
                }
                echo "<br><hr>";
            }
            
            if ($_POST) {
                if (isset($_POST['clear-all'])) {
                    $clear = "DELETE FROM tasks";
                    
                    if ($connection->query($clear) === FALSE) {
                        echo "<span style='color:red;'>Failed to clear tasks: " . $connection->error . "</span><br>";
                    } else {
                        echo "<span style='color:green;'>All tasks cleared successfully!</span><br>";
                    }
                }
             }
         ?>  
        </div>
        <div><hr><hr>
            <h1>History</h1><hr>
            <?php
                $content = file_get_contents('storage.txt');
                echo $content;
            ?>
        </div><hr><hr>
    </main>
    
    <footer class="container-fluid"></footer> 
    
    <script> 
        const addTaskBtn = document.querySelector('#add-task-button'); 
        const ul = document.querySelector('#ul'); 
        const taskInput = document.querySelector('#task'); 
        const taskDiv = document.querySelector('#tasks-div'); 
        const noTasks = document.querySelector('#no-tasks'); 
        const viewTasks = document.querySelector('#view-tasks'); 

        let savedTasks = JSON.parse(localStorage.getItem('tasks')) || []; 

        function updateTaskCount() { 
            const count = ul.children.length; 
            if (count === 0) { 
                noTasks.innerText = "There are no Tasks Just Yet"; 
            } else { 
                noTasks.innerText = `Tasks: ${count}`; 
            } 
        } 

        function saveToLocalStorage() { 
            const currentTasks = []; 
            ul.querySelectorAll('.task-text').forEach(span => { 
                currentTasks.push(span.innerText); 
            }); 
            localStorage.setItem('tasks', JSON.stringify(currentTasks)); 
        } 

        function createTaskElement(text) { 
            const li = document.createElement('li'); 
            li.innerHTML = ` 
                <div class="alert alert-success fw-bold contain"> 
                    <span class="task-text">${text}</span> 
                    <button class="btn btn-danger delete-button" type="button">Delete</button> 
                </div> 
            `; 

            li.querySelector('.delete-button').addEventListener('click', function() { 
                li.style.transition = 'opacity 0.4s ease'; 
                li.style.opacity = '0'; 
                setTimeout(() => { 
                    li.remove(); 
                    updateTaskCount(); 
                    saveToLocalStorage(); 
                }, 400); 
            }); 
            return li; 
        } 

        // Render saved local tasks initially
        savedTasks.forEach(taskText => { 
            ul.appendChild(createTaskElement(taskText)); 
        }); 
        updateTaskCount(); 

        // FIX: Handled the form submission behavior so local storage logic runs before the page reloads
        if (addTaskBtn) { 
            addTaskBtn.addEventListener("click", function(e) { 
                const taskText = taskInput.value.trim(); 
                if (taskText === "") return; 
                
                ul.appendChild(createTaskElement(taskText)); 
                saveToLocalStorage(); 
                // Let the browser proceed with submitting the form to the PHP backend
            }); 
        } 

        // Toggle Task View Slider 
        viewTasks.addEventListener("click", function() { 
            taskDiv.classList.toggle('open'); 
        }); 
        
        setTimeout(function() {
               var element = document.getElementById("success-alert");
               if (element) {
                   element.style.display = "none";
               }
           }, 10000); 
           
    </script> 
</body> 
</html>
