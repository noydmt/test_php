<?php

// 文字列の分割
$str = 'aaa,aaaa,a,bb,b';
$str2 = explode(',',$str);
echo explode(',',$str); // => Array
echo '<br>';
echo $str2[1]; // => aaaa
echo '<br>';
echo $str2[3]; // => bb

?>