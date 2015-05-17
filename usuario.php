<?php
	session_start();
	include('./include/class.php');

	include('./content/header.php');
	include('./content/footer.php');

	if(empty($_GET["id"])){
		echo "no se a encontrado ningun usuario";
	}else{
		$id = $_GET["id"];
		$result = $conx->query("SELECT * FROM users WHERE id=".$id."");

		$num = $result->fetch_array(MYSQLI_ASSOC);
		
		echo $num['usuario']; 

		echo "<b /> Su preguntas: <b />";
		$result = $conx->query("SELECT * FROM preguntas WHERE creador='".$num['usuario']."'");
		
		while($num2 = $result->fetch_array(MYSQLI_ASSOC)){
			echo $num2['titulo']."<br />";
		}
		
	}

?>