<?php
require 'login_check.php';
require "db_connection.php";


$cmd = $_POST['cmd'];
$filter_param = $_POST['filter_param'];
$filter_by = $_POST['filter_by'];
$sql = "SELECT user_no, user_id, user_name, user_email, rt, last_login_date FROM `users` where 1=1 ";

if (isset($cmd) && $cmd == 'get_list') {
    $result = $conn->query($sql);
}

if (isset($cmd) && $cmd == 'filter' && ($filter_param == 'user_no' || $filter_param == 'user_name' || $filter_param == 'user_email' || $filter_param == 'user_id')) {
    $where = " and {$filter_param} = '$filter_by' ";
    $sql = $sql.$where;
    $result = $conn->query($sql);
    var_dump($result);
}

if (isset($cmd) && $cmd == 'filter' && ($filter_param == 'rt' || $filter_param == 'last_login_date')) {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $where = " and {$filter_param} >= '{$from}' and {$filter_param} <= '{$to}' ";
    $sql = $sql.$where;
    $result = $conn->query($sql);
}


$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { //$row is a local variable inside the loop, fetch_assoc gets the row from database
        $data[] = $row;
    }
}

$conn->close();
echo json_encode($data);
return;


