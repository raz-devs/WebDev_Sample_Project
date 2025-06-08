<?php
require_once '../databaseconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_raw = file_get_contents("php://input");
    $request = json_decode($request_raw);

    $id = $request->id;
    $username = $request->username;
    $password = $request->password . "phenix";
    $cipher = password_hash($password, PASSWORD_DEFAULT);
    $role = $request->role;

    $sql = "UPDATE `tbl_users` SET `username` = '$username', `password` = '$cipher', `role` = '$role' WHERE `id` = '$id'";

    if ($conn->query($sql) === TRUE) {
        $data = [
            "status" => "success",
            "user" => $username
        ];
        echo json_encode($data);
    } else {
        $data = [
            "status" => "failed",
            "message" => $conn->error
        ];
        echo json_encode($data);
    }
} else {
    $data = [
        "status" => "failed",
        "message" => "Invalid request method"
    ];
    echo json_encode($data);
}
?>