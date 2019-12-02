<!-- account.php | muestra los datos del usuario logueado -->

<?php
include('includes/header.php');

session_start();
$email_user = ($_SESSION['email']);

if (isset($_SESSION['email'])) { ?>
    <pre></pre>
    <pre></pre>
    <?php
        // obtener datos del usuario que esta logueado.
        $query = " SELECT * FROM users WHERE users.email = '$email_user'  ";
        $result = mysqli_query($conection, $query); //Sentencia = Selecciono todos los elementos de la tabla Task//Ejecuto la consulta y lo guardo en Result_task//mientras hay tareas en las filas de  que haga lo siguiente

        ?>
    <div class="container">
        <div class="row">
            <div class="col md-6">
                <h2>Mi Cuenta </h2>
            </div>
        </div>
        <pre></pre>
        <div class="row list-group-item list-group-item-action">
            <div class="col sm-4"> <?php
                // durante el "while" se muestran los datos que contiene "$result"
                while ($row = mysqli_fetch_array($result)) { ?>
                    <a  class="list-group-item list-group-item-action">
                        <div class="row ">
                            <div class="col md-8">
                                <h5>Nombre: <?php echo utf8_encode($row['firstname']) ?></h5>
                                <h5> Apellido: <?php echo utf8_encode($row['lastname']) ?></h5>
                                <h5> Email: <?php echo utf8_encode($row['email']) ?></h5>
                            </div>
                            <div class="col md-4">
                                <img class="float-right avatar" src="<?php echo utf8_encode($row['avatar']) ?>">
                            </div>
                        </div>
                    </a>
                      <!-- cuando se hace click en editar, se envia el id del usuario a
                       "edit_account.php" para poder editar algun dato -->
                    <a href="edit_account.php?id=<?php echo $row[0] ?>" class="btn btn-success btn-lg btn-block"> Editar </a>
                   
                    <a href="change_password.php?id=<?php echo $row[0] ?>" class="btn btn-primary btn-lg btn-block"> Cambiar Contraseña </a>
                   
                    <!-- cerrar sesion -->
                    <a href="includes/exit.php" class="btn btn-danger btn-lg btn-block"> Cerrar Sesión </a>
            <?php }
            } ?>
            </div>
        </div>
    </div>

    <?php
    include('includes/footer.php');
    ?>
