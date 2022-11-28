<?php

class HashNode{

    public $key;
    public $value;
    public $nextNode;
    public function __construct($key, $value, $nextNode=Null)
    {
        $this->key=$key;
        $this->value=$value;
        $this->nextNode=$nextNode;
    }
}

class HashTable{

    private $size=100;
    private $arr;

    public function __construct()
    {
        $this->arr=new SplFixedArray($this->size);
    }

    public function hashFunc($key){
        // $len=strlen($key);
        // $sum=0;
        // for($i=0; $i<$len; $i++){
        //     $sum+=ord($key[$i]);
        // }

        $sum= crc32($key);
        return $sum % $this->size;
    }


    public function add($key,$value){
        $index=$this->hashFunc($key);
        if(isset($this->arr[$index])){
            $newNode= new HashNode($key,$value,$this->arr[$index]);
        }else{
            $newNode= new HashNode($key,$value);
        }
        $this->arr[$index]=$newNode;
        return true;
    }

    public function find($key){
        $index=$this->hashFunc($key);
        if(isset($this->arr[$index])){
            $currNode=$this->arr[$index];
            while($currNode){
                if($currNode->key==$key){
                    return $currNode->value;
                }

                $currNode = $currNode->next;
            }
        }

        return NULL;
    }

    public function findALL(){
        return $this->arr;
    }

}

$hash=new HashTable();
$hash->add('a','Hello');
$hash->add('ab','Hi');
$hash->add('ac','bye');

echo($hash->find('a'));
echo($hash->find('ab'));
echo("<br>");
print_r($hash->findAll());

