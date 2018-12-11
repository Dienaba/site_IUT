<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>
<body>
    <div class="loader">
    </div>
    <div class="redirection">Bon retour parmis nous, <?php echo $_COOKIE['login'] ?> ! Tu seras redirigé dans 3 sec. vers la page d'accueil.</div>
<?php header("refresh:3;url=index.php");?>
</body>