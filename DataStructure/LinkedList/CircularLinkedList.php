<?php 
namespace DataStructure\LinkedList;
require_once __DIR__ . '/../../vendor/autoload.php';

use DataStructure\LinkedList\listNode;


class CircularLinkedList 
{
    private $_firstNode = NULL; 
    private $_totalNode = 0; 

    public function insertAtEnd(string $data = NULL) { 
        $newNode = new listNode($data); 
        if ($this->_firstNode === NULL) { 
            $this->_firstNode = &$newNode; 
        } else { 
            $currentNode = $this->_firstNode; 
            while ($currentNode->next !== $this->_firstNode) { 
                $currentNode = $currentNode->next; 
            } 
            $currentNode->next = $newNode; 
        } 
        $newNode->next = $this->_firstNode; 
        $this->_totalNode++; 
        return TRUE; 
    }

    public function display() { 
        echo "Total book titles: " . $this->_totalNode . "\n"; 
        $currentNode = $this->_firstNode; 
        while ($currentNode->next !== $this->_firstNode) { 
            echo $currentNode->data . "\n"; 
            $currentNode = $currentNode->next; 
        } 

        if ($currentNode) { 
            echo $currentNode->data . "\n"; 
        } 
    }
}

?>