<?php

require_once "backend/models/conexion.php";

class SlideModels{

	public function seleccionarSlideModel($tabla){

        $obj = new Conexion();
		$stmt = $obj->conectar()->prepare("SELECT ruta, titulo, descripcion FROM $tabla ORDER BY orden ASC");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

}