<?php

class StackNode{

    public $data;
    public $next;

    public function __construct($data)
    {
        $this->data=$data;
        $this->next=null;
    }
}

class MyStack{
    public $top;
    public $count;

    public function __construct()
    {
        $this->top=NULL;
        $this->count=0;
    }

    public function push($val){

        $newNode=new StackNode($val);
        // if($this->isEmpty()){
        //     // $newNode->next=NULL;
        //     $this->top=$newNode;
        // }else{
        //     $newNode->next=$this->top;
        //     $this->top=$newNode;
        // }
        if($this->isEmpty()==false){
            $newNode->next=$this->top;
        }
        $this->top=$newNode;
    }

    public function pop(){

        if($this->isEmpty())
            return;
        else{
            $temp=$this->top;
            $this->top=$this->top->next;
            unset($temp);
        }
    }

    public function isEmpty(){

        if($this->top == NULL)
            return true;
        else
            return false;
    }

    public function topValue(){

        if($this->isEmpty())
            return -1;
        else
            return $this->top->data;
    }
}

$stack=new MyStack();
$stack->push(4);
$stack->push(5);
$stack->push(6);
$stack->push(7);

while($stack->isEmpty() == false){
   echo( $stack->topValue())."  ";
    $stack->pop();
}
