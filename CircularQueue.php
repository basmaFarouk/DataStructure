<?php

class CircularQueue{
    public $capacity=8;
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
        //if rear = n-1 : rear = 0;
        //النيكست بتاع الرير بيساوي الفرونت 
        if(($this->rear+1) % $this->capacity == $this->front) return true;
        else return false;
    }

    public function enqueue($val){
        if($this->isFull()) return ;
        elseif($this->isEmpty()){
            $this->front=$this->rear=0;
        }else{
            $this->rear=($this->rear +1) % $this->capacity;
        }
        $this->arr[$this->rear]=$val;
    }

    public function dequeue(){
        if($this->isEmpty()) return;
        elseif($this->front==$this->rear){ //معناه اني عندي عنصر واحد في الكيو
            $this->front=$this->rear=-1;
        }else{
            $this->front=($this->front +1) % $this->capacity;
        }
    }

    public function front_val(){
        if($this->isEmpty()) return -1;
        else
            return $this->arr[$this->front];
    }

}

// echo (6%10);
$q= new CircularQueue();
$q->enqueue(5);
$q->enqueue(8);
$q->enqueue(7);
$q->enqueue(9);
$q->dequeue();
$q->enqueue(10);
$q->enqueue(2);

while($q->isEmpty()==false){
    echo($q->front_val());
    $q->dequeue();
}