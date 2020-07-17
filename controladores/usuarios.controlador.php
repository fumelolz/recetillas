<?php 

class ControladorUsuarios{

	static public function ctrMostrarUsuarios($columna,$valor){

		$tabla = "usuarios";

		$respuesta = ModelosUsuarios::mdlMostrarUsuarios($tabla,$columna,$valor);

		return $respuesta;

	}

	static public function registrarse(){

		if (isset($_POST["crearNombre"])) {
			
			$tabla = "usuarios";
			$datos = array('nombre' => $_POST["crearNombre"],
			 			   'correo' => $_POST["crearEmail"],
			 			   'password' => $_POST["crearPass"]);

			$respuesta = ModelosUsuarios::mdlCrearUsuario($tabla,$datos);


			if ($respuesta == "ok") {
				echo "<script>
					
					window.location = 'login'
					
				</script>";
			}
		}

	}

	static public function login(){

		if (isset($_POST["email"])) {
				
			$tabla = "usuarios";

			$respuesta = ModelosUsuarios::mdlMostrarUsuarios($tabla,"correo",$_POST["email"]);
			
			if ($respuesta) {
					
				if ($respuesta["password"] == $_POST["password"]) {
					
					$_SESSION["logged"] = true;
					$_SESSION["id_usuario"] = $respuesta["id_usuario"];
					$_SESSION["nombre"] = $respuesta["nombre"];
					$_SESSION["correo"] = $respuesta["correo"];	

					header("Location: http://localhost/recetillas/home");

				}else{
					echo "<div class='alert alert-danger'>Contraseña incorrecta</div>";
				}
				 
			}else{
				echo "<div class='alert alert-danger'>El usuario no existe</div>";
			}

		}

	}

}