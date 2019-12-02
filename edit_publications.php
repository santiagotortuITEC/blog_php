<!-- edit_publications.php | permite al usuario logueado editar la publicacion seleccionada -->

<?php
include('includes/db.php');

if (isset($_GET['id'])) {
    // si obtengo desde publications.php a los id los guardo en variables ($id, $id_cate)
    $id_cate = $_GET['id_cate'];
    $id = $_GET['id']; 
    // obtengo la publicacion que tenga ese 'id'
    $query = "SELECT * FROM publicaciones WHERE id = $id";
    $result = mysqli_query($conection, $query);
    // si el numero de filas que devuelve es igual a 1
    // entonces un id coincide con la consulta
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result); 
        $titulo = $row['titulo'];         
        $descripcion = $row['descripcion'];
        $imagen = $row['image'];
        $categ = $row['categoria_id'];
    }

    if (isset($_POST['update'])) { // si recibo variables a traves del metodo post
        $id = $_GET['id']; 
        // los siguientes datos son obtenidos del formulario que esta en este mismo archivo
        $titulo = $_POST['titulo']; 
        $descripcion = $_POST['descripcion'];
        $imagen = $_POST['imagen'];
        $categ = $_POST['categoria'];

        // los mismos datos reemplazan en la bd a los antiguos
        $query = "UPDATE publicaciones set titulo = '$titulo' , descripcion ='$descripcion', image = '$imagen', categoria_id='$categ' WHERE id = $id"; 
        mysqli_query($conection, $query);  

        header('Location: publications.php');
    }
}
?>

<!-- formulario para que el usuario pueda actualizar los datos de su publicacion -->
<?php
include('includes/header.php');  
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <!-- los datos del siguiente formulario se enviaran a este mismo archivo junto con el id 
                para que puedan ser actualizados en la bd -->
                <form action="edit_publications.php?id=<?php echo $_GET['id']; ?> " method="POST">
                    <div class="form-group">
                        Título: <input maxlength="55" type="text" name="titulo" id="" value='<?php echo $titulo ?>' class="form-control" placeholder="Editar">
                        <pre></pre>
                        Descripción: <input maxlength="244" type="text" name="descripcion" id="" value='<?php echo $descripcion ?>' class="form-control" placeholder="Editar">
                        <pre></pre>
                        Imagen: <input maxlength="244" type="text" name="imagen" id="" value='<?php echo $imagen ?>' class="form-control" placeholder="Editar">
                        <pre></pre>
                    </div>
                    <div class="form-group">
                        <label>Categoría: </label>
                        <select name="categoria">
                            <?php
                            // para que la categoria de la publicacion a editar tenga "selected"
                            $query = " SELECT * FROM categorias ";
                            $result = mysqli_query($conection, $query);  
                            while ($row = mysqli_fetch_array($result)) { ?>
                                <?php $contador= ($contador+1) ;?>    
                                <option value="<?php echo $row['id'] ?>" <?php if ($id_cate == $contador) {echo ("selected");}  
                                else {echo ("");}?>  ><?php echo  (utf8_encode($row['nombre'])) ; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button class="btn btn-success btn-lg btn-block " name="update">
                        Guardar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');  
