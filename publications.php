<!-- publications.php | solo para usuarios logueados, pueden visualizar 
sus publicaciones -->

<?php

include('includes/header.php');
session_start();
$email_user = ($_SESSION['email']);
$id_user = ($_SESSION['user_id']) ;

if (isset($_SESSION['user_id'])) { ?>
    <pre></pre>
    <pre></pre>
    <?php
    // obtener las publicaciones con su categoria y datos del usuario que esta logueado.
        $query = "
            SELECT *            
            FROM publicaciones
            INNER JOIN users
            ON users.id = publicaciones.user_id
            INNER JOIN categorias
            ON categorias.id = publicaciones.categoria_id
            WHERE users.id = '$id_user' 
            ORDER BY publicaciones.creado DESC
        ";
        $result = mysqli_query($conection, $query);
        ?>
    <div class="container">
        <div class="row">
            <div class="col md-6">
                <h2>Tus publicaciones </h2>
            </div>
            <div class="col md-6">
                <a href="add_publication.php" class="btn btn-dark btn-lg btn-block"> Agregar publicación </a>
            </div>
        </div>
        <pre></pre>
        <div class="row list-group-item list-group-item-action">
            <?php

            if (mysqli_num_rows($result) < 1) { ?>
                <div class="row ">
                <div class="col md-8">
                    
                    <h5><?php echo ('No has realizado ninguna publicación.') ?></h5>
                </div>
                <div class="col md-4">
                     
                </div>
            </div>  <?php
            }
                // durante el "while" se muestran los datos que contiene "$result"
                // cuando se selecciona alguna publicacion, se envia el id de la misma seleccionada
                // a "publications_detail.php", para ver la publicacion seleccionada
                while ($row = mysqli_fetch_array($result)) { ?>
                <a href="publications_detail.php?id=<?php echo $row[0] ?>" class="list-group-item list-group-item-action">
                    <div class="row ">
                        <div class="col md-8">
                            <h6> Categoría: <?php echo ($row['nombre']) ?></h6>
                            <h3><?php echo ($row['titulo']) ?></h3>
                            <h6> Publicado: <?php echo substr(utf8_encode($row['creado']) , 0, 11) . ' a las ' . substr(utf8_encode($row['creado']) , 11, 23) ; ?></h6>
                    <h6> Modificado por última vez: <?php echo substr(utf8_encode($row['actualizado']) , 0, 11) . ' a las ' . substr(utf8_encode($row['actualizado']) , 11, 23)  ?></h6>
                            <h5><?php echo ($row['descripcion']) ?></h5>
                        </div>
                        <div class="col md-4">
                            <img class="float-right avatar" src="<?php echo ($row['avatar']) ?>">
                            <h6 class="float-right"> By: <?php echo ($row['firstname']) . ' ' . ($row['lastname']) ?></h6>
                        </div>
                    </div>
                </a>
                <!-- cuando se hace click en editar, se envia el id de la publicacion junto
                    con el id de la categoria de esa publicacion a "edit_publications.php" para poder editarla -->
                <a href="edit_publications.php?id=<?php echo $row[0] ?>&id_cate=<?php echo ($row["categoria_id"]); ?>" class="btn btn-success btn-lg btn-block"> Editar </a>
                <!-- cuando se hace click en eliminar, se envia el id de la publicacion a "delete_publications.php" 
                    para borrar una publicacion -->
                <a onclick="return confirmDelete();" href="delete_publications.php?id=<?php echo $row[0] ?>" class="btn btn-danger btn-lg btn-block delete"> Eliminar </a>
                <br>
                <?php }
    } ?>
        </div>
    </div>

<!-- funcion para confirmar la eliminacion de una publicacion -->
<script type="text/javascript">
    function confirmDelete() {
        var confirmar = confirm("¿Realmente desea eliminarla? ");
        if (confirmar) {
            return true;
        } else {
            return false;
        }
    }
</script>

<?php
include('includes/footer.php');
