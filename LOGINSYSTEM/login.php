<div style="display:none;">
    <?php include 'C:\Users\user\Documents\PHP\name\htdocs\Projects\CONTACTFORM\connection.php'; ?>
</div>
<?php
    if(isset($_POST['login'])){
    
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $result = $connection->query("SELECT * FROM register WHERE email='$email'");
        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
            if(password_verify($password, $user['password'])){
                $login_success = "Login successful! Welcome, " . $user['username'] . ".";
            } else {
                $login_error = "Invalid password.";
            }
        } else {
            $login_error = "User not found.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="container" style="border:solid;padding:5%;">
        <h1>Login</h1>
        <?php
            if(isset($login_success)) {
                echo "<p class='success'>$login_success</p>"; 
            }elseif(isset($login_error)){
                echo "<p class='error'>$login_error</p>";   
            }
        ?>
    
        <form method="POST" action="">
            Email:<br><input type="email" name="email" required><br>
            Password:<br><input type="password" name="password" required><br>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
    <div class="container-fluid">
        <?php

            echo"<h1 style='font-family:Arial;'>Registered Peeps</h1>";
            echo"<br><hr>";
            $sql = "SELECT id, username, email, password, phone, dob FROM register";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "Post ".$row['id'] .
                    "<br><hr>".
                        "<div class='n'>Name: ". $row["username"] ."</div>".
                        "<div class='n'>DOB: ". $row["dob"] ."</div>".
                        "<div class='n'>Email: ". $row["email"] ."</div>".
                        "<div class='n'>Phone: ". $row["phone"] ."</div>".
                        "<div class='n'>Password: ". $row["password"] ."</div>".
                    "<br><hr>";
                }
            } else {
                echo "<span style='color:red'>No Posts Just Yet.</span>";
            }
            echo"<br><hr>"; 
        ?>      
    </div>
    <a href="main.php">Home</a>

</body>
</html>
