<?php

class MensajesController{

	#MOSTRAR MENSAJES EN LA VISTA
	#------------------------------------------------------------
	public function mostrarMensajesController(){
        $obj = new MensajesModel();
        $respuesta = $obj->mostrarMensajesModel("mensajes");

		foreach ($respuesta as $row => $item){
			echo '<div class="well well-sm" id="'.$item["id"].'">
					<a href="index.php?action=mensajes&idBorrar='.$item["id"].'"><span class="fa fa-times pull-right"></span></a>
					<p>'.$item["fecha"].'</p>
					<h3>De: '.$item["nombre"].'</h3>
					<h5>Email: '.$item["email"].'</h5>
				  	<input type="text" class="form-control" value="'.$item["mensaje"].'" readonly>
				  	<br>
				  	<button class="btn btn-info btn-sm leerMensaje">Leer</button>
				  </div>';
		}

	}

	#BORRAR MENSAJES
	#------------------------------------------------------------
	public function borrarMensajesController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];

            $obj = new MensajesModel();
            $respuesta = $obj->borrarMensajesModel($datosController, "mensajes");

			if($respuesta == "ok"){
                echo'<script>
                        swal({
                            title: "Listo!",
                            text: "Mensaje borrado correctamente!",
                            type: "success",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        },
                        function(isConfirm){
                                if (isConfirm) {	   
                                    window.location = "mensajes";
                                } 
                        });
                    </script>';
			}

		}

	}

	#RESPONDER MENSAJES
	#------------------------------------------------------------
	public function responderMensajesController(){

		if(isset($_POST['enviarEmail'])){

			$email = $_POST['enviarEmail'];
			$nombre = $_POST['enviarNombre'];
			$titulo = $_POST['enviarTitulo'];
			$mensaje =$_POST['enviarMensaje'];

			$para = $email . ', ';
			$para .= 'jafs_92@yahoo.com';
			$título = 'Respuesta a su mensaje';
			$mensaje ='<html>
							<head>
								<title>Respuesta a su Mensaje</title>
							</head>
							<body>
								<h1>Hola '.$nombre.'</h1>
								<p>'.$mensaje.'</p>
								<hr>
								<p><b>Admin website.</b><br>
								Cunduacán, Tabasco</br>
								jafs_92@yahoo.com</p>

								<h3><a href="http://softcun.co.nf" target="blank">softcun.co.nf</a></h3>

								<a href="http://www.facebook.com" target="blank"><img src="https://www.shareicon.net/data/128x128/2015/09/23/106006_logo_512x512.png"></a> 
								<a href="http://www.youtube.com" target="blank"><img src="https://www.shareicon.net/data/128x128/2015/08/19/87450_video_256x256.png"></a> 
								<a href="http://www.twitter.com" target="blank"><img src="https://www.shareicon.net/data/128x128/2016/06/18/603684_twitter_512x512.png"></a> 
								<br>
							</body>

					   </html>';

		   $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		   $cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		   $cabeceras .= 'From: <jafs_92@yahoo.com>' . "\r\n";

		   $envio = mail($para, $título, $mensaje, $cabeceras);

		   if($envio){
		   		echo'<script>
						swal({
							  title: "Listo!",
							  text: "¡Mensaje enviado correctamente!",
							  type: "success",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
						},
						function(isConfirm){
								 if (isConfirm) {	   
								    window.location = "mensajes";
								  } 
						});
					</script>';
		   }

		}

	}

	#ENVIAR MENSAJES MASIVOS
	#------------------------------------------------------------
	public function mensajesMasivosController(){

		if(isset($_POST["tituloMasivo"])){

            $obj = new MensajesModel();
            $respuesta = $obj->seleccionarEmailSuscriptores("suscriptores");
			foreach ($respuesta as $row => $item) {
				$titulo = $_POST['tituloMasivo'];
				$mensaje =$_POST['mensajeMasivo'];
				$título = 'Mensaje para todos';
				$para = $item["email"]; 
				$mensaje ='<html>
								<head>
									<title>Respuesta a su Mensaje</title>
								</head>
								<body>
									<h1>Hola '.$item["nombre"].'</h1>
									<p>'.$mensaje.'</p>
									<hr>
									<p><b>Admin website.</b><br>
									Cunduacán, Tabasco</br>
									jafs_92@yahoo.com</p>

									<h3><a href="http://softcun.co.nf" target="blank">softcun.co.nf</a></h3>

									<a href="http://www.facebook.com" target="blank"><img src="https://www.shareicon.net/data/128x128/2015/09/23/106006_logo_512x512.png"></a> 
									<a href="http://www.youtube.com" target="blank"><img src="https://www.shareicon.net/data/128x128/2015/08/19/87450_video_256x256.png"></a> 
									<a href="http://www.twitter.com" target="blank"><img src="https://www.shareicon.net/data/128x128/2016/06/18/603684_twitter_512x512.png"></a> 
									<br>
								</body>

						   </html>';

			   $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			   $cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
			   $cabeceras .= 'From: <jafs_92@yahoo.com>' . "\r\n";

			   $envio = mail($para, $título, $mensaje, $cabeceras);

			   if($envio){
			   		echo'<script>
							swal({
								  title: "¡OK!",
								  text: "¡Mensaje enviado correctamente!",
								  type: "success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},
							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = "mensajes";
									  } 
							});
						</script>';
			   }

			}

		}

	}

}