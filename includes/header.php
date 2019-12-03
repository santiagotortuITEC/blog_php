<!-- header.php | contiene la barra de navegacion y algunos estilos -->

<!doctype html> 

<head>
  <title>Technology Blog</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
  <!-- Bootstrap CSS -->
  
  <link rel="icon"  href="/efi/includes/favicon.ico">   

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<style>
  .avatar {
    vertical-align: middle;
    width: 50px;
    height: 50px;
    border-radius: 50%;
  }

  body { 

   background: #abbaab;  /* fallback for old browsers */
 background: -webkit-linear-gradient(to right, #ffffff, #abbaab);  /* Chrome 10-25, Safari 5.1-6 */
 background: linear-gradient(to right, #ffffff, #abbaab); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


  }

  .images {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
    width: 550px;
  }
</style>

<body>


  <?php
  include 'db.php';
  session_start();
  if (isset($_SESSION['email'])) { ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
      <a class="navbar-brand" href="/efi/index.php">Technology Blog </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item" id="tab-index">
            <a class="nav-link btn btn-dark" href="/efi/index.php">Inicio</a>
          </li>
          <li class="nav-item" id="tab-categories">
            <a class="nav-link btn btn-dark" href="/efi/categories.php">Categorías</a>
          </li>
          <li class="nav-item" id="tab-authors">
            <a class="nav-link btn btn-dark" href="/efi/authors.php">Autores</a>
          </li>
          <li class="nav-item" id="tab-publications">
            <a class="nav-link btn btn-dark" href="/efi/publications.php">Publicaciones</a>
          </li>
          <li class="nav-item" id="tab-account">
            <a class="nav-link btn btn-dark" href="/efi/account.php"> Mi cuenta (<?php echo $_SESSION['firstname']; ?>)</a>
          </li>
          <li class="nav-item" id="tab-exit">
            <a class="nav-link btn btn-dark " href="/efi/includes/exit.php">Cerrar sesión</a>
          </li>
        </ul>
      </div>
    </nav>



  <?php
  } else {
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#"> Technology Blog </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item" id="tab-index">
            <a class="nav-link btn btn-dark" href="/efi/index.php">Inicio</a>
          </li>
          <li class="nav-item" id="tab-categories">
            <a class="nav-link btn btn-dark" href="/efi/categories.php">Categorías</a>
          </li>
          <li class="nav-item" id="tab-authors">
            <a class="nav-link btn btn-dark" href="/efi/authors.php">Autores</a>
          </li>
          <li class="nav-item" id="tab-login">
            <a class="nav-link btn btn-dark" href="/efi/login.php">Iniciar Sesión</a>
          </li>
          <li class="nav-item" id="tab-register">
            <a class="nav-link btn btn-dark" href="/efi/register.php">Registrarse</a>
          </li>
        </ul>
      </div>
    </nav>
  <?php
  }
  ?>



<!-- funcion para dejar marcada la página del menú en la el usuario se encuentra -->
<script>

/// Url actual
let url = window.location.href;

/// Elementos de li
const tabs = ["index","categories","authors","login","register","publications","account","exit"];

tabs.forEach(e => {
    /// Agregar .php y ver si lo contiene en la url
    if (url.indexOf(e + ".php") !== -1) {
        /// Agregar tab- para hacer que coincida la Id
        setActive("tab-" + e);
    }

});

/// Funcion que asigna la clase active
function setActive(id) {
    document.getElementById(id).setAttribute("class", "nav-item active");
}


</script>