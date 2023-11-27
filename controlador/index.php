<!DOCTYPE html>
<html lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>WONDERFULL TRAVELL</title>
	<meta charset="UTF-8" />

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
require '../src/PHPMailer.php';
require '../src/Exception.php';
require '../src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$errors = '';
$viatges = '';
$valor = "1";

 if (isset($_POST["datahora"])) {
     $valor = $_POST["datahora"];
 }

$validChoice1 = isset($_POST['choice1']) ? htmlspecialchars($_POST['choice1']) : '';
$validChoice2 = isset($_POST['choice2']) ? htmlspecialchars($_POST['choice2']) : '';
$validNombre = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : '';
$validApellido = isset($_POST['cognoms']) ? htmlspecialchars($_POST['cognoms']) : '';
$validEmail = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$validTelf = isset($_POST['telefon']) ? htmlspecialchars($_POST['telefon']) : '';
$validGenero = isset($_POST['genere']) ? htmlspecialchars($_POST['genere']) : '';
$validPersonas = isset($_POST['persones']) ? htmlspecialchars($_POST['persones']) : 1;
$validDescuento = isset($_POST['descompte']) ? "SI" : "NO";

// Mostrar precio al poner el validChoice2 = $preu
// Comparar data esrita a la de hoy para sacar las noches que se quedan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete-article'])) {
	$connexio = new PDO('mysql:host=localhost;dbname=wonderfull_travel', 'root', '');
	$uniqidToDelete = $_POST['delete-article'];
	    // Eliminar la reserva de la base de datos
		$statement = $connexio->prepare("DELETE FROM viatges WHERE uniqid = ?");
		$statement->bindParam(1, $uniqidToDelete);
		$statement->execute();
	foreach ($_SESSION['viajes'] as $index => $viaje) {
        if ($viaje['uniqid'] === $uniqidToDelete) {
            unset($_SESSION['viajes'][$index]);
            $_SESSION['viajes'] = array_values($_SESSION['viajes']);
		}
    }
	
		// Mostrar la información de viajes anteriores almacenada en la sesión
		$totalViajes = count($_SESSION['viajes']);
		$inicio = $totalViajes > 3 ? $totalViajes - 3 : 0;
		for ($i = $inicio; $i < $totalViajes; $i++) {
		$viaje = $_SESSION['viajes'][$i];
		$viatges.= "<strong>"."Destino: "."</strong>" . $viaje['Destino'] . "<br>";
		$viatges.= "<strong>"."Precio total: "."</strong>" . $viaje['Precio total'] . " €" . "<br>";
		$viatges.= "<img src='../assets/images/" . $viaje['Imagen'] . "' alt='' style='float: right; width: 100px;'>"; 
		$viatges.= "<strong>"."Número de personas: "."</strong>" . $viaje['Número de personas'] . "<br>";
		$viatges.= "<strong>"."Fecha: "."</strong>" . $viaje['Fecha'] . "<br>";
		$viatges.= "<strong>"."País: "."</strong>" . $viaje['País'] . "<br>";
		$viatges.= "<strong>"."Descompte: "."</strong>" . $viaje['Descompte'] . "<br>";
		$viatges.= '<form method="POST" action="./index.php">';
		$viatges.= '<button class="btn-delete-comment custom" type="submit" name="delete-article" value="' . $viaje['uniqid'] . '">Borrar reserva</button>';
		$viatges.= '</form>';
		$viatges.= "<br>";
}
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

require 'Validaciones.php';

$dataViatge = $valor;
$fechaActual = new DateTime();
validarData($dataViatge, $fechaActual, $errors);
validarNombreOk($validNombre, $errors);
validarApellidoOk($validApellido, $errors);
validarEmailOk($validEmail, $errors);
validarTelfOk($validTelf, $errors);
validarGeneroOk($validGenero, $errors);


