<?php 
	session_start();

	include('./include/class.php');
	
	if(isset($_SESSION['id'])){
		include('./content/header.php');
		include('./content/crearp-form.php');
		include('./content/footer.php');
	}else{
		header('location: index.php');
	}

?>