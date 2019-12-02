<!-- categories_select.php | visualizar las publicaciones de la categoria seleccionada -->

<?php
include('includes/header.php');

if (isset($_GET['id'])) {
    // si obtengo desde account.php al id lo guardo en una variable ($id)
    $id = $_GET['id'];
    // obtener las publicaciones con su categoria y datos del usuario que realizo la publicaion
    $query = "
        SELECT * FROM publicaciones
        INNER JOIN users
        ON users.id = publicaciones.user_id
        INNER JOIN categorias
        ON categorias.id = publicaciones.categoria_id
        WHERE categorias.id = $id
        ORDER BY publicaciones.creado DESC
        ";
    $result = mysqli_query($conection, $query);
    // si el numero de filas que devuelve es igual a 1
    // entonces un id coincide con la consulta
    if (mysqli_num_rows($result) >= 1) {
        ?>
        <div class="container">
            <?php
            
             
            $row2 = mysqli_fetch_array($result);
            ?>
            <pre></pre>
                <h3> <?php echo  'Publicaciones de: '.($row2['nombre']); ?> </h3>
            <?php
            
            // durante el "while" se muestran algunos datos que contiene "$result" 
            $result = mysqli_query($conection, $query);

            // durante el "while" se muestran algunos datos que contiene "$result" 
            while ($row = $row = mysqli_fetch_array($result)) { ?>
                <pre></pre>
                <!-- un click sobre una publicacion envia el id de la misma a "publications_detail.php"
                para verla en detalle -->
                <a href="publications_detail.php?id=<?php echo $row[0] ?>" class="list-group-item list-group-item-action">
                    <div class="row ">
                        <div class="col md-8">
                            <h6> Categoria: <?php echo utf8_encode($row['nombre']) ?></h6>
                            <h3><?php echo ($row['titulo']) ?></h3>
                            <h6> Publicado: <?php echo substr(utf8_encode($row['creado']) , 0, 11) . ' a las ' . substr(utf8_encode($row['creado']) , 11, 23) ; ?></h6>
                    <h6> Modificado por última vez: <?php echo substr(utf8_encode($row['actualizado']) , 0, 11) . ' a las ' . substr(utf8_encode($row['actualizado']) , 11, 23)  ?></h6>
                            <h5><?php echo  ($row['descripcion']) ?></h5>
                        </div>
                        <div class="col md-4">
                            <img class="float-right avatar" src="<?php echo utf8_encode($row['avatar']) ?>">
                            <h6 class="float-right"> By: <?php echo utf8_encode($row['firstname']) . ' ' . utf8_encode($row['lastname']) ?></h6>
                        </div>
                    </div>
                </a>
            <?php }
            } else {
                    ?>
            <div class="container text-center">
                <pre></pre>
                <form class="p-3 mb-2 bg-light text-dark card card-body ">
                    <pre></pre>
                    <h4>No hay publicaciones de la categoria seleccionada</h4>
                    <a href="categories.php"><button type="button" class="btn btn-primary btn-lg btn-block"> Volver </button></a>
                </form>
            </div>
        </div>
<?php
    }
}

include('includes/footer.php'); 