if (empty($errors)){

	try {
		// Establecer la conexión a la base de datos
		$connexio = new PDO('mysql:host=localhost;dbname=wonderfull_travel', 'root', '');
		$uniqid = uniqid();
		$statement = $connexio->prepare("INSERT INTO usuarios (nombre, apellido, telefono, email, genero, uniqid) VALUES (?,?,?,?,?,?)");
		$statement->bindParam(1,$validNombre);
		$statement->bindParam(2,$validApellido);
		$statement->bindParam(3,$validTelf);
		$statement->bindParam(4,$validEmail);
		$statement->bindParam(5,$validGenero);
		$statement->bindParam(6,$uniqid);
		$statement->execute();

		$mail = new PHPMailer(true);
		$nom = $validNombre; $adreca = $validEmail;
		// Canviar les opcions del SMTP
		$mail->SMTPDebug =0;
		$mail->SMTPOptions = array(
		  'ssl' => array(
			  'verify_peer' => false,
			  'verify_peer_name' => false,
			  'allow_self_signed' => true
		  )
	  );                      
		$mail->isSMTP();                                            //Enviar utilitzant SMTP
		$mail->Host       = 'smtp.gmail.com';                    
		$mail->SMTPAuth   = true;                                   //Activem l'autenticació SMTP
		$mail->Username   = 'xamppbmartinez@gmail.com';                     //Email on creem la clau
		$mail->Password   = 'jvrg fwih oxgm ncwm';                          //Clau d'acces
		$mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';            //Enable implicit TLS encryption
		$mail->Port       = 587;                                    // Utilitzem el port 587
	  
		//Recipients
		$mail->setFrom('xamppbmartinez@gmail.com', $nom); 
		$mail->addAddress($adreca);     
	  
		//Content
		$mail->isHTML(true); //Enviar l'email en format HTML
		$mail->Subject = 'Reserves feta'; // Assumpte
		$mail->Body    = "Hola Alberto te hablo desde la pàgina web ";  
	  
		$mail->send(); // Enviem l'email
		
		// Establecer el modo de errores para PDO
		$connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		// Manejar errores de conexión
		echo "Error de conexión a la base de datos: " . $e->getMessage();
		die();
	}
	}
	if (!isset($_SESSION['viaje_insertado'])) {
	if (empty($errors)){
		try {
			$preu = 1;
			$dataViatge = $valor;
			// Establecer la conexión a la base de datos

			$connexio = new PDO('mysql:host=localhost;dbname=wonderfull_travel', 'root', '');
			$statement = $connexio->prepare("SELECT preu FROM paisos WHERE nombre = ?");
			$statement->bindParam(1,$validChoice2);
			$statement->execute();
			while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
				$preu = $row["preu"];
			}

			$preu = $preu * $validPersonas;
			if ($validDescuento == "SI"){
				$preu = $preu - (($preu * 10) / 100);
			}

			$statement = $connexio->prepare("INSERT INTO viatges (destí, preu_total, num_persones, data, pais, uniqid) VALUES (?,?,?,?,?,?)");
			
			$statement->bindParam(1, $validChoice1);
			$statement->bindParam(2, $preu);
			$statement->bindParam(3, $validPersonas);
			$statement->bindParam(4, $dataViatge);
			$statement->bindParam(5, $validChoice2);
			$statement->bindParam(6, $uniqid);
			$statement->execute();

					   // Limitar la visualización a tres registros
			$_SESSION['viajes'][] = array(
							'uniqid' => $uniqid,
							'Destino' => $validChoice1,
							'Precio total' => $preu,
							'Número de personas' => $validPersonas,
							'Fecha' => $dataViatge,
							'País' => $validChoice2,
							'Descompte' => $validDescuento,
							'Imagen' => strtolower($validChoice1) . '/' . strtolower(str_replace(" ","",$validChoice2)) . '2.webp' 
						);

			// Mostrar la información de viajes anteriores almacenada en la sesión
			$totalViajes = count($_SESSION['viajes']);
			$inicio = $totalViajes > 3 ? $totalViajes - 3 : 0;
			for ($i = $inicio; $i < $totalViajes; $i++) {
			$viaje = $_SESSION['viajes'][$i];
			$viatges.= "<strong>"."Destino: "."</strong>" . $viaje['Destino'] . "<br>";
			$viatges.= "<strong>"."Precio total: "."</strong>" . $viaje['Precio total'] . " €" . "<br>";
			$viatges.= "<img src='../assets/images/" . $viaje['Imagen'] . "' alt='' style='float: right; width: 100px;'>"; 
			$viatges.= "<strong>"."Número de personas: "."</strong>" . $viaje['Número de personas'] . "<br>";
			$viatges.= "<strong>"."Fecha: "."</strong>" . $viaje['Fecha'] . "<br>";
			$viatges.= "<strong>"."País: "."</strong>" . $viaje['País'] . "<br>";
			$viatges.= "<strong>"."Descompte: "."</strong>" . $viaje['Descompte'] . "<br>";
			$viatges.= '<form method="post" action="./index.php">';
			$viatges.= '<button class="btn-delete-comment custom" type="submit" name="delete-article" value="' . $viaje['uniqid'] . '">Borrar reserva</button>';
			$viatges.= '</form>';
			$viatges.= "<br>";
			}
			
		$mail = new PHPMailer(true);
		$nom = $validNombre; $adreca = $validEmail;
		// Canviar les opcions del SMTP
		$mail->SMTPDebug =0;
		$mail->SMTPOptions = array(
		  'ssl' => array(
			  'verify_peer' => false,
			  'verify_peer_name' => false,
			  'allow_self_signed' => true
		  )
	  );                      
		$mail->isSMTP();                                            //Enviar utilitzant SMTP
		$mail->Host       = 'smtp.gmail.com';                    
		$mail->SMTPAuth   = true;                                   //Activem l'autenticació SMTP
		$mail->Username   = 'xamppbmartinez@gmail.com';                     //Email on creem la clau
		$mail->Password   = 'jvrg fwih oxgm ncwm';                          //Clau d'acces
		$mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';            //Enable implicit TLS encryption
		$mail->Port       = 587;                                    // Utilitzem el port 587
	  
		//Recipients
		$mail->setFrom('xamppbmartinez@gmail.com', $nom); 
		$mail->addAddress($adreca);     
	  
		//Content
		$mail->isHTML(true); //Enviar l'email en format HTML
		$mail->Subject = 'Reserva feta'; // Assumpte
		$mail->Body    = "Hola ".$nom . " ". $validApellido . "<br>" . 
		" Et recordem que la teva reserva per el vol a " . $validChoice2. " ja ha sigut validat <br>" . 
		 "<strong>"."Destino: "."</strong>" . $viaje['Destino'] . "<br>" .
		 "<strong>"."Precio total: "."</strong>" . $viaje['Precio total'] . " €" . "<br>".
		 "<strong>"."Número de personas: "."</strong>" . $viaje['Número de personas'] . "<br>".
		 "<strong>"."Fecha: "."</strong>" . $viaje['Fecha'] . "<br>".
		 "<strong>"."País: "."</strong>" . $viaje['País'] . "<br>";
	  
		$mail->send(); // Enviem l'email
		
		}
			catch(PDOException $e) {
			// Manejar errores de conexión
			echo "Error de conexión a la base de datos: " . $e->getMessage();
			die();
			}
		}
	}
}
include '../vista/index_view.php';

?>