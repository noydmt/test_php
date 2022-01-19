<?php
$pageflg = 0;
if (!empty($_POST['btn_confirm'])) {
  $pageflg = 1;
}
if (!empty($_POST['btn_submit'])) {
  $pageflg = 2;
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
  <?php if ($pageflg === 0) : ?>
    <form method="POST" action="input.php">
      <p>氏名</p>
      <input type="text" name="your_name">
      <p>e-mail</p>
      <input type="email" name="your_email">
      <input type="submit" name="btn_confirm" value="確認">
    </form>
  <?php endif; ?>
  <?php if ($pageflg === 1) : ?>
    <form method="POST" action="input.php">
      <p>氏名</p>
      <?php echo $_POST['your_name'] ?>
      <p>e-mail</p>
      <?php echo $_POST['your_email'] ?>
      <input type="submit" name="btn_submit" value="送信">
      <input type="hidden" names="your_name" value="<?php echo $_POST['your_name'] ?>">
      <input type="hidden" names="your_email" value="<?php echo $_POST['your_email'] ?>">
    </form>
  <?php endif; ?>
  <?php if ($pageflg === 2) : ?>
    <h3>送信が完了しました。</h3>
  <?php endif; ?>
</body>
</html>