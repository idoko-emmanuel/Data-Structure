<?php 
namespace DataStructure\Models;
require_once __DIR__ . '/../../vendor/autoload.php';

use Database\Connection;
use DataStructure\Traits\Model;

class Customer extends Connection 
{
    use Model;

    public function __construct()
    {
        parent::__construct();
        if ($this->conn != null)
            echo 'Connected to the SQLite database successfully!';
        else
            echo 'Whoops, could not connect to the SQLite database!';
    }

}