<?php

include 'connexionBdd.php';

$test_maintenance_count_all = "SELECT count(*) AS nbrLignes FROM maintenance";
$result_maintenance_count_all = mysql_query($test_maintenance_count_all);
while($data_maintenance_count_all = mysql_fetch_array($result_maintenance_count_all)){
	$total_maintenance = $data_maintenance_count_all['nbrLignes'];
}
if(isset($_POST['modifierMaintenance'])){
    for($i=1; $i<=$total_maintenance; $i++){
    	if((isset($_POST['curr_society'.$i])) AND ($_POST['curr_society'.$i] !="")){
			$new_valeur_society = $_POST['curr_society'.$i];
    		$test_update_maintenance_society = "UPDATE maintenance SET society_maintenance = '$new_valeur_society' WHERE id_maintenance = '$i'";
            $result_update_maintenance_society = mysql_query($test_update_maintenance_society);
    	}
		if((isset($_POST['curr_annee'.$i])) AND ($_POST['curr_annee'.$i] !="")){
			$new_valeur_annee = $_POST['curr_annee'.$i];
    		$test_update_maintenance_annee = "UPDATE maintenance SET annee_maintenance = '$new_valeur_annee' WHERE id_maintenance = '$i'";
            $result_update_maintenance_annee = mysql_query($test_update_maintenance_annee);
		}
		if((isset($_POST['curr_date'.$i])) AND ($_POST['curr_date'.$i] !="")){
			$new_valeur_date = $_POST['curr_date'.$i];
    		$test_update_maintenance_date = "UPDATE maintenance SET date_maintenance = '$new_valeur_date' WHERE id_maintenance = '$i'";
            $result_update_maintenance_date = mysql_query($test_update_maintenance_date);
		}
		if((isset($_POST['curr_demande'.$i])) AND ($_POST['curr_demande'.$i] !="")){
			$new_valeur_demande = $_POST['curr_demande'.$i];
    		$test_update_maintenance_demande = "UPDATE maintenance SET demande_maintenance = '$new_valeur_demande' WHERE id_maintenance = '$i'";
            $result_update_maintenance_demande = mysql_query($test_update_maintenance_demande);
		}
		if((isset($_POST['curr_nbr_heure'.$i])) AND ($_POST['curr_nbr_heure'.$i] !="")){
			$new_valeur_nbr_heure = $_POST['curr_nbr_heure'.$i];
    		$test_update_maintenance_nbr_heure = "UPDATE maintenance SET nbr_heure_maintenance = '$new_valeur_nbr_heure' WHERE id_maintenance = '$i'";
            $result_update_maintenance_nbr_heure = mysql_query($test_update_maintenance_nbr_heure);
		}
    }
}

//Supprimer une ligne du tableau

$ligneAsupprimer = $_GET["demandeAsuppr"];
$test_ligne_to_delete = "DELETE FROM maintenance WHERE 	id_maintenance = '$ligneAsupprimer'";
$result_ligne_to_delete = mysql_query($test_ligne_to_delete);

