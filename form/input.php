<?php
if (!empty($_POST)) {
  // echo $_GET['your_name']; // GET 通信で送信した文字列が表示される
  echo '<pre>';
  var_dump($_POST);
  echo '</ pre>';
}
// $_GET => スーパーグローバル変数。中身は連想配列になっている。
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="POST" action="input.php">
    <p>氏名</p>
    <input type="text" name="your_name">
    <input type="checkbox" name="sports[]" value="soccer">サッカー
    <input type="checkbox" name="sports[]" value="baseball">野球
    <input type="checkbox" name="sports[]" value="tennis">テニス
    <input type="submit" value="送信">
  </form>
</body>
</html>