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
// Iniciar o reanudar la sesión
session_start();

// Verificar si la sesión de viajes no está inicializada
if (!isset($_SESSION['viajes'])) {
    $_SESSION['viajes'] = array(); // Inicializarla como un arreglo vacío
}

$errors = '';

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
	if (empty($errors)){
		try {
			$preu = 1;
			$data = 2;
			// Establecer la conexión a la base de datos

			$connexio = new PDO('mysql:host=localhost;dbname=wonderfull_travel', 'root', '');
			$statement = $connexio->prepare("SELECT preu FROM paisos WHERE nombre = ?");
			$statement->bindParam(1,$validChoice2);
			$statement->execute();
			while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
				$preu = $row["preu"];
			}

			$preu = ($preu * $validPersonas) * $data;
			$statement = $connexio->prepare("INSERT INTO viatges (destí, preu_total, num_persones, data, pais) VALUES (?,?,?,?,?)");
			$statement->bindParam(1,$validChoice1);
			$statement->bindParam(2,$preu);
			$statement->bindParam(3,$validPersonas);
			$statement->bindParam(4,$data);
			$statement->bindParam(5,$validChoice2);
			$statement->execute();

		
		   
					   // Limitar la visualización a tres registros
					   $_SESSION['viajes'][] = array(
						   'Destino' => $validChoice1,
						   'Precio total' => $preu,
						   'Número de personas' => $validPersonas,
						   'Fecha' => $data,
						   'País' => $validChoice2
					   );
		   
					   // Mostrar la información de viajes anteriores almacenada en la sesión
					   $totalViajes = count($_SESSION['viajes']);
					   $inicio = $totalViajes > 3 ? $totalViajes - 3 : 0;
		   
					   for ($i = $inicio; $i < $totalViajes; $i++) {
						   $viaje = $_SESSION['viajes'][$i];
						   echo "Destino: " . $viaje['Destino'] . "<br>";
						   echo "Precio total: " . $viaje['Precio total'] . "<br>";
						   echo "Número de personas: " . $viaje['Número de personas'] . "<br>";
						   echo "Fecha: " . $viaje['Fecha'] . "<br>";
						   echo "País: " . $viaje['País'] . "<br>";
						   echo "<br>";
					   }
            // Establecer el modo de errores para PDO
            $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		} catch(PDOException $e) {
			// Manejar errores de conexión
			echo "Error de conexión a la base de datos: " . $e->getMessage();
			die();
		}
		}

}
}
include_once '../vista/index_view.php';
?>