<?php

// check if host is live and can get send command and received.
$f = fsockopen('mail.alliancaest.com.br', 587);
if($f){
    echo "Connected \n";
} else {
    echo "Not Connected \n";
    exit;
}
$read = [$f];
$write = null;
$expect = null;
while(is_resource($f) && !feof($f)){
    if(stream_select($read, $write, $expect, 5)){
        echo "Live";
        break;
    } else {
        echo "Timeout";
        break;
    }
}
fclose($f);
