<!-- edit_account.php | permite al usuario registrado editar algunos datos de su cuenta -->

<?php
include('includes/db.php');

if (isset($_GET['id'])) {
    // si obtengo desde account.php al id lo guardo en una variable ($id)
    $id = $_GET['id']; 
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conection, $query);
    // si el numero de filas que devuelve es igual a 1
    // entonces un id coincide con la consulta
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $firstname = $row['firstname'];           
        $lastname = $row['lastname']; 
    }

    if (isset($_POST['update'])) { // si recibo variables a traves del metodo post
        $id = $_GET['id'];  
        // los siguientes datos son obtenidos del formulario que esta en este mismo archivo   
        $firstname = $_POST['firstname'];           
        $lastname = $_POST['lastname'];  
        $avatar = $_POST['avatar'];  

        // los mismos datos reemplazan en la bd a los antiguos
        $query = "UPDATE users set avatar = '$avatar' , firstname = '$firstname' , lastname ='$lastname' WHERE id = $id"; //sentencia de actualizacion(DEBERIA PONERLE UN NOMBRE QUE MUESTRE MAS LO QUE HACE);
        mysqli_query($conection, $query); 

        header('Location: account.php');
    }
}
?>
<!-- formulario para que el usuario pueda actualizar los datos de su cuenta -->
<?php
include('includes/header.php');  
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card card-body">
                  <!-- los datos del siguiente formulario se enviaran a este mismo archivo junto con el id 
                para que puedan ser actualizados en la bd -->
                <form action="edit_account.php?id=<?php echo $_GET['id']; ?> " method="POST">
                    <div class="form-group">
                        Nombre: <input maxlength="50" type="text" name="firstname" id="" value='<?php echo $firstname ?>' class="form-control" placeholder="Editar">
                        <pre></pre>
                        Apellido: <input maxlength="50" type="text" name="lastname" id="" value='<?php echo $lastname ?>' class="form-control" placeholder="Editar">
                    </div>
                    <div class="form-group">
                <label>Seleccione su avatar:</label>
                <br>
 
                <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" class="avatar">
                <input checked type="radio" value="https://www.w3schools.com/howto/img_avatar.png" name="avatar" placeholder="Avatar">
               
                <img src="https://www.w3schools.com/w3images/avatar2.png" alt="Avatar" class="avatar">
                <input type="radio" value="https://www.w3schools.com/w3images/avatar1.png"  name="avatar" placeholder="Avatar">

                <img src="https://www.w3schools.com/w3images/avatar6.png" alt="Avatar" class="avatar">
                <input type="radio" value="https://www.w3schools.com/w3images/avatar6.png" name="avatar" placeholder="Avatar">

                <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar" class="avatar">
                <input type="radio" value="https://www.w3schools.com/howto/img_avatar2.png" name="avatar" placeholder="Avatar">

                <img src="https://www.w3schools.com/w3images/avatar5.png" alt="Avatar" class="avatar">
                <input type="radio" value="https://www.w3schools.com/w3images/avatar5.png" name="avatar" placeholder="Avatar">

            </div>
                    <button class="btn btn-success btn-lg btn-block" name="update">
                        Guardar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');