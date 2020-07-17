<?php 

require_once 'conexion.php';

class ModelosRecetas{

	static public function mdlMostrarRecetas($tabla,$columna,$valor){
			
		if ($columna != null) {
			$stmt = Conexion::conectar()->prepare("
				SELECT * 
				FROM $tabla
				WHERE $columna = :$columna
				");

			$stmt -> bindParam(":".$columna,$valor,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch(PDO::FETCH_ASSOC);
		}else{
			$stmt = Conexion::conectar()->prepare("
				SELECT * 
				FROM $tabla
				");

			$stmt -> execute();

			return $stmt -> fetchAll(PDO::FETCH_ASSOC);
		}

		$stmt = null;

	}

	static public function mdlMostrarCategorias($tabla,$columna,$valor){
			
		if ($valor != null) {
			$stmt = Conexion::conectar()->prepare("
				SELECT * 
				FROM $tabla
				WHERE $columna = :$columna
				");

			$stmt -> bindParam(":".$columna,$valor,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch(PDO::FETCH_ASSOC);
		}else{
			$stmt = Conexion::conectar()->prepare("
				SELECT * 
				FROM $tabla
				");

			$stmt -> execute();

			return $stmt -> fetchAll(PDO::FETCH_ASSOC);
		}

		$stmt = null;

	}

	static public function mdlMostrarIngredientes($tabla,$columna,$valor){
			
		if ($valor != null) {
			$stmt = Conexion::conectar()->prepare("
				SELECT * 
				FROM $tabla
				WHERE $columna = :$columna
				");

			$stmt -> bindParam(":".$columna,$valor,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll(PDO::FETCH_ASSOC);
		}else{
			$stmt = Conexion::conectar()->prepare("
				SELECT * 
				FROM $tabla
				");

			$stmt -> execute();

			return $stmt -> fetchAll(PDO::FETCH_ASSOC);
		}

		$stmt = null;

	}

	static public function mdlCrearReceta($tabla,$datos){

		$pdo = Conexion::conectar();

		$stmt = $pdo->prepare("  
			INSERT INTO $tabla(id_categoria,titulo,receta,ruta_imagen,id_usuario)
			VALUES (:id_categoria,:titulo,:receta,:ruta_imagen,:id_usuario)
			");

		$stmt -> bindParam(":id_categoria",$datos["id_categoria"],PDO::PARAM_INT);
		$stmt -> bindParam(":id_usuario",$datos["id_usuario"],PDO::PARAM_INT);
		$stmt -> bindParam(":titulo",$datos["titulo"],PDO::PARAM_STR);
		$stmt -> bindParam(":ruta_imagen",$datos["ruta_imagen"],PDO::PARAM_STR);
		$stmt -> bindParam(":receta",$datos["receta"],PDO::PARAM_STR);

		if ($stmt->execute()) {
			return $pdo->lastInsertId();
		}else{
			return $stmt -> errorInfo();
		}

		$stmt = null;

	}

	static public function mdlCrearIngrediente($tabla,$id_receta,$descripcion){

		$pdo = Conexion::conectar();

		$stmt = $pdo->prepare("  
			INSERT INTO $tabla(id_receta,descripcion)
			VALUES (:id_receta,:descripcion)
			");

		$stmt -> bindParam(":id_receta",$id_receta,PDO::PARAM_INT);
		$stmt -> bindParam(":descripcion",$descripcion,PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		}else{
			return $stmt -> errorInfo();
		}

		$stmt = null;

	}

}