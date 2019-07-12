<?php

require_once "conexion.php";

class MensajesModel{

	#MOSTRAR MENSAJES EN LA VISTA
	#------------------------------------------------------------
	public function mostrarMensajesModel($tabla){
        $obj = new Conexion();
		$stmt = $obj->conectar()->prepare("SELECT id, nombre, email, mensaje, fecha FROM $tabla ORDER BY fecha DESC"); 

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}

	#BORRAR MENSAJES
	#-----------------------------------------------------
	public function borrarMensajesModel($datosModel, $tabla){
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

	#ENVIAR EMAIL MASIVOS
	#-------------------------------------------------
	public function seleccionarEmailSuscriptores($tabla){
        $obj = new Conexion();
		$stmt = $obj->conectar()->prepare("SELECT nombre, email FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}

}