<?php
namespace DataStructure\Abstracts;

abstract class SinglyList {
    private $_firstNode;
    private $_lastNode;
    private $_totalNode; 
    
    abstract public function insertAtFirst(string $data);

    abstract public function insertAtLast(string $data);

    abstract public function insertBefore(string $data, string $query);

    abstract public function insertAfter(string $data, string $query);

    abstract public function deleteFirst();

    abstract public function deleteLast();

    abstract public function delete(string $query);

    abstract public function displayForward();

    abstract public function displayBackward();
}

?>