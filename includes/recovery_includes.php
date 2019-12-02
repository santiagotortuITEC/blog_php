<!-- recovey_includes.php | verifica si el email ingresado en recovery.php existe en la bd, si existe
email.php enviara un email con la nueva contraseña -->
<?php
include('header.php'); 

$email = $_POST['email'];
$query = "SELECT * from users where email = '$email'";
$consulta = mysqli_query($conection, $query);
$result = mysqli_fetch_array($consulta);

if ($result['email'] == $email) { ?>
    <div class="container d-none">
        <?php require '../email/email.php';
            // si el email existe email.php enviara un email con la nueva contraseña
            // y esta se guardara en la bd reemplazando a la antigua
            $mail->addAddress($email);
            $new_password = md5($new_password);
            $query = "UPDATE users SET password = '$new_password' WHERE email = '$email'";
            $consulta = mysqli_query($conection, $query);
            ?>
    </div>
    <div class="container text-center">
        <pre></pre>
        <form class="p-3 mb-2 bg-light text-dark card card-body ">
            <pre></pre>
            <h4>Hemos enviado su nueva contraseña a su correo electrónico</h4>
            <a href="/efi/login.php"><button type="button" class="btn btn-primary btn-lg btn-block"> Volver </button></a>
        </form>
    </div>
<?php
} else { ?>
    <!-- si no existe el email en la bd -->
    <div class="container text-center">
    <pre></pre>
        <form class="p-3 mb-2 bg-light text-dark card card-body ">
            <pre></pre>
            <h4>Correo electrónico no encontrado</h4>
            <a href="/efi/recovery.php"><button type="button" class="btn btn-primary btn-lg btn-block"> Volver </button></a>
        </form>
    </div>
<?php
};
?>

<?php

include('footer.php');
