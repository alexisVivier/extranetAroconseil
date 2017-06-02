<?php
	
//	On récupere ce qui a été entré dans le formulaire de connexion et on enregistre dans deux variables
session_start();
include("connexionBdd.php");
if(isset($_POST['connexion'])){
	$email = htmlspecialchars($_POST['emailUser']);
	$password = htmlspecialchars($_POST['passwordUser']);
	$test_mail = "SELECT mail FROM user WHERE mail = '".$email."'";
	$result_mail = mysql_query($test_mail);
	while($data_mail=mysql_fetch_array($result_mail)){
		$mailUser = $data_mail[mail];
	}
	$test_mdp = "SELECT password FROM user WHERE mail = '".$email."'";
		$result_mdp = mysql_query($test_mdp);
		while($data_mdp=mysql_fetch_array($result_mdp)){
			$mdpUser = $data_mdp[password];
		}
	if ($email == "" && $password == ""){
		$erreur = "Entrez votre email et votre mot de passe";
	}
	else if ($email == "" && $password !== ""){
		$erreur = "Entrez votre adresse mail.";
	}
	else if ($email !== "" && $password == ""){
		$erreur = "Entrez votre mot de passe.";
	}
	else if ($mailUser !== $email && $mdpUser !== $password){
		$erreur = "Entrez un mail et un mot de passe valide";
	}
	else if ($mailUser == $email){
		if ($mdpUser == $password && $password != ""){
			header('Location: hubExtranet.php');
			$_SESSION["login"] = true;
			$test_admin = "SELECT admin FROM user WHERE mail = '".$email."'";
			$result_admin = mysql_query($test_admin);
			while($data_admin=mysql_fetch_array($result_admin)){
				$adminUser = $data_admin[admin];
			}
			if ($adminUser == 1){
				$_SESSION["admin"] = 1;
			}
			else{
				$_SESSION["admin"] = 0;
			}
		}
		else{
			$erreur = "Mot de passe incorect";
		}
	}
	
// Envoie vers les différentes pages en fonction d'admin ou pas
}
// Include du header

	include "header.php";

?>
<div id="index">
	<section>
		<div id="messageConnexion">
			<h2>Bienvenue sur l'extranet d'AroConseil.</h2>
			<h2>Pour continuer, merci de vous identifier.</h2>
			<p><?php echo $erreur ?></p>
		</div>
		<form action="index.php" method="post">
			<div>
				<label for="emailUser">Votre email :</label>
				<input type="email" name="emailUser">
			</div>
			<div>
				<label for="passwordUser">Votre mot de passe :</label>
				<input type="password" name="passwordUser">
			</div>
			<input type="submit" value="Connexion" name="connexion">
		</form>
	</section>
</div>
<?php 
	include "footer.php";
?>