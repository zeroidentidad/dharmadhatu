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
INICIO       
======================================-->

<div id="inicio" class="col-lg-10 col-md-10 col-sm-9 col-xs-12" align="center">
 
	<div class="jumbotron">
	    <p>Bienvenido al panel de administración de contenido.</p>
	</div>

	<hr>
	
	<div style="display:table; margin: 0 auto;">
	<ul>
		<li class="botonesInicio">
			<a href="slide">
			<div style="background:#5fb76c">
			<span class="fa fa-toggle-right"></span>
			<p>SLIDES</p>
			</div>
			</a>
		</li>

		<li class="botonesInicio">
			<a href="articulos">
			<div style="background:#737773">
			<span class="fa fa-file-text-o"></span>
			<p>ARTICULOS</p>
			</div>
			</a>
		</li>

		<li class="botonesInicio">
			<a href="galeria">
			<div style="background:#3695e2">
			<span class="fa fa-image"></span>
			<p>IMAGENES</p>
			</div>
			</a>
		</li>

		<li class="botonesInicio">
			<a href="videos">
			<div style="background:#16024f"> 
			<span class="fa fa-film"></span>
			<p>VIDEOS</p>
			</div>
			</a>
		</li>

		<li class="botonesInicio">
			<a href="suscriptores">
			<div style="background:#770b1d">
			<span class="fa fa-users"></span>
			<p>SUSCRIPTORES</p>
			</div>
			</a>
		</li>

	</ul>
	</div>

</div>


<!--====  Fin de INICIO  ====-->