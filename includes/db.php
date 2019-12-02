<!-- bd.php | conecta con la bd -->

<?php

$conection = new mysqli("127.0.0.1", "root", "root", "itec_test_2019-11-18", 3306);
if ($conection->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conection->connect_errno . ") " . $conection->connect_error;
}

