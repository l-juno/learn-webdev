<?php
require 'login_check.php';
require "db_connection.php";

$user_no = $_POST['user_no'];
$user_id = $_POST['user_id'];
$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$rt_from = $_POST['rt_from'];
$rt_to = $_POST['rt_to'];
$last_logged_in_from = $_POST['last_logged_in_from'];
$last_logged_in_to = $_POST['last_logged_in_to'];

$sql = "SELECT user_no, user_id, user_name, user_email, rt, last_login_date FROM `users` where 1=1 ";

if (isset($user_no) && $user_no != '') {
    $where = " and user_no = '$user_no'";
    $sql = $sql.$where;
}
if (isset($user_id) && $user_id != '') {
    $where = " and user_id = '$user_id'";
    $sql = $sql.$where;
}
if (isset($user_name) && $user_name != '') {
    $where = " and user_name = '$user_name'";
    $sql = $sql.$where;
}
if (isset($user_email) && $user_email != '') {
    $where = " and user_email = '$user_email'";
    $sql = $sql.$where;
}

if ((isset($rt_from) && isset($rt_to)) && ($rt_from!='' && $rt_to!='')) {
    $where = " and rt >= '{$rt_from}' and rt <= '{$rt_to}'";
    $sql = $sql.$where;
}
if (isset($last_logged_in_from) && isset($last_logged_in_to) && ($last_logged_in_from!='' && $last_logged_in_to!='')) {
    $where = " and last_login_date >= '{$last_logged_in_from}' and last_login_date <= '{$last_logged_in_to}'";
    $sql = $sql.$where;
}
//var_dump($sql);

$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { //$row is a local variable inside the loop, fetch_assoc gets the row from database
        $data[] = $row;
    }
}

$conn->close();
echo json_encode($data);
return;


