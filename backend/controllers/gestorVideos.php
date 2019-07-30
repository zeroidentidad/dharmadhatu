<?php

class GestorVideos{

	#MOSTRAR VIDEO AJAX
	#------------------------------------------------------------

	public function mostrarVideoController($datos){

		$aleatorio = mt_rand(100, 999);

		$ruta = "../../views/videos/video".$aleatorio.".mp4";

        move_uploaded_file($datos, $ruta);
        
        chmod($ruta, 0777);

        $obj = new GestorVideosModel();
		$obj->subirVideoModel($ruta, "videos");

		$respuesta = $obj->mostrarVideoModel($ruta, "videos");

		$enviarDatos = $respuesta["ruta"];

		echo $enviarDatos;
	}

	#MOSTRAR VIDEOS EN LA VISTA
	#------------------------------------------------------------
	public function mostrarVideoVistaController(){

        $obj = new GestorVideosModel();
		$respuesta = $obj->mostrarVideoVistaModel("videos");

		foreach($respuesta as $row => $item){

			echo '<li id="'.$item["id"].'" class="bloqueVideo">
					<span class="fa fa-times eliminarVideo" ruta="'.$item["ruta"].'"></span>
					<video controls class="handleVideo">
						<source src="'.substr($item["ruta"],6).'" type="video/mp4">
					</video>	
				 </li>';
		}

	}

	#ELIMINAR VIDEO
	#-----------------------------------------------------------
	public function eliminarVideoController($datos){

        $obj = new GestorVideosModel();
		$respuesta = $obj->eliminarVideoModel($datos, "videos");

		unlink($datos["rutaVideo"]);

		echo $respuesta;
	}

	#ACTUALIZAR ORDEN 
	#---------------------------------------------------
	public function actualizarOrdenController($datos){

        $obj = new GestorVideosModel();
        $obj->actualizarOrdenModel($datos, "videos");

		$respuesta = $obj->seleccionarOrdenModel("videos");

		foreach($respuesta as $row => $item){

			echo '<li id="'.$item["id"].'" class="bloqueVideo">
					<span class="fa fa-times eliminarVideo" ruta="'.$item["ruta"].'"></span>
					<video controls class="handleVideo">
						<source src="'.substr($item["ruta"],6).'" type="video/mp4">
					</video>	
				 </li>';
		}

	}

}