<?php

$nums=[1,2,2,1,1,0];
function applyOperations($nums) {
    $zeroes=0;
    $result=[];
    for($i=0; $i<count($nums); $i++){
        if($nums[$i]==$nums[$i+1] && $nums[$i] != 0){
            $nums[$i]*=2;
            $nums[$i+1]=0;
        }if($nums[$i]==0){
            $zeroes+=1;
            continue;
        }
        $result[]=$nums[$i];
    }
    for($i=0; $i<$zeroes;$i++){
        $result[]=0;
    }
    return $result;
}

var_dump(applyOperations($nums));