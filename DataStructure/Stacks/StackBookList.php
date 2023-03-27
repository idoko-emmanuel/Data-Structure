<?php 
namespace DataStructure\Stacks;
require_once __DIR__ . '/../../vendor/autoload.php';

use DataStructure\Interfaces\Stack;
use DataStructure\LinkedList\SinglyLinkedList;

class StackBookList implements Stack { 

    private $stack; 

    public function __construct() { 
        $this->stack = new SinglyLinkedList(); 
    }

    public function pop(): string { 

        if ($this->isEmpty()) { 
            throw new UnderflowException('Stack is empty'); 
        } else { 
            $lastItem = $this->top(); 
            $this->stack->deleteLast(); 
            return $lastItem; 
        } 
    } 

    public function push(string $newItem) { 

        $this->stack->insert($newItem); 
    } 
    
    
    public function top(): string { 
      return $this->stack->getNthNode($this->stack->getSize())->data; 
    } 
    
    public function isEmpty(): bool { 
        return $this->stack->getSize() == 0; 
    } 
}

try { 
    $programmingBooks = new StackBookList(); 
    $programmingBooks->push("Introduction to PHP7"); 
    $programmingBooks->push("Mastering JavaScript"); 
    $programmingBooks->push("MySQL Workbench tutorial"); 
    echo $programmingBooks->pop()."\n"; 
    echo $programmingBooks->pop()."\n"; 
    echo $programmingBooks->top()."\n"; 
} catch (Exception $e) { 
    echo $e->getMessage(); 
}

?>