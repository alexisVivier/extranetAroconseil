<!DOCTYPE html>
<html class=''>

<head>
    <meta charset='UTF-8'>
    <meta name="robots" content="noindex">
    <link rel='stylesheet prefetch' href='//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'> </head>

<body>
    <div class="container">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
        <div id="table" class="table-editable">
            <table class="table">
                <tr>
                    <th>Société</th>
                    <th>Année</th>
                    <th>Date</th>
                    <th>Demande</th>
                    <th>Nombre d'heure</th>
                </tr>
                <tr>
                    <td contenteditable="true">Aro Conseil</td>
                    <td contenteditable="true">2017</td>
                    <td contenteditable="true">Mardi 2 Juin</td>
                    <td contenteditable="true">Lorem ipsum</td>
                    <td contenteditable="true">8</td>
                    <td> <span class="table-remove glyphicon glyphicon-remove"></span> </td>
                </tr>
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
</body>

</html>