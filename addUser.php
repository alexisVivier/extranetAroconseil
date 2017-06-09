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

	
	include ("header.php");

?>
<section>
<div class="title-page-container">
    <div class="title-page-block-icon-title">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve">
<g>
	<g>
		<path d="M269.272,310.198c86.177-0.005,117.184-86.291,125.301-157.169C404.572,65.715,363.282,0,269.272,0
			C175.274,0,133.963,65.71,143.97,153.029C152.095,223.907,183.093,310.204,269.272,310.198z"/>
		<path d="M457.707,346.115c2.773,0,5.528,0.083,8.264,0.235c-4.101-5.85-8.848-11.01-14.403-15.158
			c-16.559-12.359-38.005-16.414-56.964-23.864c-9.229-3.625-17.493-7.226-25.251-11.326
			c-26.184,28.715-60.329,43.736-100.091,43.74c-39.749,0-73.891-15.021-100.072-43.74c-7.758,4.101-16.024,7.701-25.251,11.326
			c-18.959,7.451-40.404,11.505-56.964,23.864c-28.638,21.375-36.039,69.46-41.854,102.26c-4.799,27.076-8.023,54.707-8.964,82.209
			c-0.729,21.303,9.789,24.29,27.611,30.721c22.315,8.048,45.356,14.023,68.552,18.921c44.797,9.46,90.973,16.729,136.95,17.054
			c22.278-0.159,44.601-1.956,66.792-4.833c-16.431-23.807-26.068-52.645-26.068-83.695
			C309.995,412.378,376.258,346.115,457.707,346.115z"/>
		<path d="M457.707,375.658c-65.262,0-118.171,52.909-118.171,118.171S392.444,612,457.707,612s118.172-52.909,118.172-118.171
			C575.878,428.566,522.969,375.658,457.707,375.658z M509.407,514.103h-31.425v31.424c0,11.198-9.077,20.276-20.274,20.276
			c-11.198,0-20.276-9.078-20.276-20.276v-31.424h-31.424c-11.198,0-20.276-9.077-20.276-20.276
			c0-11.198,9.077-20.276,20.276-20.276h31.424v-31.424c0-11.198,9.078-20.276,20.276-20.276c11.198,0,20.274,9.078,20.274,20.276
			v31.424h31.425c11.198,0,20.276,9.078,20.276,20.276C529.682,505.027,520.606,514.103,509.407,514.103z"/>
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
</g></svg>
        <h1>Ajouter un utilisateur</h1>
    </div>
    <div class="title-page-block-line"></div>
</div>
<div id="modifsUser">
	<form action="formAddUser.php" method="post" id="addUserForm">
            <div id="addUser-input-row">
                <input type="text" name="lastname" placeholder="Nom"/>
                <input type="text" name="firstname" placeholder="Prénom"/>
            </div>
            <input type="text" name="society" placeholder="Nom de la société">
            <input type="email" name="mail" placeholder="E-mail"/>
            <input type="password" name="password" placeholder="Mot de passe"/>
            <select name="admin">
                <option value="1">Administrateur</option>
                <option value="0">Client</option>
            </select>
        <div class="button-style-submit">
            <input id="addUser-button-submit" type="submit" value="AJOUTER" name="addUserButton">
            <div class="button-style-submit-svg-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                    <path d="M20 12l-2.83 2.83 9.17 9.17-9.17 9.17 2.83 2.83 12-12z"/>
                    <path d="M0 0h48v48h-48z" fill="none"/>
                </svg>
            </div>
        </div>
	</form>
</div>
</section>