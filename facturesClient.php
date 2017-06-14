<?php

session_start();

include 'connexionBdd.php';

if ($_SESSION["admin"] === 1){
    include ("header.php");
}
else if($_SESSION["admin"] === 0){
     include ("headerClient.php");
}

if ($_SESSION["login"] == ""){
	header('Location: index.php'); 
}

?>
	<!DOCTYPE html>
	<html class=''>

	<head>
		<meta charset='UTF-8'>
		<meta name="robots" content="noindex">
		<!--		<link rel='stylesheet prefetch' href='//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'>-->
		<link rel='stylesheet prefetch' href='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'> </head>

	<body>
		<div id="overlay overlayMaintenanceClient" style="width: 100%;">
			<section>
				<div class="title-page-container">
					<div class="title-page-block-icon-title">
						<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve">
							<g>
								<path d="M59.65,27.443C59.408,27.162,59.057,27,58.685,27H1.316c-0.37,0-0.722,0.161-0.963,0.441
		c-0.242,0.28-0.35,0.651-0.294,1.02l4.918,30.461C5.074,59.547,5.602,60,6.233,60h47.534c0.632,0,1.16-0.453,1.257-1.081
		l4.917-30.454C59.997,28.098,59.892,27.726,59.65,27.443z" />
								<path d="M8.133,11h44v14h4V6.768C56.133,5.793,55.34,5,54.366,5H23.7l-2.485-4.141C20.897,0.329,20.316,0,19.699,0H5.901
		C4.926,0,4.133,0.793,4.133,1.768V25h4V11z" />
								<rect x="10.044" y="21" width="40" height="4" />
								<rect x="11.044" y="17" width="38" height="3" />
								<rect x="12.044" y="13" width="36" height="3" /> </g>
						</svg>
						<h1>Visualisation des factures</h1> </div>
					<div class="title-page-block-line"></div>
				</div>
				<div class="maintenance-page-container">
					<div id="table" class="table-editable">
						<table class="table">
							<tr class="table-name-column">
								<th onclick='sortTable(1)'>
									<div class="table-name-column-icon-container">
										<p>Référence</p>
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
											<path d="M11 7h-6l3-4z"></path>
											<path d="M5 9h6l-3 4z"></path>
										</svg>
									</div>
								</th>
								<th onclick='sortTable(2)'>
									<div class="table-name-column-icon-container">
										<p>Libellé</p>
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
											<path d="M11 7h-6l3-4z"></path>
											<path d="M5 9h6l-3 4z"></path>
										</svg>
									</div>
								</th>
								<th>Date</th>
								<th onclick='sortTable(3)'>
									<div class="table-name-column-icon-container">
										<p>Montant HT</p>
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
											<path d="M11 7h-6l3-4z"></path>
											<path d="M5 9h6l-3 4z"></path>
										</svg>
									</div>
								</th>
								<th>Montant TTC</th>
								<th>Date réglement</th>
								<th>Mode réglement</th>
							</tr>
							<?php
                        $i=1;
                $test_facture_select_all = "SELECT * FROM facture";
                $result_facture_select_all = mysql_query($test_facture_select_all);
                while($data_facture_select_all=mysql_fetch_array($result_facture_select_all)){
                    ?>
								<tr>
									<td contenteditable='false'>
										<?php echo $data_facture_select_all['reference_facture']?>
									</td>
									<td contenteditable='false'>
										<?php echo $data_facture_select_all['libelle_facture']?>
									</td>
									<td contenteditable='false'>
										<?php echo $data_facture_select_all['date_facture']?>
									</td>
									<td contenteditable='false'>
										<?php echo $data_facture_select_all['montant_ht_facture']?>
									</td>
									<td contenteditable='false'>
										<?php echo $data_facture_select_all['montant_ttc_facture']?>
									</td>
									<td contenteditable='false'>
										<?php echo $data_facture_select_all['date_reglement_facture']?>
									</td>
									<td contenteditable='false'>
										<?php echo $data_facture_select_all['mode_reglement_facture']?>
									</td>
								</tr>
								<?php
                            $i++;
                }
                ?>
						</table>
					</div>
				</div>
			</section>
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
		</div>
	</body>

	</html>