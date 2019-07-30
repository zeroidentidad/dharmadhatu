<?php

require_once "conexion.php";

class SuscriptoresModel{

	#MOSTRAR SUSCRIPTORES EN LA VISTA
	#------------------------------------------------------------
	public function mostrarSuscriptoresModel($tabla){

        $obj = new Conexion();
        $stmt = $obj->conectar()->prepare("SELECT id, nombre, email FROM $tabla");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

	#BORRAR SUSCRIPTORES
	#-----------------------------------------------------
	public function borrarSuscriptoresModel($datosModel, $tabla){

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

	#SELECCIONAR SUSCRIPTORES SIN REVISAR
	#------------------------------------------------------------
	public function suscriptoresSinRevisarModel($tabla){
	
		$obj = new Conexion();
        $stmt = $obj->conectar()->prepare("SELECT revision FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}

	#SUSCRIPTORES REVISADOS
	#------------------------------------------------------------
	public function suscriptoresRevisadosModel($datosModel, $tabla){

		$obj = new Conexion();
        $stmt = $obj->conectar()->prepare("UPDATE $tabla SET revision = :revision");

		$stmt->bindParam(":revision", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){
			return "ok";
		}
		else{
			return "error";
		}

		$stmt->close();
	}
}


