<!DOCTYPE html>
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
    </head>

    <body>
        <header class="container">
            <div class="violet-bar">
                <p class="connexion-text">
                    Vous êtes connecté en tant que : 
                </p>
            </div>
            <div class="header-container row">
                <div class="logo col-md-4">
                    <div>
                        <a href="index.html" alt="Accueil" title="Accueil">
                            <img src="image/logo.gif" alt="IUT Informatique" title="IUT Informatique">
                        </a>
                    </div>
                </div>
                <div class="col-md-8">
                    <ul class="nav-bar">
                        <li><a href="index.html">Accueil</a></li>
                        <li><a href="template-formation.html">Formations</a></li>
                        <li><a href="apropos.html">A propos</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <main>
            <div class="container">
                <div class="carte_content">
                    <?php
                    $bloc_correspondants = get_all_correspondants();
                    foreach($bloc_correspondants as $dep_slug=>$array_html){
                        echo '<div class="dep_element" id="element_'.$dep_slug.'" style="display:none;">';
                        echo '<div class="close_content d-none d-lg-block"><img src="'.get_template_directory_uri().'/img/close.png" alt="Fermer"></div>';

                        echo '<h2>'.__( 'Correspondants régionaux', 'html5blank' ).'</h2>';
                        echo implode('',$array_html);
                        echo '</div>';
                    }

                    $bloc_structures = get_all_structures();
                    foreach($bloc_structures as $dep_slug=>$array_html){
                        echo '<div class="dep_element" id="structure_'.$dep_slug.'" style="display:none;">';
                        echo '<h2>'.__( 'Structures régionales', 'html5blank' ).'</h2>';
                        echo implode('',$array_html);
                        echo '</div>';
                    }
                    ?>

                </div>
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <ul class="liste_regions vertical">
                            <?php
                            $regions = get_terms( 'departements', array( 'parent'=>0 ) );
                            foreach( $regions as $region ) :
                            $region_svg = ucfirst( sanitize_title( preg_replace( '/\'/', '-', $region->name ) ) );

                            // href="<?php echo get_term_link( $region );
                            ?>
                            <li class="region">
                                <a class="region_link" region="<?php echo $region_svg; ?>" region_slug="<?php echo $region->slug; ?>" style="cursor: pointer;">
                                    <?php echo strtoupper( $region->name ); ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="carte">
                            <img id="france-svg" class="svg france regions" src="image/france-new-regions.svg?ver=1.0.1" alt="France - régions" />
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script>
            /**
                * Replace all SVG images with inline SVG
                */
            jQuery('img.svg').each(function(){
                var $img = jQuery(this);
                var imgID = $img.attr('id');
                var imgClass = $img.attr('class');
                var imgURL = $img.attr('src');
        
                jQuery.get(imgURL, function(data) {
                    // Get the SVG tag, ignore the rest
                    var $svg = jQuery(data).find('svg');
        
                    // Add replaced image's ID to the new SVG
                    if(typeof imgID !== 'undefined') {
                        $svg = $svg.attr('id', imgID);
                    }
                    // Add replaced image's classes to the new SVG
                    if(typeof imgClass !== 'undefined') {
                        $svg = $svg.attr('class', imgClass+' replaced-svg');
                    }
        
                    // Remove any invalid XML tags as per http://validator.w3.org
                    $svg = $svg.removeAttr('xmlns:a');
        
                    // Virer les parties inutiles du SVG
                    $svg.find('#Cadre').remove();
                    $svg.find('#dep').remove();
        
                    // Gérer l'événement clic sur une région
                    $svg.find('path').on('click', function(e){
                        jQuery('#france-svg path').removeClass('active');
                        jQuery(this).addClass('active');
                        if( jQuery(this).attr('id') != 'dep' ){
                            path_click( jQuery(this).attr('id').toLowerCase() );
                        }
                        if("matchMedia" in window) { // Détection
                            if(window.matchMedia("(max-width:767px)").matches) {
                                var target = jQuery('.carte_content');
                                $("html, body").stop().animate( { scrollTop: target.offset().top }, 1500);
                            }
                        }
                    });
        
                    jQuery('.close_content').on('click', function(e){
                        if( jQuery(this).parent().attr('id') != 'dep' ){
                            var id = jQuery(this).parent().attr('id');
                            var id_split = id.split("_");
                            close_click( id_split[1] );
                        }
                    });
        
                    // Allumage des items du menu latéral au survol des régions
                    $svg.find('path').on( 'hover', function( e ){
                        var region_map = jQuery(this).attr('id');
                        path_hover( region_map );
                        //console.log( 'Hovering on 2 ' + region_map );
                        //jQuery('ul.liste_regions.vertical a[region=' + region_map + ']').toggleClass('hovered');
                    });
        
                    // Replace image with new SVG
                    $img.replaceWith($svg);
        
                }, 'xml');
        
            });
        
            /** Clic sur les régions de la carte **/
            function path_click( path_id ) {
                var footer_height = jQuery('.footer_container').innerHeight();
                //console.log( 'clicked path: ' + path_id );
                jQuery('.dep_element').hide();
                jQuery('#element_'+path_id).show();
                jQuery('#structure_'+path_id).show();
                var carte_content_height = jQuery('.carte_content').height();
        
                if("matchMedia" in window) { // Détection
                    if(window.matchMedia("(min-width:992px)").matches) {
                        var marge = carte_content_height - footer_height;
                        if(marge >= 0){
                            jQuery('.footer_container').css({
                                "margin-top" : marge
                            });
                        }else{
                            jQuery('.footer_container').css({
                                "margin-top" : 0
                            });
                        }
                    }
                }
                //document.location='/subdivision/'+path_id+'/';
            }
        
            function close_click(path_id){
                jQuery('#element_'+path_id).hide();
                jQuery('#structure_'+path_id).hide();
        
                if("matchMedia" in window) { // Détection
                    if(window.matchMedia("(min-width:992px)").matches) {
                        jQuery('.footer_container').css({
                            "margin-top" : 0
                        });
                    }
                }
            }
        
            /** Survol des régions de la carte **/
            function path_hover( path_id ) {
                //console.log( 'hovering on path: ' + path_id );
                jQuery('ul.liste_regions.vertical a[region=' + path_id + ']').toggleClass('hovered');
            }
        
            (function($) {
                $(document).ready(function() {
        
                    //console.log( 'Document ready: initialisation survols...' );
        
                    /** Allumage des bouts de carte au survol des liens **/
                    $('ul.liste_regions.vertical a.region_link').hover(
                        function( e ){
                            var region_css = $(this).attr('region');
                            $('#france-svg #' + region_css).css('fill','#5dd9e5');
                        },
                        function( e ) {
                            var region_css = $(this).attr('region');
                            $('#france-svg #' + region_css).css('fill','');
                        }
                    );
        
                    $('ul.liste_regions.vertical a.region_link').click(function(){
                        path_click($(this).attr('region_slug'));
                        var region_css = $(this).attr('region');
                        $('#france-svg path').removeClass('active');
                        $('#france-svg path#' + region_css).addClass('active');
                        $('ul.liste_regions.vertical a.region_link').removeClass('active');
                        $(this).addClass('active');
                        if("matchMedia" in window) { // Détection
                            if(window.matchMedia("(max-width:767px)").matches) {
                                var target = jQuery('.carte_content');
                                $("html, body").stop().animate( { scrollTop: target.offset().top }, 1500);
                            }
                        }
                    });
        
                    /** Et l'inverse allumage des items du menu latéral au survol des régions **/
                    /* NB: cette fonction n'est pas gérée ici mais ci-dessus dans le remplacement du SVG!
                    $('#france-svg g path').on( 'hover', function( e ){
                        var region_map = $(this).attr('id');
                        console.log( 'Hovering on 1 ' + region_map );
                        $('ul.liste_regions.vertical a[region=' + region_map + ']').toggleClass("hovered");
                    });
                    */
        
                    /** Localisez-moi **/
                    $('a.geolocate').click( function(e) {
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(showPosition);
                        } else {
                            $('a.geolocate').innerHTML = "Votre navigateur ne permet pas de vous localiser.";
                        }
                    });
                });
            })( jQuery );
        </script>
    </body>
</html>
