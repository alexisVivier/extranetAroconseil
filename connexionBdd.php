<?php

$host = "localhost";
$user = "arolog";
$bdd = "aroextra";
$passwd  = "20#aroLOG#17";

mysql_connect($host, $user,$passwd) or die("erreur de connexion au serveur");

mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");

?>