<?php
error_reporting(E_ALL & ~E_WARNING);
require "db_connection.php";

$response = array();
$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];
$user_email = $_POST['user_email'];
$user_name = $_POST['user_name'];
$user_pw_enc = password_hash($user_pw, PASSWORD_DEFAULT);


// 가입하려는 아이디가 이미 존재하는지 여부를 판단하여 존재하면 exists 정보를 리턴
$sql = "select user_no from users where user_id = '{$user_id}'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $response["result"] = "fail";
    $response["message"] = "User already exists!";
    $conn->close();
    echo json_encode($response);
    return;
}

$sql = "INSERT INTO users (user_id, user_pw, user_email, user_name)
        VALUES ('$user_id', '$user_pw_enc', '$user_email', '$user_name')";

if ($conn->query($sql) === TRUE) {
    $response["result"] = "success";
} else {
    $response["result"] = "fail";
    $response["message"] = "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo json_encode($response);
?>



