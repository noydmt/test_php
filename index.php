<?php
$japan_soccer_national_team = [
  'honda'=>[
    'position'=>'FW',
    'club'=>'AC Milan'
  ],
  'kagawa'=>[
    'position'=>'MF',
    'club'=>'Manchester United'
  ],
  'nagatomo'=>[
    'position'=>'SB',
    'club'=>'Intel'
  ]
];

if ($japan_soccer_national_team['honda']['position'] == 'FW') {
  echo '本田はFWだ'; // 出力される
};

echo '<br />';

if ($japan_soccer_national_team['kagawa']['club'] === 'Manchester United') {
  echo '香川は' . $japan_soccer_national_team['kagawa']['club'] . '所属だ!'; // 出力される。
};

/**
 * if 分岐で 比較演算子が下記の場合、注意する
 * 1, == : 値が一致していれば True
 * 2, === : 値と型が一致していれば True
 */
?>