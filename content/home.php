<section class="left">
	<?php while($preg = $result->fetch_array(MYSQLI_ASSOC)){ ?>
		<article>
			<h2><?php echo $preg['titulo']; ?></h2>
			<span class="descripcion"><?php echo $preg['descripcion'] ?></span>
			<span class="datos"><?php echo $preg['creador'] ?></span>
		</article>
	<?php } ?>

</section>
<?php include('aside.php') ?>