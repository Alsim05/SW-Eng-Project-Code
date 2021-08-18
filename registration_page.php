<?php

// Declaring variables to store data to send to database later
$host_name = 'localhost';
$user_name = 'root';
$pass_word = '';
$db_name = 'website_data_db';

// Creating a connection with the test_db database
$conn = mysqli_connect($host_name, $user_name, $pass_word, $db_name);

// Making an error message appear if a connection fault occurs
if(!$conn)
{
    die('Connection failed: '.mysqli_connect_error());
}

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
