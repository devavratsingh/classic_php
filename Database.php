<?php 
require_once("config/config.php");

class Database {
    private $db_host = DB_HOST;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;
    private $db_name = DB_NAME;
    public $connection;
    private $error;
    private $stmt;
    private $dbconnected = false;

    public function __construct()
    {
        date_default_timezone_set("Asia/Kolkata");
        $conn = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        if (!$conn) {
            echo "<script>alert('Error: Unable to connect to MySQL.')</script>" . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        } else {
            $this->dbconnected = true;
            $this->connection = $conn;
        }
        
    }
    public function getDate(){
        return date("Y-m-d H:i:s");
    }
    public function mysqliError($conn){
        return  mysqli_error($conn);
    }

    // This function is checked the database is connected or not
    public function isConnected(){
        if($this->dbconnected){
            echo "DB Connected".PHP_EOL;
        } else {
            echo "DB Not Connected.".PHP_EOL;
        }
        return $this->dbconnected;
    }
    public function query($query){
        $this->stmt = $this->connection->prepare($query);
    }

    public function execute(){
        return $this->stmt->execute();
    }
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function rowCount(){
        return $this->stmt->rowCount();
    }
}
?>