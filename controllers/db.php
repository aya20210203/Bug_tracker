<?php
class DB
{
    private $connection;
    
    // singleton design pattern
    private static $instance = null;
    private function __construct(){}
    public static function getInstance()
    {
        if (self::$instance == null) {self::$instance = new DB();}
        return self::$instance;
    }

    // $db = new DB;
    // $db = DB::getInstance();


    public function open_connection() 
    {
        $this->connection = new mysqli("localhost", "root", "", "bug_tracker");
    }
    public function close_connection()
    {
        if($this->connection){$this->connection->close();}
        else{echo "connection is not opened";}
    }
    public function select($x)
    {
        $this->open_connection();
        $statement = $this->connection->prepare($x); 
        $statement->execute(); 
        $resultSet = $statement->get_result(); 
        $this->close_connection();
        return $resultSet;
    }
    public function insert($x)
    {
        $this->open_connection();
        $statement = $this->connection->prepare($x); 
        $statement->execute(); 
        $this->close_connection();
    }
}

?>