<!DOCTYPE html>
<?php
session_start();
require_once('connexion.php');
?>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description">
        <meta name="author" content="">
        <link rel="icon" href="/image/favicon.ico">
        <title>IUT Informatique</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link href="css/mdb.min.css" rel="stylesheet">
        <script src='https://api.mapbox.com/mapbox-gl-js/v0.51.0/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v0.51.0/mapbox-gl.css' rel='stylesheet' />
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>

    <body class="<?php echo basename($_SERVER['PHP_SELF'], ".php"); ?>">
        <header>
            <?php 
            if(isset($_COOKIE['login'])) { ?>
                <div class="violet-bar">
                <p class="connexion-text">Vous êtes connecté en tant que : <?php echo $_COOKIE['login'] ?>
                </p>
            </div>
            <?php }else{ ?>
            <div class="violet-bar">
            </div>
            <?php } ?>
            <div class="container">
                <div class="row container-logo">
                    <div class="logo">
                        <div>
                            <a href="index.php" alt="Accueil" title="Accueil">
                                <img src="image/logo.gif" alt="IUT Informatique" title="IUT Informatique">
                            </a>
                        </div>
                    </div>
                    <div class="container-nav-bar">
                        <ul class="nav-bar">
                            <li><a href="index.php">Accueil</a></li>
                            <li><a href="iut.php">Les IUT</a></li>
                            <li><a href="partenaires.php">Partenaires</a></li>
                            <li><a href="temoignages.php">Témoignages</a></li>
                            <li><a href="apropos.php">A propos</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
