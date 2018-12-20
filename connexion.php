<?php
        $conn = mysqli_connect("localhost", "root", "root", "iut-informatique");
if (mysqli_connect_errno()) {
	printf("Échec de la connexion : %s\n", mysqli_connect_error());
	exit();
}
?>