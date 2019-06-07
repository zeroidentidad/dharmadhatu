<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=dharmadhatu","remoto","x1234567");
		return $link;

	}

}