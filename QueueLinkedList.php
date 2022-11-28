<?php

class NodeQueue{

    public $data;
    public $next;

    public function __construct($data)
    {
        $this->data=$data;
        $this->next=NULL;
    }
}

class QueueLinkedList{

    public $front= null;
    public $rear=null;

    public function enqueue($val){
        $newNode= new NodeQueue($val);
        if($this->isEmpty()){
            $this->front=$this->rear=$newNode;
        }else{
            $this->rear->next=$newNode;
            $this->rear=$newNode;
        }

    }

    public function dequeue(){
        $temp=$this->front;
        if($this->isEmpty()) return;
        elseif($this->front==$this->rear){ //عندي عنصر واحد بس
            $this->front=$this->rear=null;
        }
        else{
            $this->front=$this->front->next;
            unset($temp);
        }
    }

    public function frontVal(){
        if($this->isEmpty()) return -1;
        else
            return $this->front->data;
    }

    public function isEmpty(){
        if($this->front == null && $this->rear ==null)
            return true;
        else
            return false;
    }
}

$newQueue=new QueueLinkedList();
// $newQueue->enqueue(5);
// $newQueue->enqueue(6);
// $newQueue->enqueue(7);

// while(!$newQueue->isEmpty()){
//     echo($newQueue->frontVal());
//     $newQueue->dequeue();
// }


