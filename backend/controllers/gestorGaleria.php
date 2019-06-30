<?php

class GestorGaleria{

	#MOSTRAR IMAGEN GALERIA AJAX
	#------------------------------------------------------------
	public function mostrarImagenController($datos){

		list($ancho, $alto) = getimagesize($datos);

		if($ancho < 1024 || $alto < 768){
			echo 0;
		}
		else{
			$aleatorio = mt_rand(100, 999);

			$ruta = "../../views/images/galeria/galeria".$aleatorio.".jpg";

			$nuevo_ancho = 1024;
			$nuevo_alto = 768;

            //$origen = imagecreatefromjpeg($datos);
            $origen = $this->getImage($datos);

			#imagecreatetruecolor — Crear una nueva imagen de color verdadero
			$destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

			#imagecopyresized() - copia una porción de una imagen a otra imagen. 
			#bool -imagecopyresized( $destino, $origen, int $destino_x, int $destino_y, int $origen_x, int $origen_y, int $destino_w, int $destino_h, int $origen_w, int $origen_h)

			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);

            imagejpeg($destino, $ruta);
            
            chmod($ruta, 0777);

            $obj = new GestorGaleriaModel();
			$obj->subirImagenGaleriaModel($ruta, "galeria");

			$respuesta = $obj->mostrarImagenGaleriaModel($ruta, "galeria");

			echo $respuesta["ruta"];
		}

	}

	function getImage($path) {
		switch(mime_content_type($path)) {
		case 'image/png':
			$img = imagecreatefrompng($path);
			break;
		case 'image/jpeg':
			$img = imagecreatefromjpeg($path);
			break;
		default:
			$img = null; 
		}
		return $img;
	}	    

	#MOSTRAR IMAGENES EN LA VISTA
	#------------------------------------------------------------

	public function mostrarImagenVistaController(){

		$obj = new GestorGaleriaModel();
		$respuesta = $obj->mostrarImagenVistaModel("galeria");

		foreach($respuesta as $row => $item){

			echo '<li id="'.$item["id"].'" class="bloqueGaleria">
					<span class="fa fa-times eliminarFoto" ruta="'.$item["ruta"].'"></span>
					<a rel="grupo" href="'.substr($item["ruta"],6).'">
					<img src="'.substr($item["ruta"],6).'" class="handleImg">
					</a>
				</li>';
		}

	}

	#ELIMINAR ITEM DE LA GALERIA
	#-----------------------------------------------------------
	public function eliminarGaleriaController($datos){

		$obj = new GestorGaleriaModel();
		$respuesta = $obj->eliminarGaleriaModel($datos, "galeria");

		unlink($datos["rutaGaleria"]);

		echo $respuesta;
	}

	#ACTUALIZAR ORDEN 
	#---------------------------------------------------
	public function actualizarOrdenController($datos){

		$obj = new GestorGaleriaModel();
		$respuesta = $obj->actualizarOrdenModel($datos, "galeria");

		$respuesta = $obj->seleccionarOrdenModel("galeria");

		foreach($respuesta as $row => $item){

			echo '<li id="'.$item["id"].'" class="bloqueGaleria">
					<span class="fa fa-times eliminarFoto" ruta="'.$item["ruta"].'"></span>
					<a rel="grupo" href="'.substr($item["ruta"],6).'">
					<img src="'.substr($item["ruta"],6).'" class="handleImg">
					</a>
				 </li>';
		}

	}

}