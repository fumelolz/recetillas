<?php 

class Conexion{

	static public function conectar(){

		$usuario = "magadan";
		$contraseña = "magadan";

		try {
			$conexion = new PDO('mysql:host=http://35.238.253.36/;dbname=recetillas', $usuario, $contraseña);
			$conexion -> exec("set names utf8");
			return $conexion;
			
		} catch (PDOException $e) {
			print "¡Error!: " . $e->getMessage() . "<br/>";
			die();
		}

	}

}