<?php
/**
 * @link https://www.facebook.com/jaysteve123/posts/1177635666003975
 * that was good puzzle :D
 * Dinar Hamid (fb.me/dinar1337)
 */
error_reporting(0);
$keys = base64_decode("WyIwLDk7MCw1OzAsNzswLDI7MCwxNDswLDM7MCwyMDswLDE0OzAsNTswLDE2IiwiMSwxODsxLDY7MSwyOzEsMTsxLDc7MSw0OzEsODsxLDY7MSwxOTsxLDE4IiwiMSwxNTsxLDE3OzEsMjM7MSw2OzEsMTE7MSw5OzEsMTg7MSwyOzEsMzsxLDMiLCIxLDE1OzEsNzsxLDk7MSwxMzsxLDE0OzEsMTg7MSw1OzEsODsxLDE3OzEsMTQiLCIyLDM7MiwwOzIsMTQ7MiwxNDsyLDg7MiwxNjsyLDEzOzIsMTg7MiwxMzsyLDE0IiwiMiwxOzIsMTc7MiwyOzIsMTQ7Miw1OzIsMzsyLDEwOzIsMDsyLDE2OzIsNiIsIjIsMTU7MiwxMjsyLDE4OzIsMTE7MiwyMDsyLDEzOzIsNzsyLDA7MiwxMzsyLDExIiwiMiwxNzsyLDU7MiwxNDsyLDI7Miw3OzIsMjsyLDk7Miw0OzIsMTc7MiwxNiIsIjMsMTc7MywyOzMsMTU7MywxNDszLDEwOzMsNTszLDQ7MywxODszLDE7MywxOSIsIjMsNTszLDE5OzMsMTU7MywzOzMsMTc7MywxNDszLDM7MywyMDszLDE7MywxMyIsIjMsMTk7Myw5OzMsMTM7MywyOzMsMTszLDU7Myw3OzMsMTE7MywxMTszLDE3IiwiMyw0OzMsNzszLDEyOzMsMTk7Myw5OzMsODszLDE5OzMsOTszLDEwOzMsMTYiLCI0LDQ7NCwxMjs0LDU7NCwxNDs0LDEyOzQsMzs0LDExOzQsNzs0LDg7NCwwIiwiNSwyOzUsMTI7NSw2OzUsMTY7NSw0OzUsMTA7NSwxNjs1LDE2OzUsMTs1LDciLCI1LDE3OzUsMTA7NSwxMzs1LDQ7NSw4OzUsMjA7NSwxOzUsNDs1LDEyOzUsNiIsIjUsMzs1LDE1OzUsNTs1LDExOzUsMjs1LDE4OzUsNzs1LDEyOzUsMjs1LDQiLCI2LDQ7NiwxNjs2LDEyOzYsMTI7NiwwOzYsMTs2LDc7Niw1OzYsMTU7NiwxNCIsIjcsODs3LDU7Nyw3OzcsMTM7NywxMDs3LDY7NywzOzcsNTs3LDIwOzcsOCIsIjgsMTQ7OCwxNzs4LDQ7OCwyOzgsMTE7OCwxMzs4LDIwOzgsMTQ7OCwyOzgsOSJd");
$key = json_decode($keys);
$new_key = [];
foreach($key as $k => $v){
    $k_1 = explode(';',$v);
    $new_key[($k+1)] = $k_1;
}
$decrement = ((count($new_key)-1)/2);
$final_key = [];
$u = 0;
for($i=1;$i<=count($new_key);$i++){
    for($x=0;$x<=$u;$x++){
        $final_key[$i] = $new_key[$i][$u];
    }
    if($u>=($decrement)){
        $u = 0;
    } else {
        $u++;
    }
}
$last_final_key = [];
foreach($final_key as $fkey_key => $fkey_value){
    $f_key_explode = explode(',',$fkey_value);
    if($last_final_key[$f_key_explode[0]] == $f_key_explode[0]){
        $last_final_key[$f_key_explode[0]][] = $f_key_explode[1];
    } else {
        $last_final_key[$f_key_explode[0]][] = $f_key_explode[1];
    }
}

$cipher_text = json_decode(base64_decode("WyI2YzYxNjI2Njc5NzIzNzcxMzM2MTZjNjg2NzM5NzQiLCI3Mjc0MzY2ZTY3NmY3MjdhMzIzMzMxNmYzMjYxMzIzNTZjNzg2YjcyNjk2NTM4NjQ2ZTMyNjU3MSIsIjcyMzIzNDVmNjE3NDc4Njc2ZTM2N2E3NzM3Njc2MzYzNjczOTY5NzQ3NzY5IiwiMzI2ZTc2MzQ2MjM1NjU2ZTc5N2EzNzdhNjc3NDY0MzU3MDY4NjI2NTM2NmQzODY3NjM3OTYxNzQiLCIzMTM2MzQ3NzcyNjc3NTYzNjM2NzYyMzczOTY5NzM3NDY2IiwiMzk3NzZmN2E2OTc3MzczMjczNzQzNTZiNzE2ZTM4NzU1Zjc3NmI3NjcwMzEzNzZhIiwiNzIzMDc5MzIzODYzNmQ2MTZhNmI2NTcyNzQiLCIzMTc5Njc2MjMyNmM3Nzc4Njk3MTY0NzUzMTY3NmY3OTc2IiwiNjQ2NzY5NzIzMDc0NmE3MjcyMzg2Yjc1NmI3NDY0NmU2ZiJd"));
$ciper_x = [];
foreach($cipher_text as $cip_key => $cip_value){
    for ($i=0; $i < strlen($cip_value)-1; $i+=2){
        $ciper_x[$cip_key][] = $cip_value[$i].$cip_value[$i+1];
    }
}
$get_hex_data = [];
for($s=0;$s<=count($ciper_x);$s++){
    for($u=0;$u<=count($last_final_key[$s]) - 1;$u++){
        $get_hex_data[$s][] = $ciper_x[$s][$last_final_key[$s][$u]];
    }
}
$merge_hex = '';
foreach($get_hex_data as $ghd_key => $ghd_value){
    foreach($ghd_value as $g_key => $g_value){
        $merge_hex .= $g_value;
    }
}

$result_akhir='';
for ($i=0; $i < strlen($merge_hex)-1; $i+=2){
    $result_akhir .= chr(hexdec($merge_hex[$i].$merge_hex[$i+1]));
}
echo "HEX : ".$merge_hex."\n";
echo "RESULT : ".$result_akhir."\n";
