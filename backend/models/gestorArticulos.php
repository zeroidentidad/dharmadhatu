<?php

require_once "conexion.php";

class GestorArticulosModel{

	#GUARDAR ARTICULO
	#------------------------------------------------------------

	public function guardarArticuloModel($datosModel, $tabla){

		$obj = new Conexion();
		$stmt = $obj->conectar()->prepare("INSERT INTO $tabla (titulo, introduccion, ruta, contenido) VALUES (:titulo, :introduccion, :ruta, :contenido)");

		$stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":introduccion", $datosModel["introduccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
		$stmt -> bindParam(":contenido", $datosModel["contenido"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}
		else{
			return "error";
		}

		$stmt->close();
	}

	#MOSTRAR ARTÍCULOS
	#------------------------------------------------------
	public function mostrarArticulosModel($tabla){

		$obj = new Conexion();
		$stmt = $obj->conectar()->prepare("SELECT id, titulo, introduccion, ruta, contenido FROM $tabla ORDER BY orden ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}

	#BORRAR ARTICULOS
	#-----------------------------------------------------
	public function borrarArticuloModel($datosModel, $tabla){

		$obj = new Conexion();
		$stmt = $obj->conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){
			return "ok";
		}
		else{
			return "error";
		}

		$stmt->close();
	}

	#ACTUALIZAR ARTICULOS
	#---------------------------------------------------
	public function editarArticuloModel($datosModel, $tabla){

		$obj = new Conexion();
		$stmt = $obj->conectar()->prepare("UPDATE $tabla SET titulo = :titulo, introduccion = :introduccion, ruta = :ruta, contenido = :contenido WHERE id = :id");	

		$stmt -> bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":introduccion", $datosModel["introduccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $datosModel["ruta"], PDO::PARAM_STR);
		$stmt -> bindParam(":contenido", $datosModel["contenido"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

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

		$stmt -> bindParam(":orden", $datos["ordenItem"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["ordenArticulos"], PDO::PARAM_INT);

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
		$stmt = $obj->conectar()->prepare("SELECT id, titulo, introduccion, ruta, contenido FROM $tabla ORDER BY orden ASC");

		$stmt -> execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

}