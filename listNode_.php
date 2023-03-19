<?php 
class Node {
    public $value;
    public $next = null;
   function __construct($value, $next = null)
    {
        $this->value = $value;
        $this->next = $next;
    }

}

class Node2 {
  public $value;
  public $next = null;
 function __construct($value, $next = null)
  {
      $this->value = $value;
      $this->next = $next;
  }

}

$a = new Node('A');
$b = new Node('B');
$c = new Node('C');
$d = new Node('D');

$a->next = $b;
$b->next = $c;
$c->next = $d;

$e = new Node2('E');
$f = new Node2('F');
$g = new Node2('G');

$e->next = $f;
$f->next = $g;

// function printLinkedList($head)
// {
//   $current = $head;
//   while($current != null)
//   {
//     print_r($current->value);
//     $current = $current->next;
//   }

// }

// function printLinkedList($head)
// {
//   if($head === null) return;
//   print_r($head->value);
//   printLinkedList($head->next);
// }

function printLinkedList($head)
{
  $b = [];
  $current = $head;
  while($current != null)
  {
   array_push($b, $current->value);
    $current = $current->next;
  }
  print_r($b);

}

// function printLinkedList($head)
// {
//   $val = [];
//   fillValues($head, $val);

// }

// function fillValues($head, $val)
// {
//   if($head == null){
//     print_r($val);
//     return;
//   }

//   array_push($val, $head->value);
//   fillValues($head->next, $val);

// }

// printLinkedList($a);

// function sumLinkedList($head){
//     $current = $head;
//     $sum = 0;
//     while($current !== null)
//     {
//       $sum += $current->value;
//       $current = $current->next;
//     }
//     print_r($sum);
// }

// function sumLinkedList($head)
// {
//     $sum = 0;
//     fillValues($head, $sum);
// }

// function fillValues($head, $sum) {
//     if($head === null) {
//       print($sum);
//       return;
//     }
//     $sum += $head->value;
//     fillValues($head->next, $sum);
// }

// function sumLinkedList($head)
// {
//   if($head === null) return 0;
//   return $head->value + sumLinkedList($head->next);
// }

// sumLinkedList($a);

// function isTargetAvailable($head, $target){
//     $isavailabe = 'false';
//    $current = $head;
//    while($current !== null) {
//       if($current->value === $target)
//       {
//         $isavailabe = 'true';
//       }
//       $current = $current->next;
//    }
//    print($isavailabe);
// }

// function isTargetAvailable($head, $target){
  
//     if($head === null) {
//       print('false');
//       return;
//     }
//     if($head->value === $target)  {
//       print('true');
//       return;
//     }
//     isTargetAvailable($head->next, $target);
// }


// isTargetAvailable($a, 'A');

// function indexValue($head, $index)
// {
//     $current = $head;
//     $count = 0;
//     while($current !== null)
//     {
//       if($count === $index) print($current->value);
//       $count ++;
//       $current = $current->next;
//     }
//     print('null');
// }

// function indexValue($head, $index)
// {
//     $current = $head;
//     if($current === null) {
//       print('null');
//       return ;
//     }
//     if($index === 0){
//       print($current->value);
//       return ;
//     }
//     indexValue($current->next, $index - 1);
// }

// indexValue($a, 3);

// function reverseList($head)
// {
//     $prev = null;
//     $current = $head;
//     while($current !== null)
//     {
//        $next = $current->next;
//        $current->next = $prev;
//        $prev = $current;
//        $current = $next;
//     }

//     return $prev;
// }

// function reverseList($head, $prev = null)
// {
//     if($head === null) return $prev;

//     $next = $head->next;
//     $head->next = $prev;
//     return reverseList($next, $head);
// }

// printLinkedList(reverseList($a));

// function zipperList($head1, $head2)
// {
//     $tail = $head1;
//     $current1 = $head1->next;
//     $current2 = $head2;
//     $count = 0;

//     while($current1 !== null && $current2 !== null)
//     {
//         if($count % 2 === 0) {
//           $tail->next = $current2;
//           $current2 = $current2->next;
//         } else {
//           $tail->next = $current1;
//           $current1 = $current1->next;
//         }
//         $tail = $tail->next;
//         $count += 1;
//     }

//     if($current1 !== null) $tail->next = $current1;
//     if($current2 !== null) $tail->next = $current2;

//     return $head1;
// }

function zipperList($head1, $head2)
{
    if($head1 === null && $head2 === null) return null;
    if($head1 === null) return $head2;
    if($head2 === null) return $head1;
    
    $next1 = $head1->next;
    $next2 = $head2->next;
    $head1->next = $head2;

    $head2->next = zipperList($next1, $next2);

    return $head1;
}

printLinkedList(zipperList($a, $e));