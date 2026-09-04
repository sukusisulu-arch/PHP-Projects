<?php
    header('Content-Type: application/json');

    // 1. Connect to your database
    $connection = new mysqli("localhost", "root", "", "my_database");

    if ($connection->connect_error) {
        echo json_encode(["success" => false, "message" => "Database connection failed"]);
        exit;
    }

    // OPTION A: Delete ALL rows from the table
    $sql = "DELETE FROM contact";

    // OPTION B: Delete only a specific row (Uncomment below if you want this instead)
    // $sql = "DELETE FROM contact WHERE Post_id = 1";

    // 3. Execute the deletion command
    if ($connection->query($sql)) {
        echo json_encode(["success" => true, "message" => "Data deleted successfully!"]);
    } else {
        echo json_encode(["success" => false, "message" => $connection->error]);
    }

    $connection->close();
?>
