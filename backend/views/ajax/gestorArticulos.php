<?php
require_once "../../controllers/gestorArticulos.php";
require_once "../../models/gestorArticulos.php";

#CLASE Y MÉTODOS
#-------------------------------------------------------------
class Ajax{

	#SUBIR LA IMAGEN DEL ARTICULO
	#----------------------------------------------------------
	public $imagenTemporal;

	public function gestorArticulosAjax(){

        $datos = $this->imagenTemporal;
        $obj = new GestorArticulos();
		$respuesta = $obj->mostrarImagenController($datos);

		echo $respuesta;
	}

	#ACTUALIZAR ORDEN
	#---------------------------------------------
	public $actualizarOrdenArticulos;
	public $actualizarOrdenItem;

	public function actualizarOrdenAjax(){	

		$datos = array("ordenArticulos" => $this->actualizarOrdenArticulos,
			           "ordenItem" => $this->actualizarOrdenItem);
        $obj = new GestorArticulos();
		$respuesta = $obj->actualizarOrdenController($datos);

		echo $respuesta;
	}

}

#OBJETOS
#-----------------------------------------------------------
if(isset($_FILES["imagen"]["tmp_name"])){
	$subir = new Ajax();
	$subir -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
	$subir -> gestorArticulosAjax();
}

if(isset($_POST["actualizarOrdenArticulos"])){
	$actualizarOrd = new Ajax();
	$actualizarOrd -> actualizarOrdenArticulos = $_POST["actualizarOrdenArticulos"];
	$actualizarOrd -> actualizarOrdenItem = $_POST["actualizarOrdenItem"];
	$actualizarOrd -> actualizarOrdenAjax();
}