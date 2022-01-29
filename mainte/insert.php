<?php
  require 'db_connection.php';

  function insertContact($request) {
    $params = [
      'id'=>null,
      'name'=>$request['your_name'],
      'email'=>$request['your_email'],
      'url'=>$request['your_url'],
      'gender'=>$request['your_gender'],
      'age'=>$request['your_age'],
      'contact'=>$request['your_contact'],
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
  }

  // echo $sql;
  // => insert into contacts (id,name,email,url,gender,age,contact,created_at) value (:id,:name,:email,:url,:gender,:age,:contact,:created_at);

?>