<?php

$errors = '';

$validChoice1 = isset($_POST['choice1']) ? htmlspecialchars($_POST['coice1']) : '';
$validChoice2 = isset($_POST['choice2']) ? htmlspecialchars($_POST['choice2']) : '';
$validNombre = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : '';
$validApellido = isset($_POST['cognoms']) ? htmlspecialchars($_POST['cognoms']) : '';
$validEmail = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$validTelf = isset($_POST['telefon']) ? htmlspecialchars($_POST['telefon']) : '';
$validGenero = isset($_POST['genere']) ? htmlspecialchars($_POST['genere']) : '';
$validPersonas = isset($_POST['persones']) ? htmlspecialchars($_POST['persones']) : '';
$validDescuento = isset($_POST['descompte']) ? htmlspecialchars($_POSRT['descompte']) : '';
$validPreu = isset($_POST['preu']) ? htmlspecialchars($_POST['preu']) : '';

require_once '../modelo/conection.php';

validarNombreOk($validNombre, $errors);
validarApellidoOk($validApellido, $errors);
validarEmailOk($validEmail, $errors);
validarTelfOk($validTelf, $errors);
validarGeneroOk($validGenero, $errors);

?>