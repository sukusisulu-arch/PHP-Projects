<div style="display:none;"><?php include 'C:\Users\user\Documents\PHP\name\htdocs\Projects\CONTACTFORM\connection.php';?></div>
<?php

// Database connection

// Handle registration
if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    
    // 1. Collect and sanitize input
    $username = trim($_POST['username'] ?? ''); 
    $email = trim($_POST['email'] ?? ''); 
    $dob = $_POST['dob'] ?? '';
    $password = $_POST['password'] ?? '';
    $phone = trim($_POST['phone'] ?? '');
    $gender = $_POST['gender'] ?? ''; 
    $country = $_POST['country'] ?? '';
    
    // 2. Check if all required fields are provided
    if (!empty($username) && !empty($email) && !empty($dob) && !empty($password)) { 
        
        // Hash the password only after confirming it is not empty
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // 3. Prepare SQL (Ensure columns match values perfectly)
        $stmt = $connection->prepare("INSERT INTO register (username, email, dob, phone, gender, country, password) VALUES (?, ?, ?, ?, ?, ?, ?)"); 
        
        // 4. Bind parameters in the exact order of the SQL columns above
        $stmt->bind_param("sssssss", $username, $email, $dob, $phone, $gender, $country, $hashed_password); 
        
        // 5. Execute and handle results
        if ($stmt->execute()) { 
            $reg_success = "Registration successful! You can now login.";
            
            // Optional: Email logic
            $clean_email = filter_var($email, FILTER_SANITIZE_EMAIL); 
            $headers = "From: " . (!empty($clean_email) ? $clean_email : "no-reply@example.com"); 
            // mail($email, "Welcome", "Thanks for registering!", $headers); 
            
        } else {
            $reg_error = "Error saving to database: " . $stmt->error;
        }

        // Always close the statement inside the block where it was created
        $stmt->close(); 
        
    } else { 
         $reg_error = "Error: All required fields are fields."; 
    } 
}

// Handle login

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login & Registration System</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        input { width: 250px; padding: 5px; margin: 5px 0; }
        input[type=submit] { width: auto; }
        .success { color: green; }
        .error { color: red; }
        .container { margin-bottom: 30px; }
        .n{overflow:auto;border:double bisque;padding:1%;display:flex;}
        /* Hide scrollbar for Chrome, Safari, and Opera */
        .n::-webkit-scrollbar { display: none;}
        /* Hide scrollbar for IE, Edge, and Firefox */
        .n {-ms-overflow-style: none; scrollbar-width: none;overflow-y: scroll;}

    </style>
    <link rel="stylesheet" href="/BOOTSTRAPWEB/css/bootstrap.min.css">
</head>
<body>
    <h2>Login & Registration System</h2>

    <div class="container-fluid" style="border:solid;padding:5%;">
        <h1>Register</h1>
        <?php
            if(isset($reg_success)) echo "<p class='success'>$reg_success</p>";
            if(isset($reg_error)) echo "<p class='error'>$reg_error</p>";
        ?>
        <form method="POST" action="" class="container-fluid">
            Username:<br><input type="text" name="username" required><br>
            
            Email:<br><input type="email" name="email" required><br>
            
            Password:<br><input type="password" name="password" required><br>
            
            Phone Number:<br><input type="tel" name="phone" required><br>
            
            Date Of Birth:<br><input type="date" name="dob" required><br><br>
                    
            Gender:<br><hr>
            <div class="container-fluid">
                <!-- FIXED: Added value tags to your radio buttons so PHP knows what was selected -->
                <div style="display:flex;">Male<input type="radio" name="gender" value="Male" style="margin-left:18px;"></div>
                <div style="display:flex;">Female<input type="radio" name="gender" value="Female"></div>
            </div><br><br>
            
            Country:<br><br>
            <!-- FIXED: Added name="country" attribute so PHP can capture the user's choice -->
            <select required name="country" id="target-container" class="container-fluid">
                <option value="">Select Country</option>
            </select><br><br>

            <span class="container-fluid"><a href="#">I agree to the terms and conditions</a><input type="checkbox" required></span><br><br>
            
            <!-- FIXED: Added name="register" so your PHP block knows it was clicked -->
            <button type="submit" name="register" id="submit">Register</button>
        </form>
    </div>
    <a href="main.php">Home</a>
      
</body>
</html>

<script>
    function loadHTMLContent() {
        fetch('countries.html')
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.text();
            })
            .then(html => {
                document.getElementById('target-container').innerHTML += html; // Fixed to keep the default placeholder option
            })
            .catch(error => {
                console.error('Error loading the HTML file:', error);
            });
    }

    loadHTMLContent();
</script>
