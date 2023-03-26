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

    /*Inserting before a specific node
    Inserting before a specific node requires us to find the node first, and based on its position, we need to change the next and previous nodes for the new node, the target node, and the node before the target node, as follows:*/

    public function insertBefore(string $data = NULL, string $query =  
      NULL) {
        $newNode = new ListNode($data); 

        if ($this->_firstNode) { 
            $previous = NULL; 
            $currentNode = $this->_firstNode; 
            while ($currentNode !== NULL) { 
                if ($currentNode->data === $query) { 
                    $newNode->next = $currentNode; 
                    $currentNode->prev = $newNode; 
                    $previous->next = $newNode; 
                    $newNode->prev = $previous; 
                    $this->_totalNode++; 
                    break; 
                }
                $previous = $currentNode; 
                $currentNode = $currentNode->next; 
            }
        }
    }

    /*Inserting after a specific node
    Inserting after a specific node is similar to the method we just discussed. Here, we need to change the next and previous nodes for the new node, the target node, and the node following the target node. Here is the code for that:*/

    public function insertAfter(string $data = NULL, string $query = 
      NULL) { 
        $newNode = new ListNode($data);

        if ($this->_firstNode) { 
            $nextNode = NULL; 
            $currentNode = $this->_firstNode; 
            while ($currentNode !== NULL) { 
                if ($currentNode->data === $query) { 
                    if ($nextNode !== NULL) { 
                        $newNode->next = $nextNode; 
                    } 
                    if ($currentNode === $this->_lastNode) { 
                        $this->_lastNode = $newNode; 
                    } 
                    $currentNode->next = $newNode; 
                    $nextNode->prev = $newNode; 
                    $newNode->prev = $currentNode; 
                    $this->_totalNode++; 
                    break; 
                } 
                $currentNode = $currentNode->next; 
                $nextNode = $currentNode->next; 
            }
        }
    }

    /*Deleting the first node
    When we remove the first node from a doubly linked list, we just need to make the second node the first node. Set the new first node's previous node to NULL and reduce the total node count, just like the following code:*/

    public function deleteFirst() { 
        if ($this->_firstNode !== NULL) { 
            if ($this->_firstNode->next !== NULL) { 
                $this->_firstNode = $this->_firstNode->next; 
                $this->_firstNode->prev = NULL; 
            } else { 
                $this->_firstNode = NULL; 
            } 
            $this->_totalNode--; 
            return TRUE; 
        } 
        return FALSE; 
    }

    /*Deleting the last node
    Deleting the last node requires us to set a second to last node as the new last node. Also, the newly created last node should not have any next reference. The code sample is shown here:*/

    public function deleteLast() { 
        if ($this->_lastNode !== NULL) { 

            $currentNode = $this->_lastNode; 
            if ($currentNode->prev === NULL) { 
                $this->_firstNode = NULL; 
                $this->_lastNode = NULL; 
            } else { 
                $previousNode = $currentNode->prev; 
                $this->_lastNode = $previousNode; 
                $previousNode->next = NULL; 
                $this->_totalNode--; 
                return TRUE; 
            } 
        } 
        return FALSE; 
    }

    /*Searching for and deleting one node
    When we are deleting a node from the middle of the list, we have to readjust the previous and the following node of the item we are looking for. First, we will find the intended node. Get the previous node of the target node, along with the next node. Then, assign the node following the previous node to point to the next node after the target node, and the same applies for the previous node in a reverse manner. Here is the code for that: */

    public function delete(string $query = NULL) { 
        if ($this->_firstNode) { 
            $previous = NULL;
            $currentNode = $this->_firstNode; 
            while ($currentNode !== NULL) { 
                if ($currentNode->data === $query) { 
                    if ($currentNode->next === NULL) { 
                        $previous->next = NULL; 
                    } else { 
                        $previous->next = $currentNode->next; 
                        $currentNode->next->prev = $previous; 
                    }

                    $this->_totalNode--; 
                    break; 
                }
                $previous = $currentNode; 
                $currentNode = $currentNode->next; 
            }
        }
    }

    /*Displaying the list forward
    Doubly linked lists gives us the opportunity to display the list in both directions. So far, we have seen that we can display the list in a unidirectional way while working in a singly linked list. Now, we will see the list from both directions. Here is the code used to display the list forward:*/

    public function displayForward() { 
        echo "Total book titles: " . $this->_totalNode . "\n"; 
        $currentNode = $this->_firstNode; 
        while ($currentNode !== NULL) { 
            echo $currentNode->data . "\n"; 
            $currentNode = $currentNode->next; 
        } 
    }
    
}

?>