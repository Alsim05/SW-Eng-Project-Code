<?php

include 'db_connect.php';

$fullName = $_POST["fullName"];
$username = $_POST["username"];
$password = $_POST["password"];
$emailAddress = $_POST["emailAddress"];

// Code providing data to be inserted intp database later
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
}

// Closing connection
$conn -> close();
