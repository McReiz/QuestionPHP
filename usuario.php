<?php
	session_start();
	include('./include/class.php');

	include('./content/header.php');
	

	if(empty($_GET["id"])){
		echo "no se a encontrado ningun usuario";
	}else{
		$id = $_GET["id"];
		$result = $conx->query("SELECT * FROM users WHERE id=".$id."");

		$num = $result->fetch_array(MYSQLI_ASSOC);
		
		echo "<b style='font-weight:bold;'>{$num['usuario']}</b><br />"; 


		$consulta = "SELECT * FROM preguntas WHERE creador='".$num['usuario']."' ORDER BY id ASC";
		$result = $conx->query($consulta);
		$preguntas = $result->num_rows;
		
		if($preguntas > 0){
			echo "tiene <b style='font-weight:bold;'>$preguntas</b> preguntas<br>";
			while ($pregunta = $result->fetch_array(MYSQLI_ASSOC)) {
				echo "<br>{$pregunta['titulo']}<br>";
			};
		}else{
			echo "no se registro nada";
		}
		$result->close();
	}
	include('./content/footer.php');

?>