<?php
$members = [ 'name' => 'honda', 'age' => 30, 'born_in' => 'osaka' ];

foreach($members as $key => $value) {
  echo $key . ', ' . $value;
  echo '<br />';
  // name, honda
  // age, 30
  // born_in, osaka と出力
}
?>