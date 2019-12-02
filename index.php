<!-- index.php | muestra las publicaciones ordenadas de la mas reciente a la mas antigua -->

<?php
include('includes/header.php');
// obtener datos de las publicaciones con su categoria y usuario que la publico
$query = "
    SELECT * FROM publicaciones
	INNER JOIN users
	ON users.id = publicaciones.user_id
	INNER JOIN categorias
    ON categorias.id = publicaciones.categoria_id
    ORDER BY publicaciones.creado DESC
";
$result = mysqli_query($conection, $query);
?>
<div class="container">
    <pre></pre>
    <h2>Últimas publicaciones</h2>
    <?php
    // durante el "while" se muestran los datos que contiene "$result" 
    while ($row = mysqli_fetch_array($result)) { ?>
        <pre></pre>
        <!-- un click sobre una publicacion envia el id de la misma a "publications_detail.php"
            para verla en detalle -->
        <div class="row ">
        <a href="authors_select.php?id=<?php echo $row[6] ?>" class="list-group-item list-group-item-dark  list-group-item-action">
                <div class="col md-4">
                    <img class="float-right avatar" src="<?php echo utf8_encode($row['avatar']) ?>">
                    <h6 class="float-right"> By: <?php echo utf8_encode($row['firstname']) . ' ' . utf8_encode($row['lastname']) ?></h6>
                </div>
            </a>
            <a href="publications_detail.php?id=<?php echo $row[0] ?>" class="list-group-item list-group-item-action">
                <div class="col md-8">
                    <h6> Categoria: <?php echo utf8_encode($row['nombre']) ?></h6>
                    <h3><?php echo ($row['titulo']) ?></h3>
                    <h6> Publicado: <?php echo substr(utf8_encode($row['creado']), 0, 11) . ' a las ' . substr(utf8_encode($row['creado']), 11, 23); ?></h6>
                    <h6> Modificado por última vez: <?php echo substr(utf8_encode($row['actualizado']), 0, 11) . ' a las ' . substr(utf8_encode($row['actualizado']), 11, 23)  ?></h6>
                    <h5><?php echo ($row['descripcion']) ?></h5>
                </div>
            </a>

        </div>

    <?php } ?>
</div>

<?php
include('includes/footer.php');
?>