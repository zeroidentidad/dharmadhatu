<?php

class GestorSlide {

	#SUBIR-MOSTRAR IMAGEN SLIDE AJAX
	#------------------------------------------------------------
	public function mostrarImagenController($datos){

		#getimagesize - Obtiene el tamaño de una imagen

		#LIST(): Al igual que array(), no es realmente una función, es un constructor de PHP. list() se utiliza para asignar una lista de variables en una sola operación.

		list($ancho, $alto) = getimagesize($datos["imagenTemporal"]);
		
		if($ancho < 1600 || $alto < 600){
			echo 0;
		}
		else{
			$aleatorio = mt_rand(100, 999);

			$ruta = "../../views/images/slide/slide".$aleatorio.".jpg";

			#imagecreatefromjpeg — Crea una nueva imagen a partir de un fichero o de una URL

			//$origen = imagecreatefromjpeg($datos["imagenTemporal"]);
			$origen = $this->getImage($datos["imagenTemporal"]);

			#imagecrop() — Recorta una imagen usando las coordenadas, el tamaño, x, y, ancho y alto dados

			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1600, "height"=>600]);

			#imagejpeg() — Exportar la imagen al navegador o a un fichero

            imagejpeg($destino, $ruta);
            
            chmod($ruta, 0777);

            $obj = new GestorSlideModel(); 
            $obj->subirImagenSlideModel($ruta, "slide");
            
            $ruta;

			$respuesta = $obj->mostrarImagenSlideModel($ruta, "slide");

			$enviarDatos = array("ruta"=>$respuesta["ruta"],
				                 "titulo"=>$respuesta["titulo"],
				                 "descripcion"=>$respuesta["descripcion"]);

			echo json_encode($enviarDatos);
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
		/*case 'image/bmp': $img = imagecreatefrombmp($path); break;
		case 'image/gif': $img = imagecreatefromgif($path); break;*/	
		default:
			$img = null; 
		}
		return $img;
	}	

	#MOSTRAR IMAGENES EN LA VISTA
	#------------------------------------------------------------
	public function mostrarImagenVistaController(){

        $obj = new GestorSlideModel();
		$respuesta = $obj->mostrarImagenVistaModel("slide");

		foreach($respuesta as $row => $item){
			echo '<li id="'.$item["id"].'" class="bloqueSlide"><span class="fa fa-times eliminarSlide" ruta="'.$item["ruta"].'"></span><img src="'.substr($item["ruta"], 6).'" class="handleImg"></li>';
		}

	}

	#MOSTRAR IMAGENES EN EL EDITOR
	#------------------------------------------------------------
	public function editorSlideController(){

        $obj = new GestorSlideModel();
		$respuesta = $obj->mostrarImagenVistaModel("slide");

		foreach($respuesta as $row => $item){
			echo '<li id="item'.$item["id"].'">
					<span class="fa fa-pencil editarSlide" style="background:blue"></span>
					<img src="'.substr($item["ruta"], 6).'" style="float:left; margin-bottom:10px" width="80%">
					<h1>'.$item["titulo"].'</h1>
					<p>'.$item["descripcion"].'</p>
				</li>';
		}

	}

	#ELIMINAR ITEM DEL SLIDE
	#-----------------------------------------------------------
	public function eliminarSlideController($datos){

        $obj = new GestorSlideModel();
		$respuesta = $obj->eliminarSlideModel($datos, "slide");

		unlink($datos["rutaSlide"]);

		echo $respuesta;
	}

	#ACTUALIZAR ITEM DEL SLIDE
	#-----------------------------------------------------------
	public function actualizarSlideController($datos){

        $obj = new GestorSlideModel(); 
		$obj->actualizarSlideModel($datos, "slide");
		$respuesta = $obj->seleccionarActualizacionSlideModel($datos, "slide");

		$enviarDatos = array("titulo"=>$respuesta["titulo"],
			                 "descripcion"=>$respuesta["descripcion"]);
		
		echo json_encode($enviarDatos);
	}

	#ACTUALIZAR ORDEN 
	#---------------------------------------------------
	public function actualizarOrdenController($datos){

        $obj = new GestorSlideModel(); 
		$obj->actualizarOrdenModel($datos, "slide");

		$respuesta = $obj->seleccionarOrdenModel("slide");

		foreach($respuesta as $row => $item){
			echo'<li id="item'.$item["id"].'">
			     <span class="fa fa-pencil editarSlide" style="background:blue"></span>
			     <img src="'.substr($item["ruta"], 6).'" style="float:left; margin-bottom:10px" width="80%">
			     <h1>'.$item["titulo"].'</h1>
			     <p>'.$item["descripcion"].'</p>
			     </li>';
		}

	}

}