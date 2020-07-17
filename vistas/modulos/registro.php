<div class="login">
  <form class="form-signin" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Registrate</h1>
    <label for="inputNombre" class="sr-only">Nombre</label>
    <input type="text" id="inputNombre" class="form-control" name="crearNombre" placeholder="Nombre" required autofocus="">
    <label for="inputEmail" class="sr-only">Correo Electronico</label>
    <input type="email" id="inputEmail" class="form-control" name="crearEmail" placeholder="Correo electronico" required autofocus="">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" name="crearPass" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
    <?php 

      $registrarse = new ControladorUsuarios();
      $registrarse -> registrarse();

     ?>
    <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
  </form>
</div>