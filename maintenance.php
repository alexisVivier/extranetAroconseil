<?php

include 'connexionBdd.php';

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
            <table class="table">
					<tr>
                    	<th onclick='sortTable(0)'>Société</th>
                    	<th onclick='sortTable(1)'>Année</th>
                    	<th onclick='sortTable(2)'>Date</th>
                    	<th>Demande</th>
                    	<th onclick='sortTable(3)'>Nombre heures</th>
                	</tr>
                <?php
                $test_maintenance_select_all = "SELECT * FROM maintenance";
                $result_maintenance_select_all = mysql_query($test_maintenance_select_all);
                while($data_maintenance_select_all=mysql_fetch_array($result_maintenance_select_all)){
                    print_r("
                        <tr>
                            <td contenteditable='true'>".$data_maintenance_select_all['society_maintenance']."</td>
                            <td contenteditable='true'>".$data_maintenance_select_all['annee_maintenance']."</td>
                            <td contenteditable='true'>".$data_maintenance_select_all['date_maintenance']."</td>
                            <td contenteditable='true'>".$data_maintenance_select_all['demande_maintenance']."</td>
                            <td contenteditable='true'>".$data_maintenance_select_all['nbr_heure_maintenance']."</td>
                            <td> <span class='table-remove glyphicon glyphicon-remove'></span> </td>
                        </tr>");
                }
                ?>
                <!-- Adding new row line -->
                <tr class="hide">
                    <td contenteditable="true">Untitled</td>
                    <td contenteditable="true">undefined</td>
                    <td contenteditable="true">undefined</td>
                    <td contenteditable="true">undefined</td>
                    <td contenteditable="true">undefined</td>
                    <td> <span class="table-remove glyphicon glyphicon-remove"></span> </td>
                </tr>
            </table>
            <button class="table-add btn btn-primary">Add Row</button>
        </div>
    </div>
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