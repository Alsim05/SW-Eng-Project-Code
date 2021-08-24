<?php
class Connect_Class
{
    public $conn;
    public $msg;

    public function __contruct($conn, $msg)
    {
        $this->conn = $conn;
        $this->msg = $msg;
    }
    public function connect()
    {
        // Declaring variables to store data to send to database later
        $host_name = 'localhost';
        $user_name = 'root';
        $pass_word = '';
        $db_name = 'website_data_db';

        // Creating a connection with the test_db database
        $this->conn = mysqli_connect($host_name, $user_name, $pass_word, $db_name);
    }

    public function get_message()
    {
        if (!$this->conn)
        {
            $this->msg = 'Something went wrong!';
        }
        if($this->conn)
        {
            $this->msg = 'Connection successful!';
        }
        return $this->msg;
    }
}

$object = new Connect_Class();
$object->connect();
$message = $object->get_message();
echo $message;
$this->conn -> close();