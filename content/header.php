<?php 
	if(!class_exists('configGlobal')){
		header('location: ../index.php');
	}
	$configGlobal = new configGlobal();
	$titulo = $configGlobal->getConfig('titulo');
	$eslogan = $configGlobal->getConfig('eslogan');
	$tags = $configGlobal->getConfig('tags');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo $titulo ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<META NAME="AUTHOR" CONTENT="el Reiz">
	<META NAME="DESCRIPTION" CONTENT="<?php echo $eslogan ?>">
	<META NAME="KEYWORDS" CONTENT="<?php echo $tags ?>">
	<META NAME="robots" content="ALL">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" type="text/css" href="<?php echo url ?>/content/estilos/resets.css">
	<link rel="stylesheet" type="text/css" href="<?php echo url ?>/content/estilos/style.css">

</head>
<body>
<div id="wrapper">
	<header>
		<h1><?php echo $titulo ?></h1>
		<nav>
			<ul>
				<li>
					<a href="<?php echo url ?>/inicio">Inicio</a>
				</li>
				<li>
					<a href="<?php echo url ?>/usuarios">Usuarios</a>
				</li>
				<?php if(isset($_SESSION['usuario'])){ ?>
					<li>
						<a href="crearp.php">Preguntar</a>
					</li>
					<li>
						<a href="salir.php">Salir</a>
					</li>
				<?php }else{ ?>
					<li>
						<a href="login.php">Conectarse</a>
					</li>
					<li>
						<a href="registrarse.php">Registrarse</a>
					</li>
				<?php } ?>
			</ul>
		</nav>
	</header>
	<main>
