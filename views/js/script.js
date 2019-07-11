/*=============================================
SLIDE            
=============================================*/
var numeroSlide = 1;
var formatearLoop = false;
var cantidadImg = $("#slide ul li").length;

$("#slide ul").css({"width": (cantidadImg*100) + "%"})
$("#slide ul li").css({"width": (100/cantidadImg) + "%"})

/* INDICADORES */

for (var i = 0; i < cantidadImg; i++) {
	$("#indicadores").append('<li role-slide="'+(i+1)+'"><span class="fa fa-circle"></span></li>');
}

$("#indicadores li").click(function(){

	 var roleSlide = $(this).attr("role-slide");
			
	 $("#slide ul li").css({"display":"none"});
			
	 $("#slide ul li:nth-child("+roleSlide+")").fadeIn();
			
	 $("#indicadores li").css({"opacity":".5"});
			
	 $("#indicadores li:nth-child("+roleSlide+")").css({"opacity":"1"});

	 formatearLoop = true;

	numeroSlide = roleSlide;

})

/* FLECHA AVANZAR */

function avanzar(){

	if(numeroSlide >= cantidadImg){numeroSlide = 1;}

	else{numeroSlide++}

	$("#slide ul li").css({"display":"none"});
			
	$("#slide ul li:nth-child("+numeroSlide+")").fadeIn();
			
	$("#indicadores li").css({"opacity":".5"});
			
	$("#indicadores li:nth-child("+numeroSlide+")").css({"opacity":"1"});
}


$("#slideDer").click(function(){

	avanzar();

	formatearLoop = true;

})

/* FLECHA RETROCEDER */

$("#slideIzq").click(function(){

	if(numeroSlide <= 1){numeroSlide = cantidadImg;}

	else{numeroSlide--}


	$("#slide ul li").css({"display":"none"});
			
	$("#slide ul li:nth-child("+numeroSlide+")").fadeIn();
			
	$("#indicadores li").css({"opacity":".5"});
			
	$("#indicadores li:nth-child("+numeroSlide+")").css({"opacity":"1"});

	formatearLoop = true;

})

/* LOOP */

setInterval(function(){

	if(formatearLoop == true){

		formatearLoop = false;
	}

	else{

	avanzar();

	}

},5000);

/*=====  Fin de SLIDE  ======*/

/*=============================================
GALERÍA         
=============================================*/

$("#galeria ul li a").fancybox({

	openEffect  : 'elastic',
	closeEffect  : 'elastic',
	openSpeed  : 150,
	closeSpeed : 150,
	helpers : {title :{type : 'inside'}}

});

/*=====  Fin de GALERÍA   ======*/

/*=============================================
SCROLL      
=============================================*/

$("nav#botonera ul li a").click(function(e){

	e.preventDefault();

	var href = $(this).attr("href");

	$(href).animatescroll({

		scrollSpeed:2000,
		easing:"easeOutBounce"

	});

});

$.scrollUp({

	scrollText:"",
	scrollSpeed: 1500,
	easingType: "easeOutBounce"

});

/*=====  Fin de SCROLL   ======*/

/*=============================================
VALIDAR MENSAJES
=============================================*/
function validarMensaje() {

	nombre = $("#nombre").val();
	mensaje = $("#mensaje").val();

	if (nombre != "") {

		var caracteres = nombre.length;
		var expresion = /^[a-zA-Z\s]*$/; // \s = espacios en blanco

		if (!expresion.test(nombre)) {
			$("#nombre").after('<div class="alert alert-warning">No se permiten números ni caracteres especiales.</div>');
			return false;
		}

	}

	else if (mensaje != "") {
		var caracteres = mensaje.length;
		var expresion = /^[a-zA-Z0-9\s]*$/;

		if (!expresion.test(mensaje)) {
			$("#mensaje").after('<div class="alert alert-warning">No se permiten caracteres especiales.</div>');
			return false;
		}

	}

	return true;
}