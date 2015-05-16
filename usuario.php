<?php
	include('./include/class.php');

	include('./content/header.php');
	include('./content/footer.php');

	if(empty($_GET["id"])){
		echo "no hay ningun usuario";
	}else{
		$id = $_GET["id"];
		$result = $conx->query("SELECT * FROM users WHERE id=".$id."");

		$num = $result->fetch_array(MYSQLI_ASSOC);
		
		echo $num['usuario']; 
		
	}
?>