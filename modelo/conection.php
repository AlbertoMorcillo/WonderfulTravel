<?php

function validarNombreOk($validNombre, &$errors){
    if (empty($validNombre)) {
         $errors .= "El nombre está vacío.</br>";
    }
     // Verificar si el nombre contiene caracteres válidos
     if (!preg_match("/^([a-zA-Z']+)$/", $validNombre)) {
     $errors .= "Nombre no válido. Solo se permiten letras y apóstrofos.</br>";
    }
}

function validarApellidoOk($validApellido, &$errors){
    if (empty($validApellido)) {
        $errors .= "El apellido está vacío.</br>";
    }
     // Verificar si el apellido contiene caracteres válidos
     if (!preg_match("/^([a-zA-Z']+)$/", $validApellido)) {
        $errors .= 'Apellido no válido. Solo se permiten letras y apóstrofos.</br>';
    }
}

function validarEmailOk($validEmail, &$errors){
    if (empty($email)) {
        $errors .= 'El correo electrónico está vacío.</br>';
    }
    else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors .= 'Correo electrónico no válido.</br>';
        }
    }
}

function validarTelfOk($validTelf, &$errors){
    if (empty($validTelf)){
        $errors .= 'El teléfono no puede estar vacío.<br>';
    }
    if (!preg_match("/^\+34\d{9}$/", $validTelf)){
        $errors .= 'Telefono no válido. Tienen que ser 9 dígitos.</br>';
    }
}

function validarGeneroOk($validGenero, &$errors){
    if (empty($validGenero)){
        $errors .= 'El género no puede estar vacío.<br>';
    }
}


?>