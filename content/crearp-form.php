<section id="content" class="content">
	<form id="form" action="validar.php" class="pregunta" method="post">
		<div class="resultado"></div>
		<div class="inputs">
			<div id="lab">
				<label for="titulo">Titulo de pregunta: </label>
				<div class="input"><input id="titulo" type="text" name="pregunta"></div>
			</div>
			<div id="lab">
				<label for="descripcion">Descripcion: </label>
				<textarea id="descripcion" name="descripcion"></textarea>
			</div>
		</div>
		<input type="hidden" name="preguntar" value="1">
		<input type="submit" value="Preguntar">
	</form>
</section>
<?php include('aside.php') ?>
