<?php 
	include('./include/config.php');
	if(isset($_POST['registrarse'])){
		$user = htmlspecialchars($_POST['usuario']);
		$pass = htmlspecialchars($_POST['clave']);
		$email = htmlspecialchars($_POST['correo']);

		if(empty($user) or empty($pass) or empty($email)){
			echo "rellene los formularios";
		}else{
			$result = $conx->query('SELECT * FROM users WHERE usuario="'.$user.'" or email="'.$email.'"');

			$num = $result->fetch_array(MYSQLI_ASSOC);
				
			if($user == $num['usuario']){
				echo "el usuario ya existe";
			}else{
				if($email == $num['email']){
					echo "ese email ya esta siendo usado";
				}else{
					$conx->query('INSERT INTO users(usuario,clave,email) VALUES("'.$user.'","'.$pass.'","'.$email.'")');
					echo "Enviado";
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

					echo "<span id='notificacion' class='success'>conectados</span>";

				}
			}else{
				echo "<span id='notificacion' class='error'>la clave o el usuario estan equivocados</span>";
			}
		}
	}
?>