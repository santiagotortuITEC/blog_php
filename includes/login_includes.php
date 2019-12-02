<!-- login_includes.php | verifica que los datos ingresados en el formulario de login.php sean correctos 
como para que se inicie sesion -->

<?php
include 'db.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$password = md5($password);

$query = "SELECT * from users where email='$email' and  password='$password'";
$consulta = mysqli_query($conection, $query);
$result = mysqli_fetch_array($consulta);

if($result['email'] == $email && $result['password'] == $password){
    $_SESSION['email'] = $email;
    header("location: /efi/index.php");
}else{
    $_SESSION['error'] = 'Datos inválidos';
    header("location: /efi/login.php");
}
