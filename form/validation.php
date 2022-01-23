<?php
  function validation($request) {
    $errors = [];

    if (empty($request['your_name'])) {
      array_push($errors, "氏名を入力してください。");
    }

    return $errors;
  }
?>