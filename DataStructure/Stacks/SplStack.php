<?php 
namespace DataStructure\Stacks;

$books = new \SplStack(); 
$books->push("Introduction to PHP7"); 
$books->push("Mastering JavaScript"); 
$books->push("MySQL Workbench tutorial"); 
echo $books->pop() . "\n"; 
echo $books->top() . "\n";