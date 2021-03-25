<?php
/**
 * @author Dinar Hamid
 * atas ke bawah
 * sqrt(x)*y-y
 * loop from 0 to result sqrt 
 * ambil tengah dan lakukan decrement
 * (input-sqrt)/2+sqrt
 */
$a = $argv[1]; // php gabut.php 16
$u = 1;
$x = 1;
for($i=0;$i<=(sqrt($a)*2-2);$i++){
    for($j=0;$j<=$x-1;$j++){
        echo $u++." ";
    }
    if($u>($a - sqrt($a))/2+sqrt($a)){
        $x--;
    } else {
        $x++;
}
    echo "\n";
}
