<!-- exit.php | destruye la session -->

<?php

session_start();

session_destroy();

header('Location: '.'/efi/login.php');
exit();

?>
