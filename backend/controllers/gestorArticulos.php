<?php

class GestorArticulos{

	#MOSTRAR IMAGEN ARTÍCULO
	#------------------------------------------------------------
	public function mostrarImagenController($datos){

		list($ancho, $alto) = getimagesize($datos);

		if($ancho < 800 || $alto < 400){
			echo 0;
		}
		else{
			$aleatorio = mt_rand(100, 999);
			$ruta = "../../views/images/articulos/temp/articulo".$aleatorio.".jpg";
			//$origen = imagecreatefromjpeg($datos);
			$origen = $this->getImage($datos);
			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);
			imagejpeg($destino, $ruta);
			chmod($ruta, 0777);

			echo $ruta;
		}

	}

	#GUARDAR ARTICULO
	#-----------------------------------------------------------
	public function guardarArticuloController(){

		if(isset($_POST["tituloArticulo"])){

			$imagen = $_FILES["imagen"]["tmp_name"];
			$borrar = glob("views/images/articulos/temp/*");

			foreach($borrar as $file){
				unlink($file);
			}

			$aleatorio = mt_rand(100, 999);
			$ruta = "views/images/articulos/articulo".$aleatorio.".jpg";
			//$origen = imagecreatefromjpeg($imagen);
			$origen = $this->getImage($imagen);

			$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);

			imagejpeg($destino, $ruta);
			chmod($ruta, 0777);

			$datosController = array("titulo"=>$_POST["tituloArticulo"],
				                     "introduccion"=>$_POST["introArticulo"]."...",
			 	                      "ruta"=>$ruta,
			 	                      "contenido"=>$_POST["contenidoArticulo"]);
			$obj = new GestorArticulosModel();
			$respuesta = $obj->guardarArticuloModel($datosController, "articulos");

			if($respuesta == "ok"){
				echo'<script>
						swal({
							title: "Correcto!",
							text: "¡El artículo ha sido creado correctamente!",
							type: "success",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						},
						function(isConfirm){
								if (isConfirm) {	   
									window.location = "articulos";
								} 
						});
					</script>';
			}
			else{
				echo $respuesta;
			}

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

	#MOSTRAR ARTICULOS
	#-----------------------------------------------------------
	public function mostrarArticulosController(){
		$obj = new GestorArticulosModel();
		$respuesta = $obj->mostrarArticulosModel("articulos");		

		foreach($respuesta as $row => $item) {

			echo '<li id="'.$item["id"].'" class="bloqueArticulo">
					<span class="handleArticle">
					<a href="index.php?action=articulos&idBorrar='.$item["id"].'&rutaImagen='.$item["ruta"].'">
						<i class="fa fa-times btn btn-danger"></i>
					</a>
					<i class="fa fa-pencil btn btn-primary editarArticulo"></i>	
					</span>
					<img src="'.$item["ruta"].'" class="img-thumbnail">
					<h1>'.$item["titulo"].'</h1>
					<p>'.$item["introduccion"].'</p>
					<input type="hidden" value="'.$item["contenido"].'">
					<a href="#articulo'.$item["id"].'" data-toggle="modal">
					<button class="btn btn-default">Leer más</button>
					</a>

					<hr>

				</li>

				<div id="articulo'.$item["id"].'" class="modal fade">

					<div class="modal-dialog modal-content">

						<div class="modal-header" style="border:1px solid #eee">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						 <h3 class="modal-title">'.$item["titulo"].'</h3>
						</div>

						<div class="modal-body" style="border:1px solid #eee">
							<img src="'.$item["ruta"].'" width="100%" style="margin-bottom:20px">
							<p class="parrafoContenido">'.$item["contenido"].'</p>
						</div>

						<div class="modal-footer" style="border:1px solid #eee">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>

					</div>

				</div>';
		}

	}

	#BORRAR ARTICULO
	#------------------------------------
	public function borrarArticuloController(){

		if(isset($_GET["idBorrar"])){

			unlink($_GET["rutaImagen"]);

			$datosController = $_GET["idBorrar"];
			$obj = new GestorArticulosModel();
			$respuesta = $obj->borrarArticuloModel($datosController, "articulos");

			if($respuesta == "ok"){
					echo'<script>
							swal({
								title: "Listo!",
								text: "¡El artículo se ha borrado!",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
							},
							function(isConfirm){
									if (isConfirm) {	   
										window.location = "articulos";
									} 
							});
						</script>';
			}
		}

	}

	#ACTUALIZAR ARTICULO
	#-----------------------------------------------------------
	public function editarArticuloController(){

		$ruta = "";

		if(isset($_POST["editarTitulo"])){

			if(isset($_FILES["editarImagen"]["tmp_name"])){	

				$imagen = $_FILES["editarImagen"]["tmp_name"];

				$aleatorio = mt_rand(100, 999);

				$ruta = "views/images/articulos/articulo".$aleatorio.".jpg";

				//$origen = imagecreatefromjpeg($imagen);
				$origen = $this->getImage($imagen);

				$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>800, "height"=>400]);

				imagejpeg($destino, $ruta);
				chmod($ruta, 0777);

				$borrar = glob("views/images/articulos/temp/*");

				foreach($borrar as $file){
					unlink($file);
				}

			}
			if($ruta == ""){
				$ruta = $_POST["fotoAntigua"];
			}
			else{
				unlink($_POST["fotoAntigua"]);
			}

			$datosController = array("id"=>$_POST["id"],
			                         "titulo"=>$_POST["editarTitulo"],
								     "introduccion"=>$_POST["editarIntroduccion"],
								     "ruta"=>$ruta,
								     "contenido"=>$_POST["editarContenido"]);
			$obj = new GestorArticulosModel();
			$respuesta = $obj->editarArticuloModel($datosController, "articulos");

			if($respuesta == "ok"){

				echo'<script>
						swal({
							title: "Listo!",
							text: "¡El artículo ha sido actualizado!",
							type: "success",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						},
						function(isConfirm){
								if (isConfirm) {	   
									window.location = "articulos";
								} 
						});
					</script>';
			}
			else{
				echo $respuesta;
			}

		}

	}

	#ACTUALIZAR ORDEN 
	#---------------------------------------------------
	public function actualizarOrdenController($datos){
		$obj = new GestorArticulosModel();
		$obj->actualizarOrdenModel($datos, "articulos");
		$respuesta = $obj->seleccionarOrdenModel("articulos");

		foreach($respuesta as $row => $item){

			echo '<li id="'.$item["id"].'" class="bloqueArticulo">
					<span class="handleArticle">
					<a href="index.php?action=articulos&idBorrar='.$item["id"].'&rutaImagen='.$item["ruta"].'">
						<i class="fa fa-times btn btn-danger"></i>
					</a>
					<i class="fa fa-pencil btn btn-primary editarArticulo"></i>	
					</span>
					<img src="'.$item["ruta"].'" class="img-thumbnail">
					<h1>'.$item["titulo"].'</h1>
					<p>'.$item["introduccion"].'</p>
					<input type="hidden" value="'.$item["contenido"].'">
					<a href="#articulo'.$item["id"].'" data-toggle="modal">
					<button class="btn btn-default">Leer Más</button>
					</a>

					<hr>
				 </li>

				<div id="articulo'.$item["id"].'" class="modal fade">

					<div class="modal-dialog modal-content">

						<div class="modal-header" style="border:1px solid #eee">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h3 class="modal-title">'.$item["titulo"].'</h3>
						</div>

						<div class="modal-body" style="border:1px solid #eee">
							<img src="'.$item["ruta"].'" width="100%" style="margin-bottom:20px">
							<p class="parrafoContenido">'.$item["contenido"].'</p>
						</div>

						<div class="modal-footer" style="border:1px solid #eee">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>

					</div>

				</div>';
		}

	}
	
}