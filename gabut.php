<?php
// created by dinar hamid
// gabut coy woekwoekoke
$data = [];
$z = 6;
$u = 1;
$x = 1;
for($i=0;$i<=10;$i++){
    for($j=0;$j<=$x-1;$j++){
        echo $u++." ";
    }
    if($u>21){
        $x--;
    } else {
        $x++;
    }
    echo "\n";
}
