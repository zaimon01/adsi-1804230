<?php

	if(!isset($_SESSION['unames'])) {
		$_SESSION['error'] = "Debe Iniciar Sesión";
		echo "<script> 
					setTimeout(function() {
						window.location.replace('index.php'); 
						}, 1200);
				</script>";
	} else {
		if($_SESSION['urole'] != "Teacher") {
			$_SESSION['error'] = "Acceso Denegado";
			echo "<script> 
					setTimeout(function() {
						window.location.replace('index.php'); 
						}, 1200);
				</script>";
		}
	}
?>