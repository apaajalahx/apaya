<?php
// menghitung nilai y dan x pada regresi linier (Linier Regression)
$x = [13,31,37,39,41]; // nilai x

$y = [12,22,24,24,27]; // nilai y

$square = function() use ($x){
   $data = 0;
    foreach($x as $a){
       $data += $a*$a;
    }
   return $data;
};
$x2 = $square();
$ex = array_sum($x);
$ey = array_sum($y);
$ex2 = $ex*$ex;
$_eyx = function() use ($x,$y){
  $data = 0;
    for($i=0;$i<=count($x) - 1;$i++){
        $data += $x[$i]*$y[$i];
    }
    return $data;
};
$eyx = $_eyx();
$n = count($y);
$nilai_y = ($ey*$x2-$ex*$eyx)/($n*$x2-$ex2);
$nilai_x = ($n*$eyx-$ex*$ey)/($n*$x2-$ex2);
echo "Y adalah = ".$nilai_y."\n";
echo "X adalah = ".$nilai_x."\n";
