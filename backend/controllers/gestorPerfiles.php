<?php

class GestorPerfiles{

	#GUARDAR PERFIL
	#------------------------------------------------------------
	public function guardarPerfilController(){

		$ruta = "";

		if(isset($_POST["nuevoUsuario"])){	

			if(isset($_FILES["nuevaImagen"]["tmp_name"])){

				$imagen = $_FILES["nuevaImagen"]["tmp_name"];

				$aleatorio = mt_rand(100, 999);

				$ruta = "views/images/perfiles/perfil".$aleatorio.".jpg";

                //$origen = imagecreatefromjpeg($imagen);
                $origen = $this->getImage($imagen);

				$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>100, "height"=>100]);

                imagejpeg($destino, $ruta);
                
                chmod($ruta, 0777);
            }
            
			if($ruta == ""){
				$ruta = "views/images/perfiles/photo.jpg";	
			}

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"])&&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"])){

				$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datosController = array("usuario"=>$_POST["nuevoUsuario"],
										 "password"=>$encriptar,
										 "email"=>$_POST["nuevoEmail"],
										 "rol"=>$_POST["nuevoRol"],
										 "photo"=> $ruta);
                $obj = new GestorPerfilesModel();
				$respuesta = $obj->guardarPerfilModel($datosController, "usuarios");

				if($respuesta == "ok"){
				echo'<script>
						swal({
							  title: "¡OK!",
							  text: "Usuario creado correctamente!",
							  type: "success",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
						},
						function(isConfirm){
								 if (isConfirm) {	   
								    window.location = "perfil";
								  } 
						});
					</script>';
				}
			}
			else{
				echo '<div class="alert alert-warning"><b>¡ERROR!</b> No ingresar caracteres especiales</div>';
			}

		}

	}

	#VISUALIZAR LOS PERFILES
	#------------------------------------------------------------
	public function verPerfilesController(){

        $obj = new GestorPerfilesModel();
		$respuesta = $obj->verPerfilesModel("usuarios");	

		$rol = "";
		$selected = "";

		foreach($respuesta as $row => $item){
			if( $item["rol"] == 0){
				$rol = "Administrador";
		      }
		     else{
		        $rol = "Editor";
		      }
        
			echo '<tr>
			        <td>'.$item["usuario"].'</td>
			        <td>'.$rol.'</td>
			        <td>'.$item["email"].'</td>
			        <td><a href="#perfil'.$item["id"].'" data-toggle="modal"><span class="btn btn-info fa fa-pencil"></span></a>
			            <a href="index.php?action=perfil&idBorrar='.$item["id"].'&borrarImg='.$item["photo"].'"><span class="btn btn-danger fa fa-times"></span></a></td>
			      </tr>

			       <div id="perfil'.$item["id"].'" class="modal fade">

				       	<div class="modal-dialog modal-content">
							<div class="modal-header" style="border:1px solid #eee">
								<button type="button" class="close" data-dismiss="modal">X</button>
								<h3 class="modal-title">Editar Perfil</h3>
							</div>

							<div class="modal-body" style="border:1px solid #eee">
								<form style="padding:0px 10px" method="post" enctype="multipart/form-data">
                                      <input name="idPerfil" type="hidden" value="'.$item["id"].'">
                                      
								     <div class="form-group">
								      <input name="editarUsuario" type="text" class="form-control" value="'.$item["usuario"].'" required>
								     </div>

								      <div class="form-group">
								          <input name="editarPassword" type="password" placeholder="Ingrese la Contraseña hasta 10 caracteres" maxlength="10" class="form-control" required>
								      </div>

								      <div class="form-group">
								         <input name="editarEmail" type="email" value="'.$item["email"].'" class="form-control" required>
								      </div>

								      <div class="form-group">
								        <select name="editarRol" class="form-control" required>
								            <option value="">Seleccione el Rol</option>
								            <option value="0" '.($selected=($item["rol"]==0)?"selected":"").'>Administrador</option>
								            <option value="1" '.($selected=($item["rol"]==1)?"selected":"").'>Editor</option>
								        </select>
								      </div>

								       <div class="form-group text-center">
								       		<div style="display:block;">
										     	<img src="'.$item["photo"].'" width="20%" class="img-circle">
		       								 	<input type="hidden" value="'.$item["photo"].'" name="editarPhoto">
									   		</div>	    

							    		<input type="file" class="btn btn-default" name="editarImagen" style="display:inline-block; margin:10px 0">

								        <p class="text-center" style="font-size:12px">Tamaño recomendado de la imagen: 100px * 100px, peso máximo 2MB</p>
								       </div>

								        <div class="form-group text-center">
								    		<input type="submit" id="guardarPerfil" value="Actualizar" class="btn btn-primary">
								    	</div>
								</form>
							</div>

							<div class="modal-footer" style="border:1px solid #eee">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							</div>
				        
				       	</div>

			       </div>';
		}

	}

	#EDITAR PERFIL
	#------------------------------------------------------------
	public function editarPerfilController(){

		$ruta = "";

		if(isset($_POST["editarUsuario"])){	

			if(isset($_FILES["editarImagen"]["tmp_name"])&&$_FILES["editarImagen"]["tmp_name"]!=null){	

                    $imagen = $_FILES["editarImagen"]["tmp_name"];

                    $aleatorio = mt_rand(100, 999);

                    $ruta = "views/images/perfiles/perfil".$aleatorio.".jpg";

                    //$origen = imagecreatefromjpeg($imagen);
                    $origen = $this->getImage($imagen);

                    $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>100, "height"=>100]);

                    imagejpeg($destino, $ruta);
                    
                    chmod($ruta, 0777);
			}

			if($ruta == ""){
				$ruta = $_POST["editarPhoto"];
			}

			if($ruta != "" && $_POST["editarPhoto"] != "views/images/perfiles/photo.jpg"){
				unlink($_POST["editarPhoto"]);
			}

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarUsuario"])&&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"])){

				$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datosController = array("id"=>$_POST["idPerfil"],
										 "usuario"=>$_POST["editarUsuario"],
						                 "password"=>$encriptar,
						                 "email"=>$_POST["editarEmail"],
						                 "rol"=>$_POST["editarRol"],
					 	                 "photo"=>$ruta);

                $obj = new GestorPerfilesModel();
                $respuesta = $obj->editarPerfilModel($datosController, "usuarios");

				if($respuesta == "ok"){
					if(isset($_POST["actualizarSesion"])){
						$_SESSION["id"] = $_POST["idPerfil"];
						$_SESSION["usuario"] = $_POST["editarUsuario"];
						$_SESSION["password"] = $encriptar;
						$_SESSION["email"] = $_POST["editarEmail"];
						$_SESSION["photo"] = $ruta;
						$_SESSION["rol"] = $_POST["editarRol"];
					}
					echo'<script>
                            swal({
                                title: "¡OK!",
                                text: "Usuario editado correctamente!",
                                type: "success",
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                            },
                            function(isConfirm){
                                    if (isConfirm) {	   
                                        window.location = "perfil";
                                    } 
                            });
					    </script>';
				}

			}
			else{
				echo '<div class="alert alert-warning"><b>¡ERROR!</b> No ingrese caracteres especiales</div>';
			}

		}

	}

	#BORRAR PERFIL
	#------------------------------------------------------------
	public function borrarPerfilController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			unlink($_GET["borrarImg"]);

			$obj = new GestorPerfilesModel();
            $respuesta = $obj->borrarPerfilModel($datosController, "usuarios");

			if($respuesta == "ok"){
					echo'<script>
                            swal({
                                title: "¡OK!",
                                text: "Usuario borrado correctamente!",
                                type: "success",
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                            },
                            function(isConfirm){
                                    if (isConfirm) {	   
                                        window.location = "perfil";
                                    } 
                            });
				        </script>';
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

}