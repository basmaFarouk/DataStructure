<?php

use LinkedList as GlobalLinkedList;

class Node{
    public $val;
    public $next;
    function __construct($data, $next=Null)
    {
        $this->val = $data;
        $this->next = $next;
    } 
}



    function merge($L1, $L2) {
      
      // create new linked list pointer
       $L3 = new Node(null, null);
       $prev = $L3;
      
      // while both linked lists are not empty
      while ($L1 !== null && $L2 !== null) {
        if ($L1->data <= $L2->data) { 
          $prev->next = $L1;
          $L1 = $L1->next;
        } else {
          $prev->next = $L2;
          $L2 = $L2->next;
        }
        $prev = $prev->next;
      }
      
      // once we reach end of a linked list, append the other 
      // list because we know it is already sorted
      if ($L1 === null) { $prev->next = $L2; }
      if ($L2 === null) { $prev->next = $L1; }
      return $L3->next;
}

function mergeTwoLists($L1, $L2) {
    $L3=new Node(NULL,NULL);
    $prev=$L3;
    while($L1 !== NULL && $L2 !== NULL){
        if($L1->val <= $L2->val){
            $prev->next=$L1;
            $L1=$L1->next;
        }else{
            $prev->next=$L2;
            $L2=$L2->next;
        }
        $prev=$prev->next;
    }

    if($L1===NULL) {$prev->next=$L2;}
    if($L2===NULL) {$prev->next=$L1;}
    return $L3->next;


}



// create first linked list: 1 -> 3 -> 10
$n3 = new Node(10, null);
$n2 = new Node(3, $n3);
$n1 = new Node(1, $n2);
$L1 = $n1; 


// create second linked list: 5 -> 6 -> 9
$n6 = new Node(9, null);
$n5 = new Node(6, $n6);
$n4 = new Node(5, $n5);
$L2 = $n4; 

// var_dump(merge($L1, $L2)); 
var_dump(mergeTwoLists($L1,$L2));