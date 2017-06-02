<?php

//	On se connecte à la base de données

include("connexionBdd.php");

// On lance la session pour utiliser les $_SESSION variables

session_start();

//	On récupère tout ce qui à été entré dans le formulaire pour traiter les données par la suite

if(isset($_POST['addUserButton'])){
	$lastname = htmlspecialchars($_POST['lastname']);
	$firstname = htmlspecialchars($_POST['firstname']);
	$email = htmlspecialchars($_POST['mail']);
	$society = htmlspecialchars($_POST['society']);
	$password = htmlspecialchars($_POST['password']);
	$admin = htmlspecialchars($_POST['admin']);

//	Traitement des données et insertion dans la base de données

	$test_add_user = "INSERT INTO user (lastname, firstname, mail, admin, password, society) VALUES ('$lastname', '$firstname', '$email', '$admin', '$password', '$society')";
	$result_add_user = mysql_query($test_add_user);
}

// On récupère les informations concernant le nouveau mot de passe ainsi que la confirmation

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

// Traitement pour supprimer un utilisateur

if(isset($_POST['deleteUser'])){
	$userToDelete = htmlspecialchars($_POST['userToDelete']);
	$test_user_to_delete = "DELETE FROM user WHERE user_id = '$userToDelete'";
	$result_to_delete = mysql_query($test_user_to_delete);
}
	
	include ("header.php");

?>
<div id="modifsUser">
	<form action="formAddUser.php" method="post" id="addUserForm">
		<input type="text" name="lastname" placeholder="Nom"/>
		<input type="text" name="firstname" placeholder="Prénom"/>
		<input type="email" name="mail" placeholder="E-mail"/>
		<input type="text" name="society" placeholder="Nom de la société"/>
		<input type="password" name="password" placeholder="Mot de passe"/>
		<select name="admin">
			<option value="1">Administrateur</option>
			<option value="0">Client</option>
		</select>
		<input type="submit" value="OK" name="addUserButton"> 
	</form>
	<form action="formAddUser.php" method="post" id="changePasswordFrom">
		<select name="userChangePassword">
			<?php
			$test_select_user_change_mdp = "SELECT * FROM user";
			$result_select_user_change_mdp = mysql_query($test_select_user_change_mdp);
			while($data_select_user_change_mdp=mysql_fetch_array($result_select_user_change_mdp)){
				print_r("<option value='".$data_select_user_change_mdp['user_id']."'>".$data_select_user_change_mdp['mail']."</option>");
			}
			?>
		</select>
		<div>
			<label for="newMdp">Votre nouveau mot de passe : </label>
			<input type="password" name="newMdp">
		</div>
		<div>
			<label for="newMdpConfirm">Confirmez votre nouveau mot de passe : </label>
			<input type="password" name="newMdpConfirm">
		</div>
		<input type="submit" value="Changer le mot de passe" name="changerMotDePasse">
	</form>
	<form action="formAddUser.php" method="post" id="deleteUserForm">
		<select name="userToDelete">
			<?php
			$test_select_user_to_delete = "SELECT * FROM user";
			$result_select_user_to_delete = mysql_query($test_select_user_change_mdp);
			while($data_select_user_to_delete=mysql_fetch_array($result_select_user_to_delete)){
				print_r("<option value='".$data_select_user_to_delete['user_id']."'>".$data_select_user_to_delete['mail']."</option>");
			}
			?>
		</select>
		<input type="submit" name="deleteUser" value="Supprimer l'utilisateur">
	</form>
</div>
<?php 

?>