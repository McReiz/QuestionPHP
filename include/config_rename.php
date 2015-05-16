<?php 
	//Reiz prueba
	define("server", "localhost");
	define("user", "root");
	define("pass", "Reiz");
	define("db", "sinnombre");

	$conx = new mysqli(server, user, pass, db);
	if ($conx->connect_errno) {
		trigger_error('Error de conexion: '  . $conx->connect_error, E_USER_ERROR);
	}
	//Reiz prueba
?>