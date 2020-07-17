<div class="login">
  <form class="form-signin" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesión</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Correo electronico" required autofocus="">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>
    <?php 

    	$login = new ControladorUsuarios();
    	$login -> login();

     ?>
    <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
  </form>
</div>