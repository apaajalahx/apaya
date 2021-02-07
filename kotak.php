<?php
/**
 * @Author Dinar
 * y = 10, x = 20 coz this is command line.
 */
$y=10;
$x=20;
for($j=0;$j<$y;$j++){
  $k = ($j==0)||($j==$y - 1)?array("*",$x):array("\x20",$x);
  echo "*".str_repeat($k[0],$k[1])."*\n";
}
