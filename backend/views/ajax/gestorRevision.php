<?php

require_once "../../controllers/gestorMensajes.php";
require_once "../../models/gestorMensajes.php";

#CLASE Y MÉTODOS
#-------------------------------------------------------------
class Ajax{

	#REVISAR MENSAJES
	#----------------------------------------------------------
	public $revisionMensajes;

	public function gestorRevisionMensajesAjax(){

		$datos = $this->revisionMensajes;

        $obj =  new MensajesController();        
        $respuesta = $obj->mensajesRevisadosController($datos);

		echo $respuesta;

	}

}

#OBJETOS
#-----------------------------------------------------------
if(isset($_POST["revisionMensajes"])){
	$revMsg = new Ajax();
	$revMsg -> revisionMensajes = $_POST["revisionMensajes"];
	$revMsg -> gestorRevisionMensajesAjax();
}
