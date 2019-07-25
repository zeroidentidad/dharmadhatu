<?php
require_once "../../controllers/gestorMensajes.php";
require_once "../../models/gestorMensajes.php";

require_once "../../controllers/gestorSuscriptores.php";
require_once "../../models/gestorSuscriptores.php";

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

	#REVISAR SUSCRIPTORES
	#----------------------------------------------------------

	public $revisionSuscriptores;

	public function gestorRevisionSuscriptoresAjax(){

		$datos = $this->revisionSuscriptores;

		$obj =  new SuscriptoresController();
		$respuesta = $obj->suscriptoresRevisadosController($datos);

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

if(isset($_POST["revisionSuscriptores"])){
	$revSubs = new Ajax();
	$revSubs -> revisionSuscriptores = $_POST["revisionSuscriptores"];
	$revSubs -> gestorRevisionSuscriptoresAjax();
}
