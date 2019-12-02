<!-- login.php | formulario para que los usuarios inicien sesion -->

<?php
include('includes/header.php');
?>

<div class="row">
    <div class="col-md-3"></div>

    <div class="col-md-6">
        <pre></pre>

        <h3>Iniciar Sesión</h3>
        <form action="includes/login_includes.php" method="POST" class="p-3 mb-2 bg-light text-dark card card-body ">
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label>Contraseña:</label>
                <input type="password" class="form-control" name="password" placeholder="Contraseña">
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
                <button class="btn btn-primary btn-lg btn-block">Iniciar Sesion</button>
            </div>
            <div class="row text-center mt-2">
                <div class="container text-center">
                    <a href="recovery.php"> ¿Ha olvidado su contraseña?</a>
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-3"></div>

</div>

<?php
include('includes/footer.php');
