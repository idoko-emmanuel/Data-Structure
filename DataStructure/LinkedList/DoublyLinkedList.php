<?php 
namespace DataStructure\LinkedList;
require_once __DIR__ . '/../../vendor/autoload.php';

use DataStructure\LinkedList\DoublyListNode;


class DoublyLinkedList  
{
    private $_firstNode = NULL;
    private $_lastNode = NULL;
    private $_totalNode = 0;

    /*Inserting at first the node
    When we add a node at the front or head, we have to check whether the list is empty or not. If the list is empty, both the first and last node will point to the newly created node. However, if the list already has a head, then we have to do the following:

    Create the new node.
    Make the new node as the first node or head.
    Assign the previous head or first node as the next, to follow the newly created first node.
    Assign the previous first node's previous link to the new first node.*/

    public function insertAtFirst(string $data = NULL) {
        $newNode = new ListNode($data);
        if ($this->_firstNode === NULL) {
            $this->_firstNode = &$newNode;
            $this->_lastNode = $newNode; 
        } else {
            $currentFirstNode = $this->_firstNode; 
            $this->_firstNode = &$newNode; 
            $newNode->next = $currentFirstNode; 
            $currentFirstNode->prev = $newNode; 
        }
        $this->_totalNode++; 
        return TRUE;
    }

    /*Inserting at the last node
    Since we are now tracking the last node, it will be easier to insert a new node at the end. First, we need to check that the list is not empty. If it is empty, then the new node becomes both the first and last node. However, if the list already has a last node, then we have to do the following:

    Create the new node.
    Make the new node the last node.
    Assign the previous last node as the previous link of the current last node.
    Assign the previous last node's next link to the new last node's previous link.*/

    public function insertAtLast(string $data = NULL) { 
        $newNode = new ListNode($data);
        if ($this->_firstNode === NULL) {
            $this->_firstNode = &$newNode; 
            $this->_lastNode = $newNode; 
        } else {
            $currentNode = $this->_lastNode; 
            $currentNode->next = $newNode; 
            $newNode->prev = $currentNode; 
            $this->_lastNode = $newNode; 
        }
        $this->_totalNode++; 
        return TRUE;
    }

    
}

?>