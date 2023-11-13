<!doctype html>
<html lang="ca">
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
		<script defer src="DataHora.js"></script>
	</head>
	<body>
		<form method="post" action="../controlador/index.php">
		<div id="data" class="datahora"></div><br><br>
		Data <input type="date" id="datahora" name="datahora" ><br>
		Desti 		
		<select class="form-control" id="choice1">
			<option value="ASIA">ASIA</option>
			<option value="EUROPA">EUROPA</option>
			<option value="ÀFRICA" >ÀFRICA</option>
			<option value="AMÈRICA">AMÈRICA</option>
		   </select>
		   
		   <select class="form-control" id="choice2">
			 <option data-option="ASIA"    value="Afganistán">Afganistán</option>
			 <option data-option="ASIA"    value="Japón">Japón</option>
			 <option data-option="ASIA"    value="Yemen">Yemen</option>
			 <option data-option="EUROPA"   value="España">España</option>
			 <option data-option="EUROPA"   value="Portugal">Portugal</option>
			 <option data-option="EUROPA"    value="Luxemburgo">Luxemburgo</option>
			 <option data-option="ÀFRICA"    value="Uganda">Uganda</option>
			 <option data-option="ÀFRICA"   value="Sierra Leona">Sierra Leona</option>
			 <option data-option="ÀFRICA"    value="Marruecos">Marruecos</option>
			 <option data-option="AMÈRICA"   value="México">México</option>
			 <option data-option="AMÈRICA"    value="Brasil">Brasil</option>
			 <option data-option="AMÈRICA"   value="Argentina">Argentina</option>
		   </select><br>
		Nom <input type="text" id="nom" name="nom" value="<?php if(isset($_POST['nom']) && !(empty($errors))) { echo($_POST['nom']);} ?>" ><br>
		Apellidos <input type="text" id="cognoms" name="cognoms" value="<?php if(isset($_POST['cognoms']) && !(empty($errors))) { echo($_POST['cognoms']);} ?>"><br>
		Email <input type="text" id="email" name="email" value="<?php if(isset($_POST['email']) && !(empty($errors))) { echo($_POST['email']);} ?>"><br>
		
		Preu <input type="text" id="preu" name="preu" readonly ><br>

		Genere <br><input type="radio" id="genere" name="genere" value="HTML">
		<label for="html">Masculí</label><br>
		<input type="radio" id="genere" name="genere" value="CSS">
		<label for="css">Femení</label><br>
		<input type="radio" id="genere" name="genere" value="JavaScript">
		<label for="javascript">Privat</label><br>

		Telèfon <input type="text" id="telefon" name="telefon" value="<?php if(isset($_POST['telefon']) && !(empty($errors))) { echo($_POST['telefon']);} ?>"><br>
		Persones <input type="text" id="persones" name="persones" value="<?php if(isset($_POST['persones']) && !(empty($errors))) { echo($_POST['persones']);} ?>"><br>
		Descompte <input type="checkbox" id="descompte" name="descompte" value="<?php if(isset($_POST['descompte']) && !(empty($errors))) { echo($_POST['descompte']);} ?>"><br>
        <span class="error">
		<?php if(!isset($errors)){
		$errors;
	        }else{echo $errors;}?>
	</span> 
		
	<button type="submit" name="submit" value="Enviar">Enviar</button>


	</form>	
	</body>
</html>
