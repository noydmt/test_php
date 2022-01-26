<?php
  $contactFile = '.contact.dat';

  // ファイルの中身丸ごと読み込んで変数に格納
  $fileContents = file_get_contents($contactFile);

  // echo $fileContents; // => あああ いいい ううう と画面上に表示

  // FILE_APPEND を引数にすることで末尾に テストです!!!!! を追記
  // FILE_APPEND を引数にしない場合、ファイル中身を全部書き換えする
  // file_put_contents($contactFile, "テストです！！！！！", FILE_APPEND);

  // $fileContents = file_get_contents($contactFile); // => あああ いいい ううう テストです！！！！！　と画面上に表示

  // ファイル名型読み込み
  $allData = file($contactFile);
  // echo '<pre>';
  // var_dump($allData);
  // echo '</pre>';
  foreach($allData as $lineData) {
    // echo '<pre>';
    // var_dump($lineData);
    // echo '</pre>';
    $lines = explode(',', $lineData);
    // echo '<pre>';
    // var_dump($lines);
    // echo '</pre>';

    echo $lines[0] . ' ' . $lines[1] . ' ' . $lines[2] . ' ' . $lines[3];
    echo '<br>';
  }


  // ストリーム型
  $contents = fopen($contactFile, 'a+'); // ファイルを追記モードで開く

  $addText = "一行追記" . "\n";

  fwrite($contents, $addText); // ファイルに書き込み
  fclose($contents); // ファイルを閉じる
?>