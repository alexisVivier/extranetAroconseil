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
	if ($email == "" && $password == ""){
		echo "Entrez votre email et votre mot de passe";
	}
	else if ($email == "" && $password !== ""){
		echo "Entrez votre adresse mail.";
	}
	else if ($email !== "" && $password == ""){
		echo "Entrez votre mot de passe.";
	}
	else if ($mailUser == $email){
		$test_mdp = "SELECT password FROM user WHERE mail = '".$email."'";
		$result_mdp = mysql_query($test_mdp);
		while($data_mdp=mysql_fetch_array($result_mdp)){
			$mdpUser = $data_mdp[password];
		}
		if ($mdpUser == $password && $password != ""){
			$test_admin = "SELECT admin FROM user WHERE mail = '".$email."'";
			$result_admin = mysql_query($test_admin);
			while($data_admin=mysql_fetch_array($result_admin)){
				$adminUser = $data_admin[admin];
			}
			if ($adminUser == 1){
				$_SESSION["admin"] = 1 = $adminOrNot;
			}
			else{
				$_SESSION["admin"] = 0 = $adminOrNot;
			}
		}
		else{
			echo "Mot de passe incorect";
		}
	}
	
	// Envoie vers les différentes pages en fonction d'admin ou pas
}
// Include du header

	include "header.php";

?>
<div id="index">
	<section>
		<p>Bienvenue sur l'extranet d'AroConseil.</p>
		<p>Pour continuer, merci de vous identifier.</p>
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