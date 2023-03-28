<?php 
namespace DataStructure\Models;
require_once __DIR__ . '/../../vendor/autoload.php';

use Database\Connection;
use DataStructure\Traits\Model;
use DataStructure\Interfaces\Model as InterfaceModel;

class Customer extends Connection implements InterfaceModel
{
    use Model;

    private $tablename = 'customer';

    public function __construct()
    {
        parent::__construct();
        if ($this->conn != null)
            echo 'Connected to the SQLite database successfully!';
        else
            echo 'Whoops, could not connect to the SQLite database!';
    }

}