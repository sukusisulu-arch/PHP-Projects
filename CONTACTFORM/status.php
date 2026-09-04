
<div id='status-container' class='status-container'>
    <button><a href="login.php">Logout</a></button>
        <h1>Status Container Coming Soon</h1>
        <button onclick='showhidestatus()' id='status-button'>Not working</button>
        <div class='div1'>
            <div class='status-div' id='status-div'>
                <table>
                    <tr>
                        <td>
                        <div>
                            <h1>Status</h1>
                            <?php 
                                include 'connection.php';
                                include 'formvalidator.php'
                            ?>
                        </div>
                            
                        </td>
                    </tr><br>
                    <tr>
                        <td>
                            <button onclick="sql()" style='background-color: red; color: white;'>Delete Data</button>
                            <div id='statusMessage'>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
</div> 
<style>
    *{margin:0;padding:0;font-family:Arial;}
    .status-container{display:flex;flex-direction:column;background:rgba(0,2,34,0.1);border:solid;padding:100px;width:max-container;}
    .div1{border:solid;}
    .div1 div{border:solid blue;padding:50px;overflow:auto;}
</style>
<script>
    
    var statusDiv = document.getElementById('status-div');
    var statusButton = document.getElementById('status-button')
    statusDiv.style.display = 'none';
    statusDiv.style.background = 'bisque';
    statusButton.innerHTML = 'show status';
    var display2 = 1;
    function showhidestatus() {

    if (display2 == 1) {
        statusDiv.style.display = 'block';
        statusDiv.style.transition = '1s';
        statusButton.innerHTML = 'hide status';
        display2 = 0;
        
    } else {
        statusDiv.style.display = 'none';
        statusDiv.style.transition = '1s';
        statusButton.innerHTML = 'show status';
        
        display2 = 1;
    }
    }
    

</script>
<script>

    function sql() {
    // Confirm before deleting
    if (!confirm("Are you sure you want to delete data?")) return;

    const statusDiv = document.getElementById('statusMessage');
    statusDiv.innerText = "Deleting data...";

    fetch('run.php', {
        method: 'POST'
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            statusDiv.style.color = "green";
            statusDiv.innerText = data.message;
        } else {
            statusDiv.style.color = "red";
            statusDiv.innerText = "Error: " + data.message;
        }
    })
    .catch(error => {
        statusDiv.style.color = "red";
        statusDiv.innerText = "Network error occurred.";
    });
    };
</script>
