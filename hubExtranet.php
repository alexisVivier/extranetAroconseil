<?php
	session_start();

include 'connexionBdd.php';

if ($_SESSION["admin"] === 1){
	include ("header.php");
}
else if($_SESSION["admin"] === 0){
	include ("headerClient.php");
}
?>

<div id="hubExtranetBody">
	<a href="modifsUser.php">Modifier un utilisateur</a>
	<a href="maintenance.php">Maintenance</a>
</div>

<?php 
	include ("footer.php");
?>