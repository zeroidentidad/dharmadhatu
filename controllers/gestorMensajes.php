<?php

class MensajesController{

	public function registroMensajesController(){

		if(isset($_POST["nombre"])){

			if(preg_match('/^[a-zA-Z\s]+$/', $_POST["nombre"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"]) &&
			   preg_match('/^[a-zA-Z0-9\s\.,]+$/', $_POST["mensaje"])){

			   	#ENVIAR EL CORREO ELECTRÓNICO
			   	#------------------------------------------------------
			   	#mail(Correo destino, asunto del mensaje, mensaje, cabecera del correo);
				$correoDestino = "jafs_92@yahoo.com.mx";
				$asunto = "Mensaje del website";
				$mensaje = "Nombre: ".$_POST["nombre"]."\n"."\n".
						   "Email: ".$_POST["email"]."\n"."\n".
                           "Mensaje: ".$_POST["mensaje"]."\n";

                $cabecera = "From: Sitio web" . "\r\n" .
                "CC: ".$_POST['email'];

			   	$envio = mail($correoDestino, $asunto, $mensaje, $cabecera);

			   	$datosController = array("nombre"=>$_POST["nombre"],
										 "email"=>$_POST["email"],
										 "mensaje"=>$_POST["mensaje"]);

			   	#ALMACENAR EN BASE DE DATOS EL SUSCRIPTOR
			   	#-------------------------------------------------------
                $datosSuscriptor = $_POST["email"];
                $obj = new MensajesModel();   
			   	$revisarSuscriptor = $obj->revisarSuscriptorModel($datosSuscriptor, "suscriptores");

			   	if(count($revisarSuscriptor["email"]) == 0){
			   		$obj->registroSuscriptoresModel($datosController, "suscriptores");
			   	}
 
			   	#ALMACENAR EN BASE DE DATOS EL MENSAJE
			   	#-------------------------------------------------------  
			   $respuesta = $obj->registroMensajesModel($datosController, "mensajes");	

			   if($envio == true && $respuesta == "ok"){
				echo'<script>
						swal({
							  title: "Listo!",
							  text: "Mensaje enviado correctamente!",
							  type: "success",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
						},
						function(isConfirm){
								 if (isConfirm) {	   
								    window.location = "index.php";
								  } 
						});
					</script>';
				}

			}
			else{
				echo '<div class="alert alert-danger">No se puede enviar mensaje, no se permiten caracteres especiales!</div>';
			}

		}

	}
}