<?php 
namespace DataStructure\Traits;

trait Model
{
    public function createtable(string $name, array $columns) {

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
    public function create(array $data) {
        $columns = implode(',', array_keys($data)); // Get column names as a comma-separated string
        $values = implode(',', array_fill(0, count($data), '?')); // Get placeholder values as a comma-separated string
        $sql = "INSERT INTO users ($columns) VALUES ($values)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(array_values($data));
    }
    
    public function update(int $id, array $data) {
        $sql = "UPDATE ".$this->name." SET name = :name, email = :email, password = :password WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        return $stmt->execute();
    }
    
    public function delete(int $id) {
        $sql = "DELETE FROM ".$this->name." WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    
    public function getById(int $id) {
        $sql = "SELECT * FROM ".$this->name." WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getAll() {
        $sql = "SELECT * FROM ".$this->name."";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}