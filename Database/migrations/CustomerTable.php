<?php 
namespace Database\Migrations;
require_once __DIR__ . '/../../vendor/autoload.php';

use DataStructure\Models\Customer;

class CustomerTable extends Customer 
{
    public function run()
    {
        $columns = ['name', 'email', 'password'];
        $this->createtable('leaders', $columns);
        echo "Customer table created successfully";
    }
}
$table = new CustomerTable();
$table->run();