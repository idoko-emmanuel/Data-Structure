<?php 
namespace DataStructure\Traits;

trait IterateLinkedList {

    private $_currentNode = NULL; 
    private $_currentPosition = 0; 

    public function current() { 
        return $this->_currentNode->data; 
    } 

    public function next() { 
        $this->_currentPosition++; 
        $this->_currentNode = $this->_currentNode->next; 
    } 

    public function key() { 
        return $this->_currentPosition; 
    } 

    public function rewind() { 
        $this->_currentPosition = 0; 
        $this->_currentNode = $this->_firstNode; 
    } 

    public function valid() { 
        return $this->_currentNode !== NULL; 
    }

}

?>