<?php

class Node{
    
    public  $data;
    public  $next;

    public function __construct( $data)
    {
        $this->data=$data;
        $this->next=NULL;
    }


};

class LinkedList{

    public  $head;

    public function __construct()
    {
        $this->head=null;

    }

    //add element in the begining
    public function add($element){
        $newNode=new Node($element);
        $newNode->next=$this->head;
        $this->head=$newNode;
        // $this->head->next=$newNode;
        // // $this->head=$newNode;

    }


  //Add new element at the end of the list
  public function push_back($newElement) {
    $newNode = new Node($newElement); 
    if($this->head == null) {
      $this->head = $newNode;
    } else {
      $temp = $this->head;
      while($temp->next != null) {
        $temp = $temp->next;
      }
      $temp->next = $newNode;
    }    
  }

    //Add new element at the end of the list
    public function append(int $val){

        $newNode=new Node($val);
        if($this->head==NULL){
            $this->head=$newNode; //كده خلينا الهيد يشاور على النيو نود
            return;
        }
        else{
            $temp = $this->head;
            while($temp->next != NULL){ //عشان نجيب الادريس بتاع اخر نود
                $temp =$temp->next; 
            }
            //لما اللوب تخلص كده التمب هيبقى بيشاور على اخر عنصر
            $temp->next =$newNode;
        
        }

    }

    //Remove an Element 
    public function remove(int $val){

        if($this->head == NULL)
        {
            return;
        }
        $temp=$prev=$this->head;
        if($temp->data == $val){
            $this->head=$temp->next;
            return;
        }
        while($temp != NULL && $temp->data != $val){
            $prev=$temp;
            $temp=$temp->next;
        }
        if($temp==NULL){
            return;
        }
        else{
            $prev->next=$temp->next;
        }
    }

    //Insert value in a certain position
    public function insert_at_pos($val,$pos){

      $newNode=new Node($val);
      if($pos==0){ //special case >> لو انا هعمل انسيرت في النود رقم زيرو
        $newNode->next=$this->head;
        $this->head=$newNode;
        return;
      }
      $temp=$this->head;
      //$pos-1 >> لان الهدف بتاعي ان التمب يشاور على البوزيشن اللي قبل النود الل هحذفها
      //$temp->next != Null --> عشان لو اليوزر دخل رقم اكبر من حجم الليست بتاعتي فعشان ميظهرش ايرور
      for( $i=0; $i<$pos-1 && $temp->next != NULL;$i++){ 

        $temp=$temp->next;

      }
      $newNode->next=$temp->next;
      $temp->next=$newNode;

    }

    //Remove an element in a certain position
    public function remove_at_pos($pos){

      if($this->head==NULL)
          return;
      if($pos==0){
        $temp=$this->head;
        $this->head=$this->head->next;
        unset($temp);
        //delete $temp;
        
      }else{

        $temp=$this->head;

        for( $i=0; $i<$pos-1 && $temp->next != NULL;$i++){
  
          $temp=$temp->next;
  
        }
        if($temp->next==NULL){ //لو اليوزر دخل رقم اكبر من حجم اللينكد ليست
          return;
        }
        $temp2=$temp->next; //بيشاور على النود اللى عاوزين نحذفها عشان نحذفها من الميمورى
        $temp->next=$temp->next->next ; //=$temp2->next;
        unset($temp2);
        //delete $temp2;
      }

    }

    public function reverse(){
      if($this->head==NULL)
          return;
      $prev=$next=NULL;
      $curr=$this->head;

      while($curr != NULL){
        $next=$curr->next;
        $curr->next=$prev; //كده قطعنا اللينك
        $prev=$curr;
        $curr=$next;
      }
      $this->head=$prev;
    }

    public static function list($one,$two){

      "<br>".var_dump($one->head)."<br>" ;
      "<br>".var_dump($two->head)."<br>" ;
      $temp=$one->head;
      while($temp != NULL){
        $temp=$temp->next;
      }
      $temp->next=$two->head;
      $temp2=$one->head;
      if($temp2 != null) {
        echo "\nThe list contains: ";
        while($temp2 != null) {
          echo $temp2->data." ";
          $temp2 = $temp2->next;
        }
      } else {
        echo "\nThe list is empty.";
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

    // public function delete(){
    //     $this->head=$this->head->next;
    // }


}



$linkedList= new LinkedList();
$linkedList->append(15); //0
$linkedList->append(16); //1
$linkedList->append(18); //2
$linkedList->append(20); //3
// $linkedList->remove_at_pos(3);
$linkedList->PrintList();
// $linkedList->reverse();
// $linkedList->insert_at_pos(7,8);
// $linkedList->remove(15);
// $linkedList->push_back(19);
// $linkedList->add(15);
// $linkedList->add("f");

$linkedList2=new LinkedList();
$linkedList2->append(21);
$linkedList2->append(22);
$linkedList2->append(23);
$linkedList2->append(24);
$linkedList->PrintList();
// LinkedList::list($linkedList,$linkedList2);

// $linkedList->delete();



