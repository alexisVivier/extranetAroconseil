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

	include "headerIndex.php";

?>
	<div id="index">
		<section>
			<div id="messageConnexion">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 15 15" style="enable-background:new 0 0 15 15;" xml:space="preserve">
					<g>
						<path style="fill:#030104;" d="M14.982,7C14.736,3.256,11.744,0.263,8,0.017V0H7.5H7v0.017C3.256,0.263,0.263,3.256,0.017,7H0v0.5
		V8h0.017C0.263,11.744,3.256,14.736,7,14.982V15h0.5H8v-0.018c3.744-0.246,6.736-3.238,6.982-6.982H15V7.5V7H14.982z M4.695,1.635
		C4.212,2.277,3.811,3.082,3.519,4H2.021C2.673,2.983,3.599,2.16,4.695,1.635z M1.498,5h1.758C3.122,5.632,3.037,6.303,3.01,7H1.019
		C1.072,6.296,1.238,5.623,1.498,5z M1.019,8H3.01c0.027,0.697,0.112,1.368,0.246,2H1.498C1.238,9.377,1.072,8.704,1.019,8z
		 M2.021,11h1.497c0.292,0.918,0.693,1.723,1.177,2.365C3.599,12.84,2.673,12.018,2.021,11z M7,13.936
		C5.972,13.661,5.087,12.557,4.55,11H7V13.936z M7,10H4.269C4.128,9.377,4.039,8.704,4.01,8H7V10z M7,7H4.01
		c0.029-0.704,0.118-1.377,0.259-2H7V7z M7,4H4.55C5.087,2.443,5.972,1.339,7,1.065V4z M12.979,4h-1.496
		c-0.293-0.918-0.693-1.723-1.178-2.365C11.4,2.16,12.327,2.983,12.979,4z M8,1.065C9.027,1.339,9.913,2.443,10.45,4H8V1.065z M8,5
		h2.73c0.142,0.623,0.229,1.296,0.26,2H8V5z M8,8h2.99c-0.029,0.704-0.118,1.377-0.26,2H8V8z M8,13.936V11h2.45
		C9.913,12.557,9.027,13.661,8,13.936z M10.305,13.365c0.483-0.643,0.885-1.447,1.178-2.365h1.496
		C12.327,12.018,11.4,12.84,10.305,13.365z M13.502,10h-1.758c0.134-0.632,0.219-1.303,0.246-2h1.99
		C13.928,8.704,13.762,9.377,13.502,10z M11.99,7c-0.027-0.697-0.112-1.368-0.246-2h1.758c0.26,0.623,0.426,1.296,0.479,2H11.99z" /> </g>
				</svg>
				<p>Bienvenue sur l'extranet d'AroConseil.</p>
				<p>Pour continuer, merci de vous identifier.</p>
				<p>
					<?php echo $erreur ?>
				</p>
			</div>
			<form action="index.php" method="post">
				<div>
					<input type="email" name="emailUser" placeholder="Email">
					<input type="password" name="passwordUser" placeholder="Mot de passe"> </div>
				<input type="submit" value="Connexion" name="connexion"> </form>
		</section>
	</div>
	<?php 
	include "footer.php";
?>