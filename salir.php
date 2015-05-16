<?php
	session_start();
	// algo esta mal aqui joder
	include("./include/class.php");
	include("./content/header.php");

	if(isset($_SESSION["id"])){

		session_destroy();
		unset($_SESSION["usuario"]); 
		unset($_SESSION["clave"]);
		unset($_SESSION["id"]);
		
		
		echo "Seccion finalizada.";
	}else{
		header("location: index.php");
	}
	exit;
	include("./content/footer.php");
?>
