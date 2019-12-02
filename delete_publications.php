<!-- delete_publications.php | permite al usuario borrar una publicacion (que el publico) -->

<?php 
    include('includes/db.php');

    if (isset($_GET['id'])){
        // si obtengo desde publications.php al id lo guardo en una variable ($id)
        $id = $_GET['id'];  
        $query = "DELETE FROM publicaciones WHERE id = $id";  
        $result= mysqli_query($conection, $query);  

        if (!result){
            die('Fallo el eliminado');
        }
        header("Location: publications.php"); 
    }
