<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Recetillas.com</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $url; ?>home">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <?php 

    $url = ControladorPlantilla::url();

    if (isset($_SESSION["logged"]) && $_SESSION["logged"]) {

      echo '  

      <span class="navbar-text">
      <a href="'.$url.'crear-receta">Crear Receta</a>
      |
      <a href="#">'.$_SESSION["nombre"].'</a>
      |
      <a href="'.$url.'logout">Cerrar Sesión</a>
      </span>


      ';

    }else{
      echo '  

      <span class="navbar-text">
      <a href="'.$url.'login">Iniciar Sesión</a>
      |
      <a href="'.$url.'registro">Registrate</a>
      </span>


      ';
    }

    ?>
  </div>
</nav>