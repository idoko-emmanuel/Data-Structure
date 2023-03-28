<?php
namespace DataStructure\Interfaces;

trait Model {

    public function create(array $data);
    
    public function update(int $id, array $data);
    
    public function delete(int $id);
    
    public function getById(int $id);
    
    public function getAll();
}