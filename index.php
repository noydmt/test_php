<?php
$global = 'グローバル変数';

function checkTest() {
  $local = 'ローカル変数';
  global $global;
  echo $global;
}

checkTest();
?>