<?php
  require 'db_connection.php';

  // 静的SQLの場合、query
  $sql = 'select * from contacts;';
  $stmt = $pdo->query($sql);
  $result = $stmt->fetchall();

  echo '<pre>';
  var_dump($result);
  echo '</pre>';

  // 動的SQLの場合、prepare, bind, excute
?>