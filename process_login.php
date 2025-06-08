<?php
    require_once 'databaseconnection.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $request_raw = file_get_contents("php://input");
        $request = json_decode($request_raw);

        $sql = "SELECT * FROM tbl_users WHERE username = '$request->username'";
        $result = mysqli_query($conn,$sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $password = $request->password . "phenix"; // salt
                                        //input password, cipher password
            if(password_verify($password, $row["password"] )){
                $data = [
                    "status" => "success",
                    "role" => $row["role"],
                    "user" => $row["username"]
                ];
                echo json_encode($data);
            }
            else{
                $data = [
                    "status" => "failed",
                    "user" => $row["username"],
                    "message" => "Invalid username or password."
                ];
                echo json_encode($data);     
            }
           
        }
            else{
                $data = [
                    "status" => "failed",
                    "message" => "No user found with that username."
                ];
                echo json_encode($data);     
            }

    }
?>