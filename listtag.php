<?php
//node structure
class Node {
  public $data;
  public $next;

  public function __construct($data)
  {
    $this->data=$data;
    $this->next=null;
  }
}

class LinkedList {
  public $head;

  public function __construct(){
    $this->head = null;
  }
  
  //Add new element at the end of the list
  public function push_back($newElement) {
    $newNode = new Node($newElement);
    // $newNode->data = $newElement;
    // $newNode->next = null; 
    if($this->head == null) {
      $this->head = $newNode;
    } else {
      $temp = new Node($newElement);
      $temp = $this->head;
      while($temp->next != null) {
        $temp = $temp->next;
      }
      $temp->next = $newNode;
    }    
  }

  //display the content of the list
  public function PrintList() {
    // $temp = new Node();
    $temp = $this->head;
    if($temp != null) {
      echo "\nThe list contains: ";
      while($temp != null) {
        echo $temp->data." ";
        $temp = $temp->next;
      }
    } else {
      echo "\nThe list is empty.";
    }
  }    
};

// test the code  
$MyList = new LinkedList();

//Add three elements at the end of the list.
$MyList->push_back(10);
$MyList->push_back(20);
$MyList->push_back(30);
$MyList->PrintList();
?>