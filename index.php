<?php
$members = [ 'name' => 'honda', 'age' => 30, 'born_in' => 'osaka' ];

foreach($members as $member) {
  echo $member;
  echo '<br />';
  /**
   * honda
   * 30
   * osaka
   * と出力
   */
}
?>