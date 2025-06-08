<?php

    $server = "localhost";
    $username = "root"; // change this to your MySQL username
    $password = ""; // change this to your MySQL password
    $database = "db_webdev"; // change this to your MySQL database name

    $conn = new mysqli($server, $username, $password, $database);

    if ($conn->connect_error) {
        http_response_code(500); // Optional: sets response code
        header('Content-Type: application/json');
        echo json_encode([
        "status" => "failed",
        "message" => "Connection failed: " . $conn->connect_error
    ]);
    exit();
    } 

?>