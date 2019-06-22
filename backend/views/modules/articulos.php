<?php

session_start();

if(!$_SESSION["validar"]){
	header("location:ingreso");
	exit();
}

include "views/modules/botonera.php";
include "views/modules/cabezote.php";
?>
<!--=====================================
ARTÍCULOS ADMINISTRABLE          
======================================-->

<div id="seccionArticulos" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
	
	<button id="btnAgregarArticulo" class="btn btn-info btn-lg">Agregar Artículo</button>

	<!--==== AGREGAR ARTÍCULO  ====-->

	<div id="agregarArtículo" style="display:none">
		
		<form method="post" enctype="multipart/form-data">

			<input name="tituloArticulo" type="text" placeholder="Título del Artículo" class="form-control" required>

			<textarea name="introArticulo" id="" cols="30" rows="5" placeholder="Introducción del Articulo" class="form-control"  maxlength="170" required></textarea>

			<input type="file" name="imagen" class="btn btn-default" id="subirFoto" required>

			<p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>

			<div id="arrastreImagenArticulo">	
				
			</div>

			<textarea name="contenidoArticulo" id="" cols="30" rows="10" placeholder="Contenido del Articulo" class="form-control" required></textarea>

			<input type="submit" id="guardarArticulo" value="Guardar" class="btn btn-primary">

		</form>

	</div>

	<?php
		$crearArticulo = new GestorArticulos();
		$crearArticulo -> guardarArticuloController();
	?>

	<hr>

	<!--==== EDITAR ARTÍCULO  ====-->

	<ul id="editarArticulo">

	<?php
		$mostrarArticulo = new GestorArticulos();
		$mostrarArticulo -> mostrarArticulosController();
		$mostrarArticulo -> borrarArticuloController();
		$mostrarArticulo -> editarArticuloController();
	?>

	</ul>

	<button id="ordenarArticulos" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar</button>

	<button id="guardarOrdenArticulos" class="btn btn-primary pull-right" style="display:none; margin:10px 30px">Guardar Orden</button>

</div>

<!--====  Fin de ARTÍCULOS ADMINISTRABLE  ====-->