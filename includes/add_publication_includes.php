<!-- add_publication_includes.php | inserta los datos de una nueva publicacion el la bd -->

<?php 
include 'header.php';
session_start();
$email_user = $_SESSION['email'];
$query = " SELECT id FROM users WHERE email = '$email_user' ";
$result = mysqli_query($conection, $query); 
 
while ($row = mysqli_fetch_array($result)) {    
    $id_user = $row['id'];
} 
// obtener datos de add_publication.php
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$imagen = $_POST['imagen'];
$categoria =  $_POST['categoria'];

// insertar a los datos en la bd
$query = "INSERT INTO publicaciones (titulo, descripcion, image, user_id, categoria_id) values('$titulo','$descripcion','$imagen','$id_user','$categoria')";
$consulta = mysqli_query($conection, $query);
header("location: /efi/publications.php");

include 'footer.php';
