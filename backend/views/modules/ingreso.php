<!--=====================================
FORMULARIO DE INGRESO         
======================================-->
<div id="backIngreso">

	<form method="post" id="formIngreso" onsubmit="return validarIngreso()">

		<h1 id="tituloFormIngreso">ADMINISTRACIÓN CONTENIDO</h1>

		<input class="form-control formIngreso" type="text" placeholder="Usuario" name="usuarioIngreso" id="usuarioIngreso">
		<input class="form-control formIngreso" type="password" placeholder="Contraseña" name="passwordIngreso" id="passwordIngreso">

		<?php

			$ingreso = new Ingreso();
			$ingreso -> ingresoController();
			
		?>

		<input class="form-control formIngreso btn btn-primary" type="submit" value="Enviar">

	</form>

</div>

<!--====  Fin de FORMULARIO DE INGRESO  ====-->