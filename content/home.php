<section class="left">
	<?php if($validar = true){
		while($preg = $result->fetch_array(MYSQLI_ASSOC)){ ?>
		<article>
			<h2>
				<a href="pregunta.php?id=<?php echo $preg['id'] ?>&titulo=<?php echo $preg['titulo'] ?>"><?php echo $preg['titulo']; ?></a>
			</h2>
			<span class="descripcion"><?php echo $preg['descripcion'] ?></span>
			<span class="datos">publicado por: <?php echo $preg['creador'] ?></span>
		</article>
		<?php } 
			if($pagi == true){ 
				for( $i=1; $i<=$total; $i++){
					echo "<a href='?pag=$i'>$i</a>";
				}
			 }
		}else{
			?>
				<h3 class="no-content"><?php echo $mensaje; ?></h3>
			<?php
		}
	?>
</section>
<?php include('aside.php') ?>