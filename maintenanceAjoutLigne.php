<?php

include 'connexionBdd.php';

//include 'header.php';

//	On récupère tout ce qui à été entré dans le formulaire pour traiter les données par la suite

if(isset($_POST['ajouterLigneMaintenance'])){
	$society = htmlspecialchars($_POST['society']);
	$annee = htmlspecialchars($_POST['annee']);
	$date = htmlspecialchars($_POST['date']);
	$demande = htmlspecialchars($_POST['demande']);
	$nbr_heures = htmlspecialchars($_POST['nbr_heures']);

//	Traitement des données et insertion dans la base de données

	$test_add_maintenance = "INSERT INTO maintenance (annee_maintenance, date_maintenance, demande_maintenance, nbr_heure_maintenance, society_maintenance) VALUES ('$annee', '$date', '$demande', '$nbr_heures', '$society')";
	$result_add_maintenance = mysql_query($test_add_maintenance);
	header('Location: maintenance.php');
}

?>

<div id="maintenanceAjoutLigne">

	<section>
		
		<form action="maintenanceAjoutLigne.php" method="POST">
		
			<input type="text" name="society" placeholder="Société">
			<input type="number" name="annee" placeholder="Année">
			<input type="date" name="date" placeholder="Date">
			<textarea name="demande" placeholder="Demande"></textarea>
			<input type="number" name="nbr_heures" placeholder="Nombre heures">
			<input type="submit" name="ajouterLigneMaintenance" value="Ajouter la demande">
			
		</form>
		
	</section>

</div>