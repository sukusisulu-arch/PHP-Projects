<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" href="/CONTACTFORM/OTHERSTUFF/OTHERSTUFF/logo2.png" type="image/png">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: Arial, sans-serif;-ms-overflow-style: none; scrollbar-width: none;overflow-y: scroll; }
        body { background:black; padding: 20px; color: #333; }
        ::-webkit-scrollbar { display: none;}
        .status-container { max-height:90vh; max-width: 90vw; margin: 0 auto; border-radius: 8px; box-shadow: 0 4px 12px rgba(59,225,554,0.9); padding: 40px;background: linear-gradient(rgba(222,344,255,0.5),rgba(222,344,255,0.1));}
        .header-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
        .btn { padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; text-decoration: none; display: inline-block; }
        .btn-logout { background-color: #6c757d; color: white; }
        .btn-status {background: rgba(225,255,255,0.4); color: white; }
        .btn-info { background-color: white; color: black;background: rgba(0,0,0,0.8);color:white; }
        .btn-delete { background-color: #d9534f; color: white; margin-top: 10px; }
        .btn:hover { opacity: 0.9; }
        .dashboard-grid { display: flex; flex-direction: column; gap: 20px; margin-top: 20px; }
        .panel { color:grey;background: rgba(0,0,0,0.1); backdrop-filter:blur(2px); border-radius: 10px; padding: 30px; display:none;}
        #panel.show{display:block;}
        .status-div { background: #ffe4c4; margin-bottom: 20px; display: none;background: rgba(225,255,255,0.4); backdrop-filter:blur(2px); color:white; }
        #status-div.open { display: block; }
        #statusMessage { margin-top: 10px; font-weight: bold; }
        .stats-card { font-family:fantasy; color:white; background: black; border-left: 5px solid #70ad47; padding: 15px; margin-bottom: 20px; border-radius: 4px;color:white; }
        .contacts-title {color: #333; margin-bottom: 15px; font-size: 1.5rem; }
        .table-responsive { overflow-x: auto; max-width: 100vw; min-width: 20vw;  }
        .contacts-table { border-collapse: collapse; width:100%; }
        .contacts-table th, .contacts-table td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        .contacts-table th { background-color: #f4f4f4; color: #333; }
        .contacts-table tr:nth-child(even) { background-color: #ffffff; }
        .contacts-table tr:hover { background: rgba(11,1,1,0.4);font-weight:300; opacity:0.9; transition: all 1s ease-in-out;color:white;}
        .no-posts { color: #d9534f; font-weight: bold; }
        form { display: flex; align-items: center; gap: 10px; margin-bottom: 12px; }
        form label { display: inline-block; width: 90px; font-weight: bold; }
        input[type="text"] { padding: 6px 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; }
        input[type="submit"] { padding: 6px 12px; border: none; border-radius: 4px; color: black; cursor: pointer; font-size: 14px; text-transform: capitalize; }
        input[type="submit"]:hover { background-color: #0056b3; }
    </style>
</head>
<body>

<div id="status-container" class="status-container">
    <div class="header-row">
        <h1>Dashboard</h1>
        <a href="admin_login.php" class="btn btn-logout">Logout</a>
    </div>

    <button onclick="toggleStatus()" id="status-button" class="btn btn-status">Show Status</button><br><br>
    <button onclick="toggleInfo()" id="status-button" class="btn btn-info">Show Data</button>

    <div class="dashboard-grid">
        <div class="panel status-div" id="status-div">
            <h2>Status</h2>
            
            <?php 
                include_once 'db_connection.php';
                
                if($_POST){ 
                    // preg_replace removes any character that is NOT a letter, number, or underscore
                    if(isset($_POST['truncate'])){
                        $table = preg_replace('/[^a-zA-Z0-9_]/', '', $_POST['truncate']);
                        $trunc($table);
                    } 
                    if(isset($_POST['drop'])){
                        $table = preg_replace('/[^a-zA-Z0-9_]/', '', $_POST['drop']);
                        $drop($table);
                    } 
                    if(isset($_POST['clear'])){
                        $table = preg_replace('/[^a-zA-Z0-9_]/', '', $_POST['clear']);
                        $clear($table);                    } 
                } 
            ?> 
            <br>
            <form action="" method="POST"> 
                <input type="text" name="truncate" placeholder="Table Name" required> 
                <input type="submit" value="truncate">
            </form> 

            <form action="" method="POST"> 
                <input type="text" name="drop" placeholder="Table Name" required> 
                <input type="submit" value="drop">
            </form> 

            <form action="" method="POST"> 
                <input type="text" name="clear" placeholder="Table Name" required> 
                <input type="submit" value="clear">
            </form>

            <button onclick="deleteData()" class="btn btn-delete">Delete Data</button>
            <div id="statusMessage"></div>
        </div>

        <!-- Main Info Content Area -->
        <div class="panel" id="panel">
            <div class="stats-card">
                <h3>Number of Users</h3>
                <h4>20 Active Users</h4>
            </div>
            
            <h1 class="contacts-title" style="font-family:cambria;color:white;">contact Table</h1>

            <?php
                $sql = "SELECT Post_id, Name, Message, Published FROM contact";
                $stmt = $connection->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
            
                if ($result && $result->num_rows > 0): 
            ?>
            <div class="table-responsive">
                <table class="contacts-table">
                    <thead>
                        <tr>
                            <th>Post ID</th>
                            <th>Name</th>
                            <th>Message</th>
                            <th>Published Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td>#<?php echo htmlspecialchars($row["Post_id"]); ?></td>
                                <td><?php echo htmlspecialchars($row["Name"]); ?></td>
                                <td><?php echo htmlspecialchars($row["Message"]); ?></td>
                                <td><?php echo htmlspecialchars($row["Published"]); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
                <p class="no-posts">No posts just yet.</p>
            <?php endif; ?>
        </div>  
    </div>
</div> 

<script>
    // Simplified Toggle Logic using classList instead of arbitrary math counters
    const statusDiv = document.querySelector('#status-div');
    const infoDiv = document.querySelector('#panel');
    const statusButton = document.querySelector('#status-button');
    
    function toggleStatus(){statusDiv.classList.toggle('open');}
     
    function toggleInfo(){infoDiv.classList.toggle('show'); }
 
    // Ajax execution function
    function deleteData() {
        if (!confirm("Are you sure you want to delete data?")) return;

        const statusMessage = document.getElementById('statusMessage');
        statusMessage.style.color = "orange";
        statusMessage.innerText = "Deleting data...";

        fetch('run.php', { method: 'POST' })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    statusMessage.style.color = "green";
                    statusMessage.innerText = data.message;
                    setTimeout(() => location.reload(), 2000);
                } else {
                    statusMessage.style.color = "red";
                    statusMessage.innerText = "Error: " + data.message;
                }
            })
            .catch(error => {
                statusMessage.style.color = "red";
                statusMessage.innerText = "Network error occurred.";
            });
    }   
</script>
</body>
</html>
