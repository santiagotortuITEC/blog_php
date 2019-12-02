<!-- authors.php | cualquier usuario, puede visualizar los usuarios del blog -->

<?php
include('includes/header.php');
// obtengo los datos de los usuarios
$query = " SELECT * FROM users ";
$result = mysqli_query($conection, $query); 

?>
<div class="container">
  <pre></pre>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col md-5">
      <h3> Autores </h3>
    </div>
    <div class="col-md-2"></div>
  </div>
<?php
  // durante el "while" se muestran algunos datos de los usuarios

  while ($row = mysqli_fetch_array($result)) { ?>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col md-6">
      <!-- un click sobre un autor(usuario) envia el id del mismo a "authors_select.php"
      para ver las publicaciones realizadas por ese usuario -->
        <a  href="authors_select.php?id=<?php echo $row['id'] ?>" class="list-group-item list-group-item-action list-group-item-light">
          <img class="float-right avatar" src="<?php echo utf8_encode($row['avatar']) ?>">
          <p  class="text-center font-weight-bold" ><?php echo utf8_encode($row['firstname']) . ' ' . utf8_encode($row['lastname']) . '<br>' ?></p>
        </a>
        <pre></pre>
      </div>  
      <div class="col md-3"></div>
    </div>
  <?php } ?>
</div>

<?php
include('includes/footer.php');
?>
