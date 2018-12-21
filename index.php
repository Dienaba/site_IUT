<?php include('header.php'); 
?>
    <main>
        <div class="container col-xs-12 col-sm-6 col-md-8">
            <!-- Pour modifier les carousel mettre le modif du width ici -->
            <div class="container-banner">
                <div id="carouselExampleIndicators" class="carousel slide col-xs-12 col-sm-6 col-md-9" data-ride="carousel">
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
                <div class="bloc-connexion col-xs-12 col-sm-6 col-md-3">
                <?php if (isset($_COOKIE['login'])) { ?>
                    <p class="message-de-bienvenue">Bienvenue <?php echo $_COOKIE['login'] ?> !</p>
                    <a  href="accueilAdmin.php" class="interface-admin btn btn-lg btn-block green">Accéder à l'interface admin</a>
                    <!-- <ul class="menu-bloc-connexion">
                        <!-- <li class="modif-info">Modifier vos informations</li>
                        <li class="temoignage">Déposer un témoignage</li>
                        <li class="offre">Déposer une offre d'emploi</li>
                        <li class="nous-contact">Nous contacter</li>
                    </ul> -->
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
            <div class="bloc-sous-slider">
                <div class="bloc-droite col-xs-12 col-sm-6 col-md-8">
                    <div class="carte-des-iut">
                        <div class="title">
                            <div class="bloc_img">
                                <iframe src="https://www.google.com/maps/d/embed?mid=1yO3_K4oLfqVhxlTOyqeVy62OjFG-pJOg" width="100%" height="450px"></iframe>
                            </div>
                        </div>
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                Aliquam nec dolor lorem. Pellentesque accumsan convallis ante et volutpat. 
                                Praesent eu urna sapien. In efficitur feugiat sagittis. <br>
                                Donec lorem nisl, euismod et mattis ac, convallis ut nunc. 
                                Duis dignissim dictum mauris. Nulla facilisi. 
                                In ultrices blandit facilisis.</p>
                        </div>
                        <div class="show-more">Voir plus de témoignages</div>
                    </div>
                </div>
                <div class="bloc-droite col-xs-12 col-sm-6 col-md-8">
                    <div class="offres-demploi">
                        <div class="title">
                            <div class="bloc_img">
                                <span class="titre-offre-front">Offres d'emploi</span>
                            </div>
                            
                        </div>
                        <ul class="liste-offres-demploi">
                            <li>
                                <h6>Titre offre</h6>
                                <p>contenu Offre n°1<br>
                                Donec lorem nisl, euismod et mattis ac, convallis ut nunc. 
                                Duis dignissim dictum mauris. Nulla facilisi. 
                                In ultrices blandit facilisis</p>
                            </li>
                            <hr>
                            <li>
                                <h6>Titre offre</h6>
                                <p>contenu Offre n°2<br>
                                Donec lorem nisl, euismod et mattis ac, convallis ut nunc. 
                                Duis dignissim dictum mauris. Nulla facilisi. 
                                In ultrices blandit facilisis</p>
                            </li>
                            <hr>
                            <li>
                                <h6>Titre offre</h6>
                                <p>contenu Offre n°3<br>
                                Donec lorem nisl, euismod et mattis ac, convallis ut nunc. 
                                Duis dignissim dictum mauris. Nulla facilisi. 
                                In ultrices blandit facilisis</p>
                            </li>
                            <hr>
                            <li>
                                <h6>Titre offre</h6>
                                <p>contenu Offre n°4<br>
                                Donec lorem nisl, euismod et mattis ac, convallis ut nunc. 
                                Duis dignissim dictum mauris. Nulla facilisi. 
                                In ultrices blandit facilisis</p>
                            </li>
                            <hr>
                            <li>
                                <h6>Titre offre</h6>
                                <p>contenu Offre n°5<br>
                                Donec lorem nisl, euismod et mattis ac, convallis ut nunc. 
                                Duis dignissim dictum mauris. Nulla facilisi. 
                                In ultrices blandit facilisis</p>
                            </li>
                            <hr>
                            <li>
                                <h6>Titre offre</h6>
                                <p>contenu Offre n°6<br>
                                Donec lorem nisl, euismod et mattis ac, convallis ut nunc. 
                                Duis dignissim dictum mauris. Nulla facilisi. 
                                In ultrices blandit facilisis</p>
                            </li>
                        <ul>
                        <div class="show-more">Voir plus d'offres</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="article-du-mois">
                        <div class="title">
                            <div class="bloc_img">
                                <a href="#" class="img-actu">
                                    <img src="image/diapo3.jpg" alt="Témoignage du mois">
                                </a>
                                <span class="titre-article-front">Article du mois</span>
                            </div>
                            
                        </div>
                        <div class="contenu-article">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                Aliquam nec dolor lorem. Pellentesque accumsan convallis ante et volutpat. 
                                Praesent eu urna sapien. In efficitur feugiat sagittis. <br>
                                Donec lorem nisl, euismod et mattis ac, convallis ut nunc. 
                                Duis dignissim dictum mauris. Nulla facilisi. 
                                In ultrices blandit facilisis.</p>
                        </div>
                        <div class="show-more">Voir plus d'articles</div>
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
