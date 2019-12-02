<!-- register_includes.php | verifica que los datos ingresados en el formulario de register.php sean correctos 
como para que un nuevo usuario sea registrado. ademas, muestra mensajes de error o de exito en la registracion -->

<?php
include 'header.php';

// obtener datos del formulario de register.php
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$avatar = $_POST['avatar'];

// control de que las dos contraseñas coincidan 
if ($password !== $password2) {  
    $_SESSION['error'] = 'Las contraseñas no coinciden';
    header("location: /efi/register.php");
    } else {
        // verificar si el email ingresado para registrarse ya ha sido utilizado
        $query = "SELECT * from users where email='$email'";
        $consult = mysqli_query($conection, $query);
        $result = mysqli_fetch_array($consult);

        if ($result['email'] == $email) {  
            $_SESSION['error'] = 'Ha ocurrido un problema.
            Puede que el email ya este registrado
            ';
            header("location: /efi/register.php");
        } else {
            // se insertan en la bd los datos del nuevo usuario registrado
            $password_for_email = $password;
            $password = md5($password_for_email);
            $query = "INSERT INTO users (firstname, lastname, password, email, avatar) values('$nombre','$apellido','$password','$email','$avatar')";
            $consulta = mysqli_query($conection, $query);
            ?>

        <div class="row p-3 mb-2 bg-light text-dark card card-body ">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <!-- "email_register.php" enviara un email al usuario que se registro con los datos de acceso -->
                <div class="d-none"><?php include('../email/email_register.php'); ?></div>
                <h3> Ha sido registrado correctamente. </h3>
                <h4>Hemos enviado a su email los datos de acceso.</h4>
                <a href="../index.php"><button class="btn btn-primary btn-lg btn-block"> Inicio </button></a>
            </div>
            <div class="col-md-3"></div>
        </div>
<?php
        header("location: /efi/login.php");
    };
};

include '/efi/includes/footer.php';
 