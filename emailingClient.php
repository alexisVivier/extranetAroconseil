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
						<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 14 14" style="enable-background:new 0 0 14 14;" xml:space="preserve">
							<g>
								<g>
									<path style="fill:#030104;" d="M7,9L5.268,7.484l-4.952,4.245C0.496,11.896,0.739,12,1.007,12h11.986
			c0.267,0,0.509-0.104,0.688-0.271L8.732,7.484L7,9z" />
									<path style="fill:#030104;" d="M13.684,2.271C13.504,2.103,13.262,2,12.993,2H1.007C0.74,2,0.498,2.104,0.318,2.273L7,8
			L13.684,2.271z" />
									<polygon style="fill:#030104;" points="0,2.878 0,11.186 4.833,7.079 		" />
									<polygon style="fill:#030104;" points="9.167,7.079 14,11.186 14,2.875 		" /> </g>
							</g>
						</svg>
						<h1>Campagne E-Mailing</h1> </div>
					<div class="title-page-block-line"></div>
				</div>
				<div class="maintenance-page-container">
					<div id="table" class="table-editable">
						<table class="table">
							<tr class="table-name-column">
								<th onclick='sortTable(1)'>
									<div class="table-name-column-icon-container">
										<p>Libellé</p>
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
											<path d="M11 7h-6l3-4z"></path>
											<path d="M5 9h6l-3 4z"></path>
										</svg>
									</div>
								</th>
								<th onclick='sortTable(2)'>
									<div class="table-name-column-icon-container">
										<p>Date d'envoi</p>
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
											<path d="M11 7h-6l3-4z"></path>
											<path d="M5 9h6l-3 4z"></path>
										</svg>
									</div>
								</th>
								<th>Nombre de destinataires</th>
								<th onclick='sortTable(3)'>
									<div class="table-name-column-icon-container">
										<p>Statistiques</p>
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
											<path d="M11 7h-6l3-4z"></path>
											<path d="M5 9h6l-3 4z"></path>
										</svg>
									</div>
								</th>
							</tr>
							<?php
                        $i=1;
                $test_facture_select_all = "SELECT * FROM emailing";
                $result_facture_select_all = mysql_query($test_facture_select_all);
                while($data_facture_select_all=mysql_fetch_array($result_facture_select_all)){
                    ?>
								<tr>
									<td contenteditable='false'>
										<?php echo $data_facture_select_all['libelle_emailing']?>
									</td>
									<td contenteditable='false'>
										<?php echo $data_facture_select_all['date_envoi_emailing']?>
									</td>
									<td contenteditable='false'>
										<?php echo $data_facture_select_all['nbr_destinataires_emailing']?>
									</td>
									<td contenteditable='false'>
										<p>Telechargement a voir avec Agnès</p>
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