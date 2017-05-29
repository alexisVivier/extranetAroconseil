<?php
	
//	On récupere ce qui a été entré dans le formulaire de connexion et on enregistre dans deux variables

	$email = $_POST['emailUser'];
	$password = $_POST['passwordUser'];
	echo $email . $password;

	
?>