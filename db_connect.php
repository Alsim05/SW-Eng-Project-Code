<?php

namespace TAOINCOM\Db;

class Connect

{
    // Declaring private variables - for additional security!
    private $conn;
    // private $data_search;
    private $msg;

    // Declaring public variables for connection to my main Database.
    private $host_name;
    private $user_name;
    private $pass_word;
    private $db_name;

    public $data;
    // public $data_output;
    public $emailAddress;
    public $fullName;
    public $id;
    public $password;
    public $sql_data;
    public $username;

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
        $sql = "SELECT COUNT(*) FROM contact_details;";
        settype($this->id, "integer");

        if ($result = mysqli_query($this->conn , $sql))
        {
            $row_count = mysqli_num_rows($result);
            $this->id = $row_count + 1;
            echo "The largest id value is: ".$this->id.'<br>';
        }

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
        $this->fullName = $fullName;
        $this->username = $username;
        $this->password = $password;
        $this->emailAddress = $emailAddress;
        $this->sql_data = "INSERT INTO contact_details (id, full_name, username, password, email_address) 
        VALUES('$this->id', '$this->fullName', '$this->username', '$this->password', '$this->emailAddress');";

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
        $data_search = "SELECT * FROM contact_details WHERE full_name = '$data' OR 
        username = '$data' OR password = '$data' OR email_address = '$data';";
        $result = $this->conn->query($data_search);
        $row = $result->fetch_assoc();
        return $data_output = 'Full Name: '.$row['full_name'].', Username: '.
            $row['username'].', Email Address: '.$row['email_address'].', Password: '.
            $row['password'];
            '<br>';
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