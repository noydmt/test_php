<?php
/**
 * 注意！
 * Switch文の場合は比較する際に == で比較している為、型が違くても true判定してしまうときがある。　　
 */

$cnt = 1;
switch($cnt) {
  case 1:
    echo '1です';
    break;
  case 2:
    echo '10です';
    break;
  case 3:
    echo '11です';
    break;
  default:
    echo 'その他';
    break;
}

?>