$(document).ready(function(){
    $("#identidad").prop("disabled", true);
    $("#procedencia").prop("disabled", true);
    $("#contacto").prop("disabled", true);
    $("#save_id").prop("disabled", true);
    $("#save_cont").prop("disabled", true);
    $("#save_proc").prop("disabled", true);
    $("#but_id").click(function(){
        $("#identidad").prop("disabled", false);
        $("#but_id").prop("disabled", true);
        $("#save_id").prop("disabled", false);
    });
    $("#save_id").click(function(){
        $("#identidad").prop("disabled", true);
        $("#but_id").prop("disabled", false);
        $("#save_id").prop("disabled", true);
    });
    $("#but_cont").click(function(){
        $("#contacto").prop("disabled", false);
        $("#but_cont").prop("disabled", true);
        $("#save_cont").prop("disabled", false);
    });
    $("#save_cont").click(function(){
        $("#contacto").prop("disabled", true);
        $("#but_cont").prop("disabled", false);
        $("#save_cont").prop("disabled", true);
    });
    $("#but_proc").click(function(){
        $("#procedencia").prop("disabled", false);
        $("#but_proc").prop("disabled", true);
        $("#save_proc").prop("disabled", false);
    });
    $("save_proc").click(function(){
        $("#procedencia").prop("disabled", true);
        $("#but_proc").prop("disabled", false);
        $("#save_proc").prop("disabled", true);
    });
});