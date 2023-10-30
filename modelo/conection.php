<?php
try {
    // Establecer la conexión a la base de datos
    $connexio = new PDO('mysql:host=localhost;dbname=wonderfull_travel', 'root', '');

    // Establecer el modo de errores para PDO
    $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Manejar errores de conexión
    echo "Error de conexión a la base de datos: " . $e->getMessage();
    die();
}

?>