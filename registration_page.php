<?php

require 'db_connect.php';
use TAOINCOM\Db\Connect as aConn;

$conn = new aConn();
$fullName = $_POST['fullName'];
$username = $_POST['username'];
$password = $_POST['password'];
$emailAddress = $_POST['emailAddress'];

echo $conn->send_data($fullName, $username, $password, $emailAddress).'<br>';

// Closing connection
$conn->close_conn();