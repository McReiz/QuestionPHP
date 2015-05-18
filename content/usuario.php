<section id="left">
	<?php if($validar == true){ ?>
		<div class="perfil">
			<h2><?php echo $usuario ?></h2>
		</div>
		<div class="preguntas">
			<?php //true ?>
			<article>
				<h2></h2>
				<span></span>
			</article>
			<?php //false ?>
			<div class="no-pregunta">Este usuario no tiene no ha hecho preguntas</div>
		</div>
	<?php }else{ ?>
		<div class="error-existencial">
			<h2 class="no-existe"><?php echo $mensaje ?></h2>
		</div>
	<?php } ?>
</section>
<?php include('aside.php'); ?>