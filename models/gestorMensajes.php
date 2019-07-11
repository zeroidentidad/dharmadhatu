<?php

require_once "backend/models/conexion.php";

class MensajesModel{

	#REGISTRO MENSAJES
	#-----------------------------------------------------------

	public function registroMensajesModel($datos, $tabla){

		$obj = New Conexion();
		$stmt = $obj->conectar()->prepare("INSERT INTO $tabla (nombre, email, mensaje) VALUES (:nombre, :email, :mensaje)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":mensaje", $datos["mensaje"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}
		else{
			return "error";
		}

		$stmt->close();
	}

	#REGISTRO SUSCRIPTORES
	#-----------------------------------------------------------

	public function registroSuscriptoresModel($datos, $tabla){

		$obj = New Conexion();
		$stmt = $obj->conectar()->prepare("INSERT INTO $tabla (nombre, email) VALUES (:nombre, :email)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}
		else{
			return "error";
		}

		$stmt->close();
	}

	#VALIDAR SUSCRIPTOR EXISTENTE
	#-------------------------------------
	public function revisarSuscriptorModel($datosModel, $tabla){

		$obj = New Conexion();
		$stmt = $obj->conectar()->prepare("SELECT email FROM $tabla WHERE email = :email");
		
		$stmt->bindParam(":email", $datosModel, PDO::PARAM_STR);
		
		$stmt->execute();
		
		return $stmt->fetch();
		
		$stmt->close();
	}

}