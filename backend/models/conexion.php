<?php

class Conexion{

	public function conectar(){
	
		try {
		$link = new PDO("mysql:host=localhost;dbname=dharmadhatu","remoto","x1234567");
		return $link;
		}
		catch (PDOException $e){
		echo $e->getMessage();
		}		

	}

}

?>