<?php

require('./QueueLinkedList.php');
use Node as GlobalNode;

class Node
{
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
    public QueueLinkedList $q;

    public function __construct()
    {
        $this->root=NULL;
        $this->q=new QueueLinkedList();
    }

    //Add Element By Iterator Method
    public function add($val){
        $newNode=new GlobalNode($val);
        if($this->root == NULL){
            $this->root=$newNode;
            return;
        }
        $temp=$this->root;
        $parent=NULL;
        while($temp!=null){
            $parent=$temp;
            if($val <= $temp->data){
                $temp=$temp->left; //في اخر لفة هيساوي >>> NULL
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
            if($temp->left==NULL){
                $newNode=new Node($val);
                $temp->left=$newNode;

            }else{
                $this->addHelper($temp->left,$val);
            }
        }
        else{
            if($temp->right==NULL){
                $newNode=new Node($val);
                $temp->right=$newNode;

            }else{
                $this->addHelper($temp->right,$val);
            }
        }
    }

    //add Element By Recursion Method
    public function add2($val){
        $newNode=new GlobalNode($val);
        if($this->root == NULL){
            $this->root=$newNode;
            return;
        }else{
            $this->addHelper($this->root,$val);
        }
    }

    public function getMax(){
        $temp=$this->root;
        while($temp->right != NULL){
            $temp=$temp->right;
        }
        return $temp->data;
    }

    public function getMin(){
        $temp=$this->root;
        while($temp->left != NULL){
            $temp=$temp->left;
        }
        return $temp->data;
    }

    private function getMaxHelper($temp){
        if($temp->right==NULL){
            return $temp->data;
        }else{
            return $this->getMaxHelper($temp->right);
        }
    }

    public function getMAxByRecursion(){
        return $this->getMaxHelper($this->root);
    }

    private function getMinHelper($temp){
        if($temp->left==NULL){
            return $temp->data;
        }else{
            return $this->getMinHelper($temp->left);
        }
    }

    public function getMinByRecursion(){
        return $this->getMinHelper($this->root);
    }

    private function getHeightHelper($temp){
        if($temp==NULL)
            return -1;
        
        $leftSubTree=$this->getHeightHelper($temp->left);
        // echo($leftSubTree.'<br>');
        $rightSubTree=$this->getHeightHelper($temp->right);
        return 1+max($leftSubTree,$rightSubTree);

    }

    public function getHeight(){
        if($this->root ==NULL)
            return -1;
        else 
            return $this->getHeightHelper($this->root);   
    }

   
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

    public function preOrder($temp){
        if($temp == NULL)
            return;
        echo($temp->data.'<br>');
        $this->preOrder($temp->left);
        $this->preOrder($temp->right);
    }
    public function display_preOrder(){

        if($this->root != NULL){

            $this->preOrder($this->root);
        }
    }

    public function InOrder($temp){
        if($temp == NULL)
            return;
            $this->InOrder($temp->left);
            echo($temp->data.'<br>');
            $this->InOrder($temp->right);
    }
    public function display_InOrder(){

        if($this->root != NULL){

            $this->InOrder($this->root);
        }
    }

    public function PostOrder($temp){
        if($temp == NULL)
            return;
            $this->PostOrder($temp->left);
            $this->PostOrder($temp->right);
            echo($temp->data.'<br>');
    }
    public function display_PostOrder(){

        if($this->root != NULL){

            $this->PostOrder($this->root);
        }
    }


    private function removeHelper($root,$data){
        if($root==NULL) return $root;
        elseif($data < $root->data){
            $root->left=$this->removeHelper($root->left,$data);
        }elseif($data > $root->data){
            $root->right=$this->removeHelper($root->right,$data);
        }else{
            if($root->left == NULL && $root->right ==NULL){
                unset($root);
                $root=null;
                return $root;
            }
            elseif($root->left == NULL){
                $temp=$root->right;
                unset($root);
                return $temp;
            }elseif($root->right == NULL){
                $temp=$root->left;
                unset($root);
                return $temp;
            }else{
                $maxValue=$this->getMaxHelper($root->left);
                $root->data=$maxValue;
                $root->left=$this->removeHelper($root->left,$maxValue);
            }
        }
        return $root;
    }

    public function remove($data){
        $root=$this->removeHelper($this->root,$data);
    }
}

$bst=new BST();
$bst->add(10);
$bst->add(7);
$bst->add(15);
$bst->add(3);
$bst->add(9);
$bst->add(12);
// $bst->add(25);

// echo ($bst->getMax().'<br>');
// // echo('<br>');
// echo ($bst->getMin());
// echo('<br>');
// echo ($bst->getMAxByRecursion().'<br>');
// echo ($bst->getMinByRecursion().'<br>');
// echo ($bst->getHeight().'<br>');
// $bst->display_levelOrder();
// // echo('<br>');
$bst->display_InOrder();