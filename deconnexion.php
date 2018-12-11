<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<title></title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <?php
    setcookie ("login", $login, time() - 3600); 
    setcookie ("password", $mdp, time() - 3600);
    header("location:index.php");?>
</body>