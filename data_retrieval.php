<?php

require 'db_connect.php';
// include 'data_retrieval.html';
use TAOINCOM\Db\Connect as aConn;

$data = $_POST["data"];

$conn = new aConn();

// Retrieving a user's data
$msg = $conn->get_data($data);

echo $msg;

// Closing connection
$conn->close_conn();