<?php 
namespace Database;

class Connection {
    /**
     * PDO instance
     * @var type 
     */
    public $conn;

    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return \PDO
     */
    public function __construct() {
        if ($this->conn == null) {
            $this->conn = new \PDO("sqlite:" . Config\Database::PATH_TO_SQLITE_FILE);
            //$conn = new \PDO('mysql:host=localhost;dbname=mydatabase', 'username', 'password');
        }
        return $this->conn;
    }
}