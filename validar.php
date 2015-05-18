<?php 
	include('./include/config.php');
	if(isset($_POST['registrarse'])){
		$user = htmlspecialchars($_POST['usuario']);
		$pass = htmlspecialchars($_POST['clave']);
		$email = htmlspecialchars($_POST['correo']);

		if(empty($user) or empty($pass) or empty($email)){
			echo "<span id='notificacion' class='error'>rellene los formularios</span>";
		}else{
			$result = $conx->query('SELECT * FROM users WHERE usuario="'.$user.'" or email="'.$email.'"');

			$num = $result->fetch_array(MYSQLI_ASSOC);
				
			if($user == $num['usuario']){
				echo "<span id='notificacion' class='error'>el usuario ya existe</span>";
			}else{
				if($email == $num['email']){
					echo "<span id='notificacion' class='error'>ese email ya esta siendo usado</span>";
				}else{
					$conx->query('INSERT INTO users(usuario,clave,email) VALUES("'.$user.'","'.$pass.'","'.$email.'")');
					echo "<span id='notificacion' class='success'>Usted se a registrado con exito</span>";
				}
			}
		}
	}
	if(isset($_POST['conectarse'])){
		
		$user = htmlspecialchars($_POST['usuario']);
		$pass = htmlspecialchars($_POST['clave']);


		if(empty($user) or empty($pass)){
			echo "<span id='notificacion' class='error'>estan vacio los formularios</span>";
		}else{
			$result = $conx->query('SELECT * FROM users WHERE usuario="'.$user.'" AND clave="'.$pass.'"');
			$num = $result->fetch_array(MYSQLI_ASSOC);
				
			if($user == $num['usuario'] ){

				if($pass == $num['clave']){

					session_start(); 

					$_SESSION['id'] = $num['id'];
					$_SESSION['usuario'] = $num['usuario'];
					$_SESSION['email'] = $num['email'];

					echo "<span id='notificacion' class='success'>Usted se a conectado exitosamente</span>";

				}
			}else{
				echo "<span id='notificacion' class='error'>la clave o el usuario estan equivocados</span>";
			}
		}
	}
	
	if(isset($_POST['preguntar'])){

		session_start();
		if(isset($_SESSION['id'])){
			$pregunta = htmlspecialchars($_POST['pregunta']);
			$descripcion = htmlspecialchars($_POST['descripcion']);
			$usuario = $_SESSION['usuario'];

			if(empty($pregunta) or empty($descripcion)){
				echo "<span id='notificacion' class='error'>Rellene el formulario</span>";
			}else{
				$conx->query('INSERT INTO preguntas(titulo,descripcion,creador) VALUES("'.$pregunta.'","'.$descripcion.'","'.$usuario.'")');
				echo "<span id='notificacion' class='success'>Su pregunta a sido publicada</span>";
			}
		}
	}
	
?>