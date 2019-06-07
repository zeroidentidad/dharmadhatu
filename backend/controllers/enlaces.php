<?php

class Enlaces{

	public function enlacesController(){

		if(isset($_GET["action"])){
			$enlaces = $_GET["action"];
		}
		else{
			$enlaces = "index";
		}

		$obj = new EnlacesModels();
		$respuesta = $obj->enlacesModel($enlaces);

		include $respuesta;
	}

}