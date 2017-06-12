<?php

//	On se connecte à la base de données

include("connexionBdd.php");

// On lance la session pour utiliser les $_SESSION variables

session_start();

// On teste pour vérifier si la personne connectée est bien admin, sinon on la renvoie a la page de connexion

if ($_SESSION["admin"] === 0){
	header('Location: index.php');
}
else if ($_SESSION["login"] !== true){
	header('Location: index.php');
}

// Modification du mot de passe 

if(isset($_POST['changerMotDePasse'])){
	
	$newMdp = htmlspecialchars($_POST['newMdp']);
	$newMdpConfirm = htmlspecialchars($_POST['newMdpConfirm']);
	$userChangePassword = htmlspecialchars($_POST['userChangePassword']);

// Alogrithme pour changer ou non le mot de passe en fonction de s'ils sont identiques

	if ($newMdp === $newMdpConfirm) {
		$test_new_mdp = "UPDATE user SET password = '$newMdp' WHERE user_id = '$userChangePassword'";
		$result_new_mdp = mysql_query($test_new_mdp);
	}
	else {
		echo "Les mots de passe ne sont pas identiques veuillez recommencer la saisie";
	}
}


// On récupère les informations concernant le nouveau mot de passe ainsi que la confirmation
	
	include ("header.php");

?>
	<section>
		<div class="title-page-container">
			<div class="title-page-block-icon-title">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="416.208px" height="416.209px" viewBox="0 0 416.208 416.209" style="enable-background:new 0 0 416.208 416.209;" xml:space="preserve">
					<g>
						<path d="M344.757,166.9h-20.543v-50.792C324.214,52.086,272.128,0,208.107,0C144.084,0,91.996,52.086,91.996,116.108V166.9H71.453
		c-6.635,0-12.012,5.377-12.012,12.011v225.286c0,6.635,5.377,12.012,12.012,12.012h273.305c6.633,0,12.01-5.377,12.01-12.012
		V178.911C356.767,172.277,351.39,166.9,344.757,166.9z M226.833,304.012v47.961c0,4.189-3.396,7.586-7.586,7.586h-22.286
		c-4.189,0-7.586-3.396-7.586-7.586v-47.961c-8.287-5.875-13.699-15.535-13.699-26.466c0-17.907,14.518-32.427,32.428-32.427
		c17.908,0,32.426,14.52,32.426,32.427C240.531,288.477,235.119,298.137,226.833,304.012z M268.779,166.9H147.431v-50.792
		c0-33.456,27.219-60.673,60.676-60.673c33.455,0,60.672,27.217,60.672,60.673V166.9z" /> </g>
				</svg>
				<h1>Modifier mot de passe</h1> </div>
			<div class="title-page-block-line"></div>
		</div>
		<div id="modifsUser">
			<form action="modificationMotDePasse.php" method="post" id="changePasswordFrom">
				<select name="userChangePassword">
					<?php
			$test_select_user_change_mdp = "SELECT * FROM user";
			$result_select_user_change_mdp = mysql_query($test_select_user_change_mdp);
			while($data_select_user_change_mdp=mysql_fetch_array($result_select_user_change_mdp)){
				print_r("<option value='".$data_select_user_change_mdp['user_id']."'>".$data_select_user_change_mdp['mail']."</option>");
			}
			?>
				</select>
				<div id="inputsChangePassword">
                    <div class="input-container-icon">
					   <input type="password" name="newMdp" placeholder="Nouveau mot de passe">
                        <svg class="input-container-icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512px" height="512px">
<g>
	<g>
		<path d="M508.305,245.892l-32.425-38.425c-2.979-3.529-7.361-5.565-11.979-5.565H219.74c-19.927-38.63-59.4-63.049-103.304-63.049    C52.232,138.852,0,191.404,0,256s52.232,117.148,116.436,117.148c43.904,0,83.377-24.419,103.304-63.049h29.307l17.245,30.079    c6.006,10.478,21.176,10.498,27.195-0.001l15.47-26.984l15.472,26.985c6.006,10.478,21.176,10.498,27.195-0.001l15.47-26.984    l15.472,26.986c6.006,10.478,21.176,10.498,27.195-0.001l17.243-30.078H463.9c4.617,0,9-2.036,11.979-5.565l32.425-38.425    C513.232,260.27,513.232,251.731,508.305,245.892z M116.436,296.961c-22.488,0-40.784-18.376-40.784-40.961    c0-22.585,18.296-40.961,40.784-40.961S157.22,233.415,157.22,256C157.22,278.585,138.924,296.961,116.436,296.961z" fill="#95989a"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
                    </div>
                    <div class="input-container-icon">
					   <input type="password" name="newMdpConfirm" placeholder="Confirmez votre nouveau mot de passe">
                        <svg class="input-container-icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512px" height="512px">
<g>
	<g>
		<path d="M508.305,245.892l-32.425-38.425c-2.979-3.529-7.361-5.565-11.979-5.565H219.74c-19.927-38.63-59.4-63.049-103.304-63.049    C52.232,138.852,0,191.404,0,256s52.232,117.148,116.436,117.148c43.904,0,83.377-24.419,103.304-63.049h29.307l17.245,30.079    c6.006,10.478,21.176,10.498,27.195-0.001l15.47-26.984l15.472,26.985c6.006,10.478,21.176,10.498,27.195-0.001l15.47-26.984    l15.472,26.986c6.006,10.478,21.176,10.498,27.195-0.001l17.243-30.078H463.9c4.617,0,9-2.036,11.979-5.565l32.425-38.425    C513.232,260.27,513.232,251.731,508.305,245.892z M116.436,296.961c-22.488,0-40.784-18.376-40.784-40.961    c0-22.585,18.296-40.961,40.784-40.961S157.22,233.415,157.22,256C157.22,278.585,138.924,296.961,116.436,296.961z" fill="#95989a"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
                    </div>
				</div>
				<div class="button-style-submit button-style-submit-password">
					<input id="addUser-button-submit" type="submit" value="CHANGER" name="changerMotDePasse">
					<div class="button-style-submit-svg-block">
						<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
							<path d="M20 12l-2.83 2.83 9.17 9.17-9.17 9.17 2.83 2.83 12-12z" />
							<path d="M0 0h48v48h-48z" fill="none" /> </svg>
					</div>
				</div> </form>
		</div>
	</section>