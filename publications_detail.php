<!-- publications_detail.php | se puede visualizar la publicacion seleccionada -->

<?php
include('includes/db.php');

if (isset($_GET['id'])) {
    // si obtengo desde publications.php el id lo almaceno en una variable ($id)
    $id = $_GET['id']; 
    // obtengo todos los datos de la publicacion 
    $query = "
    SELECT * FROM publicaciones  
    INNER JOIN categorias 
    ON categorias.id = publicaciones.categoria_id
    INNER JOIN users
    ON users.id = publicaciones.user_id
    WHERE publicaciones.id = $id   
    ";
    $result = mysqli_query($conection, $query);

    // si el numero de filas que devuelve es igual a 1
    // entonces un id coincide con la consulta
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result); 
        // almaceno a los datos necesarios en variables
        $titulo = $row['titulo'];           
        $descripcion = $row['descripcion'];
        $imagen = $row['image'];
        $fecha = $row['creado'];
        $categ = $row['nombre'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];        
    }
}
?>
<?php
include('includes/header.php');  
?>
<!-- muestrar los datos obtenidos anteriormente -->
<div class="container p-4">
    <div class="row">
        <div class="col-md-12">
        <pre></pre>
        <a class="list-group-item list-group-item-action">
            <div class="row ">
                <div class="col md-8">
                    <h6> Categoria: <?php echo utf8_encode($row['nombre']) ?></h6>
                    <h3><?php echo ($row['titulo']) ?></h3>
                    <h6> Publicado: <?php echo substr(utf8_encode($row['creado']) , 0, 11) . ' a las ' . substr(utf8_encode($row['creado']) , 11, 23) ; ?></h6>
                    <h6> Modificado por última vez: <?php echo substr(utf8_encode($row['actualizado']) , 0, 11) . ' a las ' . substr(utf8_encode($row['actualizado']) , 11, 23)  ?></h6>
                    <h5><?php echo ($row['descripcion']) ?></h5>
                </div>
                <div class="col md-4">
                    <img class="float-right avatar" src="<?php echo utf8_encode($row['avatar']) ?>">
                    <h6 class="float-right"> By: <?php echo utf8_encode($row['firstname']) .' '. utf8_encode($row['lastname']) ?></h6>
                    <br><br><br>
                    <img class="float-right images" src="<?php echo utf8_encode($row['image']) ?>">
                </div>
            </div>
        </a>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');  
?>
