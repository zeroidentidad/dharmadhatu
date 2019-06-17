<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DHARMADHATU - Admin</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="views/images/icono.png">

	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/font-awesome.min.css">
	<link rel="stylesheet" href="views/css/style.css?v=<?php echo rand(); ?>">
	<link rel="stylesheet" href="views/css/fonts.css">
    <link rel="stylesheet" href="views/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="views/css/responsive.bootstrap.min.css">
	<link rel="stylesheet" href="views/css/jquery-ui.min.css">
	<link rel="stylesheet" href="views/css/sweetalert.css">
	<link rel="stylesheet" href="views/css/cssFancybox/jquery.fancybox.css">
	<link rel="stylesheet" href="views/css/jquery-ui.min.css">

	<script src="views/js/jquery-2.2.0.min.js"></script>
	<script src="views/js/bootstrap.min.js"></script>
	<script src="views/js/jquery.fancybox.js"></script>
	<script src="views/js/jquery.dataTables.min.js"></script>
	<script src="views/js/dataTables.bootstrap.min.js"></script>
	<script src="views/js/dataTables.responsive.min.js"></script>
	<script src="views/js/responsive.bootstrap.min.js"></script>
	<script src="views/js/jquery-ui.min.js"></script>
	<script src="views/js/sweetalert.min.js"></script>

</head>

<body>

	<div class="container-fluid">

		<section class="row">

		<!--=====================================
		COLUMNA CONTENIDO        
		======================================-->	
			
		<?php

			$modulos = new Enlaces();
			$modulos->enlacesController();
		
		?>

		<!--====  Fin de COLUMNA CONTENIDO  ====-->

		</section>
	
	</div>

	<script src="views/js/script.js?v=<?php echo rand(); ?>"></script>
	<script src="views/js/validarIngreso.js?v=<?php echo rand(); ?>"></script>
	<script src="views/js/gestorSlide.js?v=<?php echo rand(); ?>"></script>
	
</body>

</html>