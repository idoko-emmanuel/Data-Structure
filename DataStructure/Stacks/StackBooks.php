<?php 
namespace DataStructure\Stacks;
require_once __DIR__ . '/../../vendor/autoload.php';

use DataStructure\Interfaces\Stack;

class StackBooks implements Stack { 

    private $limit; 
    private $stack; 

    public function __construct(int $limit = 20) { 
      $this->limit = $limit; 
      $this->stack = []; 
    } 

    public function pop(): string { 

      if ($this->isEmpty()) { 
          throw new \UnderflowException('Stack is empty'); 
      } else { 
          return array_pop($this->stack); 
      } 
    } 

    public function push(string $newItem) { 

      if (count($this->stack) < $this->limit) { 
          array_push($this->stack, $newItem); 
      } else { 
          throw new \OverflowException('Stack is full'); 
      } 
    } 

    public function top(): string { 
      return end($this->stack); 
    } 

    public function isEmpty(): bool { 
      return empty($this->stack); 
    } 
}

try { 
    $programmingBooks = new StackBooks(10); 
    $programmingBooks->push("Introduction to PHP7"); 
    $programmingBooks->push("Mastering JavaScript"); 
    $programmingBooks->push("MySQL Workbench tutorial"); 
    echo $programmingBooks->pop()."\n"; 
    echo $programmingBooks->top()."\n"; 
} catch (Exception $e) { 
    echo $e->getMessage(); 
}

?>