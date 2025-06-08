<?php

require '../databaseconnection.php';


$sql = "SELECT * FROM `tbl_users`";
$result = mysqli_query($conn, $sql);

if ($result) {
    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    echo json_encode([
        "status" => "success",
        "users" => $users
    ]);
} else {
    echo json_encode([
        "status" => "failed",
        "message" => $conn->error
    ]);
}
?>
