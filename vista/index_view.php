<!doctype html>
<html lang="ca">
	<head>
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
		</style>
		    <link rel="stylesheet" href="../estilos/style.css"> <!-- Hacer referencia a tu archivo de estilos -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="./calculos.js"></script>
		<script defer src="DataHora.js"></script>

	</head>
	<body>


<!-- partial -->
<script  src="./script.js"></script>
<!-- partial -->
		<form method="post" action="../controlador/index.php">

		Data <input type="date" id="datahora" name="datahora" ><br>
		Desti 		
		<select class="form-control" id="choice1" name="choice1">
			<option value="defecto" selected>Sel·lecciona un continent</option>
			<option value="ASIA">ASIA</option>
			<option value="EUROPA">EUROPA</option>
			<option value="ÀFRICA" >ÀFRICA</option>
			<option value="AMÈRICA">AMÈRICA</option>
		   </select>
		   
		   <select class="form-control" id="choice2" name ="choice2">
		   	 <option data-option="ASIA" 	value="defecto"selected>Sel·lecciona un país</option>
			 <option data-option="ASIA"    value="Afganistán">Afganistán</option>
			 <option data-option="ASIA"    value="Japón">Japón</option>
			 <option data-option="ASIA"    value="Yemen">Yemen</option>
			 <option data-option="EUROPA" 	value="defecto"selected>Sel·lecciona un país</option>
			 <option data-option="EUROPA"   value="España">España</option>
			 <option data-option="EUROPA"   value="Portugal">Portugal</option>
			 <option data-option="EUROPA"    value="Luxemburgo">Luxemburgo</option>
			 <option data-option="ÀFRICA" 	value="defecto"selected>Sel·lecciona un país</option>
			 <option data-option="ÀFRICA"    value="Uganda">Uganda</option>
			 <option data-option="ÀFRICA"   value="Sierra Leona">Sierra Leona</option>
			 <option data-option="ÀFRICA"    value="Marruecos">Marruecos</option>
			 <option data-option="AMÈRICA" 	value="defecto"selected>Sel·lecciona un país</option>
			 <option data-option="AMÈRICA"   value="México">México</option>
			 <option data-option="AMÈRICA"    value="Brasil">Brasil</option>
			 <option data-option="AMÈRICA"   value="Argentina">Argentina</option>
		   </select><br>
		Nom <input type="text" id="nom" name="nom" value="<?php if(isset($_POST['nom']) && !(empty($errors))) { echo($_POST['nom']);} ?>" ><br>
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
		
	<button type="submit" name="submit" value="Enviar">Enviar</button>


	</form>	
	</body>
</html>
