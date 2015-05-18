<?php
	session_start();
	include('./include/class.php');

	include('./content/header.php');
	

	if(empty($_GET["id"])){
		header('location: usuarios.php');
	}else{
		$id = htmlentities($_GET["id"]);
		$result = $conx->query("SELECT * FROM users WHERE id='".$id."'");
		$num = $result->fetch_array(MYSQLI_ASSOC);

		if($num['id'] == $id){
			$validar = true;
			$usuario = $num['usuario'];
			$query = "SELECT * FROM preguntas WHERE creador='".$usuario."'";
			$result = $conx->query($query);
			$preguntas_n = $result->num_rows;

			if($preguntas_n > 0){
				$validar_p = true;
			}else{
				$validar_p = false;
			}

		}else{
			$validar = false;
			$mensaje = "El usuario que esta intentando buscar no existe";
		}
		include('./content/usuario.php');
		$result->close();
	}
	include('./content/footer.php');

?>