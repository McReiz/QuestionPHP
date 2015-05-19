<section id="left">
	<?php if($validar == true){ ?>
		<div class="perfil">
			<h2><?php echo $usuario ?></h2>
		</div>
		<div class="preguntas">
			<?php 
				if($validar_p == true){ 
					while ($preg = $result->fetch_array(MYSQLI_ASSOC)) {
						
					?>
						<article>
							<h3><?php echo $preg['titulo']; ?></h3>
							<span><?php echo $preg['descripcion']; ?></span>
						</article>
					<?php 
					}
				}else{
					?>
						<div class="no-pregunta">Este usuario no tiene no ha hecho preguntas</div>
					<?php
				}
			?>
			
		</div>
	<?php }else{ ?>
		<div class="error-existencial">
			<h2 class="no-existe"><?php echo $mensaje ?></h2>
		</div>
	<?php } ?>
</section>
<?php include('aside.php'); ?>