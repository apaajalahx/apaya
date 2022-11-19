<?php
echo date_default_timezone_get();
$date = date('Y-m-d H:i:s');
echo "\n".$date."\n";
$dt = new DateTime($date);
$dt->setTimezone(new DateTimeZone('GMT'));
echo $dt->getTimezone()->getname()."\n";
echo $dt->format('Y-m-d H:i:s');
