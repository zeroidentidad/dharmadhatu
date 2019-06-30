<?php

require_once "../../models/gestorGaleria.php";
require_once "../../controllers/gestorGaleria.php";

#CLASE Y MÉTODOS
#-------------------------------------------------------------
class Ajax{

	#SUBIR LA IMAGEN DE LA GALERIA
	#----------------------------------------------------------
	public $imagenTemporal;

	public function gestorGaleriaAjax(){

		$datos = $this->imagenTemporal;

		$obj = new GestorGaleria();
		$respuesta = $obj->mostrarImagenController($datos);

		echo $respuesta;
	}

	#ELIMINAR ITEM GALERIA
	#----------------------------------------------------------

	public $idGaleria;
	public $rutaGaleria;

	public function eliminarGaleriaAjax(){

		$datos = array("idGaleria" => $this->idGaleria, 
					   "rutaGaleria" => $this->rutaGaleria);

		$obj = new GestorGaleria();
		$respuesta = $obj->eliminarGaleriaController($datos);

		echo $respuesta;
	}

	#ACTUALIZAR ORDEN
	#---------------------------------------------
	public $actualizarOrdenGaleria;
	public $actualizarOrdenItem;

	public function actualizarOrdenAjax(){
	
		$datos = array("ordenGaleria" => $this->actualizarOrdenGaleria,
			           "ordenItem" => $this->actualizarOrdenItem);

		$obj = new GestorGaleria();
		$respuesta = $obj->actualizarOrdenController($datos);

		echo $respuesta;
	}

}

#OBJETOS
#-----------------------------------------------------------
if(isset($_FILES["imagen"]["tmp_name"])){
	$subir = new Ajax();
	$subir -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
	$subir -> gestorGaleriaAjax();
}

if(isset($_POST["idGaleria"])){
	$borrar = new Ajax();
	$borrar -> idGaleria = $_POST["idGaleria"];
	$borrar -> rutaGaleria = $_POST["rutaGaleria"];
	$borrar -> eliminarGaleriaAjax();	
}

if(isset($_POST["actualizarOrdenGaleria"])){
	$actualizar = new Ajax();
	$actualizar -> actualizarOrdenGaleria = $_POST["actualizarOrdenGaleria"];
	$actualizar -> actualizarOrdenItem = $_POST["actualizarOrdenItem"];
	$actualizar -> actualizarOrdenAjax();
}