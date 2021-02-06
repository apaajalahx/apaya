<?php
//code by Dinar Hamid. 
$s=20; // you can change this value
for($i=0;$i<=$s;$i++){
echo str_repeat("\x20",$s--).substr(str_shuffle(str_repeat('@#&()=%',$i)),0,$i++)."\n";
}
