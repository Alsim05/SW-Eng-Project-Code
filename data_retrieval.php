<?php

include 'db_connect.php';

$data = $_POST["data"];

// Retrieving a user's data
$data_search = "SELECT * FROM contact_details WHERE full_name = '$data';";
$result = $conn -> query($data_search);
$row = $result -> fetch_assoc();

echo 'Full Name: '.$row['full_name'].'<br>';

// Closing connection
$conn -> close();