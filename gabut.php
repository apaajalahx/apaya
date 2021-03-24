<?php
$data = [];
$z = 5;
$p = [];
for($i=0;$i<=10;$i++){
    for($j=$i;$j<=$i;$j++){
        if(array_key_exists($i,$p)){
            break;
        } else {
            $p[$i] = $i + 1;
        }
    }
    echo str_repeat($p[$i]." ",($i>5)?$z--:$i+1)."\n";
}
