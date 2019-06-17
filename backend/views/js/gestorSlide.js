/*=============================================
Área de arrastre de imágenes
=============================================*/
if ($("#columnasSlide").html() == 0) {
    $("#columnasSlide").css({ "height": "100px" });
}
else {
    $("#columnasSlide").css({ "height": "auto" });
}
/*=====  Área de arrastre de imágenes  ======*/

/*=============================================
Subir Imagen
=============================================*/
$("#columnasSlide").on("dragover", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $("#columnasSlide").css({ "background": "url(views/images/pattern.jpg)" });
});
/*=====  Subir Imagen  ======*/

/*=============================================
Soltar Imagen
=============================================*/
$("#columnasSlide").on("drop", function (e) {
    e.preventDefault();
    e.stopPropagation();

    $("#columnasSlide").css({ "background": "black" });

    // propio de jquery
    var archivo = e.originalEvent.dataTransfer.files;
    var imagen = archivo[0];
    //var sizeValido = false, typevalido = false;

    // Validar tamaño de la imagen
    var imagenSize = imagen.size;
    if (Number(imagenSize) > 2000000) { //2 megas,tamaño en bytes 
        $("#columnasSlide").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 2mb</div>');
    }
    else {
        $(".alerta").remove();
        //sizeValido = true;
    }

    // Validar tipo de la imagen
    var imagenType = imagen.type;
    if (imagenType == "image/jpeg" || imagenType == "image/png") {
        $(".alerta").remove();
        //typevalido = true;
    }
    else {
        $("#columnasSlide").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>');
    }

    //Subir imagen al servidor, cubriendo condiciones anteriores
    //sizeValido && typevalido
    if (Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png") {
        var datos = new FormData();

        datos.append("imagen", imagen);

        $.ajax({
            url: "views/ajax/gestorSlide.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            beforeSend: function () {
                $("#columnasSlide").before('<img src="views/images/status.gif" id="status">');
            },
            success: function (respuesta) {
                $("#status").remove();
                if (respuesta == 0) {
                    $("#columnasSlide").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 1600px * 600px</div>');
                }
                else {
                    $("#columnasSlide").css({ "height": "auto" });

                    $("#columnasSlide").append('<li class="bloqueSlide"><span class="fa fa-times eliminarSlide"></span><img src="' + respuesta["ruta"].slice(6) + '" class="handleImg"></li>');

                    $("#ordenarTextSlide").append('<li><span class="fa fa-pencil" style="background:blue"></span><img src="' + respuesta["ruta"].slice(6) + '" style="float:left; margin-bottom:10px" width="80%"><h1>' + respuesta["titulo"] + '</h1><p>' + respuesta["descripcion"] + '</p></li>');

                    swal({
                        title: "Éxito",
                        text: "¡La imagen subió correctamente!",
                        type: "success",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        },
                        function (isConfirm) {
                            if (isConfirm) {
                                window.location = "slide";
                            }
                        });

                }

            }

        });

    }

})
/*=====  Soltar Imagen  ======*/

/*=============================================
Eliminar Item Slide
=============================================*/
$(".eliminarSlide").click(function () {

    if ($(".eliminarSlide").length == 1) {
        $("#columnasSlide").css({ "height": "100px" });
    }

    idSlide = $(this).parent().attr("id");
    rutaSlide = $(this).attr("ruta");

    $(this).parent().remove();
    $("#item" + idSlide).remove();

    var borrarItem = new FormData();

    borrarItem.append("idSlide", idSlide);
    borrarItem.append("rutaSlide", rutaSlide);

    $.ajax({
        url: "views/ajax/gestorSlide.php",
        method: "POST",
        data: borrarItem,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
        }
    })

})
/*=====  Eliminar Item Slide  ======*/

/*=============================================
Editar Item Slide
=============================================*/
$(".editarSlide").click(function () {

    idSlide = $(this).parent().attr("id");
    rutaImagen = $(this).parent().children("img").attr("src");
    rutaTitulo = $(this).parent().children("h1").html();
    rutaDescripcion = $(this).parent().children("p").html();

    $(this).parent().html('<img src="' + rutaImagen + '" class="img-thumbnail"><input type="text" class="form-control" id="enviarTitulo" placeholder="Título" value="' + rutaTitulo + '"><textarea row="5" id="enviarDescripcion" class="form-control" placeholder="Descripción">' + rutaDescripcion + '</textarea><button class="btn btn-info pull-right" id="guardar' + idSlide + '" style="margin:10px">Guardar</button>');

    $("#guardar" + idSlide).click(function () {

        enviarId = idSlide.slice(4);

        enviarTitulo = $("#enviarTitulo").val();
        enviarDescripcion = $("#enviarDescripcion").val();

        var actualizarSlide = new FormData();

        actualizarSlide.append("enviarId", enviarId);
        actualizarSlide.append("enviarTitulo", enviarTitulo);
        actualizarSlide.append("enviarDescripcion", enviarDescripcion);

        $.ajax({
            url: "views/ajax/gestorSlide.php",
            method: "POST",
            data: actualizarSlide,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {

                $("#guardar" + idSlide).parent().html('<span class="fa fa-pencil editarSlide" style="background:blue"></span><img src="' + rutaImagen + '" style="float:left; margin-bottom:10px" width="80%"><h1>' + respuesta["titulo"] + '</h1><p>' + respuesta["descripcion"] + '</p>');

                swal({
                    title: "Listo!",
                    text: "¡Se han guardado cambios correctamente!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                },
                    function (isConfirm) {
                        if (isConfirm) {
                            window.location = "slide";
                        }
                    });

            }

        });

    })

})
/*=====  Editar  Item Slide  ======*/

/*=============================================
Ordenar Item Slide
=============================================*/
var almacenarOrdenId = new Array();
var ordenItem = new Array();

$("#ordenarSlide").click(function () {

    $("#ordenarSlide").hide();
    $("#guardarSlide").show();

    $("#columnasSlide").css({ "cursor": "move" })
    $("#columnasSlide span").hide()

    $("#columnasSlide").sortable({
        revert: true,
        connectWith: ".bloqueSlide",
        handle: ".handleImg",
        stop: function (event) {

            for (var i = 0; i < $("#columnasSlide li").length; i++) {

                almacenarOrdenId[i] = event.target.children[i].id;
                ordenItem[i] = i + 1;
            }

        }

    });

});

$("#guardarSlide").click(function () {

    $("#ordenarSlide").show();
    $("#guardarSlide").hide();

    for (var i = 0; i < $("#columnasSlide li").length; i++) {

        var actualizarOrden = new FormData();
        actualizarOrden.append("actualizarOrdenSlide", almacenarOrdenId[i]);
        actualizarOrden.append("actualizarOrdenItem", ordenItem[i]);

        $.ajax({

            url: "views/ajax/gestorSlide.php",
            method: "POST",
            data: actualizarOrden,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {

                $("#textoSlide ul").html(respuesta);

                swal({
                    title: "Listo!",
                    text: "¡Orden actualizado correctamente!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                },
                    function (isConfirm) {
                        if (isConfirm) {
                            window.location = "slide";
                        }
                    });
            }

        })

    }

})
/*=====  Ordenar Item Slide  ======*/