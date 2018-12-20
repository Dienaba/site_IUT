<?php include('header.php'); 
?>
    <main class="container">
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
                    <img id="image" class="d-block w-100" src="image/Cosmos02.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img id="image" class="d-block w-100" src="image/Cosmos03.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img id="image" class="d-block w-100" src="image/Cosmos04.jpg" alt="Third slide">
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
            <?php 
                    if (isset($_COOKIE['login'])) { ?>
            Bienvenue !
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
                <?php } ?>
            </form>
        </div>
        </div>
        <div class="container-des-blocs">
            <a href="#">
                <div class="bloc-formation">
                    <p class="texte-bloc-formation">Nos Formations</p>
                </div>
            </a>
            <a href="#">
                <div class="bloc-formation">
                    <p class="texte-bloc-formation">Licences</p>
                </div>
            </a>
            <a href="#">
                <div class="bloc-formation">
                    <p class="texte-bloc-formation">Nos Formations en alternance / en apprentissage</p>
                </div>
            </a>
            <a href="#">
                <div class="bloc-formation">
                    <p class="texte-bloc-formation">Auditeurs libres</p>
                </div>
            </a>
            <a href="#">
                <div class="bloc-formation">
                    <p class="texte-bloc-formation">Nos Formations continues</p>
                </div>
            </a>
            <a href="#">
                <div class="bloc-formation">
                    <p class="texte-bloc-formation">Nos Formations à distance</p>
                </div>
            </a>
            <a href="#">
                <div class="bloc-formation">
                    <p class="texte-bloc-formation">Nos Formations courtes en formation continue</p>
                </div>
            </a>
            <a href="#">
                <div class="bloc-formation">
                    <p class="texte-bloc-formation">Formation DAEU (non bacheliers)</p></div>
            </a>
        </div>
    </main>
<?php include('footer.php'); ?>
