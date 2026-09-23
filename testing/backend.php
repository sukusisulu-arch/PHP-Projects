<?php
// backend.php
// Tell the browser to expect JSON data back
header('Content-Type: application/json');

// 1. Grab the raw JSON input from the request body
$rawInput = file_get_contents('php://input');

// 2. Decode JSON into a PHP associative array
$inputData = json_decode($rawInput, true);

// 3. Process the data
$name = isset($inputData['name']) ? $inputData['name'] : 'Guest';
$greeting = "Hello, " . $name . "! This data was loaded seamlessly via AJAX.";

// 4. Structure the response array
$response = [
    "status" => "success",
    "message" => $greeting
];

// 5. Send the JSON back to JavaScript
echo json_encode($response);
?>

