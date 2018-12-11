<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<title>Surcouf</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/materialize.css">
</head>
<body>
    <div class="progress">
      <div class="indeterminate amber "></div>
  </div>
    <p class="redirection center-align">Bon retour parmis nous, <?php echo $_COOKIE['login'] ?> ! Tu seras redirigé dans 3 sec. vers la page d'accueil.</p>
<?php header("refresh:3;url=index.php");?>
</body>