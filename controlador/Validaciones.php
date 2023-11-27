<?php

function validarNombreOk($validNombre, &$errors){
    if (empty($validNombre)) {
        $errors .= "El nom està buit.</br>";
    }
     // Verificar si el nombre contiene caracteres válidos
    if (!preg_match("/^([a-zA-Z']+)$/", $validNombre)) {
    $errors .= "
    Nom no vàlid. Només es permeten lletres i apòstrofs
    .</br>";
    }
}

function validarApellidoOk($validApellido, &$errors){
    if (empty($validApellido)) {
        $errors .= "
        El cognom està buit
        .</br>";
    }
     // Verificar si el apellido contiene caracteres válidos
    if (!preg_match("/^([a-zA-Z']+)$/", $validApellido)) {
        $errors .= '
        Cognom no vàlid. Només es permeten lletres i apòstrofs
        .</br>';
    }
}

function validarEmailOk($validEmail, &$errors){
    if (empty($validEmail)) {
        $errors .= '
        El correu electrònic està buit
        .</br>';
    }
    else {
        if (!filter_var($validEmail, FILTER_VALIDATE_EMAIL)) {
            $errors .= '
            Correu electrònic no vàlid
            .</br>';
        }
    }
}

function validarTelfOk($validTelf, &$errors){
    if (empty($validTelf)){
        $errors .= 'El telèfon no pot estar buit.<br>';
    }
    if (!preg_match("/^\+34\d{9}$/", $validTelf)){
        $errors .= 'Telèfon no vàlid. Han de ser 9 dígits.</br>';
    }
}

function validarGeneroOk($validGenero, &$errors){
    if (empty($validGenero)){
        $errors .= 'El gènere no pot estar buit.<br>';
    }
}

function validadNumPersonas($validPersonas, &$errors){
    if (empty($validPersonas)){
        return $validPersonas = 1;
    } 
}

function validarData($dataViatge, $fechaActual, &$errors) {   
    $fechaDelViaje = "";
    $fechaDelViaje2 = -1;
    $fechaDelViaje2 = strlen($dataViatge);

    if ($fechaDelViaje2 == 0){
        $errors .= 'La data del viatge no pot estar buida.<br>';
    } else{
        $fechaDelViaje = new DateTime($dataViatge);
        $diferencia = $fechaActual->diff($fechaDelViaje);
        $data = $diferencia->format("%R%a");

        if ($data < 0) {
            $errors .= 'La data del viatge no pot ser anterior a la data actual.<br>';
        }
    }

}