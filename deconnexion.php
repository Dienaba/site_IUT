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
    setcookie ("password", $mdp, time() - 3600); ?>
Tu es maintenant déconnecté ! Tu seras redirigé dans 5 sec. vers la page d'accueil.
<?php header("location:index.php");?>
</body>