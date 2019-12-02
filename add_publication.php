<!-- add_publication.php | formulario para que un usuario registrado pueda 
realizar una publicacion-->

<?php
include('includes/header.php');
?>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <pre></pre>
        <h3>Nueva publicacion</h3>
        <!-- los datos de este formulario se enviaran a "add_publication_includes.php" -->
        <form action="includes/add_publication_includes.php" method="POST" class="p-3 mb-2 bg-light text-dark card card-body registrarAdm">
            <div class="form-group ">
                <label>Titulo:</label>
                <input maxlength="55" type="text" class="form-control" name="titulo" placeholder="Titulo">
            </div>
            <div class="form-group ">
                <label>Descripcion:</label>
                <input maxlength="244"  type="text" class="form-control" name="descripcion" placeholder="Descripcion">
            </div>
            <div class="form-group">
                <label>Imagen:</label>
                <input maxlength="244" type="text" class="form-control" name="imagen" placeholder="Imagen (url)">
            </div>
            <!-- para que el usuario seleccione una de las categorias disponibles
            se consulta a la bd para obtenerlas -->
            <div class="form-group">
                <label>Categoria:</label>
                <select name="categoria">
                <?php
                $query = " SELECT * FROM categorias ";
                $result = mysqli_query($conection, $query);  

                while ($row = mysqli_fetch_array($result)) { ?>
  
                <option value="<?php echo $row['id'] ?>" > <?php echo utf8_encode($row['nombre'])?> </option>

                <?php } ?>
      
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-lg btn-block">Aceptar</button>
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>

<?php
include('includes/footer.php');
