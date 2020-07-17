<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Recetillas.com</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/recetillas/home">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <?php 

    if (isset($_SESSION["logged"]) && $_SESSION["logged"]) {

      echo '  

      <span class="navbar-text">
      <a href="http://localhost/recetillas/crear-receta">Crear Receta</a>
      |
      <a href="#">'.$_SESSION["nombre"].'</a>
      |
      <a href="http://localhost/recetillas/logout">Cerrar Sesión</a>
      </span>


      ';

    }else{
      echo '  

      <span class="navbar-text">
      <a href="http://localhost/recetillas/login">Iniciar Sesión</a>
      |
      <a href="http://localhost/recetillas/registro">Registrate</a>
      </span>


      ';
    }

    ?>
  </div>
</nav>