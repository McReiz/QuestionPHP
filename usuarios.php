<?php
	session_start();
	include('./include/class.php');
	$result2 = $conx->query("SELECT * FROM users");
	$result = new selected('users', 5);
	
	include('./content/header.php');
	include('./content/usuarios.php');
	include('./content/footer.php');
?>