<?php

$errors = '';

$validNombre = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : '';
$validApellido = isset($_POST['apellido']) ? htmlspecialchars($_POST['apellido']) : '';
$validEmail = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$validTelf = isset($_POST['telefono']) ? htmlspecialchars($_POST['telefono']) : '';
$validGenero = isset($_POST['genero']) ? htmlspecialchars($_POST['genero']) : '';

require_once '../modelo/conection.php';

function comprobarNombreOk(){

}



?>