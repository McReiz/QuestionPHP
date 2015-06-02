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
			<label for="usuario">Usuario: </label>
			<div class="input"><input id="usuario" type="text" name="usuario" ></div>
		</div>
		<div id="lab">
			<label for="clave">Pass: </label>
			<div class="input"><input id="clave" type="password" name="clave" ></div>
		</div>
		<div id="lab">
			<label for="email">Email: </label>
			<div class="input"><input id="email" type="email" name="correo" ></div>
		</div>
	</div>
	<input type="hidden" name="registrarse" value="1">
	<input type="submit" value="enviar" >
</form>
</section>