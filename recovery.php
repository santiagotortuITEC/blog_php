<!-- recovery.php | formulario para que los usuarios puedan recuperar su contraseña -->

<?php
include 'includes/header.php';
?>

<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <div class="container">
            <pre></pre>
            <h3>Recupere su contraseña</h3>
            <form action="/efi/includes/recovery_includes.php" method="post" class="p-3 mb-2 bg-light text-dark card card-body">
                <label for="recuperar">Ingrese su correo electrónico</label>
                <input maxlength="255" type="email" class="form-control w-100 a-auto" placeholder="Ingrese su email" name="email">
                <pre></pre>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Aceptar</button>
            </form>
        </div>
    </div>
    <div class="col-4"></div>
</div>
