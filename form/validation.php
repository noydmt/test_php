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
    if ((!empty($request['your_email'])) && !filter_var($request['your_email'], FILTER_VALIDATE_EMAIL)) {
      array_push($errors, "メールアドレスを正しい形式で入力してください。");
    }

    // URLバリデーション
    if (empty($request['your_url'])) {
      array_push($errors, "URLを入力してください。");
    }
    if (!empty($request['your_url']) && filter_var($request['your_url'], FILTER_VALIDATE_URL)) {
      array_push($errors, "URLを正しい形式で入力してください。");
    }

    // 性別バリデーション
    if (!isset($request['your_gender'])) {
      array_push($errors, "性別を入力してください。");
    }
    $radioButtons = ['0','1'];
    if (isset($request['your_gender']) && !(in_array($request['your_gender'], $radioButtons))) {
      array_push($errors, "男性か女性か入力してください。");
    }

    // 年齢バリデーション
    if (isset($request['your_age']) && $request['your_age'] === '0') {
      array_push($errors, "年齢層を選択してください。");
    }

    // 注意事項バリデーション
    if (empty($request['caution'])) {
      array_push($errors, "注意事項をご確認ください。");
    }

    return $errors;
  }
?>