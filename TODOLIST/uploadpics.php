<?php
include 'C:\Users\user\Documents\PHP\name\htdocs\Projects\CONTACTFORM\connection.php'; 

if (isset($_POST['submit-task'])) {
    // Check if a file was actually uploaded without errors
    if (isset($_FILES['task_image']) && $_FILES['task_image']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['task_image']['name'];
        $image_tmp = $_FILES['task_image']['tmp_name'];
        
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }
        
        $unique_image_name = time() . '_' . basename($image_name);
        $target_file = $target_dir . $unique_image_name;

        if (move_uploaded_file($image_tmp, $target_file)) {
            // FIXED: Changed table target to 'pics' and removed the text '$task' since pics only stores 'image_path'
            $stmt = $connection->prepare("INSERT INTO pics (image_path) VALUES (?)");
            $stmt->bind_param("s", $target_file);
            $stmt->execute();
            $stmt->close();
            
            echo "<span style='color:green;'>Image uploaded and saved to database successfully!</span><br>";
        } else {
            echo "<span style='color:red;'>Failed to move uploaded file. Check folder permissions.</span><br>";
        }
    } else {
        echo "<span style='color:red;'>Please select a valid image file.</span><br>";
    }
}
if(isset($_POST['clear'])){
    $del = "DELETE FROM pics";
    
    if($connection->query($del)){
        echo "Deletion is a Success";
    }else {
        echo"Deletion failed".$connection->error;
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload Gallery</title>
</head>
<body>

    <!-- HTML Form -->
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- Removed the task text input since the 'pics' table layout only tracks the image path -->
        <input type="file" name="task_image" accept="image/*" required>
        <button type="submit" name="submit-task">Upload Image</button>
    </form>
    <form action="" method="POST"><button name="clear">Clear</button></form>
    <h2>Uploaded Images Gallery</h2>
    <?php
        $result = $connection->query("SELECT image_path FROM pics");
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!empty($row['image_path'])) {
                    echo "<img src='" . htmlspecialchars($row['image_path']) . "' width='150' alt='Uploaded Image' style='margin:10px; border:1px solid #ccc;'><br>";
                }
            }
        } else {
            echo "<p style='color:gray;'>No images uploaded yet.</p>";
        }
    ?>

</body>
</html>
