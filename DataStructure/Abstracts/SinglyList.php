<?php
namespace DataStructure\Abstracts;

abstract class SinglyList {
    private $_firstNode;
    private $_totalNodes; 
    
    abstract public function insert(string $data);

    abstract public function display(); 

    abstract public function search(String $data);

    abstract public function insertBefore(String $data, String $query);

    abstract public function insertAfter(String $data, String $query);

    abstract public function deleteFirst();

    abstract public function deleteLast();

    abstract public function delete(string $query);

    abstract public function reverse();

    abstract public function getNthNode(int $n);

    abstract public function getSize();
}

?>