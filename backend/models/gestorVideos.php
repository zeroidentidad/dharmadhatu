<?php

require_once "conexion.php";

class GestorVideosModel{

	#SUBIR LA RUTA DEL VIDEO
	#------------------------------------------------------------	
	public function subirVideoModel($datos, $tabla){

		$obj = new Conexion();
		$stmt = $obj->conectar()->prepare("INSERT INTO $tabla (ruta) VALUES (:ruta)");

		$stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}
		else{
			return "error";
		}

		$stmt->close();
	}

	#SELECCIONAR LA RUTA DEL VIDEO
	#------------------------------------------------------------
	public function mostrarVideoModel($datos, $tabla){

		$obj = new Conexion();
		$stmt = $obj->conectar()->prepare("SELECT ruta FROM $tabla WHERE ruta = :ruta");

		$stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();
	}

	#MOSTRAR EL VIDEO EN LA VISTA
	#---------------------------------------------------------
	public function mostrarVideoVistaModel($tabla){

		$obj = new Conexion();
		$stmt = $obj->conectar()->prepare("SELECT id, ruta FROM $tabla ORDER BY orden ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();	
	}

	#ELIMINAR VIDEO
	#-----------------------------------------------------------
	public function eliminarVideoModel($datos, $tabla){

		$obj = new Conexion();
		$stmt = $obj->conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos["idVideo"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "ok";
		}
		else{
			return "error";
		}

		$stmt->close();
	}

	#ACTUALIZAR ORDEN 
	#---------------------------------------------------

	public function actualizarOrdenModel($datos, $tabla){

		$obj = new Conexion();
		$stmt = $obj->conectar()->prepare("UPDATE $tabla SET orden = :orden WHERE id = :id");

		$stmt -> bindParam(":orden", $datos["ordenItem"], PDO::PARAM_INT);
		$stmt -> bindParam(":id", $datos["ordenVideo"], PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}
		else{
			return "error";
		}

		$stmt -> close();
	}

	#SELECCIONAR ORDEN 
	#---------------------------------------------------

	public function seleccionarOrdenModel($tabla){

		$obj = new Conexion();
		$stmt = $obj->conectar()->prepare("SELECT id, ruta FROM $tabla ORDER BY orden ASC");

		$stmt -> execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

}