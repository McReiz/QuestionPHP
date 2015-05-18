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


		$consulta = "SELECT * FROM preguntas WHERE creador='".$num['usuario']."'";
		$result = $conx->query($consulta);
		$pregunta = $result->fetch_array(MYSQLI_ASSOC);
		
		if($pregunta){
			while ($pregunta = $result->fetch_array(MYSQLI_ASSOC)) {
				echo $pregunta['titulo'];
			}
		}else{
			echo "no se registro nada";
		}
		

	}
	include('./content/footer.php');

?>