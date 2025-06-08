
<?php
require_once '../databaseconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_raw = file_get_contents("php://input");
    $request = json_decode($request_raw);

    $id = $request->id;

    $sql = "DELETE FROM `tbl_users` WHERE `id` = '$id'";

    if ($conn->query($sql) === TRUE) {
        $data = [
            "status" => "success",
            "message" => "User deleted successfully"
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