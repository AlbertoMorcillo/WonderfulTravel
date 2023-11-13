<html>
<head>
		<title>WONDERFULL TRAVELL</title>
		<meta charset="UTF-8" />
		<style>
			body{font-family:Arial,Helvetica,sans-serif;}
			div.datahora{font-size:1.2em; font-weight:bold; color:white; text-align:center; border-radius:0.9em; background-image:linear-gradient(#cebe27, #45ab76); width:9em; padding:0.4em 0;}
			iframe{border:1px solid black; width:1000px; height: 500px;}
		</style>
		    <link rel="stylesheet" href="estils.css"> <!-- Hacer referencia a tu archivo de estilos -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script defer src="../vista/DataHora.js"></script>
	</head>
</html>

<?php

$errors = '';

$validChoice1 = isset($_POST['choice1']) ? htmlspecialchars($_POST['coice1']) : '';
$validChoice2 = isset($_POST['choice2']) ? htmlspecialchars($_POST['choice2']) : '';
$validNombre = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : '';
$validApellido = isset($_POST['cognoms']) ? htmlspecialchars($_POST['cognoms']) : '';
$validEmail = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$validTelf = isset($_POST['telefon']) ? htmlspecialchars($_POST['telefon']) : '';
$validGenero = isset($_POST['genere']) ? htmlspecialchars($_POST['genere']) : '';
$validPersonas = isset($_POST['persones']) ? htmlspecialchars($_POST['persones']) : 1;
$validDescuento = isset($_POST['descompte']) ? htmlspecialchars($_POST['descompte']) : '';
$validPreu = isset($_POST['preu']) ? htmlspecialchars($_POST['preu']) : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

require 'Validaciones.php';

validarNombreOk($validNombre, $errors);
validarApellidoOk($validApellido, $errors);
validarEmailOk($validEmail, $errors);
validarTelfOk($validTelf, $errors);
validarGeneroOk($validGenero, $errors);


}

include_once '../vista/index_view.php';
?>