<?php
$arrayList = [1,2,3,4,5,6];

for ($i = 0; $i < count($arrayList); $i++) {
  if ($arrayList[$i] === 5) {
    echo '終了!';
    break;
  } else {
    echo $arrayList[$i] . 'です。';
    continue;
  }
}

?>