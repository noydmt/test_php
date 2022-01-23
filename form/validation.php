<?php
  function validation($request) {
    $errors = [];

    // 氏名バリデーション
    if (empty($request['your_name'])) {
      array_push($errors, "氏名を入力してください。");
    }
    if ((!empty($request['your_name'])) && 20 < mb_strlen($request['your_name'])) {
      array_push($errors, "氏名は20文字以内で入力してください。");
    }

    // e-mailバリデーション
    if (empty($request['your_email'])) {
      array_push($errors, "メールアドレスを入力してください。");
    }
    if ((!empty($request['your_email'])) && filter_var($request['your_email'], FILTER_VALIDATE_EMAIL)) {
      array_push($errors, "メールアドレスを正しい形式で入力してください。");
    }

    // URLバリデーション
    if (empty($request['your_url'])) {
      array_push($errors, "URLを入力してください。");
    }

    return $errors;
  }
?>