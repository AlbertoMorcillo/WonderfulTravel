<!doctype html>
<html lang="ca">
	<head>
		<title>WONDERFULL TRAVELL</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="../estilos/style.css"> <!-- Hacer referencia a tu archivo de estilos -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	</head>
	<body>
<!-- partial -->
		<form method="POST" action="../controlador/index.php">

		<br>Data <input type="date" id="datahora" name="datahora" ><br>
		Desti 		
		<select class="form-control" id="choice1" name="choice1">
			<option value="defecto" selected>Sel·lecciona un continent</option>
			<option value="ASIA">ASIA</option>
			<option value="EUROPA">EUROPA</option>
			<option value="AFRICA" >ÀFRICA</option>
			<option value="AMERICA">AMÈRICA</option>
		</select>

		<select class="form-control" id="choice2" name ="choice2">
			<option data-option="ASIA" 	value="defecto"selected>Sel·lecciona un país</option>
			<option data-option="ASIA"    value="Afganistan">Afganistán</option>
			<option data-option="ASIA"    value="Japon">Japón</option>
			<option data-option="ASIA"    value="Yemen">Yemen</option>
			<option data-option="EUROPA" 	value="defecto"selected>Sel·lecciona un país</option>
			<option data-option="EUROPA"   value="España">España</option>
			<option data-option="EUROPA"   value="Portugal">Portugal</option>
			<option data-option="EUROPA"    value="Luxemburgo">Luxemburgo</option>
			<option data-option="AFRICA" 	value="defecto"selected>Sel·lecciona un país</option>
			<option data-option="AFRICA"    value="Uganda">Uganda</option>
			<option data-option="AFRICA"   value="Sierra Leona">Sierra Leona</option>
			<option data-option="AFRICA"    value="Marruecos">Marruecos</option>
			<option data-option="AMERICA" 	value="defecto"selected>Sel·lecciona un país</option>
			<option data-option="AMERICA"   value="Mexico">México</option>
			<option data-option="AMERICA"    value="Brasil">Brasil</option>
			<option data-option="AMERICA"   value="Argentina">Argentina</option>
		</select><br>

		Nom <input type="text" id="nom" name="nom" value="<?php if(isset($_POST['nom']) && !(empty($errors))) { echo($_POST['nom']);} ?>" ><br>
		<img id="countryImage" src="" alt="" style="float: right; margin-right: 20px;">

		Apellidos <input type="text" id="cognoms" name="cognoms" value="<?php if(isset($_POST['cognoms']) && !(empty($errors))) { echo($_POST['cognoms']);} ?>"><br>

		Email <input type="text" id="email" name="email" value="<?php if(isset($_POST['email']) && !(empty($errors))) { echo($_POST['email']);} ?>"><br>

		Preu <input type="text" id="preu" name="preu" readonly ><br>

		Genere <br><input type="radio" id="genere" name="genere" value="masculi">
		<label for="masculi">Masculí</label><br>
		<input type="radio" id="genere" name="genere" value="femeni">
		<label for="femeni">Femení</label><br>
		<input type="radio" id="genere" name="genere" value="privat">
		<label for="privat">Privat</label><br>

		Telèfon <input type="text" id="telefon" name="telefon" value="<?php if(isset($_POST['telefon']) && !(empty($errors))) { echo($_POST['telefon']);} ?>"><br>
		Persones <input type="number" id="persones" name="persones" min="1" max="100" value="<?php if(isset($_POST['persones']) && !(empty($errors))) { echo($_POST['persones']);} ?>"><br>
		Descompte <input type="checkbox" id="descompte" name="descompte" value="<?php if(isset($_POST['descompte']) && !(empty($errors))) { echo($_POST['descompte']);} ?>"><br>
		<span class="error">
		<?php if (isset($errors) && !empty($errors)) : ?>
        <div class="error-message">
            <?php echo $errors ?>
        </div>
		<?php endif; ?>

	</span> 
		<br>
	<button type="submit" name="submit" value="Enviar">Enviar</button>
	<span class="viatges">
		<?php if (isset($viatges) && !empty($viatges)) : ?>
        <br>
			<div class="viatges-message">
            <?php echo $viatges ?>
        </div>
        <?php endif; ?>
		</span> 

	</form>	
	</body>
</html>
