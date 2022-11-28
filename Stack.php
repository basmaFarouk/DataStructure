<?php

class Stack{

    public $arr=[];
    public $top=-1;
    public ?Stack $open_brackets =null;

    public function push($val){
        $this->top++;
        $this->arr[$this->top]=$val;
    }

    public function pop(){
        if($this->isEmpty()) return;
        $this->top--;

    }

    public function top(){
        if($this->isEmpty()) return -1;
        return $this->arr[$this->top];
    }

    public function isEmpty(){
        if($this->top == -1) return true;
        else return false;
    }

    public function pair($open,$closed){

        if($open=='(' && $closed==')') return true;
        if($open=='{' && $closed=='}') return true;
        if($open=='[' && $closed==']') return true;
        return false;
    }

    public function BalancedString($exp){
         $open_brackets=new Stack();

        for($i=0 ; $i<strlen($exp);$i++){
            if($exp[$i]=='(' || $exp[$i]=='{' || $exp[$i]=='['){
                $open_brackets->push($exp[$i]);
            }elseif($exp[$i]==')' || $exp[$i]=='}' || $exp[$i]==']'){

                if($open_brackets->isEmpty()) return false; //يبقى كده مافيش حاجة اتفتحت يبقى >> not balance
                elseif($this->pair($open_brackets->top(), $exp[$i]) == false) return false;
                $open_brackets->pop();
            }
        }

        if($open_brackets->isEmpty()) return true;
        else return false;
    
    }

    public function priority($char){
        if($char == '-' || $char == '+')
            return 1;
        elseif($char == '*' || $char == '/')
            return 2;
        elseif($char == '^')
            return 3;
        else
            return 0;
    }

    public function infix_to_postfix($exp){
        // $stack= new Stack();
        $output="";

        for($i=0; $i<strlen($exp); $i++){
            if($exp[$i] == ' ') continue;
            if(is_numeric($exp[$i]) ){
                $output.=$exp[$i];
             
            }elseif($exp[$i] == '('){
             
                $this->push('(');
            }elseif($exp[$i] == ')'){
                while($this->top() != '('){
                    $output .= $this->top();
                    $this->pop();
                }
                $this->pop(); //to remove '(' عشان اشيل فتحة القوس

            }
            else{

                while($this->isEmpty() == false && $this->priority($exp[$i]) <= $this->priority($this->top())){
                    $output .= $this->top();
                    $this->pop();
                }

                $this->push($exp[$i]);
            }
        }

        while($this->isEmpty()==false){
            $output.=$this->top();
            $this->pop();
        }

        return $this->postFixEvaluate($output);
        // return $output;
    }


    public function mathOperation($op1,$op2,$operate){
        if($operate == "+")
            return $op1+$op2;
        elseif($operate == "-")
            return $op1-$op2;
        elseif($operate == "*")
            return $op1*$op2;
        elseif($operate == "/")
            return $op1/$op2;
        else
            return 0;
    }

    public function postFixEvaluate($exp){
        for($i=0; $i<strlen($exp); $i++){
            if(is_numeric($exp[$i])){
                $this->push($exp[$i]-'0');
            }else{
                $op2=$this->top();
                $this->pop();

                $op1=$this->top();
                $this->pop();

                $result=$this->mathOperation($op1,$op2,$exp[$i]);
                $this->push($result);
            }
        }

        return $this->top(); //عشان يرجعلي اخر فاليو وهي النتيجة
    }
}


$stack = new Stack();
// // $stack->push(5);
// // $stack->push(3);
// // $stack->push(2);
// // while(!$stack->isEmpty()){
// //     echo $stack->top();
// //     $stack->pop();
// // }

echo '<br>';

// $balance=$stack->BalancedString('({)');
// if($balance){
//     echo 'Balanced Expression..';
// }else{
//     echo 'NON Balanced Expression..';
// }

// echo '<br>';

// $transform = $stack->infix_to_postfix("(3+2)+7/2*((7+3)*2)");
// echo($transform);
// echo '<br>';
$postFix='382/+5-';
echo($stack->postFixEvaluate($postFix));
echo '<br>';
// echo((3+2)+7/2*((7+3)*2));
