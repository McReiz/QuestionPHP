<?php 
	if(!class_exists('configGlobal')){
		header('location: ../index.php');
	}
?>
	<section>
		<h2>Usuarios registrados:</h2>
		<?php
			while($num = $result->fetch_array(MYSQLI_ASSOC)){
				?>
					<p>
						<a href="usuario.php?id=<?php echo $num['id'] ?>"><?php echo $num['usuario']; ?></a>
					</p>
				<?php
			}
		?>
	</section>