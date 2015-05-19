<?php 
	session_start();
	include('include/class.php');

	include('./content/header.php');

	$query = "SELECT * FROM preguntas ORDER BY id DESC";
	$result = $conx->query($query);
	include('./content/home.php');
	include('./content/footer.php');
	
?>