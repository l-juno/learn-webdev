<?php

error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

$servername = "mysql";
$username = "myuser";
$password = "mypassword";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>