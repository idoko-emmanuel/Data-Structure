<?php 
namespace DataStructure\LinkedList;


class DoublyListNode  
{
    /*Implementing a doubly linked list in PHP
    We already know from the definition of a doubly linked list that a doubly linked list node will have two links: one to point to the next node and another to point to the previous node. Also, when we add a new node or delete a new node, we need to set both the next and previous references for each affected nodes. We saw a different approach in the singly linked list implementation where we did not track the last node, and as a result, we had to use an iterator to reach the last node each time. This time, we will track the last node, along with our insert and delete operations, to make sure our insert, and delete, and end operations have O(1) complexity.

    Here is how the new node class will look with two link pointers followed by our barebones structure of a doubly linked list class:*/
    
    public $data = NULL; 
    public $next = NULL; 
    public $prev = NULL; 

    public function __construct(string $data = NULL) {
        $this->data = $data;
    }
}

?>