<?php

// 文字列の長さを調べる
$str = 'あいう';
echo strlen($str); // => 9
echo '<br>';
echo mb_strlen($str); // => 3

// 日本語の場合、一文字あたり 3byte必要とする
// mb_strlen の場合、純粋に文字列の長さでみる。

?>