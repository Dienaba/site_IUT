<?php include('header.php'); 
?>
    <main>
        <div class="container">
            <!-- Pour modifier les carousel mettre le modif du width ici -->
            <div class="container-banner">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img id="image" class="d-block w-100" src="image/diapo1.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img id="image" class="d-block w-100" src="image/diapo2.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img id="image" class="d-block w-100" src="image/diapo3.jpg" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Précédent</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Suivant</span>
                    </a>
                </div>
                <div class="bloc-connexion col-sm-offset-2 col-sm-8 col-md-offset-0 col-md-3">
                <?php if (isset($_COOKIE['login'])) { ?>
                    <p class="message-de-bienvenue">Bienvenue <?php echo $_COOKIE['login'] ?> !</p>
                    <ul class="menu-bloc-connexion">
                        <li class="modif-info">Modifier vos informations</li>
                        <li class="temoignage">Déposer un témoignage</li>
                        <li class="nous-contact">Nous contacter</li>
                    </ul>
                <?php }else{ ?>
                    <form class="form-group" action="authentification.php" method="post">
                        <label for="login">Adresse e-mail</label>
                        <input class="form-control" type="text" name="login">
                        <label for="password">Mot de passe</label>
                            <input class="form-control" type="password" name="password">   
                        <?php } ?>
                    <?php 
                        if (isset($_COOKIE['login'])) { ?>
                        <form action="deconnexion.php">
                            <button class="btn btn-lg btn-block" type="submit">Deconnexion</button>
                        </form>
                    <?php }else{ ?>
                        <button class="btn btn-lg btn-block" type="submit">Se connecter</button>
                        <a href="404.php">Mot de passe oublié ?</a><a href="creationCompte.php">Créer un compte</a>
                    <?php } ?>
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="temoignage-du-mois">
                    <div class="title">
                        <div class="bloc_img">
                            <a href="#" class="img-actu">
                                <img src="image/diapo3.jpg" alt="Témoignage du mois">
                            </a>
                            <span class="titre-temoignage-front">Témoignage du mois</span>
                        </div>
                        
                    </div>
                    <div class="contenu-temoignage">
                        <p>blablabla</p>
                    </div>
                </div>
            </div>
            <!-- 
            <div class="container-des-blocs">
                <div class="bloc-formation">
                    <a href="404.php">
                        <p class="texte-bloc-formation">Nos Formations</p>
                    </a>
                </div>
                <div class="bloc-formation">
                    <a href="404.php">
                        <p class="texte-bloc-formation">Licences</p>
                    </a>
                </div>
                <div class="bloc-formation">
                    <a href="404.php">
                        <p class="texte-bloc-formation">Nos Formations en alternance / en apprentissage</p>
                    </a>
                </div>
                <div class="bloc-formation">
                    <a href="404.php">
                        <p class="texte-bloc-formation">Auditeurs libres</p>
                    </a>
                </div>
                
                <div class="bloc-formation">
                    <a href="404.php">
                        <p class="texte-bloc-formation">Nos Formations continues</p>
                    </a>
                </div>
                <div class="bloc-formation">
                    <a href="404.php">
                        <p class="texte-bloc-formation">Nos Formations à distance</p>
                    </a>
                </div>
                <div class="bloc-formation">
                    <a href="404.php">
                        <p class="texte-bloc-formation">Nos Formations courtes en formation continue</p>
                    </a>
                </div>
                <div class="bloc-formation">
                    <a href="404.php">
                        <p class="texte-bloc-formation">Formation DAEU (non bacheliers)</p>
                    </a>
                </div>
            </div> -->
        </div>
    </main>
<?php include('footer.php'); ?>
