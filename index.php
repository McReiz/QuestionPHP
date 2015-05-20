<?php 
	session_start();
	include('include/class.php');

	include('./content/header.php');

	// hacemos llamado a la base de datos.
	$query = "SELECT * FROM preguntas";
	$result = $conx->query($query);

	// contamos cuantas tablas hay en nuestra base de datos
	$count = $result->num_rows;

	// PAGINACION

	// establecemos una variable limite
	$limite = 5;
	
	// verificamos si existe algun $_GET

	// si la cantidad es mayor o igual a 1 nos convertira la varible $validar en true
	if($count >= 1){
		$validar = true;
	}else{
	// si no sera false y enviara un mensaje de error.
		$validar = false;
		$mensaje = "Su sitio no tiene ninguna pregunta por ahora";
	}


	if(isset($_GET['pag'])){
		$pagina = htmlentities($_GET['pag']);
	}else{
		$pagina = 1;
	}
	
	if($pagina < 1){
		$inicio = 0;
		$pagina = 1;
	}else{
		$inicio = ($pagina-1) * $limite;
	}
	$total = ceil( $count / $limite);

	if($total > 1){
		$pagi = true;
	}else{
		$pagi = false;
	}
	$query = "SELECT *FROM preguntas ORDER BY id DESC LIMIT ".$inicio.",".$limite."";
	$result = $conx->query($query);


	include('./content/home.php');
	include('./content/footer.php');
	$result->close();
?>