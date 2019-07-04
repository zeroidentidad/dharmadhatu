<?php

require_once "../../models/gestorVideos.php";
require_once "../../controllers/gestorVideos.php";

#CLASE Y MÉTODOS
#-------------------------------------------------------------

class Ajax{

	#SUBIR EL VIDEO
	#----------------------------------------------------------
	public $videoTemporal;

	public function gestorVideoAjax(){

		$datos = $this->videoTemporal;

        $obj = new GestorVideos();
        $respuesta = $obj->mostrarVideoController($datos);

		echo $respuesta;
	}

	#ELIMINAR ITEM VIDEO
	#----------------------------------------------------------
	public $idVideo;
	public $rutaVideo;

	public function eliminarVideoAjax(){

		$datos = array("idVideo" => $this->idVideo, 
			           "rutaVideo" => $this->rutaVideo);	

        $obj = new GestorVideos();
        $respuesta = $obj->eliminarVideoController($datos);

		echo $respuesta;
	}

	#ACTUALIZAR ORDEN
	#---------------------------------------------
	public $actualizarOrdenVideo;
	public $actualizarOrdenItem;

	public function actualizarOrdenAjax(){

		$datos = array("ordenVideo" => $this->actualizarOrdenVideo,
			           "ordenItem" => $this->actualizarOrdenItem);

        $obj = new GestorVideos();
        $respuesta = $obj->actualizarOrdenController($datos);

		echo $respuesta;
	}

}

#OBJETOS
#-----------------------------------------------------------
if(isset($_FILES["video"]["tmp_name"])){
	$subir = new Ajax();
	$subir -> videoTemporal = $_FILES["video"]["tmp_name"];
	$subir -> gestorVideoAjax();
}

if(isset($_POST["idVideo"])){
	$borrar = new Ajax();
	$borrar -> idVideo = $_POST["idVideo"];
	$borrar -> rutaVideo = $_POST["rutaVideo"];
	$borrar -> eliminarVideoAjax();	
}

if(isset($_POST["actualizarOrdenVideo"])){
	$actualizar = new Ajax();
	$actualizar -> actualizarOrdenVideo = $_POST["actualizarOrdenVideo"];
	$actualizar -> actualizarOrdenItem = $_POST["actualizarOrdenItem"];
	$actualizar -> actualizarOrdenAjax();
}