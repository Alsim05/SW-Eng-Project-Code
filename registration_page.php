<?php

require 'db_connect.php';
use TAOINCOM\Db\Connect as aConn;

$fullName = $_POST['fullName'];
$username = $_POST['username'];
$password = $_POST['password'];
$emailAddress = $_POST['emailAddress'];

$conn = new aConn();
echo $conn->connect_message();
echo $conn->send_data($fullName, $username, $password, $emailAddress);

// Closing connection
$conn->close_conn();

/* $fullName = $_POST["fullName"];
$username = $_POST["username"];
$password = $_POST["password"];
$emailAddress = $_POST["emailAddress"];

// Code providing data to be inserted into database later
$sql_data = "INSERT INTO contact_details VALUES('$fullName', '$username', 
            '$password', '$emailAddress');";

// Insert above data into database
if($conn -> query($sql_data) === TRUE)
{
    echo 'Connection successfully made';
}
else
{
    echo "Error: ".$sql_data."<br>".$conn -> error;
} */


