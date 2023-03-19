<?php 
namespace DataStructure;

require_once __DIR__ . '/../vendor/autoload.php';
use DataStructure\listNode;


class LinkedList { 
    private $_firstNode = NULL; 
    private $_totalNodes = 0; 

    public function insert(string $data = NULL) { 
       $newNode = new listNode($data); 

        if ($this->_firstNode === NULL) {           
            $this->_firstNode = &$newNode;             
        } else { 
            $currentNode = $this->_firstNode; 
            while ($currentNode->next !== NULL) { 
                $currentNode = $currentNode->next; 
            } 
            $currentNode->next = $newNode; 
        } 
       $this->_totalNodes++; 
        return TRUE; 
    } 

    public function display() { 
      echo "Total book titles: ".$this->_totalNodes."\n"; 
        $currentNode = $this->_firstNode; 
        while ($currentNode !== NULL) { 
            echo $currentNode->data . "\n"; 
            $currentNode = $currentNode->next; 
        } 
    } 
} 

$BookTitles = new LinkedList(); 
$BookTitles->insert("Introduction to Algorithm"); 
$BookTitles->insert("Introduction to PHP and Data structures"); 
$BookTitles->insert("Programming Intelligence"); 
$BookTitles->display(); 

?>