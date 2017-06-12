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
			$_SESSION["mail"] = htmlspecialchars($_POST['emailUser']);
			echo $mailUser;
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
			<div>
				<p id="firstP">Bienvenue sur l'extranet d'AroConseil.</p>
				<p id="secondP">Pour continuer, merci de vous identifier.</p>
				<p id="errorP">
					<?php echo $erreur ?>
				</p>
			</div>
		</div>
		<form action="index.php" method="post">
			<div id="champsConnexion">
				<div class="input-container-icon">
					<svg class="input-container-icon-svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 14 14" style="enable-background:new 0 0 14 14;" xml:space="preserve">
						<g>
							<g>
								<path d="M7,9L5.268,7.484l-4.952,4.245C0.496,11.896,0.739,12,1.007,12h11.986
			c0.267,0,0.509-0.104,0.688-0.271L8.732,7.484L7,9z" />
								<path d="M13.684,2.271C13.504,2.103,13.262,2,12.993,2H1.007C0.74,2,0.498,2.104,0.318,2.273L7,8
			L13.684,2.271z" />
								<polygon points="0,2.878 0,11.186 4.833,7.079 		" />
								<polygon points="9.167,7.079 14,11.186 14,2.875 		" /> </g>
						</g>
					</svg>
					<input type="email" name="emailUser" placeholder="Email"> </div>
				<div class="input-container-icon">
					<svg class="input-container-icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512px" height="512px">
						<g>
							<g>
								<path d="M508.305,245.892l-32.425-38.425c-2.979-3.529-7.361-5.565-11.979-5.565H219.74c-19.927-38.63-59.4-63.049-103.304-63.049    C52.232,138.852,0,191.404,0,256s52.232,117.148,116.436,117.148c43.904,0,83.377-24.419,103.304-63.049h29.307l17.245,30.079    c6.006,10.478,21.176,10.498,27.195-0.001l15.47-26.984l15.472,26.985c6.006,10.478,21.176,10.498,27.195-0.001l15.47-26.984    l15.472,26.986c6.006,10.478,21.176,10.498,27.195-0.001l17.243-30.078H463.9c4.617,0,9-2.036,11.979-5.565l32.425-38.425    C513.232,260.27,513.232,251.731,508.305,245.892z M116.436,296.961c-22.488,0-40.784-18.376-40.784-40.961    c0-22.585,18.296-40.961,40.784-40.961S157.22,233.415,157.22,256C157.22,278.585,138.924,296.961,116.436,296.961z" fill="#95989a" /> </g>
						</g>
					</svg>
					<input type="password" name="passwordUser" placeholder="Mot de passe"> </div>
			</div>
			<div class="button-style-submit" id="button-style-submit-index">
				<input id="addUser-button-submit" type="submit" value="CONNEXION" name="connexion">
				<div class="button-style-submit-svg-block">
					<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
						<path d="M20 12l-2.83 2.83 9.17 9.17-9.17 9.17 2.83 2.83 12-12z" />
						<path d="M0 0h48v48h-48z" fill="none" /> </svg>
				</div>
			</div>
		</form>
	</div>
	<?php 
	include "footer.php";
?>