<?php 

$columna = "id_receta";
$valor = $ruta[1];

$respuesta = ControladorRecetas::ctrMostrarRecetas($columna,$valor);
$autor = ControladorUsuarios::ctrMostrarUsuarios("id_usuario",$respuesta["id_usuario"]);
$categoria = ControladorRecetas::ctrMostrarCategorias($respuesta["id_categoria"]);
$url = ControladorPlantilla::url();
if ($respuesta) {
	
	echo '  
		<div class="container mt-2 blog">
			<img src="'.$url.$respuesta["ruta_imagen"].'" alt="">
			<br>
			<h2>'.$respuesta["titulo"].'</h2>
			<h5>Autor '.$autor["nombre"].'</h5>
			<h6>Categoria '.$categoria["descripcion"].'</h6>
			<hr style="border: 1px solid silver">
			<h3>Ingredientes</h3>
			<ul>';

			$ingredientes = ControladorRecetas::ctrMostrarIngredientes($ruta[1]);
			foreach ($ingredientes as $key => $value) {
				echo '<li>- '.$value["descripcion"].'</li>';
			}

			echo' </ul>
			<h3>Procedimiento</h3>
			<p>'.$respuesta["receta"].'</p>
		</div>';

}else{
	echo '<div container>
		<h1 class="text-danger text-center">Esta receta no existe, se la comieron los programadores</h1>
	</div>';
}

?>


