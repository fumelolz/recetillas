<div class="container-fluid recientes my-2">

    <h2 class="text-center mt-2">Recetas Más recientes</h2>

    <div class="row ">


      <?php 

      $columna = null;
      $valor = null;

      $respuesta = ControladorRecetas::ctrMostrarRecetas($columna,$valor);

      $url = ControladorPlantilla::url();
      
      foreach ($respuesta as $key => $value) {
        
        echo '  
          <div class="col-md-3 mt-3">
            <div class="card" style="width: 18rem;">
              <img src="'.$url.$value["ruta_imagen"].'" class="card-img-top" style="height: 120px;">
              <div class="card-body">
                <h6 class="card-title">'.$value["titulo"].'</h6>
                <p class="card-text"></p>
                <a href="'.$url.'receta/'.$value["id_receta"].'" class="btn btn-primary">Ver Receta</a>
              </div>
            </div>
          </div>';

      }

      ?>

    </div>

  </div>