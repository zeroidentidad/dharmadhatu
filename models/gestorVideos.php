<?php

require_once "backend/models/conexion.php";

class VideosModels{

	public function seleccionarVideosModel($tabla){

		$obj = new Conexion();
		$stmt = $obj->conectar()->prepare("SELECT ruta FROM $tabla ORDER BY orden ASC");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

}