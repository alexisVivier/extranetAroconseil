<!doctype html>
<html>

<head>
	<title>Page Title</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0"> </head>
	<?php 
		include "connexionBdd.php";
	?>
<body> 
	<form action="connexionUser.php" method="post">
		<div>
			<label for="emailUser">Votre email :</label>
			<input type="email" name="emailUser">
		</div>
		<div>
			<label for="passwordUser">Votre mot de passe :</label>
			<input type="password" name="passwordUser">
		</div>
		<input type="submit" value="Connexion">
	</form>
</body>

</html>