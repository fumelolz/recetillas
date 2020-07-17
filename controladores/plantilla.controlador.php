<?php 

class ControladorPlantilla{

	static public function mostrarPlantilla(){

		include "vistas/plantilla.php";

	} 

	static public function url(){

		return "http://35.238.253.36/";
		// return "http://localhost/recetillas/";

	}

}