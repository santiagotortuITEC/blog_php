<!-- register.php | formulario para que los usuarios se registren -->

<?php
include('includes/header.php');
?>
 
<div class="row">
    <div class="col-md-3"></div>

    <div class="col-md-6">
        <pre></pre>
        <h3>Registrarse</h3>
        <form action="includes/register_includes.php" method="POST" class="p-3 mb-2 bg-light text-dark card card-body registrarAdm">

        <?php 
        // si existe algun error cuando hay un intento para registrarse, se muestra
            if ($_SESSION['error']) { ?>
                <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <?php
                echo ($_SESSION['error']);
                unset($_SESSION['error']);?>
                </div>
            <?php } ?>    

        <div class="form-group ">
                <label>Nombre:</label>
                <input maxlength="50" type="text" class="form-control" name="nombre" placeholder="Nombre">
            </div>
            <div class="form-group ">
                <label>Apellido:</label>
                <input maxlength="50" type="text" class="form-control" name="apellido" placeholder="Apellido">
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input maxlength="255" type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label>Contraseña:</label>
                <input maxlength="255" type="password" class="form-control" name="password" placeholder="Contraseña">
            </div>
            <div class="form-group">
                <label>Confirmar contraseña:</label>
                <input maxlength="255" type="password" class="form-control" name="password2" placeholder="Contraseña">
            </div>
            <div class="form-group">
                <label>Seleccione su avatar:</label>
                <br>
 
                <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" class="avatar">
                <input checked type="radio" value="https://www.w3schools.com/howto/img_avatar.png" name="avatar" placeholder="Avatar">
               
                <img src="https://www.w3schools.com/w3images/avatar2.png" alt="Avatar" class="avatar">
                <input type="radio" value="https://www.w3schools.com/w3images/avatar1.png"  name="avatar" placeholder="Avatar">

                <img src="https://www.w3schools.com/w3images/avatar6.png" alt="Avatar" class="avatar">
                <input type="radio" value="https://www.w3schools.com/w3images/avatar6.png" name="avatar" placeholder="Avatar">

                <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar" class="avatar">
                <input type="radio" value="https://www.w3schools.com/howto/img_avatar2.png" name="avatar" placeholder="Avatar">

                <img src="https://www.w3schools.com/w3images/avatar5.png" alt="Avatar" class="avatar">
                <input type="radio" value="https://www.w3schools.com/w3images/avatar5.png" name="avatar" placeholder="Avatar">

            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-lg btn-block">Registrarse</button>
            </div>
        </form>
    </div>

    <div class="col-md-3"></div>

</div>

<?php
include('includes/footer.php');
