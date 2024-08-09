<?php
require 'login_check.php';
require "db_connection.php";
$cmd = null;
$cmd = $_REQUEST['cmd'];
if (isset($cmd) && $cmd == 'get_list') {
    $sql = "SELECT user_no, user_id, user_name, user_email, rt, last_login_date FROM `users` where 1=1 ";
    $where = '';
    if ($_REQUEST['q_user_id']) {
        $where .= " and user_id = '$_REQUEST[q_user_id]' ";
    }
    if ($_REQUEST['q_user_no']) {
        $where .= " and user_no = '$_REQUEST[q_user_no]' ";
    }
    $sql = $sql.$where;
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
}
