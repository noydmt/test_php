<?php
  $contactFile = '.contact.dat';

  // ファイルの中身ごと変数に格納
  $fileContents = file_get_contents($contactFile);

  echo $fileContents; // => あああ いいい ううう と画面上に表示
?>