<?php
  require 'db_connection.php';


  $params = [
    'id'=>null,
    'name'=>'田中太郎',
    'email'=>'test@test.com',
    'url'=>'http:fff.com',
    'gender'=>'1',
    'age'=>'1',
    'contact'=>'s',
    'created_at'=>null
  ];

  $cnt = 0;
  $column = '';
  $value = '';
  foreach(array_keys($params) as $key) {
    if ($cnt > 0) {
      $column .= ',';
      $value .= ',';
    }
    $column .= $key;
    $value .= ':' . $key;
    $cnt++;
  }

  $sql = 'insert into contacts (' . $column . ') value (' . $value . ');';
  $stmt = $pdo->prepare($sql);
  $stmt->execute($params); // 連想配列を渡すとkeyでSqlといい感じにマッピングしてくれている？？？

  // echo $sql;
  // => insert into contacts (id,name,email,url,gender,age,contact,created_at) value (:id,:name,:email,:url,:gender,:age,:contact,:created_at);

?>