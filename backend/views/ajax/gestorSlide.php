<?php

require_once "../../models/gestorSlide.php";
require_once "../../controllers/gestorSlide.php";

/* Aqui se reciben las peticiones Ajax de JS con jQuery*/
#CLASE Y MÉTODOS
#-------------------------------------------------------------
class Ajax{

	#SUBIR LA IMAGEN DEL SLIDE
	#----------------------------------------------------------
	public $nombreImagen;
	public $imagenTemporal;

	public function gestorSlideAjax(){

		$datos = array("nombreImagen"=>$this->nombreImagen,
			"imagenTemporal"=>$this->imagenTemporal);

        $obj = new GestorSlide();
		$respuesta = $obj->mostrarImagenController($datos);

		echo $respuesta;
	}

	#ELIMINAR ITEM SLIDE
	#----------------------------------------------------------
	public $idSlide;
	public $rutaSlide;

	public function eliminarSlideAjax(){

		$datos = array("idSlide" => $this->idSlide, 
			"rutaSlide" => $this->rutaSlide);

        $obj = new GestorSlide();
		$respuesta = $obj->eliminarSlideController($datos);

		echo $respuesta;
	}

	#ACTUALIZAR ITEM SLIDE
	#----------------------------------------------------------
	public $enviarId;
	public $enviarTitulo;
	public $enviarDescripcion;

	public function actualizarSlideAjax(){

		$datos = array("enviarId" => $this->enviarId, 
			"enviarTitulo" => $this->enviarTitulo,
			"enviarDescripcion" => $this->enviarDescripcion);

        $obj = new GestorSlide();
		$respuesta = $obj->actualizarSlideController($datos);

		echo $respuesta;
	}

	#ACTUALIZAR ORDEN
	#---------------------------------------------
	public $actualizarOrdenSlide;
	public $actualizarOrdenItem;

	public function actualizarOrdenAjax(){

		$datos = array("ordenSlide" => $this->actualizarOrdenSlide,
			"ordenItem" => $this->actualizarOrdenItem);

        $obj = new GestorSlide();
		$respuesta = $obj->actualizarOrdenController($datos);

		echo $respuesta;
	}

}

#OBJETOS DE LA IMAGEN
#-----------------------------------------------------------
if(isset($_FILES["imagen"]["name"])){
	$subir = new Ajax();
	$subir -> nombreImagen = $_FILES["imagen"]["name"];
	$subir -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
	$subir -> gestorSlideAjax();
}

if(isset($_POST["idSlide"])){
	$borrar = new Ajax();
	$borrar -> idSlide = $_POST["idSlide"];
	$borrar -> rutaSlide = $_POST["rutaSlide"];
	$borrar -> eliminarSlideAjax();	
}

if(isset($_POST["enviarId"])){
	$actualizar = new Ajax();
	$actualizar -> enviarId = $_POST["enviarId"];
	$actualizar -> enviarTitulo = $_POST["enviarTitulo"];
	$actualizar -> enviarDescripcion = $_POST["enviarDescripcion"];
	$actualizar -> actualizarSlideAjax();	
}

if(isset($_POST["actualizarOrdenSlide"])){
	$actualizarOrd = new Ajax();
	$actualizarOrd -> actualizarOrdenSlide = $_POST["actualizarOrdenSlide"];
	$actualizarOrd -> actualizarOrdenItem = $_POST["actualizarOrdenItem"];
	$actualizarOrd -> actualizarOrdenAjax();
}
