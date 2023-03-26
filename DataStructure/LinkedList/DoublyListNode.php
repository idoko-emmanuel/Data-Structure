<?php 
namespace DataStructure\LinkedList;


class DoublyListNode  
{
    public $data = NULL; 
    public $next = NULL; 
    public $prev = NULL; 

    public function __construct(string $data = NULL) {
        $this->data = $data;
    }
}

?>