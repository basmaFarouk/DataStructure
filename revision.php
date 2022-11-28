<?php
require('./QueueLinkedList.php');
use Node as GlobalNode;

class Node{
    public $data;
    public $left;
    public $right;

    public function __construct($val)
    {
        $this->data=$val;
        $this->right=NULL;
        $this->left=NULL;
    }
}

class BST{
   public $root;
   public $q;

   public function __construct()
   {
    $this->root=NULL;
    $this->q=new QueueLinkedList();
   }

   public function add($val){
    $newNode= new Node($val);
    if($this->root==NULL){
        $this->root=$newNode;
        return;
    }
    $temp=$this->root;
    $parent=NULL;
    while($temp != NULL){
        $parent=$temp;
        if($val <= $temp->data){
            $temp=$temp->left;
        }else{
            $temp=$temp->right;
        }
    }

    if($val <= $parent->data){
        $parent->left=$newNode;
    }else{
        $parent->right=$newNode;
    }
   }


   public function addHelper($temp,$val){
    if($val <= $temp->data){
        if($temp->left == NULL){
            $newNode=new Node($val);
            $temp->left=$newNode;
        }else{
            $this->addHelper($temp->left,$val);
        }
    }else{
        if($temp->right == NULL){
            $newNode=new Node($val);
            $temp->right=$newNode;
        }else{
            $this->addHelper($temp->right,$val);
        }
    }

   }

   public function add2($val){
    $newNode= new Node($val);
    if($this->root==NULL){
        $this->root=$newNode;
        return;
    }else{
        $this->addHelper($this->root,$val);
    }

   }

   public function minTree(){
    $temp=$this->root;
    while($temp->left != NULL){
        $temp=$temp->left;
    }
    return $temp->data;
   }

//    public function displayLevelOrder(){
//     $q= new QueueLinkedList();
//     if($this->root ==NULL )return;
//     $q->enqueue($this->root);
//     while(!$q->isEmpty()){
//         $current=$q->frontVal();
//         $q->dequeue();
//         echo($current->data. "  ");
//         if($current->left != NULL){
//             $q->enqueue($current->left);
//         }elseif($current->right != NULL){
//             $q->enqueue($current->right);
//         }
//     }
//    }

   public function display_levelOrder():void{
    if($this->root==NULL) return;
    $this->q->enqueue($this->root);
    while(!$this->q->isEmpty()){
        $current=$this->q->frontVal();
        $this->q->dequeue();
        echo($current->data."  ");
        if($current->left != NULL){
            $this->q->enqueue($current->left);
        }if($current->right != NULL){
            $this->q->enqueue($current->right);
        }

    }
}


}

$bst=new BST();
$bst->add(10);
$bst->add(7);
$bst->add(15);
$bst->add(3);
$bst->add(9);
echo('<br>');
echo ($bst->minTree());
echo "<br>";
$bst->display_levelOrder();