<?php

class QueueArray{
    private $capacity=4;
    public $arr;
    public $front=-1;
    public $rear=-1;

    public function __construct()
    {
        $this->arr=new SplFixedArray($this->capacity);
    }


    public function isEmpty(){
        if($this->front==-1 && $this->rear==-1)
            return true;
        else
            return false;
    }

    public function isFull(){
        if($this->rear == $this->capacity -1) return true;
        else return false;
    }

    public function enqueue($val){
        if($this->isFull()) return ;
        elseif($this->isEmpty()){
            $this->front=$this->rear=0;
        }else{
            $this->rear++;
        }
        $this->arr[$this->rear]=$val;
    }

    public function dequeue(){
        $x=0;
        if($this->isEmpty()) return;
        elseif($this->front==$this->rear){
            $x=$this->arr[$this->front];
            $this->front=$this->rear=-1;
        }else{
            $x=$this->arr[$this->front];
            $this->front++;
        }

        return $x;
    }

    public function front_val(){
        if($this->isEmpty()) return -1;
        else
            return $this->arr[$this->front];
    }

}

$q= new QueueArray();
$q->enqueue(5);
$q->enqueue(8);
$q->enqueue(7);
$q->enqueue(9);
$q->dequeue();
$q->enqueue(15);

while($q->isEmpty()==false){
    echo($q->front_val());
    $q->dequeue();
}
