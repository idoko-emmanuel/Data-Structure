<?php 
namespace DataStructure\LinkedList;

require_once __DIR__ . '/../../vendor/autoload.php';

use DataStructure\LinkedList\listNode;
use DataStructure\Abstracts\SinglyList;
use DataStructure\Traits\IterateLinkedList;


class SinglyLinkedList extends SinglyList implements \Iterator { 
    use IterateLinkedList;

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

    public function deleteLast()
    {
        if($this->_firstNode !== null)
        {
            $currentNode = $this->_firstNode;
            if($currentNode->next === null)
            {
                $this->_firstNode = null;
            }else {
                $previousNode = null;

                while($currentNode->next !== null)
                {
                    $previousNode = $currentNode;
                    $currentNode = $currentNode->next;
                }

                $previousNode->next = null;
                $this->_totalNodes--;
                return true;
            }

        }
        return false;
    }

    public function delete(string $query = null)
    {
        if($this->_firstNode) {
            $previous = null;
            $currentNode = $this->_firstNode;
            while($currentNode !== null)
            {
                if($currentNode->data === $query)
                {
                    if($currentNode->next === null)
                    {
                        $previous->next = null;
                    } else {
                        $previous->next = $currentNode->next;
                    }

                    $this->_totalNodes--;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    public function reverse() { 
        if ($this->_firstNode !== NULL) { 
            if ($this->_firstNode->next !== NULL) { 
                $reversedList = NULL; 
                $next = NULL; 
                $currentNode = $this->_firstNode; 
                while ($currentNode !== NULL) { 
                    $next = $currentNode->next; 
                    $currentNode->next = $reversedList; 
                    $reversedList = $currentNode; 
                    $currentNode = $next; 
                } 
                $this->_firstNode = $reversedList; 
            } 
        } 
    }

    public function getNthNode(int $n = 0) { 
        $count = 1; 
        if ($this->_firstNode !== NULL) { 
            $currentNode = $this->_firstNode; 
            while ($currentNode !== NULL) { 
                if ($count === $n) { 
                    return $currentNode; 
                } 
                $count++; 
                $currentNode = $currentNode->next; 
            } 
        } 
    } 

} 

$BookTitles = new SinglyLinkedList(); 
$BookTitles->insert("Introduction to Algorithm"); 
$BookTitles->insert("Introduction to PHP and Data structures"); 
$BookTitles->insert("Programming Intelligence"); 
$BookTitles->display(); 

echo "\n Search for a node\n\n";
$BookTitles->search("Introduction to algorithm");

echo "\n Insert before and after a node\n\n";
$BookTitles->insertBefore("This comes second", "Introduction to PHP and Data structures"); 
$BookTitles->insertAfter("This comes last", "Programming Intelligence"); 
$BookTitles->display();

echo "\n Using Iterator interface, and implementing its methods, linked list is now iterable \n\n";

foreach ($BookTitles as $index => $title) { 
    echo ($index+1)." ".$title . "\n"; 
}

echo "\n Using Iterator methods to iterate \n\n";

for ($BookTitles->rewind(); $BookTitles->valid(); $BookTitles->next()) { 
    echo $BookTitles->current() . "\n"; 
}

echo "\n Delete first and last node\n\n";
$BookTitles->deleteFirst();
$BookTitles->deleteLast();
$BookTitles->display();

echo "\n Search and delete node\n\n";
$BookTitles->delete("Programming Intelligence");
$BookTitles->display();

echo "\n Reverse list\n\n";
$BookTitles->reverse();
$BookTitles->display();
echo "\n 2nd Item is: ".$BookTitles->getNthNode(2)->data; 
?>