?>
	<!DOCTYPE html>
	<html class=''>

	<head>
		<meta charset='UTF-8'>
		<meta name="robots" content="noindex">
		<link rel='stylesheet prefetch' href='//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'>
		<link rel='stylesheet prefetch' href='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'> </head>

	<body>
		<div class="container">
			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Rechercher une société" title="Type in a name">
			<div id="table" class="table-editable">
				<form action='maintenance.php' method='POST' name="maintenanceForm">
					<table class="table">
						<tr>
							<th onclick='sortTable(0)'>Société</th>
							<th onclick='sortTable(1)'>Année</th>
							<th onclick='sortTable(2)'>Date</th>
							<th>Demande</th>
							<th onclick='sortTable(3)'>Nombre heures</th>
						</tr>
						<script type="text/javascript">
							function updateData() {
								var total_maintenance = '<?php echo $total_maintenance; ?>';
								for (i = 1; i <= total_maintenance; i++) {
									document.getElementById("curr_society" + i).value = document.getElementById("society" + i).value;
									document.getElementById("curr_annee" + i).value = document.getElementById("annee" + i).value;
									document.getElementById("curr_date" + i).value = document.getElementById("date" + i).value;
									document.getElementById("curr_demande" + i).value = document.getElementById("demande" + i).value;
									document.getElementById("curr_nbr_heure" + i).value = document.getElementById("nbr_heure" + i).value;
								}
							}
						</script>
						<script type="text/javascript">
							function goto_confirm(url) {
								if (confirm("Etes-vous sur de vouloir supprimer cette ligne ?")) document.location.href = url;
								return false; //pour ne pas revenir au début de la page
							}
						</script>
						<?php
                        $i=1;
                $test_maintenance_select_all = "SELECT * FROM maintenance";
                $result_maintenance_select_all = mysql_query($test_maintenance_select_all);
                while($data_maintenance_select_all=mysql_fetch_array($result_maintenance_select_all)){
                    ?>
							<tr>
								<td contenteditable='false'>
									<input type='text' id='society<?=$i?>' name='society<?=$i?>' value="<?php echo $data_maintenance_select_all['society_maintenance']?>" onchange="updateData();">
									<input type="hidden" value="" id="curr_society<?= $i?>" name="curr_society<?= $i?>">
									<input type="hidden" value="<?php echo $data_maintenance_select_all['id_maintenance']?>" id="id_maintenance<?= $i?>" name="id_maintenance<?= $i?>"> </td>
								<td contenteditable='false'>
									<input type='number' id='annee<?=$i?>' name='annee<?=$i?>' value="<?php echo $data_maintenance_select_all['annee_maintenance']?>" onchange="updateData();">
									<input type="hidden" id="curr_annee<?= $i?>" name="curr_annee<?= $i?>" value=""> </td>
								<td contenteditable='false'>
									<input type='date' id='date<?=$i?>' name='date<?=$i?>' value="<?php echo $data_maintenance_select_all['date_maintenance']?>" onchange="updateData();">
									<input type="hidden" id="curr_date<?= $i?>" name="curr_date<?= $i?>" value=""> </td>
								<td contenteditable='false'>
									<input type='text' id='demande<?=$i?>' name='demande<?=$i?>' value="<?php echo $data_maintenance_select_all['demande_maintenance']?>" onchange="updateData();">
									<input type="hidden" id="curr_demande<?= $i?>" name="curr_demande<?= $i?>" value=""> </td>
								<td contenteditable='false'>
									<input type='number' id='nbr_heure<?=$i?>' name='nbr_heure<?=$i?>' value="<?php echo $data_maintenance_select_all['nbr_heure_maintenance']?>" onchange="updateData();">
									<input type="hidden" id="curr_nbr_heure<?= $i?>" name="curr_nbr_heure<?= $i?>"> </td>
								<td> <a style="text-decoration: none;" href="#" onclick="return goto_confirm('maintenance.php?demandeAsuppr=<?php echo $data_maintenance_select_all['id_maintenance'] ?>')"><span class='table-remove glyphicon glyphicon-remove'></span ></a> </td>
							</tr>
							<?php
                            $i++;
                }
                ?>
								<input type="submit" value="Modifier" name="modifierMaintenance">
								<!-- Adding new row line -->
								<tr class="hide">
									<td contenteditable="false">
										<input type='text' id='new_society<?=$i?>' name='new_society<?=$i?>' value="" onchange="updateData();">
										<input type="hidden" value="" id="new_curr_society<?= $i?>" name="new_curr_society<?= $i?>">
									</td>
									<td contenteditable="false">
										<input type='number' id='annee<?=$i?>' name='annee<?=$i?>' value="<?php echo $data_maintenance_select_all['annee_maintenance']?>" onchange="updateData();">
										<input type="hidden" id="curr_annee<?= $i?>" name="curr_annee<?= $i?>" value="">
									</td>
									<td contenteditable="false">
										<input type='date' id='date<?=$i?>' name='date<?=$i?>' value="<?php echo $data_maintenance_select_all['date_maintenance']?>" onchange="updateData();">
										<input type="hidden" id="curr_date<?= $i?>" name="curr_date<?= $i?>" value="">
									</td>
									<td contenteditable="false">
										<input type='text' id='demande<?=$i?>' name='demande<?=$i?>' value="<?php echo $data_maintenance_select_all['demande_maintenance']?>" onchange="updateData();">
										<input type="hidden" id="curr_demande<?= $i?>" name="curr_demande<?= $i?>" value="">
									</td>
									<td contenteditable="false">
										<input type='number' id='nbr_heure<?=$i?>' name='nbr_heure<?=$i?>' value="<?php echo $data_maintenance_select_all['nbr_heure_maintenance']?>" onchange="updateData();">
										<?php $j++;
							echo $j;?>
											<input type="hidden" id="curr_nbr_heure<?= $i?>" name="curr_nbr_heure<?= $i?>">
									</td>
									<td> <span class="table-remove glyphicon glyphicon-remove"></span> </td>
								</tr>
					</table>
				</form>
				<a href="maintenanceAjoutLigne.php"><button class="table-add btn btn-primary" name="ajoutLigne">Add Row</button></a>
			</div>
		</div>
		<!--
		<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
		<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
		<script src='//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
		<script>
			$(".table-add").on("click", function () {
				var $TABLE = $("#table");
				var $clone = $TABLE.find("tr.hide").clone(true).removeClass('hide');
				$TABLE.find('table').append($clone);
			});
			$(".table-remove").on("click", function () {
				var r = confirm("Voulez-vous vraiment supprimer cette ligne ?");
				if (r == true) {
					$(this).parents("tr").detach();
					txt = "Suppression réussi";
				}
				else {
					txt = "Suppression annulée";
				}
			});
		</script>
