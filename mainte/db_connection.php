<?php

  const DB_HOST = 'mysql:dbname=udemy_php;host=localhost;charset=utf8;';
  const DB_USER = 'php_user';
  const DB_PASSWORD = 'noydmt1021';

  // DB接続ができていない場合の例外処理を行う
  try {
    $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD);
    echo '接続成功';
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit(); // 処理を抜ける。
  }
?>