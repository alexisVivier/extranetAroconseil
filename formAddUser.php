<?php 
//	On se connecte à la base de données

include("connexionBdd.php");

//	On récupère tout ce qui à été entré dans le formulaire pour traiter les données par la suite

$lastname = htmlspecialchars($_POST['lastname']);
$firstname = htmlspecialchars($_POST['firstname']);
$email = htmlspecialchars($_POST['mail']);
$society = htmlspecialchars($_POST['society']);
$password = htmlspecialchars($_POST['password']);
$admin = htmlspecialchars($_POST['admin']);
		
//	Traitement des données et insertion dans la base de données

$test_add_user = "INSERT INTO user (lastname, firstname, mail, admin, password, society) VALUES ('$lastname', '$firstname', '$email', '$admin', '$password', '$society')";
$result_add_user = mysql_query($test_add_user);

// On récupère les informations concernant le nouveau mot de passe ainsi que la confirmation

$newMdp = htmlspecialchars($_POST['newMdp']);
echo $newMdp;
$newMdpConfirm = htmlspecialchars($_POST['newMdpConfirm']);
echo $newMdpConfirm;

?>

<!DOCTYPE html>
<html>
    <body>
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
            <input type="submit" value="OK"> 
        </form>
        <form action="formAddUser.php" method="post" id="changePasswordFrom">
            <div>
                <label for="newMdp">Votre nouveau mot de passe : </label>
                <input type="password" name="newMdp">
            </div>
            <div>
                <label for="newMdpConfirm">Confirmez votre nouveau mot de passe : </label>
                <input type="password" name="newMdpConfirm">
            </div>
            <input type="submit" value="Envoyer">
        </form>
    </body>
</html>