<?php 
	if(!class_exists('configGlobal')){
		header('location: ../index.php');
	}
?>
<section id="content">
	<form id="form" action="validar.php" method="post">
		<div class="resultado"></div>
		<div class="inputs">
			<div id="lab">
				<label for="Usuario">Usuario: </label>
				<div class="input"><input id="Usuario" type="text" name="usuario" placeholder="Tu usuario"></div>
			</div>

			<div id="lab">
				<label for="Clave">Contraseña: </label>
				<div class="input"><input id="Clave" type="password" name="clave" placeholder="Tu contraseña"></div>
			</div>
		</div>
		<input type="hidden" name="conectarse" value="1">
		<input type="submit" value="Conectarse">
	</form>
</section>
