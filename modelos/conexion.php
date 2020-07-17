<?php 

class Conexion{

	static public function conectar(){

		$usuario = "root";
		$contraseña = "";

		try {
			$conexion = new PDO('mysql:host=localhost;dbname=recetillas', $usuario, $contraseña);
			$conexion -> exec("set names utf8");
			return $conexion;
			
		} catch (PDOException $e) {
			print "¡Error!: " . $e->getMessage() . "<br/>";
			die();
		}

	}

}