<?php


class Node{

    public $data;
    public $next;
    public $prev;

    public function __construct($data)
    {
        $this->data=$data;
    }
}

class DoublyLinkedList{

    public $head;

    public function __construct()
    {
        $this->haed=Null;
    }

    //Add new element at the end of the list
    public function append($val){
        $newNode= new Node($val);
        if($this->head==NULL){
            $this->head=$newNode;
        }else{
            $temp=$this->head;
            while($temp->next != NULL){
                $temp=$temp->next;
            }
            $temp->next=$newNode;
            $newNode->prev=$temp;
        }
    }

    //Insert value in a certain position
    public function insert_at_pos($val,$pos){
        $newNode =new Node($val);
        if($this->head == NULL){
            $this->head=$newNode;
            return;
        }

        if($pos==0){
            $newNode->next=$this->head;
            $this->head->prev=$newNode;
            $this->head=$newNode;
            return;
        }
        $temp=$this->head;
        for($i=0 ; $i<$pos && $temp != NULL; $i++){
                $temp = $temp->next;
        }
        if($temp == NULL){ //كده يبقى القيمة مفروض تتضاف في النهاية
            $this->append($val);
            return;
        }

        $newNode->prev=$temp->prev;
        $temp->prev->next=$newNode;
        $temp->prev=$newNode;
        $newNode->next=$temp;
    }

    //Remove an Element
    public function remove($val){
        if($this->head==NULL){
            return;
        }

        $temp=$this->head;
        if($temp->data==$val){
            $this->head=$temp->next;
            if($this->head != NULL){ //الشرط ده عشان لو فيها عنصر واحد بس
                $this->head->prev=NULL;
                unset($temp);
                return;
            }
        }

        while($temp != NULL && $temp->data != $val){
            $temp =$temp->next;
        }

        if($temp==NULL){ //ملقاش الرقم
            return;
        }else{
            $temp->prev->next =$temp->next;
            if($temp->next != NULL){
                $temp->next->prev=$temp->prev;
            }
            unset($temp);
        }
    }

    //Remove an element in a certain position
    public function remove_at_pos(int $pos){
		if ($this->head == null)
			return;

		$temp = $this->head;
		if ($pos == 0){
			$this->head = $temp->next;
			if ($this->head)
            $this->head->prev = null;
			unset($temp);
			return;
		}

		for ($i = 0; $i < $pos && $temp != null; $i++){

			$temp = $temp->next;
        }

		if ($temp == null)
			return;

		$temp->prev->next = $temp->next;
		if ($temp->next != NULL) //الشرط ده عشان لو بمسح اخر عنصر
			$temp->next->prev = $temp->prev;
        unset($temp);

	}


    public function Display(){

        $temp=$this->head;
        if($temp != NULL){
            echo "\nThe List Contains:  ";
            while($temp != NULL){
                echo $temp->data." ";
                $temp=$temp->next;

            }
        }else{
            echo "\nThe List is Empty";
        }
    }

    //Reverse Display
    public function reverse_display(){
        $temp=$this->head;
        while($temp->next != NULL){
            $temp=$temp->next;
        }

        if($temp!=NULL){
            echo "\nThe List Contains:  ";
            while($temp != NULL){
                echo $temp->data." ";
                $temp=$temp->prev;
            }
        }else{
            echo "\nThe List is Empty";
        }
    }

}

$DoublyLinkedList=new DoublyLinkedList();
$DoublyLinkedList->append(5); //0
$DoublyLinkedList->append(8); //1
$DoublyLinkedList->append(11); //2
$DoublyLinkedList->append(12); //3
$DoublyLinkedList->insert_at_pos(10,1);
$DoublyLinkedList->remove_at_pos(8);
$DoublyLinkedList->Display();
echo "<br>";
$DoublyLinkedList->reverse_display();
