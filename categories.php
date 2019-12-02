<!-- categories.php | cualquier usuario, puede visualizar las categorias de publicaciones -->

<?php
include('includes/header.php');
// obtengo los datos de las categorias disponibles
$query = " SELECT * FROM categorias ";
$result = mysqli_query($conection, $query);

?>
<div class="container">
  <pre></pre>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="  col md-6">
      <h3> Categorías </h3>
    </div>
    <div class="col-md-3"></div>
  </div>
  <?php

  // durante el "while" se muestran los nombres de las categorias disponibles
  while ($row = mysqli_fetch_array($result)) { ?>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col md-6">
        <div class=" text-center list-group-item list-group-item-action list-group-item-light">
          <h3><a href="categories_select.php?id=<?php echo $row['id'] ?>" class="badge badge-dark"><?php echo utf8_encode($row['nombre']) . '<br>' ?></a></h3>
        </div>
      </div>
      <div class="col md-3"></div>
    </div>
  <?php } ?>
</div>

<?php
include('includes/footer.php');
?>
