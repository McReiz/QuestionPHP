<?php 
	if(!class_exists('configGlobal')){
		header('location: ../index.php');
	}
?>
<section class="left">
	<?php 
		
		$filtreoTexto = new filtreoTexto();
	?>
	<?php if($validar == true){
		while($preg = $result->fetch_array(MYSQLI_ASSOC)){ ?>
		
		<article>
			<h2>
				<a href="pregunta.php?id=<?php echo $preg['id'] ?>&titulo=<?php $filtreoTexto->getLink($preg['titulo']); ?>"><?php echo $preg['titulo']; ?></a>
			</h2>
			<span class="descripcion"><?php $filtreoTexto->getCode($preg['descripcion']);  ?></span>
			<span class="datos">publicado por: <?php echo $preg['creador'] ?></span>
		</article>
		<?php } 
			if($pagi == true){ 
				for( $i=1; $i<=$total; $i++){
					echo "<a href='".url."/inicio/$i/'>$i</a>";
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