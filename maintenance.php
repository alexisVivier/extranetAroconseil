<?php

session_start();

include 'connexionBdd.php';

if ($_SESSION["admin"] === 1){
    include ("header.php");
}
else if($_SESSION["admin"] === 0){
     include ("headerClient.php");
}

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
        <!--		<link rel='stylesheet prefetch' href='//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'>-->
        <link rel='stylesheet prefetch' href='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'> </head>

    <body>
        <div id="overlay">
            <section>
                <div class="title-page-container">
                    <div class="title-page-block-icon-title">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 489.8 489.8" style="enable-background:new 0 0 489.8 489.8;" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M478.1,466.4H23.4V11.7C23.4,5.5,18.3,0,11.7,0S0,5.1,0,11.7v466.4c0,6.2,5.1,11.7,11.7,11.7h466.4
                        c6.2,0,11.7-5.1,11.7-11.7C489.8,471.9,484.7,466.4,478.1,466.4z" />
                                    <rect x="57.2" y="144.6" width="97.6" height="299.3" />
                                    <rect x="195.9" y="28" width="97.6" height="415.9" />
                                    <rect x="334.7" y="160.9" width="97.6" height="282.9" /> </g>
                            </g>
                        </svg>
                        <h1>Suivi de la maintenance</h1> </div>
                    <div class="title-page-block-line"></div>
                </div>
                <div class="maintenance-page-container">
                    <div class="page-tabs-head-button">
                        <div class="tabs-head-button-addcontainer">
                            <div class="addLine-container">
                                <div class="addLine-block-icon">
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 42 42" style="enable-background:new 0 0 42 42;" xml:space="preserve">
                                        <polygon points="42,19 23,19 23,0 19,0 19,19 0,19 0,23 19,23 19,42 23,42 23,23 42,23 " /> </svg>
                                </div>
                                <a>
                                    <button name="ajoutLigne">Ajouter une demande</button>
                                </a>
                            </div>
                            <div class="modifLine-container">
                                <div class="modifLine-block-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve" width="512px" height="512px">
                                        <g>
                                            <path d="M2.083,9H0.062H0v5l1.481-1.361C2.932,14.673,5.311,16,8,16c4.08,0,7.446-3.054,7.938-7h-2.021   c-0.476,2.838-2.944,5-5.917,5c-2.106,0-3.96-1.086-5.03-2.729L5.441,9H2.083z" fill="#FFFFFF" />
                                            <path d="M8,0C3.92,0,0.554,3.054,0.062,7h2.021C2.559,4.162,5.027,2,8,2c2.169,0,4.07,1.151,5.124,2.876   L11,7h2h0.917h2.021H16V2l-1.432,1.432C13.123,1.357,10.72,0,8,0z" fill="#FFFFFF" /> </g>
                                    </svg>
                                </div>
                                <input type="submit" value="Enregistrer les modifications" name="modifierMaintenance"> </div>
                        </div>
                        <div class="searchBar-container">
                            <input class="searchBar-input" type="text" id="myInput" onkeyup="myFunction()" placeholder="Rechercher une société" title="Type in a name">
                            <div class="searchBar-block-icon">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 250.313 250.313" style="enable-background:new 0 0 250.313 250.313;" xml:space="preserve">
                                    <g id="Search">
                                        <path style="fill-rule:evenodd;clip-rule:evenodd;" d="M244.186,214.604l-54.379-54.378c-0.289-0.289-0.628-0.491-0.93-0.76
            c10.7-16.231,16.945-35.66,16.945-56.554C205.822,46.075,159.747,0,102.911,0S0,46.075,0,102.911
            c0,56.835,46.074,102.911,102.91,102.911c20.895,0,40.323-6.245,56.554-16.945c0.269,0.301,0.47,0.64,0.759,0.929l54.38,54.38
            c8.169,8.168,21.413,8.168,29.583,0C252.354,236.017,252.354,222.773,244.186,214.604z M102.911,170.146
            c-37.134,0-67.236-30.102-67.236-67.235c0-37.134,30.103-67.236,67.236-67.236c37.132,0,67.235,30.103,67.235,67.236
            C170.146,140.044,140.043,170.146,102.911,170.146z" /> </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div id="table" class="table-editable">
                        <form class="form-table" action='maintenance.php' method='POST' name="maintenanceForm">
                            <table class="table">
                                <tr class="table-name-column">
                                    <th onclick='sortTable(0)'>
                                        <div class="table-name-column-icon-container">
                                            <p>Société</p>
                                            <svg version="1.1" xmlns="http://www.w3.org/
                                    3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
                                                <path d="M11 7h-6l3-4z"></path>
                                                <path d="M5 9h6l-3 4z"></path>
                                            </svg>
                                        </div>
                                    </th>
                                    <th onclick='sortTable(1)'>
                                        <div class="table-name-column-icon-container">
                                            <p>Année</p>
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
                                                <path d="M11 7h-6l3-4z"></path>
                                                <path d="M5 9h6l-3 4z"></path>
                                            </svg>
                                        </div>
                                    </th>
                                    <th onclick='sortTable(2)'>
                                        <div class="table-name-column-icon-container">
                                            <p>Date</p>
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
                                                <path d="M11 7h-6l3-4z"></path>
                                                <path d="M5 9h6l-3 4z"></path>
                                            </svg>
                                        </div>
                                    </th>
                                    <th>Demande</th>
                                    <th onclick='sortTable(3)'>
                                        <div class="table-name-column-icon-container">
                                            <p>Nombre heures</p>
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
                                                <path d="M11 7h-6l3-4z"></path>
                                                <path d="M5 9h6l-3 4z"></path>
                                            </svg>
                                        </div>
                                    </th>
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
                                        <!-- Adding new row line -->
                                        <tr class="hide">
                                            <td contenteditable="false">
                                                <input type='text' id='new_society<?=$i?>' name='new_society<?=$i?>' value="" onchange="updateData();">
                                                <input type="hidden" value="" id="new_curr_society<?= $i?>" name="new_curr_society<?= $i?>"> </td>
                                            <td contenteditable="false">
                                                <input type='number' id='annee<?=$i?>' name='annee<?=$i?>' value="<?php echo $data_maintenance_select_all['annee_maintenance']?>" onchange="updateData();">
                                                <input type="hidden" id="curr_annee<?= $i?>" name="curr_annee<?= $i?>" value=""> </td>
                                            <td contenteditable="false">
                                                <input type='date' id='date<?=$i?>' name='date<?=$i?>' value="<?php echo $data_maintenance_select_all['date_maintenance']?>" onchange="updateData();">
                                                <input type="hidden" id="curr_date<?= $i?>" name="curr_date<?= $i?>" value=""> </td>
                                            <td contenteditable="false">
                                                <input type='text' id='demande<?=$i?>' name='demande<?=$i?>' value="<?php echo $data_maintenance_select_all['demande_maintenance']?>" onchange="updateData();">
                                                <input type="hidden" id="curr_demande<?= $i?>" name="curr_demande<?= $i?>" value=""> </td>
                                            <td contenteditable="false">
                                                <input type='number' id='nbr_heure<?=$i?>' name='nbr_heure<?=$i?>' value="<?php echo $data_maintenance_select_all['nbr_heure_maintenance']?>" onchange="updateData();">
                                                <?php $j++;
							echo $j;?>
                                                    <input type="hidden" id="curr_nbr_heure<?= $i?>" name="curr_nbr_heure<?= $i?>"> </td>
                                            <td> <span id="icon-delete-line-table" class="glyphicon glyphicon-remove"></span> </td>
                                        </tr>
                            </table>
                        </form>
                    </div>
                </div>
                <script>
                    $(function () {
                        $('.addLine-container').on('click', function (e) {
                            $('.pop-up').fadeIn(700);
                            $('#overlay').removeClass('blur-out');
                            $('#sidebar-container').removeClass('blur-out');
                            $('#overlay').addClass('blur-in');
                            $('#sidebar-container').addClass('blur-in');
                            e.stopPropagation();
                        });
                        $('.close-button').on('click', function (e) {
                            $('.pop-up').fadeOut(700);
                            $('#overlay').addClass('blur-out');
                            $('#sidebar-container').addClass('blur-out');
                            e.stopPropagation();
                        });
                    });
                </script>
            </section>
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
        </div>
        <?php
    
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
            <div class="pop-up">
                <div id="maintenanceAjoutLigne">
                    <div class="popUp-head-container">
                        <div class="popUp-head-txt-container">
                            <svg height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h48v48H0z" fill="none" />
                                <path d="M28 20H4v4h24v-4zm0-8H4v4h24v-4zm8 16v-8h-4v8h-8v4h8v8h4v-8h8v-4h-8zM4 32h16v-4H4v4z" />
                            </svg>
                            <h1>Ajout d'une demande</h1> </div>
                        <a class="close-button">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="357px" height="357px" viewBox="0 0 357 357" style="enable-background:new 0 0 357 357;" xml:space="preserve">
                                <g>
                                    <g id="clear">
                                        <polygon points="357,35.7 321.3,0 178.5,142.8 35.7,0 0,35.7 142.8,178.5 0,321.3 35.7,357 178.5,214.2 321.3,357 357,321.3 
                                        214.2,178.5 		" /> </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <form action="maintenance.php" method="POST">
                        <div class="AjoutLigneInputForm">
                            <div class="AjoutLigneInputContainer">
                                <input type="text" name="society" placeholder="Société">
                                <input type="number" name="annee" placeholder="Année">
                                <input type="date" name="date" placeholder="Date">
                                <input type="number" name="nbr_heures" placeholder="Nombre heures"> </div>
                            <textarea name="demande" placeholder="Demande"></textarea>
                        </div>
                        <div id="AjoutLigneSubmitStyle" class="button-style-submit">
                            <input id="AjoutLigneSubmit" type="submit" name="ajouterLigneMaintenance" value="AJOUTER">
                            <div class="button-style-submit-svg-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                                    <path d="M20 12l-2.83 2.83 9.17 9.17-9.17 9.17 2.83 2.83 12-12z" />
                                    <path d="M0 0h48v48h-48z" fill="none" /> </svg>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </body>

    </html>