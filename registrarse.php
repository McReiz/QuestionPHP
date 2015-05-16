<?php
	include('./include/class.php');

	include('./content/header.php');
	include('./content/footer.php');
?>
	<form action="validar.php" method="post">
		Usuario: <input type="text" name="usuario" >
		Pass: <input type="password" name="clave" >
		Email: <input type="email" name="correo" >
		<input type="hidden" name="registrarse" value="1">
		<input type="submit" value="enviar" >
	</form>
