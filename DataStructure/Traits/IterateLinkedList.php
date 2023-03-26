<?php 
namespace DataStructure\Traits;

trait IterateLinkedList {

    private $_currentNode = NULL; 
    private $_currentPosition = 0; 

    public function current():mixed { 
        return $this->_currentNode->data; 
    } 

    public function next():void { 
        $this->_currentPosition++; 
        $this->_currentNode = $this->_currentNode->next; 
    } 

    public function key():mixed { 
        return $this->_currentPosition; 
    } 

    public function rewind():void { 
        $this->_currentPosition = 0; 
        $this->_currentNode = $this->_firstNode; 
    } 

    public function valid():bool { 
        return $this->_currentNode !== NULL; 
    }

}

?>