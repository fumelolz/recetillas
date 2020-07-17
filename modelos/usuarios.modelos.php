<?php 

require_once 'conexion.php';

class ModelosUsuarios{

	static public function mdlMostrarUsuarios($tabla,$columna,$valor){
			
		if ($columna != null) {
			$stmt = Conexion::conectar()->prepare("
				SELECT * 
				FROM $tabla
				WHERE $columna = :valor
				");

			$stmt -> bindParam(":valor",$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("
				SELECT * 
				FROM $tabla
				");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		$stmt = null;

	}

	static public function mdlMostrarUsuariosLogin($tabla,$columna,$valor){
			
		if ($columna != null) {
			$stmt = Conexion::conectar()->prepare("
				SELECT * 
				FROM $tabla
				WHERE $columna = :$columna
				");

			$stmt -> bindParam(":".$columna,$valor,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("
				SELECT * 
				FROM $tabla
				");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		$stmt = null;

	}

	static public function mdlCrearUsuario($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("  
				INSERT INTO $tabla(nombre,correo,password)
				VALUES(
				:nombre,
				:correo,
				:password)
			");

		$stmt -> bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
		$stmt -> bindParam(":correo",$datos["correo"],PDO::PARAM_STR);
		$stmt -> bindParam(":password",$datos["password"],PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		}else{
			return $stmt->errorInfo();
		}

		$stmt = null;
	}

}