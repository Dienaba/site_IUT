<?php include('header.php'); ?>

<main class="container">
    <div class="bandeau-formations">
        <h1>Formations</h1>
    </div>
    <div class="container-des-carres">
        <div class="structure-du-carre">
            <h4 class="titre-de-la-formation">Première formation</h4>
            <div class="lieu-de-la-formation">
                <div id='map' style='width: 400px; height: 300px;'></div>
                    <script>
                    mapboxgl.accessToken = 'pk.eyJ1IjoiZGFyZWFsc29hcGJveCIsImEiOiJjam9wdHMybzAxazR5M3ZteG83ZWJ4ODA5In0.UL2QJN2hap6eBOKW54hnkA';
                    var map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/mapbox/streets-v10'
                    });
                    </script>
                </div>
            </div>
            <div class="description-de-la-formation">
                Aenean libero erat, accumsan et eleifend vel, rutrum at dolor.
                Quisque volutpat lacus at nunc rutrum, lacinia eleifend risus consectetur.
                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer ut metus nisl.
                Morbi ligula ligula, laoreet a rutrum nec, scelerisque vitae nibh. Fusce erat libero, pulvinar ac erat quis, laoreet suscipit est.
                Pellentesque sit amet justo purus.
                Suspendisse finibus feugiat venenatis. Praesent gravida a arcu in lobortis. Suspendisse vitae rutrum nulla.
            </div>
        </div>
        <div class="structure-du-carre">
            <h4 class="titre-de-la-formation">Deuxième formation</h4>
            <div class="lieu-de-la-formation"></div>
            <div class="description-de-la-formation">
                Aenean libero erat, accumsan et eleifend vel, rutrum at dolor.
                Quisque volutpat lacus at nunc rutrum, lacinia eleifend risus consectetur.
                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer ut metus nisl.
                Morbi ligula ligula, laoreet a rutrum nec, scelerisque vitae nibh. Fusce erat libero, pulvinar ac erat quis, laoreet suscipit est.
                Pellentesque sit amet justo purus.
                Suspendisse finibus feugiat venenatis. Praesent gravida a arcu in lobortis. Suspendisse vitae rutrum nulla.
            </div>
        </div>
        <div class="structure-du-carre">
            <h4 class="titre-de-la-formation">Troisième formation</h4>
            <div class="lieu-de-la-formation"></div>
            <div class="description-de-la-formation">
                Aenean libero erat, accumsan et eleifend vel, rutrum at dolor.
                Quisque volutpat lacus at nunc rutrum, lacinia eleifend risus consectetur.
                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer ut metus nisl.
                Morbi ligula ligula, laoreet a rutrum nec, scelerisque vitae nibh. Fusce erat libero, pulvinar ac erat quis, laoreet suscipit est.
                Pellentesque sit amet justo purus.
                Suspendisse finibus feugiat venenatis. Praesent gravida a arcu in lobortis. Suspendisse vitae rutrum nulla.
            </div>
        </div>
    </div>
</main>

<?php include('footer.php'); ?>