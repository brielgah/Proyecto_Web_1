$(document).ready(function(){
    $("#identidad").prop("disabled", true);
    $("#procedencia").prop("disabled", true);
    $("#contacto").prop("disabled", true);

    $("#modificar").click(function(){
        $("#identidad").prop("disabled", false);
        $("#modificar").prop("disabled", true);
        $("#identidad").prop("disabled", false);
        $("#procedencia").prop("disabled", false);
        $("#contacto").prop("disabled", false);
    });
});