<?php 

class ControladorRecetas{

	static public function ctrMostrarRecetas($columna,$valor){
		
		$tabla = "recetas";

		$respuesta = ModelosRecetas::mdlMostrarRecetas($tabla,$columna,$valor);

		// $i = 0;

		// if (count($respuesta)>1) {

		// 	foreach ($respuesta as $key => $value) {
		// 		$respuesta[$i]["categoria"] = ControladorRecetas::ctrMostrarCategorias($value["id_categoria"]);
		// 		$respuesta[$i]["ingredientes"] = ControladorRecetas::ctrMostrarIngredientes($value["id_receta"]);
		// 		$i++;
		// 	}

		// }else{
		// 	$respuesta["categoria"] = ControladorRecetas::ctrMostrarCategorias($respuesta["id_categoria"]);
		// 	$respuesta["ingredientes"] = ControladorRecetas::ctrMostrarIngredientes($respuesta["id_receta"]);
		// }

		return $respuesta;

	}

	static public function ctrMostrarCategorias($valor){
		
		$tabla = "categorias";

		$columna = "id_categoria";

		$respuesta = ModelosRecetas::mdlMostrarCategorias($tabla,$columna,$valor);

		return $respuesta;

	}

	static public function ctrMostrarIngredientes($valor){
		
		$tabla = "ingredientes";

		$columna = "id_receta";

		$respuesta = ModelosRecetas::mdlMostrarIngredientes($tabla,$columna,$valor);

		return $respuesta;

	}

	static public function crearReceta(){

		if (isset($_POST["crearTitulo"])) {
			
			$tabla = "recetas";

			$ruta = "";

			if (isset($_FILES["crearFoto"]["tmp_name"])) {

				echo 'Estas entrando pero no se que meirda pasa';

				list($ancho,$alto) = getimagesize($_FILES["crearFoto"]["tmp_name"]);

				/* Crear El directorio donde vamos a guardar la foto del usuario */
				$directorio = "vistas/img/recetas/".$_POST["crearTitulo"];

				mkdir($directorio,0755);

				/* De acuerdo al tipo de imagen jpeg */
				if ($_FILES["crearFoto"]["type"] == "image/jpeg") {

					/* Guardamos en el directorio */

					$aleatorio = mt_rand(100,999);

					$ruta = "vistas/img/recetas/".$_POST["crearTitulo"]."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["crearFoto"]["tmp_name"]);

					$destino = imagecreatetruecolor($ancho, $alto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $ancho, $alto, $ancho, $alto);

					imagejpeg($destino,$ruta);
				}

				/* De acuerdo al tipo de imagen png */
				if ($_FILES["crearFoto"]["type"] == "image/png") {

					/* Guardamos en el directorio */

					$aleatorio = mt_rand(100,999);

					$ruta = "vistas/img/recetas/".$_POST["crearTitulo"]."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["crearFoto"]["tmp_name"]);

					$destino = imagecreatetruecolor($ancho, $alto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $ancho, $alto, $ancho, $alto);

					imagepng($destino,$ruta);
				}

			}else{
				echo 'NOOO Estas entrando pero no se que meirda pasa';
			}

			$datos = array('id_usuario' => $_SESSION["id_usuario"],
				'titulo' => $_POST["crearTitulo"],
				'receta' => $_POST["crearReceta"],
				'id_categoria' => $_POST["crearCategoria"],
				'ruta_imagen' => $ruta);



			echo '<pre>'; print_r($datos); echo '</pre>';
			
			$respuesta = ModelosRecetas::mdlCrearReceta($tabla,$datos);

			for ($i=0; $i <count($_POST["crearIngrediente"]) ; $i++) { 
				$res = ModelosRecetas::mdlCrearIngrediente("ingredientes",$respuesta,$_POST["crearIngrediente"][$i]);
			}

			header("Location: http://localhost/recetillas/home");
		}

	}

}