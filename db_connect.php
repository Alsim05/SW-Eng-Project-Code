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