-->
		<script>
			function myFunction() {
				var input, filter, table, tr, td, i;
				input = document.getElementById("myInput");
				filter = input.value.toUpperCase();
				table = document.getElementById("table");
				tr = table.getElementsByTagName("tr");
				for (i = 0; i < tr.length; i++) {
					td = tr[i].getElementsByTagName("td")[0];
					if (td) {
						if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
							tr[i].style.display = "";
						}
						else {
							tr[i].style.display = "none";
						}
					}
				}
			}
		</script>
		<script>
			function sortTable(n) {
				var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
				table = document.getElementById("table");
				switching = true;
				//Set the sorting direction to ascending:
				dir = "asc";
				/*Make a loop that will continue until
				no switching has been done:*/
				while (switching) {
					//start by saying: no switching is done:
					switching = false;
					rows = table.getElementsByTagName("TR");
					/*Loop through all table rows (except the
					first, which contains table headers):*/
					for (i = 1; i < (rows.length - 1); i++) {
						//start by saying there should be no switching:
						shouldSwitch = false;
						/*Get the two elements you want to compare,
						one from current row and one from the next:*/
						x = rows[i].getElementsByTagName("TD")[n];
						y = rows[i + 1].getElementsByTagName("TD")[n];
						/*check if the two rows should switch place,
						based on the direction, asc or desc:*/
						if (dir == "asc") {
							if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
								//if so, mark as a switch and break the loop:
								shouldSwitch = true;
								break;
							}
						}
						else if (dir == "desc") {
							if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
								//if so, mark as a switch and break the loop:
								shouldSwitch = true;
								break;
							}
						}
					}
					if (shouldSwitch) {
						/*If a switch has been marked, make the switch
						and mark that a switch has been done:*/
						rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
						switching = true;
						//Each time a switch is done, increase this count by 1:
						switchcount++;
					}
					else {
						/*If no switching has been done AND the direction is "asc",
						set the direction to "desc" and run the while loop again.*/
						if (switchcount == 0 && dir == "asc") {
							dir = "desc";
							switching = true;
						}
					}
				}
			}
		</script>
	</body>

	</html>