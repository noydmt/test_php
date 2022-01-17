<?php

// 正規表現
$strArray = ['A','B','C'];
array_push($strArray,'D','E');
echo '<pre>';
var_dump($strArray);
echo '</ pre>';
// array(5) {
//   [0]=>
//   string(1) "A"
//   [1]=>
//   string(1) "B"
//   [2]=>
//   string(1) "C"
//   [3]=>
//   string(1) "D"
//   [4]=>
//   string(1) "E"
// }
?>