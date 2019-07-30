/*=============================================
Mostrar Formulario Registro Perfil
=============================================*/
$("#registrarPerfil").click(function () {
    $("#formularioPerfil").toggle("fast");
})

$("#subirFotoPerfil").change(function () {
    $("#subirFotoPerfil").attr("name", "nuevaImagen");
});

/*=============================================
Mostrar Formulario Editar Perfil
=============================================*/
$("#btnEditarPerfil").click(function () {
    $("#editarPerfil").hide("fast");
    $("#formEditarPerfil").show("fast");
})

$("#cambiarFotoPerfil").change(function () {
    $("#cambiarFotoPerfil").attr("name", "editarImagen")
});