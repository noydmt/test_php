<?php
// var_dump($_POST);
$pageflg = 0;
if (!empty($_POST['btn_confirm'])) {
  $pageflg = 1;
}
if (!empty($_POST['btn_submit'])) {
  $pageflg = 2;
}
// $_GET => スーパーグローバル変数。中身は連想配列になっている。

function h(string $str) {
  return htmlspecialchars($str, ENT_QUOTES,'UTF-8');
}
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
      <input type="text" name="your_name" value="<?php if(!empty($_POST['your_name'] )) { echo h($_POST['your_name']); }?>">
      <p>e-mail</p>
      <input type="email" name="your_email" value="<?php if (!empty($_POST['your_email'])) { echo h($_POST['your_email']); }?>">
      <input type="submit" name="btn_confirm" value="確認">
    </form>
    <?php $csrfToken = bin2hex(random_bytes(32)); ?>
  <?php endif; ?>
  <?php if ($pageflg === 1) : ?>
    <form method="POST" action="input.php">
      <p>氏名</p>
      <?php echo h($_POST['your_name']); ?>
      <p>e-mail</p>
      <?php echo h($_POST['your_email']); ?>
      <input type="submit" name="back" value="戻る">
      <input type="submit" name="btn_submit" value="送信">
      <input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
      <input type="hidden" name="your_email" value="<?php echo h($_POST['your_email']); ?>">
    </form>
  <?php endif; ?>
  <?php if ($pageflg === 2) : ?>
    <h3>送信が完了しました。</h3>
  <?php endif; ?>
</body>
</html>