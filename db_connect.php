<?php

namespace TAOINCOM\Db;

class Connect

{
    public $conn;
    public $msg = '';
    public $host_name;
    public $user_name;
    public $pass_word;
    public $db_name;
    public $fullName;
    public $username;
    public $password;
    public $emailAddress;
    public $sql_data;
    public $data;
    public $data_output;

    public function __construct()
    {
        // Declaring variables to store data to send to database later
        $this->host_name = 'localhost';
        $this->user_name = 'root';
        $this->pass_word = '';
        $this->db_name = 'website_data_db';

        // Creating a connection with the test_db database
        $this->conn = mysqli_connect($this->host_name, $this->user_name, $this->pass_word,
            $this->db_name);
    }

    public function connect_message()
    {
        if(!$this->conn)
        {
            $this->msg = 'Connection failed!';
        }
        else
        {
            $this->msg = 'Connection successful!';
        }
        return $this->msg;
    }

    public function send_data($fullName, $username, $password, $emailAddress)
    {
        $this->sql_data = "INSERT INTO contact_details VALUES('$fullName', 
        '$username', '$password', '$emailAddress');";
        if($this->conn ->query($this->sql_data) === TRUE)
        {
            $this->msg = 'Data successfully sent to database'.'<br>';
        }
        // $this->conn -> query($this->sql_data);
        else
        {
            $this->msg = 'Error: '.$this->sql_data.'<br>'.$this->conn -> error;
        }
        return $this->msg;
    }

    public function get_data($data)
    {
        // $this->data = $data;
        $this->data_search = "SELECT * FROM contact_details WHERE username = '$data';";
        $this->result = $this->conn->query($this->data_search);
        $row = $this->result->fetch_assoc();
        $this->data_output = 'Full Name: '.$row['full_name'].', Username: '.
            $row['username'].$row['password'].', Email Address: '.$row['email_address'].
            '<br>';
        return $this->data_output;
    }

    public function get_fullName()
    {
        return $this->fullName;
    }

    public function close_conn()
    {
        $this->conn->close();
    }
}