<?php

require 'db_connect.php';
use TAOINCOM\Db\Connect as aConn;

$conn = new aConn();
echo $conn->connect_message();
$conn -> close_conn();
