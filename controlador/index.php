<!DOCTYPE html>
<html lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>WONDERFULL TRAVELL</title>
	<meta charset="UTF-8" />
	<style>
		.clock {
			margin: 0px auto;
			width: 650px;
			height: 650px;
			fill: black
		}

		.outer-circle,
		.center-circle {
			fill: DarkSlateGray;
		}

		.hours,
		.minutes,
		.seconds {
			transform-origin: center;
			stroke-linecap: round;
		}

		.hours {
			stroke: fuchsia;
			stroke-width: 3px;
			transition: transform 1s ease-in-out;
		}

		.minutes {
			stroke-width: 2px;
			stroke: lime;
			transition: transform 1s ease-in-out;
		}

		.seconds {
			stroke: white;
		}

		.line {
			stroke-width: 1px;
			stroke: white;
			stroke-linecap: round;
			transform-origin: center;
		}

		body {
			font-family: Arial, Helvetica, sans-serif;
		}

		div.datahora {
			font-size: 1.2em;
			font-weight: bold;
			color: white;
			text-align: center;
			border-radius: 0.9em;
			background-image: linear-gradient(#cebe27, #45ab76);
			width: 9em;
			padding: 0.4em 0;
		}

		iframe {
			border: 1px solid black;
			width: 1000px;
			height: 500px;
		}
	</style>
	<link rel="stylesheet" href="../estilos/style.css"> <!-- Hacer referencia a tu archivo de estilos -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script defer src="../vista/script.js"></script>
	<script defer src="../vista/calculos.js"></script>
	<script defer src="../vista/DataHora.js"></script>
	</head>
	<body>
		<!-- partial -->
		<script src="../vista/script.js"></script>
		<div class="clock">
			<svg class="circle" viewBox="0 0 120 120" version="1.1" xmlns="http://www.w3.org/2000/svg">
				<circle cx="60" cy="60" r="60" class="outer-circle" />
				<circle cx="60" cy="60" r="57" />
				<line x1="60" y1="20" x2="60" y2="60" class="hours" />
				<line x1="60" y1="2" x2="60" y2="60" class="minutes" />
				<line x1="60" y1="0" x2="60" y2="60" class="seconds" />
				<circle cx="60" cy="60" r="3" class="center-circle" />
				<line x1="60" y1="5" x2="60" y2="10" class="line" />
				<line x1="60" y1="5" x2="60" y2="10" class="line" />
				<line x1="60" y1="5" x2="60" y2="10" class="line" />
				<line x1="60" y1="5" x2="60" y2="10" class="line" />
				<line x1="60" y1="5" x2="60" y2="10" class="line" />
				<line x1="60" y1="5" x2="60" y2="10" class="line" />
				<line x1="60" y1="5" x2="60" y2="10" class="line" />
				<line x1="60" y1="5" x2="60" y2="10" class="line" />
				<line x1="60" y1="5" x2="60" y2="10" class="line" />
				<line x1="60" y1="5" x2="60" y2="10" class="line" />
				<line x1="60" y1="5" x2="60" y2="10" class="line" />
				<line x1="60" y1="5" x2="60" y2="10" class="line" />
			</svg>
		</div>
	</body>

</html>

<?php
// Iniciar o reanudar la sesión
session_start();

// Verificar si la sesión de viajes no está inicializada
if (!isset($_SESSION['viajes'])) {
	$_SESSION['viajes'] = array(); // Inicializarla como un arreglo vacío
}

$errors = '';
$valor = '';
if (isset($_POST["datahora"])) {
	$valor = $_POST["datahora"];
}
$validChoice1 = isset($_POST['choice1']) ? htmlspecialchars($_POST['choice1']) : '';
$validChoice2 = isset($_POST['choice2']) ? htmlspecialchars($_POST['choice2']) : 'asajnsanskj';
$validNombre = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : '';
$validApellido = isset($_POST['cognoms']) ? htmlspecialchars($_POST['cognoms']) : '';
$validEmail = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$validTelf = isset($_POST['telefon']) ? htmlspecialchars($_POST['telefon']) : '';
$validGenero = isset($_POST['genere']) ? htmlspecialchars($_POST['genere']) : '';
$validPersonas = isset($_POST['persones']) ? htmlspecialchars($_POST['persones']) : 1;
$validDescuento = isset($_POST['descompte']) ? htmlspecialchars($_POST['descompte']) : '';
// Mostrar precio al poner el validChoice2 = $preu
// Comparar data esrita a la de hoy para sacar las noches que se quedan

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

	require 'Validaciones.php';

	validarNombreOk($validNombre, $errors);
	validarApellidoOk($validApellido, $errors);
	validarEmailOk($validEmail, $errors);
	validarTelfOk($validTelf, $errors);
	validarGeneroOk($validGenero, $errors);
	$dataViatge = $valor;
	$fecha1 = new DateTime($dataViatge);
	$fecha2 = new DateTime();

	/**if (empty($errors)){
	try {
		// Establecer la conexión a la base de datos
		$connexio = new PDO('mysql:host=localhost;dbname=wonderfull_travel', 'root', '');
		$statement = $connexio->prepare("INSERT INTO usuarios (nombre, apellido, telefono, email, genero) VALUES (?,?,?,?,?)");
		$statement->bindParam(1,$validNombre);
		$statement->bindParam(2,$validApellido);
		$statement->bindParam(3,$validTelf);
		$statement->bindParam(4,$validEmail);
		$statement->bindParam(5,$validGenero);
		$statement->execute();
		// Establecer el modo de errores para PDO
		$connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		// Manejar errores de conexión
		echo "Error de conexión a la base de datos: " . $e->getMessage();
		die();
	}
	}*/
	if (!isset($_SESSION['viaje_insertado'])) {
		if (empty($errors)) {
			try {
				$preu = 1;
				$dataViatge = $valor;
				/**
				 * $fecha1 = new DateTime($dataViatge);
				 *  $fecha2 = new DateTime();

				 *  $diferencia = $fecha1->diff($fecha2);
			
				 *  $data = $diferencia->format("%a");
				 *  if ($data == 0){
				 * 	 $data = 1;
				 * }
				 * echo "La diferencia en noches es: " . $data . " noches";
				 */

				// Establecer la conexión a la base de datos

				$connexio = new PDO('mysql:host=localhost;dbname=wonderfull_travel', 'root', '');
				$statement = $connexio->prepare("SELECT preu FROM paisos WHERE nombre = ?");
				$statement->bindParam(1, $validChoice2);
				$statement->execute();
				while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
					$preu = $row["preu"];
				}

				$preu = $preu * $validPersonas;
				$statement = $connexio->prepare("INSERT INTO viatges (destí, preu_total, num_persones, data, pais) VALUES (?,?,?,?,?)");
				$statement->bindParam(1, $validChoice1);
				$statement->bindParam(2, $preu);
				$statement->bindParam(3, $validPersonas);
				$statement->bindParam(4, $dataViatge);
				$statement->bindParam(5, $validChoice2);
				$statement->execute();



				// Limitar la visualización a tres registros
				$_SESSION['viajes'][] = array(
					'Destino' => $validChoice1,
					'Precio total' => $preu,
					'Número de personas' => $validPersonas,
					'Fecha' => $dataViatge,
					'País' => $validChoice2
				);

				// Mostrar la información de viajes anteriores almacenada en la sesión
				$totalViajes = count($_SESSION['viajes']);
				$inicio = $totalViajes > 3 ? $totalViajes - 3 : 0;

				for ($i = $inicio; $i < $totalViajes; $i++) {
					$viaje = $_SESSION['viajes'][$i];
					echo "Destino: " . $viaje['Destino'] . "<br>";
					echo "Precio total: " . $viaje['Precio total'] . " €" . "<br>";
					echo "Número de personas: " . $viaje['Número de personas'] . "<br>";
					echo "Fecha: " . $viaje['Fecha'] . "<br>";
					echo "País: " . $viaje['País'] . "<br>";
					echo "<br>";
				}
				// Establecer el modo de errores para PDO
				$connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				// Manejar errores de conexión
				echo "Error de conexión a la base de datos: " . $e->getMessage();
				die();
			}
		}
	}
}
include '../vista/index_view.php';
?>