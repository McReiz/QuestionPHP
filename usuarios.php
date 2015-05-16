<?php
	include('./include/class.php');
	$result = $conx->query("SELECT * FROM users");
	
	include('./content/header.php');
	include('./content/usuarios.php');
	include('./content/footer.php');
?>