<?php
// pagination with max 3 page.
// by Dinar Hamid.
$max_limit = 11;
$page = 11;
for($i=0;$i<=$max_limit;$i++){
    if($page==$i){
        if($page==($max_limit-1)){
            $page = $page - 1;
            $pages = ($i+1);
        } elseif($page==$max_limit){
            $page = $page - 2;
            $pages = $max_limit;
        } else {
            $pages = ($i+2);
        }
        for($z=$page;$z<=$pages;$z++){
            echo $z."\n";
        }
    }
}
