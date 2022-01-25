<?php
  echo __FILE__;
  // => /Applications/MAMP/htdocs/php_test/mainte/test.php

  echo password_hash('password123', PASSWORD_BCRYPT);
  // => $2y$10$LmPdPBgdAHlG3zuMK5Ce1OiD24zUcCIgMpISM7Smbwzpyymakyg3a
?>