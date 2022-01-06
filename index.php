<?php

$test = 'Hello PhpWorld!';
$test2 = 123;
$test3 = $test . $test2;
var_dump($test3); // => string(18) "Hello PhpWorld!123"