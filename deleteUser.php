<?php

//	On se connecte à la base de données

include ("connexionBdd.php");

// On lance la session pour utiliser les $_SESSION variables

session_start();

// On teste pour vérifier si la personne connectée est bien admin, sinon on la renvoie a la page de connexion

if ($_SESSION["admin"] === 0){
	header('Location: index.php');
}
else if ($_SESSION["login"] !== true){
	header('Location: index.php');
}

if(isset($_POST['supprUser'])){
	$userToDelete = htmlspecialchars($_POST['userToDelete']);
	$test_user_to_delete = "DELETE FROM user WHERE user_id = '$userToDelete'";
	$result_to_delete = mysql_query($test_user_to_delete);
}
	
	include ("header.php");

?>
	<section>
		<div class="title-page-container">
			<div class="title-page-block-icon-title">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve">
					<g>
						<path d="M460.537,373.781c-65.78,0-119.108,53.329-119.108,119.11S394.756,612,460.537,612s119.111-53.329,119.111-119.11
		C579.647,427.11,526.319,373.781,460.537,373.781z M512.649,513.327H408.429c-11.287,0-20.435-9.15-20.435-20.437
		c0-11.287,9.149-20.437,20.435-20.437h104.221c11.287,0,20.435,9.15,20.435,20.437
		C533.086,504.177,523.936,513.327,512.649,513.327z M267.355,312.662c86.861-0.005,118.115-86.976,126.297-158.417
		C403.73,66.237,362.113,0,267.355,0C172.61,0,130.971,66.232,141.058,154.245C149.249,225.686,180.492,312.669,267.355,312.662z
		 M457.287,348.865c2.795,0,5.572,0.084,8.33,0.237c-4.134-5.897-8.918-11.098-14.518-15.276
		c-16.691-12.457-38.307-16.544-57.416-24.055c-9.302-3.654-17.632-7.284-25.452-11.416
		c-26.393,28.943-60.809,44.084-100.886,44.087c-40.067,0-74.478-15.141-100.867-44.087c-7.82,4.134-16.152,7.762-25.452,11.416
		c-19.11,7.51-40.725,11.597-57.416,24.055c-28.866,21.545-36.325,70.012-42.187,103.071c-4.838,27.291-8.086,55.141-9.036,82.862
		c-0.735,21.472,9.867,24.483,27.831,30.965c22.492,8.112,45.716,14.135,69.097,19.071c45.153,9.535,91.696,16.862,138.038,17.191
		c22.455-0.16,44.956-1.972,67.322-4.873c-16.562-23.996-26.276-53.063-26.276-84.36
		C308.401,415.654,375.191,348.865,457.287,348.865z" /> </g>
				</svg>
				<h1>Supprimer un utilisateur</h1> </div>
			<div class="title-page-block-line"></div>
		</div>
		<div id="modifsUser">
			<form action="deleteUser.php" method="post" id="deleteUserForm">
				<select name="userToDelete">
					<?php
			$test_select_user_to_delete = "SELECT * FROM user";
			$result_select_user_to_delete = mysql_query($test_select_user_to_delete);
			while($data_select_user_to_delete=mysql_fetch_array($result_select_user_to_delete)){
				print_r("<option value='".$data_select_user_to_delete['user_id']."'>".$data_select_user_to_delete['mail']."</option>");
			}
			?>
				</select>
				<div class="button-style-submit">
					<input id="addUser-button-submit" type="submit" value="SUPPRIMER" name="supprUser">
					<div class="button-style-submit-svg-block">
						<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
							<path d="M20 12l-2.83 2.83 9.17 9.17-9.17 9.17 2.83 2.83 12-12z" />
							<path d="M0 0h48v48h-48z" fill="none" /> </svg>
					</div>
				</div>
			</form>
		</div>
	</section>