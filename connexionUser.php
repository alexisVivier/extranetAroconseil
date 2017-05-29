<?php
	
//	On récupere ce qui a été entré dans le formulaire de connexion et on enregistre dans deux variables
	
	include("connexionBdd.php");
	$email = htmlspecialchars($_POST['emailUser']);
	$password = htmlspecialchars($_POST['passwordUser']);
 	$test_mail = "SELECT mail FROM user WHERE mail = '".$email."'";
    $result_mail = mysql_query($test_mail);
    while($data_mail=mysql_fetch_array($result_mail)){
		$mailUser = $data_mail[mail];
	}
	if ($mailUser == $email){
		$test_mdp = "SELECT password FROM user WHERE mail = '".$email."'";
    	$result_mdp = mysql_query($test_mdp);
    	while($data_mdp=mysql_fetch_array($result_mdp)){
			$mdpUser = $data_mdp[password];
		}
		if ($mdpUser == $password){
			echo "Vous etes connecté";
			$test_admin = "SELECT admin FROM user WHERE mail = '".$email."'";
    		$result_admin = mysql_query($test_admin);
    		while($data_admin=mysql_fetch_array($result_admin)){
				$adminUser = $data_admin[admin];
			}
			if ($adminUser == 1){
				echo "Vous etes admin";
			}
			else{
				echo "Vous etes client";
			}
		}
		else{
			echo "Mot de passe incorect";
		}
	}
	else {
		echo "Email incorrect";
	}
?>