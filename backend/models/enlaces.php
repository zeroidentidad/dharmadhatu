<?php

class EnlacesModels{

	public function enlacesModel($enlaces){

		$arr_enlaces = array(
			"inicio","ingreso","slide","articulos","galeria","videos","suscriptores","mensajes","perfil","salir"
		);

		if(in_array($enlaces, $arr_enlaces)){
			$module = "views/modules/".$enlaces.".php";
		}	
		else if($enlaces == "index"){
			$module = "views/modules/ingreso.php";
		}
		else{
			$module = "views/modules/ingreso.php";		
		}

		return $module;

	}


}