<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="http://localhost/recetillas/vistas/css/main.css">

  <title>Recetillas.com!</title>
</head>
<body>

  <?php 


    include "modulos/navbar.php";

    echo '<div class="wrapper">';

    if (isset($_GET["ruta"])) {

      $ruta = array();

      $ruta = explode("/", $_GET["ruta"]);

      if ($ruta[0] == "home" ||
          $ruta[0] == "receta" ||
          $ruta[0] == "login" ||
          $ruta[0] == "registro" ||
          $ruta[0] == "logout" ||
          $ruta[0] == "crear-receta") {

        include "modulos/".$ruta[0].".php";

      }

    }else{

      include "modulos/home.php";

    }

    echo '</div>';

  ?>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  
  <script src="http://localhost/recetillas/vistas/js/main.js"></script>

</body>
</html>