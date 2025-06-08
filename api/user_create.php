<?php

    require_once '../databaseconnection.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $request_raw = file_get_contents("php://input");
        $request = json_decode($request_raw);

        $role = $request->role;
        $password = $request->password . "phenix";
        $cipher = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO `tbl_users`(`username`, `password`,`role`) 
        VALUES ('$request->username','$cipher','$role')";

        if ($conn->query($sql) === TRUE) {
            $data = [
                "status" => "success",
                "user" => $request->username
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
                "message" => $conn->error
            ];
              echo json_encode($data);
        }
      
?>