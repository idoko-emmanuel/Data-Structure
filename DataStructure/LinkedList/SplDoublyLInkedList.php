<?php 
namespace DataStructure\LinkedList;

/* 
Using PHP SplDoublyLinkedList
The PHP Standard PHP Library (SPL) has an implementation of a doubly linked list, which is known as SplDoublyLinkedList. If we are using the built-in class, we do not need to implement the doubly linked list ourselves. The doubly linked list implementation actually works as a stack and queue as well. The PHP implementation of the doubly linked list has lots of additional functionalities. Here are some of the common features of SplDoublyLinkedList:

Method

Description

Add

Adds a new node in a specified index

Bottom

Peeks a node from beginning of the list

Count

Returns the size of the list

Current

Returns the current node

getIteratorMode

Returns the mode of iteration

setIteratorMode

Sets the mode of iteration. For example, LIFO, FIFO, and so on

Key

Returns the current node index

next

Moves to the next node

pop

Pops a node from the end of the list

prev

Moves to the previous node

push

Adds a new node at the end of the list

rewind

Rewinds the iterator back to the top

shift

Shifts a node from the beginning of the linked list

top

Peeks a node from the end of the list

unshift

Prepends an element in the list

valid

Checks whether there are any more nodes in the list

Now, let's write a small program using SplDoublyLinkedList for our book titles applications:
*/

$BookTitles = new \SplDoublyLinkedList(); 

$BookTitles->push("Introduction to Algorithm");
$BookTitles->push("Introduction to PHP and Data structures"); 
$BookTitles->push("Programming Intelligence");
$BookTitles->push("Mediawiki Administrative tutorial guide"); 
$BookTitles->add(1,"Introduction to Calculus");
$BookTitles->add(3,"Introduction to Graph Theory");

for($BookTitles->rewind();$BookTitles->valid();$BookTitles->next()){    
    echo $BookTitles->current()."\n";
}