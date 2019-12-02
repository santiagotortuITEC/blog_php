<!-- newpassword_includes.php | genera una nueva contraseña -->

<?php

function password_generate($chars){
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}

$new_password = password_generate(7);
