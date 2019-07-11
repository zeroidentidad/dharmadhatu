<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DHARMADHATU</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="views/images/icono.png">

	<link rel="stylesheet" href="views/css/style.css?v=<?php echo rand(); ?>">
	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/font-awesome.min.css">
	<link rel="stylesheet" href="views/css/fonts.css">
	<link rel="stylesheet" href="views/css/cssFancybox/jquery.fancybox.css">
	<link rel="stylesheet" href="views/css/sweetalert.css">

	<script src="views/js/jquery-2.2.0.min.js"></script>
	<script src="views/js/bootstrap.min.js"></script>
	<script src="views/js/jquery.fancybox.js"></script>
	<script src="views/js/animatescroll.js"></script>
	<script src="views/js/jquery.scrollUp.js"></script>
	<script src="views/js/sweetalert.min.js"></script>

</head>

<body>

	<div class="container-fluid">

		<!--=====================================
		SLIDE
		======================================-->
		<?php include "modules/slide.php"; ?>
		<!--====  Fin de SLIDE  ====-->	

		<!--=====================================
		CABECERA
		======================================-->
		<?php include "modules/cabezote.php"; ?>
		<!--====  Fin de CABECERA  ====-->

		<!--=====================================
		TOP
		======================================-->
		<?php include "modules/top.php"; ?>
		<!--====  Fin de TOP  ====-->

		<!--=====================================
		GALERIA
		======================================-->
		<?php include "modules/galeria.php"; ?>
		<!--====  Fin de GALERIA  ====-->

		<!--=====================================
		ARTÍCULOS
		======================================-->
		<?php include "modules/articulos.php"; ?>
		<!--====  Fin de ARTÍCULOS  ====-->

		<!--=====================================
		VIDEOS
		======================================-->
		<?php include "modules/videos.php"; ?>
		<!--====  Fin de VIDEOS  ====-->

		<!--=====================================
			CONTACTO         
		======================================-->
		<?php include "modules/contactenos.php"; ?>
		<!--====  Fin de CONTACTO ====-->
		
	</div>

<script src="views/js/script.js?v=<?php echo rand(); ?>"></script>

</body>
</html>


