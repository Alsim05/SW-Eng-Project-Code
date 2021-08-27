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
    public $num_rows;

    public function __construct()
    {
        // Declaring variables to store data to send to database later
        $this->host_name = 'localhost';
        $this->user_name = 'root';
        $this->pass_word = '';
        $this->db_name = 'website_data_db';
    }

    public function send_data($fullName, $username, $password, $emailAddress)
    {
        $this->fullName = $fullName;
        $this->username = $username;
        $this->password = $password;
        $this->emailAddress = $emailAddress;

        // Creating a connection with the website_data_db database
        $this->conn = mysqli_connect($this->host_name, $this->user_name, $this->pass_word,
            $this->db_name);

        if(!$this->conn)
        {
            $this->msg = 'Connection failed!'; // Informing user if connection failed
        }
        else
        {
            $this->msg = 'Connection successful!'; // Informing user if connection successful
        }
        echo $this->msg.'<br>';

        $sql = "SELECT * FROM contact_details;";
        if ($result = mysqli_query($this->conn, $sql))
        {
            $this->num_rows = mysqli_num_rows($result);
        }
        echo 'There are '.$this->num_rows.' rows in the contact_details table'.'<br>';;
        //$sql = "SELECT COUNT(*) FROM contact_details;";
        settype($this->id, "integer"); // Converting id to int so I can perform Math ops on it

        $this->id = $this->num_rows + 1; // Ensuring that row_1[id]=1, row_2[id]=2, ... row_n[id]=n
        echo "The next id value is: ".$this->id.'<br>';

        $this->sql_data = "INSERT INTO contact_details (id, full_name, username, password, email_address)
        VALUES('$this->id', '$this->fullName', '$this->username', '$this->password', '$this->emailAddress');";

        if($this->conn ->query($this->sql_data) === TRUE)
        {
            $this->msg = 'Data successfully sent to database'.'<br>';
        }
        else
        {
            $this->msg = 'Error: '.$this->sql_data.'<br>'.$this->conn->error;
        }
    }

    public function get_data($data)
    {
        $data_search = "SELECT * FROM contact_details WHERE full_name = '$data' OR 
        username = '$data' OR password = '$data' OR email_address = '$data';";
        $result = $this->conn->query($data_search);
        $row = $result->fetch_assoc();
        return $data_output = 'Full Name: '.$row['full_name'].', Username: '.
            $row['username'].', Email Address: '.$row['email_address'].', Password: '.
            $row['password'].'<br>';
    }

    public function get_latest_id()
    {
        return $this->id;
    }

    public function close_conn()
    {
        $this->conn->close();
    }
}