<?php
session_start();
require 'validation.php';
// var_dump($_POST);
$pageflg = 0;
$errors = validation($_POST);
if (!empty($_POST['btn_confirm']) && empty($errors)) {
  $pageflg = 1;
}
if (!empty($_POST['btn_submit']) && empty($errors)) {
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
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
    <?php if (!empty($errors) && !empty($_POST['btn_confirm'])): ?>
      <ul>
        <?php
          foreach($errors as $k => $error) {
            echo '<li>' . $error . '</li>';
          }
        ?>
      </ul>
    <?php endif; ?>
    <div class="container">
      <form method="POST" action="input.php">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="your_name">氏名</label>
              <input type="text" class="form-control" id="your_name" name="your_name" value="<?php if(!empty($_POST['your_name'] )) { echo h($_POST['your_name']); }?>" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="your_email">e-mail</label>
              <input type="email" class="form-control" id="your_email" name="your_email" value="<?php if (!empty($_POST['your_email'])) { echo h($_POST['your_email']); }?>" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="your_email">ホームページ</label>
              <input type="url" class="form-control" id="your_email" name="your_url" value="<?php if (!empty($_POST['your_url'])) { echo h($_POST['your_url']); }?>" required>
            </div>
          </div>
        </div>
        <p>性別</p>
        <input type="radio" name="your_gender" value="0" <?php if (isset($_POST['your_gender']) && h($_POST['your_gender']) === '0') { echo 'checked'; } ?>>男</input>
        <input type="radio" name="your_gender" value="1" <?php if (isset($_POST['your_gender']) && h($_POST['your_gender']) === '1') { echo 'checked'; } ?>>女</input>
        <p>年齢</p>
        <select name="your_age">
          <option value="0"
            <?php
              if (isset($_POST['your_age']) && $_POST['your_age'] === '0') {
                echo 'selected';
              }
            ?>
          >選択してください。
          </option>
          <option value="1"
            <?php
              if (isset($_POST['your_age']) && $_POST['your_age'] === '1') {
                echo 'selected';
              }
            ?>
          >15~19
          </option>
          <option value="2"
            <?php
              if (isset($_POST['your_age']) && $_POST['your_age'] === '2') {
                echo 'selected';
              }
            ?>
          >20~24
          </option>
          <option value="3"
            <?php
              if (isset($_POST['your_age']) && $_POST['your_age'] === '3') {
                echo 'selected';
              }
            ?>
          >25~29
          </option>
          <option value="4"
            <?php
              if (isset($_POST['your_age']) && $_POST['your_age'] === '4') {
                echo 'selected';
              }
            ?>
          >30~34
          </option>
          <option value="5"
            <?php
              if (isset($_POST['your_age']) && $_POST['your_age'] === '5') {
                echo 'selected';
              }
            ?>
          >35~
          </option>
        </select>
        <p>お問い合わせ</p>
        <textarea name="your_contact"><?php if (!empty($_POST['your_contact'])) { echo h($_POST['your_contact']); }?></textarea>
        <br>
        <input type="checkbox" name="caution" value="1">注意事項</input>
        <br />
        <input type="submit" name="btn_confirm" value="確認">
        <input type="hidden" name="csrf" value="<?php echo $token; ?>">
      </form>
    </div>
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
      <p>ホームページ</p>
      <?php echo h($_POST['your_url']); ?>
      <p>性別</p>
      <?php
        if (h($_POST['your_gender']) === "0") { echo "男性"; };
        if (h($_POST['your_gender']) === "1") { echo "女性"; };
      ?>
      <p>年齢</p>
      <?php
        if (h($_POST['your_age']) === "1") { echo "15~19歳"; };
        if (h($_POST['your_age']) === "2") { echo "20~24歳"; };
        if (h($_POST['your_age']) === "3") { echo "25~29歳"; };
        if (h($_POST['your_age']) === "4") { echo "30~34歳"; };
        if (h($_POST['your_age']) === "5") { echo "35歳~"; };
      ?>
      <p>お問い合わせ</p>
      <?php echo h($_POST['your_contact']); ?>
      <p>注意事項</p>
      <?php
        if (h($_POST['caution']) === "1") {
          echo "確認済み";
        } else {
          echo "未確認";
        };
      ?>
      <br>
      <input type="submit" name="back" value="戻る">
      <input type="submit" name="btn_submit" value="送信">
      <input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
      <input type="hidden" name="your_email" value="<?php echo h($_POST['your_email']); ?>">
      <input type="hidden" name="your_url" value="<?php echo h($_POST['your_url']); ?>">
      <input type="hidden" name="your_gender" value="<?php echo h($_POST['your_gender']); ?>">
      <input type="hidden" name="your_age" value="<?php echo h($_POST['your_age']); ?>">
      <input type="hidden" name="your_contact" value="<?php echo h($_POST['your_contact']); ?>">
      <input type="hidden" name="caution" value="<?php echo h($_POST['caution']); ?>">
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
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>
</html>