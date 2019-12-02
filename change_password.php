<!-- register.php | formulario para que los usuarios se registren -->

<?php
include('includes/header.php');
?>

<div class="row">
    <div class="col-md-3"></div>
<?php

?>
    <div class="col-md-6">
        <pre></pre>
        <h3>Cambiar Contraseña</h3>
        <form action="includes/change_password_includes.php" method="POST" class="p-3 mb-2 bg-light text-dark card card-body registrarAdm">
            <div class="form-group">
                <label>Contraseña actual:</label>
                <input maxlength="244" type="password" class="form-control" name="password_current" placeholder="Contraseña actual">
            </div>
            <div class="form-group">
                <label>Contraseña:</label>
                <input maxlength="244" type="password" class="form-control" name="password_new" placeholder="Nueva contraseña">
            </div>
            <div class="form-group">
                <label>Confirmar contraseña:</label>
                <input maxlength="244" type="password" class="form-control" name="password_new_confirm" placeholder="Confirmar contraseña">
            </div>
            <!-- Si hay datos invalidos-->
            <?php
            if ($_SESSION['error']) { ?>
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php
                        echo ($_SESSION['error']);
                        unset($_SESSION['error']); ?>
                </div>
            <?php }
            ?>
            <!-- -->
            <div class="form-group">
                <button class="btn btn-primary btn-lg btn-block">Aceptar</button>
            </div>
        </form>
    </div>

    <div class="col-md-3"></div>

</div>

<?php
include('includes/footer.php');
