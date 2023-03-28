<?php 
namespace DataStructure\Traits;

trait Table
{
    public function create(string $name, array $columns) {

        $sql = "CREATE TABLE IF NOT EXISTS ".$name." (";
        $sql .= "ID INT PRIMARY KEY NOT NULL, "; // Changed AUTO_INCREMENT to AUTOINCREMENT
        foreach ($columns as $column) {
            $sql .= "$column VARCHAR(255) NOT NULL, ";
        }
        $sql .= "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, ";
        $sql .= "updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP";
        $sql .= ")";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    public function seed(array $data) {
        $columns = implode(',', array_keys($data)); // Get column names as a comma-separated string
        $values = implode(',', array_fill(0, count($data), '?')); // Get placeholder values as a comma-separated string
        $sql = "INSERT INTO ."$this->tablename". ($columns) VALUES ($values)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(array_values($data));
    }

    public function drop(string $name)
    {
        $sql = "DROP TABLE ".$name;
        $stmt = $this->conn->prepare($sql);
        return $stmt = $stmt->execute();
    }

}