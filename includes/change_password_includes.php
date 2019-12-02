<!-- register_includes.php | verifica que los datos ingresados en el formulario de register.php sean correctos 
como para que un nuevo usuario sea registrado. ademas, muestra mensajes de error o de exito en la registracion -->

<?php
include 'header.php';
session_start();
$email = ($_SESSION['email']);

// obtener datos del formulario de register.php
$password_current = $_POST['password_current'];
$password_current = md5($password_current);
$password_new = $_POST['password_new'];
$password_new_confirm = $_POST['password_new_confirm'];
// control de que las dos contraseñas coincidan 
if ($password_new !== $password_new_confirm) {  
    $_SESSION['error'] = 'Las contraseñas no coinciden';
    header("location: /efi/change_password.php");
    } else {
        $password_new = md5($password_new); 
        
        $query = " SELECT * FROM users WHERE email = '$email' ";
        $result = mysqli_query($conection, $query);  
        while ($row = mysqli_fetch_array($result)) { 
            $password_db =($row['password']);
        }  


        if ($password_current !== $password_db) {  
            $_SESSION['error'] = 'Ha ocurrido un problema.
            Puede que hayas ingresado mal la contraseña.
            ';
            header("location: /efi/change_password.php");
        } else {
            // se insertan en la bd los datos del nuevo usuario registrado
            $query = "UPDATE users set password = '$password_new' WHERE email = '$email'"; 
            mysqli_query($conection, $query);  
            // para el email enviado
            $password_for_email = $password_new_confirm;

            ?>  

        <div class="row p-3 mb-2 bg-light text-dark card card-body ">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <!-- "email_register.php" enviara un email al usuario que se registro con los datos de acceso -->
                <div class="d-none"><?php include('../email/email_register.php'); ?></div>
                <h3> Contraseña modificada correctamente. </h3>
                <h4> Hemos enviado a su email los datos de acceso.</h4>
                <a href="../index.php"><button class="btn btn-primary btn-lg btn-block"> Inicio </button></a>
            </div>
            <div class="col-md-3"></div>
        </div>
<?php
         
    };
};

include '/efi/includes/footer.php';
 