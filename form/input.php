<?php
session_start();
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
    <?php
      if(!isset($_SESSION['csrfToken'])) {
        $csrfToken = bin2hex(random_bytes(32));
        $_SESSION['csrfToken'] = $csrfToken;
      }
      $token = $_SESSION['csrfToken'];
    ?>
    <form method="POST" action="input.php">
      <p>氏名</p>
      <input type="text" name="your_name" value="<?php if(!empty($_POST['your_name'] )) { echo h($_POST['your_name']); }?>">
      <p>e-mail</p>
      <input type="email" name="your_email" value="<?php if (!empty($_POST['your_email'])) { echo h($_POST['your_email']); }?>">
      <p>ホームページ</p>
      <input type="text" name="your_url" value="<?php if (!empty($_POST['your_url'])) { echo h($_POST['your_url']); }?>">
      <p>性別</p>
      <input type="radio" name="your_gender" value="0">男</input>
      <input type="radio" name="your_gender" value="1">女</input>
      <p>年齢</p>
      <select name="your_age">
      <option value="0">選択してください。</option>
        <option value="1">15~19</option>
        <option value="2">20~24</option>
        <option value="3">25~29</option>
        <option value="4">30~34</option>
        <option value="5">35~</option>
      </select>
      <p>お問い合わせ</p>
      <textarea name="your_contact" cols="30" rows="10">
        <?php if (!empty($_POST['your_contact'])) { echo h($_POST['your_contact']); }?>
      </textarea>
      <input type="checkbox" name="caution" value="1">注意事項</input>
      <br />
      <input type="submit" name="btn_confirm" value="確認">
      <input type="hidden" name="csrf" value="<?php echo $token; ?>">
    </form>
  <?php endif; ?>
  <?php if ($pageflg === 1) : ?>
    <?php
      if ($_POST['csrf'] === $_SESSION['csrfToken']): 
    ?>
    <form method="POST" action="input.php">
      <p>氏名</p>
      <?php echo h($_POST['your_name']); ?>
      <p>e-mail</p>
      <?php echo h($_POST['your_email']); ?>
      <input type="submit" name="back" value="戻る">
      <input type="submit" name="btn_submit" value="送信">
      <input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
      <input type="hidden" name="your_email" value="<?php echo h($_POST['your_email']); ?>">
      <input type="hidden" name="csrf" value="<?php echo h($_POST['csrf']); ?>">
    </form>
    <?php endif; ?>
  <?php endif; ?>
  <?php if ($pageflg === 2) : ?>
    <?php
      if ($_POST['csrf'] === $_SESSION['csrfToken']): 
    ?>
      <h3>送信が完了しました。</h3>
      <?php unset($_SESSION['csrfToken']) ?>
    <?php endif; ?>
  <?php endif; ?>
</body>
</html>