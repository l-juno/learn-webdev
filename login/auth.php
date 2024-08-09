<?
require "db_connection.php";

$response = [];
$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];


$sql = "select * from users where user_id='$user_id'";
$result = $conn->query($sql);

// check if record exists in database
if ($result->num_rows == 0) {
    $response["result"] = "fail";
    $response["message"] = "User does not exist";
    $conn->close();
    echo json_encode($response);
    return;
}


// check if username and password matches
$row = $result->fetch_assoc();

if (!password_verify($user_pw, $row['user_pw'])) {
    $response["result"] = "fail";
    $response["message"] = "Invalid username or password";
    $conn->close();
    echo json_encode($response);
    return;
}


// insert log into login_log
$ip = $_SERVER['REMOTE_ADDR'];

$sql = "insert into login_log (user_no, user_id, ip)
        values ('{$row['user_no']}','$user_id', '$ip')";

if ($conn->query($sql) === TRUE){
    $response["result"] = "success";
} else {
    $response["result"] = "fail";
    $response["message"] = "Error: " . $sql . "<br>" . $conn->error;
}

// add cookie for valid login
setcookie("user_id", $user_id, time() + (3600), "/");
setcookie("user_name", $row['user_name'], time() + (3600), "/");

// update last_login_date in users table
$sql = "UPDATE users 
SET last_login_date = NOW() 
WHERE user_id = '{$user_id}'";

if ($conn->query($sql) === TRUE){
    $response["update"] = "success";
} else {
    $response["update"] = "fail";
    $response["updateMessage"] = "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
echo json_encode($response);







