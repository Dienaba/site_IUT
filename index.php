<?php include('header.php'); ?>
    <main class="container">
        <!-- Pour modifier les carousel mettre le modif du width ici -->
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
        <div class="container-des-blocs">
            <div class="">
                <label>
                    <button>
                        <a href="#">Nos Formations</a>
                    </button>
                </label>
            </div>
            <div class="">
                <label>
                    <button>
                        <a href="#">Licences</a>
                    </button>
                </label>
            </div>
            <div class="">
                <label>
                    <button>
                        <a href="#">Formation en alternance/en apprentissage</a>
                    </button>
                </label>
            </div>
            <div class="">
                <label>
                    <button>
                        <a href="#">Licences</a>
                    </button>
                </label>
            </div>
            <div class="">
                <label>
                    <button>
                        <a href="#">Auditeurs libres</a>
                    </button>
                </label>
            </div>
            <div class="">
                <label>
                    <button>
                        <a href="#">Formation continue</a>
                    </button>
                </label>
            </div>
            <div class="">
                <label>
                    <button>
                        <a href="#">Formation à distance</a>
                    </button>
                </label>
            </div>
            <div class="">
                <label>
                    <button>
                        <a href="#">Formations courtes en formation continue</a>
                    </button>
                </label>
            </div>
            <div class="">
                <label>
                    <button>
                        <a href="#">Formation DAEU (non bacheliers)</a>
                    </button>
                </label>
            </div>
        </div>
    </main>
<?php include('footer.php'); ?>
