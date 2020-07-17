<div class="login">
  <form class="form-signin form-receta" method="post" enctype="multipart/form-data">
    <h1 class="h3 mb-3 font-weight-normal">Receta</h1>
    <br>
    <h6>Titulo</h6>
    <label for="inputNombre" class="sr-only">Titulo</label>
    <input type="text" id="inputNombre" class="form-control" name="crearTitulo" placeholder="Nombre" required autofocus="">
    <br>
    <h6>Precedimiento</h6>
    <textarea class="form-control" name="crearReceta" placeholder="Ingresa aquí tu receta" rows="10" required></textarea>
    <br>
    <h6>Elige una categoria</h6>
    <select class="custom-select" name="crearCategoria">
      <option value="1">Selecciona una categoria</option>
      
      <?php 

      $valor = null;

      $respuesta = ControladorRecetas::ctrMostrarCategorias($valor);

      foreach ($respuesta as $key => $value) {
        echo '<option value="'.$value["id_categoria"].'">'.$value["descripcion"].'</option>';
      }

      ?>
    </select>
    
    <div class="mt-3">
      <div class="d-flex justify-content-between align-items-center mb-1">
        <h6>Añadir ingrediente</h6>
        <button type="button" class="btn btn-primary" id="add">+</button>
      </div>
      <input type="text" class="form-control" name="crearIngrediente[]" placeholder="Añadir ingrediente de la receta">
      <div id="ingredientesadd">

      </div>
    </div>
    <br>
    <h6>Añadir imagen</h6>
    <div class="input-group mb-3 mt-3">
      <div class="custom-file">
        <input type="file" class="custom-file-input" name="crearFoto" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
      </div>
    </div>
    <button class="btn btn-lg btn-primary btn-block mt-5" type="submit">Crear Receta</button>
    <?php 

    $receta = new ControladorRecetas();
    $receta -> crearReceta();

    ?>
    <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
  </form>
</div>