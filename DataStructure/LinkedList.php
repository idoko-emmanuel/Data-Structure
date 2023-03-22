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

    public function search(String $data = null)
    {
        if($this->_totalNodes){
            $currentNode = $this->_firstNode;
            while($currentNode !== null){
                if($currentNode->data === $data){
                    echo "Node found \n";
                    return $currentNode;
                }
                $currentNode = $currentNode->next;
            }
        }
        echo "Node not found \n";
        return false;
    }

    public function insertBefore(String $data = null, String $query = null)
    {
        $newNode = new listNode($data);
        if($this->_firstNode) {
            $previous = null;
            $currentNode = $this->_firstNode;

            while($currentNode !== null) {
                if($currentNode->data === $query) {
                    $newNode->next = $currentNode;
                    $previous->next = $newNode;

                    $this->_totalNodes++;
                    break;
                }

                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    public function insertAfter(String $data, String $query = null)
    {
        $newNode = new listNode($data);
        if($this->_firstNode) {
            $nextNode = null;
            $currentNode = $this->_firstNode;
            while($currentNode !== null) {
                if($currentNode->data === $query)
                {
                    if($nextNode !== null)
                    {
                        $newNode->next = $nextNode;
                    }
                    $currentNode->next = $newNode;
                    $this->_totalNodes++;
                    break;
                }
                $currentNode = $currentNode->next;
                $nextNode = $currentNode->next;
            }
        }
    }

    public function deleteFirst()
    {
        if($this->_firstNode !== null)
        {
            if($this->_firstNode->next !== null)
            {
                $this->_firstNode = $this->_firstNode->next;
            } else {
                $this->_firstNode = NULL;
            }

            $this->_totalNodes--;
            return true;
        }
        return false;
    }
} 

$BookTitles = new LinkedList(); 
$BookTitles->insert("Introduction to Algorithm"); 
$BookTitles->insert("Introduction to PHP and Data structures"); 
$BookTitles->insert("Programming Intelligence"); 
$BookTitles->display(); 
$BookTitles->search("Introduction to lgorithm");
$BookTitles->insertBefore("This comes second", "Introduction to PHP and Data structures"); 
$BookTitles->insertAfter("This comes last", "Programming Intelligence"); 
$BookTitles->display();
$BookTitles->deleteFirst();
echo "First node deleted \n";
$BookTitles->display(); 
?>