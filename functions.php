<?php
/**
 * Author: Todd Motto | @toddmotto
 * URL: mda.com | @mda
 * Custom functions, support, custom post types and more.
 */

/*
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('memory_limit','196M');
*/

require_once "modules/is-debug.php";

/*------------------------------------*\
    External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
    Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail

    add_image_size('home_slider', 510, 400, true);
    add_image_size('home_slider_mobile', 768, 350, true);
    add_image_size('home_bloc', 220, 200, true);
    add_image_size('home_bloc_resp1', 220, 265, true);

    add_image_size('archive_article', 450, 450, true);
    add_image_size('archive_article_mobile', 768, 768, true);

    add_image_size('commission', 350, 226, true);
    add_image_size('commission_mobile', 528, 352, true);

    add_image_size('carre', 300, 300, false);

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
    'default-color' => 'FFF',
    'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
    'default-image'          => get_template_directory_uri() . '/img/headers/default.jpg',
    'header-text'            => false,
    'default-text-color'     => '000',
    'width'                  => 1000,
    'height'                 => 198,
    'random-default'         => false,
    'wp-head-callback'       => $wphead_cb,
    'admin-head-callback'    => $adminhead_cb,
    'admin-preview-callback' => $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('mda', get_template_directory() . '/languages');
}

/*------------------------------------*\
    Functions
\*------------------------------------*/

// HTML5 Blank navigation
function mda_nav() {
    wp_nav_menu(
        array(
            'theme_location'  => 'header-menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul>%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
        )
    );
}
function mda_adh_nav() {
	if( is_user_logged_in() ) {
		wp_nav_menu(
	        array(
	            'theme_location'  => 'adherent-menu',
	            'menu'            => '',
	            'container'       => 'div',
	            'container_class' => 'menu-{menu slug}-container',
	            'container_id'    => '',
	            'menu_class'      => 'menu',
	            'menu_id'         => '',
	            'echo'            => true,
	            'fallback_cb'     => 'wp_page_menu',
	            'before'          => '',
	            'after'           => '',
	            'link_before'     => '',
	            'link_after'      => '',
	            'items_wrap'      => '<ul>%3$s</ul>',
	            'depth'           => 0,
	            'walker'          => ''
	        )
	    );
	}
}

// Load HTML5 Blank scripts (header.php)
function mda_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.0.0', true); // Modernizr
        wp_enqueue_script('bootstrap'); // Enqueue it!

        wp_register_script('slickmin', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1.6.0', true); // Modernizr
        wp_enqueue_script('slickmin'); // Enqueue it!

        /*if (HTML5_DEBUG) {
            // jQuery
            wp_deregister_script('jquery');
            wp_register_script('jquery', get_template_directory_uri() . '/bower_components/jquery/dist/jquery.js', array(), '1.11.1');

            // Conditionizr
            wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0');

            // Modernizr
            wp_register_script('modernizr', get_template_directory_uri() . '/bower_components/modernizr/modernizr.js', array(), '2.8.3');

            // Custom scripts
            wp_register_script(
                'mdascripts',
                get_template_directory_uri() . '/js/scripts.js',
                array('jquery'),
                '1.0.1');

            // Enqueue Scripts
            wp_enqueue_script('mdascripts');

            // If production
        } else {*/
        // Scripts minify
        wp_register_script('mdascripts-min', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.57');
        // Enqueue Scripts
        wp_enqueue_script('mdascripts-min');
        /*}*/
        /*wp_register_script('dl-menu-jquery', get_template_directory_uri() . '/js/jquery.dlmenu.min.js', array(), '1.0.0');
        wp_enqueue_script('dl-menu-jquery');*/
    }
}

// Load HTML5 Blank conditional scripts
function mda_conditional_scripts()
{
    if (is_page_template('template-adherez.php') || is_page_template('template-profilinformations.php')) {
        wp_register_script('cleave', get_template_directory_uri() . '/js/cleave.min.js', array('jquery'), '1.4.4', true);
        wp_enqueue_script('cleave'); // Enqueue it!

        wp_register_script('cleavephone', get_template_directory_uri() . '/js/cleave-phone.fr.js', array('jquery'), '1.0.0', true); // Modernizr
        wp_enqueue_script('cleavephone'); // Enqueue it!

        wp_register_script('cleave-form-custom', get_template_directory_uri() . '/js/cleave-form-custom.js', array('jquery'), '1.0.02', true); // Modernizr
        wp_enqueue_script('cleave-form-custom'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function mda_styles()
{
    wp_register_style('fonts', 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800|Raleway:300,400,500,600,700,800');
    wp_enqueue_style('fonts'); // Enqueue it!

    wp_register_style('bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.0.0', 'all');
    wp_enqueue_style('bootstrap_css'); // Enqueue it!

    wp_register_style('slick', get_template_directory_uri() . '/css/slick.css', array(), '1.0.0', 'all');
    wp_enqueue_style('slick'); // Enqueue it!

    wp_register_style('slick-theme', get_template_directory_uri() . '/css/slick-theme.css', array(), '1.0.0', 'all');
    wp_enqueue_style('slick-theme'); // Enqueue it!

    if (HTML5_DEBUG) {
        // normalize-css
        wp_register_style('normalize', get_template_directory_uri() . '/bower_components/normalize.css/normalize.css', array(), '3.0.1');

        // Custom CSS
        wp_register_style('mda', get_template_directory_uri() . '/style.css', array(), '1.3.59');
        //wp_register_style('menu_responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.0.0');

        // Register CSS
        wp_enqueue_style('mda');
        wp_enqueue_style('menu_responsive');
    } else {
        // Custom CSS
        wp_register_style('mdacssmin', get_template_directory_uri() . '/style.css', array(), '1.3.59');
        //wp_register_style('menu_responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.0.0');

        // Register CSS
        wp_enqueue_style('mdacssmin');
        //wp_enqueue_style('menu_responsive');
    }
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( 								// Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'mda'), 			// Main Navigation
        'adherent-menu'=> __( 'Menu adhérents', 'mda' ),	// Menu de l'espace adhérents
        'sidebar-menu' => __('Sidebar Menu', 'mda'), 		// Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'mda') 			// Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove the width and height attributes from inserted images
function remove_width_attribute( $html ) {
    $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
    return $html;
}


// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'mda'),
        'description' => __('Description for this widget-area...', 'mda'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'mda'),
        'description' => __('Description for this widget-area...', 'mda'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'mda') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function mdagravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function mdacomments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
<!-- heads up: starting < for the html tag (li or div) in the next line: -->
<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
        <?php endif; ?>
        <div class="comment-author vcard">
            <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
            <div class="reply">
                <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
        </div>
        <main class="comment-content">
            <?php if ($comment->comment_approved == '0') : ?>
            <em class="comment-awaiting-moderation"><?php pll_e('Your comment is awaiting moderation.') ?></em>
            <?php endif; ?>
            <span class="author-name"><?php comment_author(); ?></span>
            <div class="comment-date">
                <time <?php comment_time( 'c' ); ?> class="comment-time">
                    <span class="date">
                        <?php comment_date(); ?>
                    </span> -
                    <span class="time">
                        <?php comment_time(); ?>
                    </span>
                </time>
            </div>
            <div class="comment-text">
                <?php comment_text(); ?>
            </div>
        </main>

        <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php }


/*------------------------------------*\
    MDA
\*------------------------------------*/

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

}

/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 **/
function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <input class="search-input" type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Rechercher sur le site" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Rechercher' ) .'" />
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );

/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'mda_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'mda_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'mda_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Script pour ne pas charger le JS du formulaire de contact

add_filter( 'wpcf7_load_js', '__return_false' );

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'mdagravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('post_thumbnail_html', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images
add_filter('image_send_to_editor', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]


/*------------------------------------*\
    ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

function mda_nav_responsive()
{
    wp_nav_menu(
        array(
            'theme_location'  => 'responsive-menu',
            'menu'            => '',
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'menu dl-menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul class="dl-menu">%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
        )
    );
}

/*register funcitons */
/**
 * Lors du register tester si l'id adherent est existant et n'est pas encore utilisé
 * @param type $user_login
 * @param type $user_email
 * @param type $errors
 */
function mda_test_adherent_id( $user_login, $user_email, $errors ) {

	if($user_login==""){
		return false;
	}
	
	$bad_rowid = get_field('bad_rowid','option');
	if(!$bad_rowid){
		$bad_rowid = "<strong>ERREUR</strong> : Les identifiants personnels pour accéder à l'espace adhérent de l'association de la Maison des Artistes ne comportent que des chiffres.";
	}
	$bad_rowid = str_replace('<p>','', $bad_rowid);
	$bad_rowid = str_replace('</p>','', $bad_rowid);
	$bad_rowid_empty = get_field('bad_rowid_empty','option');
	if(!$bad_rowid_empty){
		$bad_rowid_empty = '<strong>ERREUR</strong> : Veuillez indiquer votre clé d\'activation personnelle.';
	}
	$bad_rowid_empty = str_replace('<p>','', $bad_rowid_empty);
	$bad_rowid_empty = str_replace('</p>','', $bad_rowid_empty);	
	$bad_rowid_alreadyused = get_field('bad_rowid_alreadyused','option');
	if(!$bad_rowid_alreadyused){
		$bad_rowid_alreadyused = "<strong>ERREUR</strong> : Numero d'adhérent (rowid) déjà activé.";
	}
	$bad_rowid_alreadyused = str_replace('<p>','', $bad_rowid_alreadyused);
	$bad_rowid_alreadyused = str_replace('</p>','', $bad_rowid_alreadyused);		
	$bad_rowid_donotexist = get_field('bad_rowid_donotexist','option');
	$bad_rowid_donotexist = sprintf($bad_rowid_donotexist,trim($user_login));
	if(!$bad_rowid_donotexist){
		$bad_rowid_donotexist = "<strong>ERREUR</strong> : Cet identifiant personnel (" . trim($user_login) . ") ne correspond à aucun adhérent actif aux services associatifs de La Maison des Artistes.";
	}
	$bad_rowid_donotexist = str_replace('<p>','', $bad_rowid_donotexist);
	$bad_rowid_donotexist = str_replace('</p>','', $bad_rowid_donotexist);		
	$bad_rowid_badkey = get_field('bad_rowid_badkey','option');
	if(!$bad_rowid_badkey){
		$bad_rowid_badkey = "<strong>ERREUR</strong> : Cette clé d'activation n'est pas valide pour votre identifiant.";
	}	
	$bad_rowid_badkey = str_replace('<p>','', $bad_rowid_badkey);
	$bad_rowid_badkey = str_replace('</p>','', $bad_rowid_badkey);	
	
	if(!is_numeric($user_login)){
        $errors->add( 'bad_rowid', $bad_rowid );
        return false;
	}
	
    if( empty( $_POST['activation_key'] ) ) {
        $errors->add( 'bad_rowid_empty', $bad_rowid_empty );
        return false;
    }    	
    	
	$args = array(
		'meta_query'    => array(
			array(
				'key'     => 'rowid',
				'value'   => trim($user_login),
				'compare' => '='
			),
		)
	);
	$user_query = new WP_User_Query( $args );
	$list_u = $user_query->get_results();
	if(isset($list_u[0]->ID)){
		$errors->add( 'bad_rowid_alreadyused', $bad_rowid_alreadyused );
		return false;
	}
	
	/** check if the user_login that is the rowid, exist in dolibar **/
	$dolidb = doli_connect_database();
	$sql = "SELECT * FROM llx_adherent WHERE rowid LIKE '" . trim($user_login) . "' AND (statut = '1' OR statut = '-1');";
	$result = $dolidb->get_row($sql);
	if(!$result || !isset($result->rowid)){
		$errors->add( 'bad_rowid_donotexist', $bad_rowid_donotexist );
		return false;
	}
	
	/** verify the activation key **/
	if( !mda_verify_activation_key( trim($_POST['activation_key']), trim($user_login) ) ) {
		$errors->add( 'bad_rowid_badkey', $bad_rowid_badkey );
		return false;
	}
}
add_action( 'register_post', 'mda_test_adherent_id', 10, 3 );

/**
 * change menu when user is brouillon
 * @param type $items
 * @param type $args
 * @return type
 */
function change_espace_adherents_menus($items, $args){
	/** only for adherent menu **/
	if(isset($args->menu->slug) && $args->menu->slug == 'menu-adherents'){	
		/** only for brouillon user **/
		$user_id = get_current_user_id();
		$user_data = get_userdata($user_id);
		$result = is_user_doli_brouillon();
		$new_menu = '';
		if(isset($result->rowid) && isset($result->statut)){
			/** only for people without any subscriptions **/
			$all_subs = get_all_subs($user_data->user_login);
			if(count($all_subs)<=0){			
				$new_menu = '<li id="menu-item-2074" class="cotisation menu-item menu-item-type-post_type menu-item-object-page menu-item-2074">'
				. '<a href="'.site_url().'/espace-adherent/renouvellement-adhesion/">'
				. 'Payer votre adhésion'
				. '</a>'
				. '</li>';			
			}
			$items = $new_menu.'<li id="menu-item-2076" class="deconnexion menu-item menu-item-type-custom menu-item-object-custom menu-item-2076">'
				. '<a href="'.site_url().'/logout/">'
				. 'Déconnexion'
				. '</a>'
				. '</li>';
		}
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'change_espace_adherents_menus',10,2 );

function is_user_doli_brouillon(){
	if(is_user_logged_in()){
		$dolidb = doli_connect_database();
		$user_id = get_current_user_id();
		$user_data = get_userdata($user_id);
		$sql = "SELECT * FROM llx_adherent WHERE rowid LIKE '" . $user_data->user_login . "' AND statut = '-1';";
		return $dolidb->get_row($sql);
	}else{
		return false;
	}
}

function get_adherent_status($rowid){
	$dolidb = doli_connect_database();
	$sql = "SELECT * FROM llx_adherent WHERE rowid LIKE '" . $rowid . "';";
	$row = $dolidb->get_row($sql);
	if(isset($row->statut)){
		return $row->statut;
	}else{
		return false;
	}
}

//function test(){
//	$user_id = get_current_user_id();
//	$user_data = get_userdata($user_id);
//	$all_subs = get_all_subs($user_data->user_login);
//echo "<pre>", print_r("all_subs", 1), "</pre>";
//echo "<pre>", print_r($all_subs, 1), "</pre>";
//}
//add_action('init','test');

/**
 * Dolibar status
 * brouillon -1
 * valides/a jour/non a jour 1
 * resiliée 0
 */
function limit_access_adherent(){

	if(preg_match('#espace\-adherent#', $_SERVER['REQUEST_URI'])){
		/** test if user is not résilié **/
		$dolidb = doli_connect_database();
		$user_id = get_current_user_id();
		$user_data = get_userdata($user_id);
		$sql = "SELECT * FROM llx_adherent WHERE rowid LIKE '" . $user_data->user_login . "' AND statut = '0';";
		$result = $dolidb->get_row($sql);
//			if(!$result || !isset($result->rowid)){
//				wp_redirect('/compte-resilie/');
//				exit;
//			}
		if(isset($result->rowid) && isset($result->statut) && intval($result->statut) == 0 ){
			//Résiliée
			wp_redirect(site_url().'/compte-resilie/');
			exit;
		}
	}	
}
add_action( 'template_redirect', 'limit_access_adherent' );


/**
 * Vérification de la clé d'activation
 * 
 * @param string $key
 * @param string $rowid
 * @return boolean
 */
function mda_verify_activation_key( $key, $rowid ) {
	$salt = '_8mE3"S;U5|.T&G';
	
	if( substr( md5( $rowid . $salt ), 0, 12 ) == $key ) {
		return true;
	}
	
	return false;
}

/**
 * update l'id adherent pour l'user
 * @param type $user_id
 */
function add_rowid_to_user( $user_id ) {
    if( !empty( $_POST['rowid'] ) ){
        update_field('rowid',$_POST['rowid'],'user_'.$user_id);
    }
}
add_action( 'user_register', 'add_rowid_to_user', 10, 1 );

/**
 * filter qui rempalce le defaut register pour la page adherez
 * @param type $link
 * @param type $action
 * @param type $query
 * @return type
 */
//function change_register_link($link, $action, $query ){	
//	if($action == "register"){
//		$link = str_replace('/register','/adherez',$link);
//	}	
//	return $link;
//}
//add_filter( 'tml_page_link', 'change_register_link',10,3);


/** Adherent **/
function post_process_adherent_form(){

    if(isset($_POST['formfront'])){

        $already_exist = false;
        if(isset($_POST['dolirowid'])){
            //user already exist
            $already_exist = $_POST['dolirowid'];
        }else{
            return 'error';
        }

        $data = array();
        $data['fk_adherent_type'] = "1";
        $data['morphy'] = "phy";
        //$data['civility'] = $_POST['civility'];
        $data['lastname'] = $_POST['lastname'];
        $data['firstname'] = $_POST['firstname'];
        //$data['societe'] = $_POST['societe'];
        $data['address'] = $_POST['address'];
        $data['zip'] = $_POST['zip'];
        $data['town'] = $_POST['town'];
        $data['country'] = $_POST['country'];
        $data['email'] = $_POST['email'];
        $data['phone'] = $_POST['phone'];
        //$data['birth'] = $_POST['birth'];
        //$data['note_private'] = $_POST['note_private'];

        //import_adherent_docs('userfile');
        //import_adherent_docs('userfileb');

        //TODO: double validation
        //update_adherent_data($data,$already_exist);
        $data['profession'] = $_POST['PROFESSION'];
        $data['profession2'] = $_POST['PROFESSION2'];
        $data['wp_user_id'] = $_POST['wp_user_id'];
		mda_record_adherent_modif( $data,$already_exist );
        
        $data_extrafield = array();
        $data_extrafield['PROFESSION'] = $_POST['PROFESSION'];
        $data_extrafield['PROFESSION2'] = $_POST['PROFESSION2'];
        //$data_extrafield['connuvia'] = $_POST['connuvia'];
        //$data_extrafield['consentementcom'] = $_POST['consentementcom'];
        //$data_extrafield['acceptationgba'] = $_POST['acceptationgba'];

        //TODO: double validation
        //update_adherent_extrafields($data_extrafield,$already_exist);

        global $adherent_update;
        $adherent_update = true;
    }
}
add_action('init','post_process_adherent_form');

function get_dolibar_user(){
    global $db, $langs, $user,$conf;
    define("NOLOGIN",1);		// This means this output page does not require to be logged.
    define("NOCSRFCHECK",1);	// We accept to go on this page from external web site.
	
	if(preg_match('#mda.wpandco.fr#',$_SERVER['HTTP_HOST'])){
		require_once('intranet/htdocs/main.inc.php');
	}else{
		require_once('../intranet/htdocs/main.inc.php');
	}
    
    require_once(DOL_DOCUMENT_ROOT."/lib/member.lib.php");
    require_once(DOL_DOCUMENT_ROOT."/lib/company.lib.php");
    require_once(DOL_DOCUMENT_ROOT."/lib/images.lib.php");
    //require_once(DOL_DOCUMENT_ROOT."/lib/functions2.lib.php");
    require_once(DOL_DOCUMENT_ROOT."/adherents/class/adherent.class.php");
    require_once(DOL_DOCUMENT_ROOT."/adherents/class/adherent_type.class.php");
    require_once(DOL_DOCUMENT_ROOT."/core/class/extrafields.class.php");
    require_once(DOL_DOCUMENT_ROOT."/adherents/class/cotisation.class.php");
    require_once(DOL_DOCUMENT_ROOT."/compta/bank/class/account.class.php");
    require_once(DOL_DOCUMENT_ROOT."/core/class/html.formcompany.class.php");

    $user_id = get_current_user_id();
    $dol_rowid = get_field('rowid','user_'.$user_id);

    $adh = new Adherent($db);
    $user_doli = $adh->fetch($dol_rowid);

    return array(
        'adh'=>$adh,
        'user_doli'=>$user_doli,
        'conf'=>$conf
    );
}

function import_adherent_docs($filename){	
    $data = get_dolibar_user();
    $conf = $data['conf'];
    $adh = $data['adh'];

    $upload_dir = $conf->adherent->dir_output . "/" . get_exdir($adh->ref,2,0,1, $adh, 'xxx') . $adh->ref; //dossier où les fichiers vont être mis
    @mkdir($upload_dir);
    importimage_test($filename,$upload_dir); // Envoie fichier
}

function importimage_test($type,$upload_dir) {

    global $langs;

    $nomfichier=$_FILES[$type]['name'];
    $destination=$upload_dir . "/" . $nomfichier;

    $resupload=move_uploaded_file($_FILES[$type]['tmp_name'], $destination );


    if ( true===$resupload || (is_numeric($resupload) && $resupload > 0)) {
        if( '90.63.230.140' == $_SERVER['REMOTE_ADDR'] ) {
            echo "dol_move_uploaded_file SUCCESS!<br/>";
        }
    } else {
        $error+=1;
        $errmsg .= $resupload."<br>\n";
        $langs->load("errors");

        if ($resupload < 0) {
            // Unknown error
            print "Erreur de traitement de fichier: $resupload";

            $error+=1;

            $errmsg .= $_FILES[$type]['name'].' : '.$langs->trans("ErrorFileNotUploaded")."<br>\n";

        } elseif (preg_match('/ErrorFileIsInfectedWithAVirus/',$resupload)) {
            // Files infected by a virus
            $error+=1;
            $errmsg .= $_FILES[$type]['name'].' : '.$langs->trans("ErrorFileIsInfectedWithAVirus")."<br>\n";


        } else {
            // Known error
            $error+=1;
            $errmsg .= $_FILES[$type]['name'].' : '.$resupload."<br>\n";
        }
    }
}

function update_adherent_data($data,$lineexist){
    //update or insert
    $dolidb = doli_connect_database();
    $dolidb->update(
        'llx_adherent',
        $data,
        array( 'rowid' => $lineexist )
    );
}

/**
 * Enregistre une demande de modification des infos personnelles de l'adhérent
 * cette demande est stockée dans le CPT modifications et ses champs ACF
 * 
 * @param unknown $data
 * @param unknown $rowid
 */
function mda_record_adherent_modif( $data, $rowid ){
	$postarr = array(
		'post_title'	=> 'Modification de ' . $data['firstname'] . ' ' . $data['lastname'] . ' (' . $rowid . ')',
		'post_content'	=> serialize( $data ),
		'post_type'		=> 'modifications'
	);
	if( $post_id = wp_insert_post( $postarr ) ) {
		update_field( 'rowid', $rowid, $post_id );
		update_field( 'wp_user_id', $data['wp_user_id'], $post_id );
		update_field( 'adresse', $data['address'], $post_id );
		update_field( 'code_postal', $data['zip'], $post_id );
		update_field( 'ville', $data['town'], $post_id );
		update_field( 'pays', $data['country'], $post_id );
		update_field( 'email', $data['email'], $post_id );
		update_field( 'telephone', $data['phone'], $post_id );
		update_field( 'profession_artistique_principale', $data['profession'], $post_id );
		update_field( 'professions_artistiques_secondaires', $data['profession2'], $post_id );
	}
}

function mda_load_old_adh_data( $args ) {
	if( !is_admin() ) {
		return;
	}
	global $old_adh_data;
	if( 'modifications' != get_post_type() ) {
		return;
	}
	global $old_adh_data;
	$old_adh_data = get_doli_data( get_field( 'wp_user_id' ) );
	//var_dump( $args ); var_dump( $old_adh_data ); exit; //debug
}
add_action( 'acf/input/form_data', 'mda_load_old_adh_data', 10, 1 );

function mda_show_old_data( $field ) {
	$corresp = array(
		'adresse'		=> 'address',
		'code_postal'	=> 'zip',
		'ville'			=> 'town',
		'pays'			=> 'country',
		'email'			=> 'email',
		'telephone'		=> 'phone',
		'profession_artistique_principale'		=> 'PROFESSION',
		'professions_artistiques_secondaires'	=> 'PROFESSION2'
	);
	if( !is_admin() ) {
		return;
	}
	if ( 'modifications' != get_post_type() ) {
		return;
	}
	global $old_adh_data;
	if( empty( $old_adh_data ) ) {
		return;
	}
	//var_dump( $field ); //debug
	if( !empty( $corresp[$field['_name']] ) ) {
		echo '<p>Ancienne valeur&nbsp;: ';
		echo '<span class="anc_val">' . $old_adh_data[$corresp[$field['_name']]] . '</span></p>';
	}
}
add_action( 'acf/render_field', 'mda_show_old_data', 9, 1 );

function update_adherent_extrafields($data,$lineexist){
    $dolidb = doli_connect_database();
    $dolidb->update(
        'llx_adherent_extrafields',
        $data,
        array( 'fk_object' => $lineexist )
    );
}

function get_doli_data($user_id){

	if( !$rowid = get_field('rowid','user_'.$user_id) ) {
		$current_user = wp_get_current_user();
		$rowid = $current_user->user_login;
	}
	//var_dump( $rowid );	//debug
    $data = array();
    if($rowid){
        $dolidb = doli_connect_database();

        $sql = "SELECT * FROM llx_adherent WHERE rowid LIKE '" . $rowid . "';";
        $result = $dolidb->get_row($sql);
        if($result){
            $data['rowid'] = $result->rowid;
            $data['civility'] = $result->civility;
            $data['lastname'] = $result->lastname;
            $data['firstname'] = $result->firstname;
            $data['societe'] = $result->societe;
            $data['address'] = $result->address;
            $data['zip'] = $result->zip;
            $data['town'] = $result->town;
            $data['country'] = $result->country;
            $data['email'] = $result->email;
            $data['phone'] = $result->phone;
            $data['birth'] = $result->birth;
            $data['note_private'] = $result->note_private;
            $data['photo'] = $result->photo;
        }

        $sql = "SELECT * FROM llx_adherent_extrafields WHERE fk_object LIKE '" . $rowid . "';";
        $result_extra = $dolidb->get_row($sql);
        if($result_extra){
            $data['PROFESSION'] = $result_extra->PROFESSION;
            $data['PROFESSION2'] = $result_extra->PROFESSION2;
            $data['NUMORDRE'] = $result_extra->NUMORDRE;
            $data['connuvia'] = $result_extra->connuvia;
            $data['consentementcom'] = $result_extra->consentementcom;
            $data['acceptationgba'] = $result_extra->acceptationgba;
        }
    }

    return $data;
}

function doli_connect_database(){	
	if(preg_match('#mda.wpandco.fr#',$_SERVER['HTTP_HOST'])){
		$connection = new wpdb('doli_mda','InxLLQA%<{Gl4yq','doli_mda',DB_HOST);
	}else{
		$connection = new wpdb('artistessu_intra','lmda2011','artistessu_intra',DB_HOST);
	}	
    return $connection;
}

add_action('wp_enqueue_scripts', function(){
    wp_enqueue_style( 'select2_css', get_template_directory_uri() .'/css/select2.min.css' );
    wp_register_script( 'select2_js', get_template_directory_uri() .'/js/select2.min.js', array('jquery'), '5.0.0', true );
    wp_enqueue_script('select2_js');

    wp_register_script( 'adherents', get_template_directory_uri() .'/js/adherent_scripts.js', array('jquery'));
    wp_enqueue_script('adherents');

    wp_enqueue_script( 'jquery-ui-datepicker' );
    wp_enqueue_script( 'jquery-ui-widget', null, null, null, false );
    wp_enqueue_style( 'jquery-ui-style', ( is_ssl() ) ? 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css' : 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css' );
});

function get_all_correspondants(){
    //get correspondants
    $args_elements = array(
        'posts_per_page'   => -1,
        'orderby'          => 'title',
        'order'            => 'DESC',
        'post_type'        => 'correspondants',
        'post_status'      => 'publish',
    );
    $result_elements = get_posts( $args_elements );
    $bloc = array();
    foreach($result_elements as $element){

        $html = '';

        $html.= '<div class="correspondant">';

        $html.= '<div class="departement">';
        $terms = wp_get_post_terms($element->ID, 'departements');
        foreach($terms as $term) {
            if($term->parent==0){
                continue;
            }
            $html.= $term->name. " (". $term->description. ")"; 
        }
        $html.= '</div>';

        $html.= '<div class="title_correspondant">';
        $html.= get_the_title($element->ID);
        $html.= '</div>';

        $thumb = get_the_post_thumbnail($element->ID);
        if($thumb){
            $html.= '<div class="thumbnail_correspondant">';
            $html.= $thumb;
            $html.= '</div>';
        }

        $metier = get_field('metier',$element->ID);
        $telephone = get_field('telephone',$element->ID);
        $email = get_field('email',$element->ID);

        if($metier){
            $html.= '<div class="metier_correspondant">';
            $html.= $metier;
            $html.= '</div>';
        }
        if($telephone){
            $html.= '<div class="telephone_correspondant">';
            $html.= $telephone;
            $html.= '</div>';
        }
        if($email){
            $html.= '<div class="email_correspondant">';
            $html.= '<a href="mailto:'.$email.'" title="'.get_the_title($element->ID).'">';
            $html.= $email;
            $html.= '</a>';
            $html.= '</div>';
        }

        $html.= '</div>';

        $dep_element = get_the_terms($element->ID,'departements');
        if($dep_element){
            foreach($dep_element as $dep){
                if(!$dep->parent || $dep->parent == 0){
                    $bloc[$dep->slug][] = $html;
                }
            }
        }
    }
    return $bloc;
}

function get_all_subs($rowid){
    $dolidb = doli_connect_database();
    $sql = "SELECT * FROM `llx_subscription` WHERE `fk_adherent` = " . $rowid . " ORDER BY `llx_subscription`.`dateadh` DESC;";
    return $dolidb->get_results($sql);	
}

function get_all_structures(){
    //get correspondants
    $args_elements = array(
        'posts_per_page'   => -1,
        'orderby'          => 'title',
        'order'            => 'DESC',
        'post_type'        => 'structures',
        'post_status'      => 'publish',
    );
    $result_elements = get_posts( $args_elements );
    $bloc = array();
    foreach($result_elements as $element){

        $html = '';

        $html.= '<div class="structure">';

        $html.= '<div class="title_structure">';
        $html.= get_the_title($element->ID);
        $html.= '</div>';

        $thumb = get_the_post_thumbnail($element->ID);
        if($thumb){
            $html.= '<div class="thumbnail_structure">';
            $html.= $thumb;
            $html.= '</div>';
        }

        $ville = get_field('ville',$element->ID);
        $lien_url = get_field('lien_url',$element->ID);

        if($ville){
            $html.= '<div class="ville_structure">';
            $html.= $ville;
            $html.= '</div>';
        }

        $content_post = get_post($element->ID);
        $content = $content_post->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        $html .= '<div class="content_structure">'.$content.'</div>';

        if($lien_url){
            $html.= '<div class="lien_structure">';
            $html.= '<a href="'.$lien_url.'" target="_blank">'.$lien_url.'</a>';
            $html.= '</div>';
        }

        $html.= '</div>';

        $dep_element = get_the_terms($element->ID,'departements');
        if($dep_element){
            foreach($dep_element as $dep){
                if(!$dep->parent || $dep->parent == 0){
                    $bloc[$dep->slug][] = $html;
                }
            }
        }
    }
    return $bloc;
}

/**
 * Add regions et departements
 */
function register_departements(){

    $main = array();

    //regions
    $main['Normandie'] =
        array(
        'description'=> '25',
        'slug' => 'normandie'
    );

    $main['Hauts-de-France'] =
        array(
        'description'=> '22',
        'slug' => 'hauts-de-france'
    );

    $main['Centre-Val-de-Loire'] =
        array(
        'description'=> '24',
        'slug' => 'centre-val-de-loire'
    );

    $main['Bretagne'] =
        array(
        'description'=> '53',
        'slug' => 'bretagne'
    );

    $main['Nouvelle-aquitaine'] =
        array(
        'description'=> '72',
        'slug' => 'nouvelle-aquitaine'
    );

    $main['Pays-de-la-loire'] =
        array(
        'description'=> '52',
        'slug' => 'pays-de-la-loire'
    );

    $main['Ile-de-france'] =
        array(
        'description'=> '11',
        'slug' => 'ile-de-france'
    );

    $main['Bourgogne-franche-comte'] =
        array(
        'description'=> '43',
        'slug' => 'bourgogne-franche-comte'
    );

    $main['Grand-est'] =
        array(
        'description'=> '42',
        'slug' => 'grand-est'
    );

    $main['Corse'] =
        array(
        'description'=> '94',
        'slug' => 'corse'
    );

    $main['Occitanie'] =
        array(
        'description'=> '91',
        'slug' => 'occitanie'
    );

    $main['Provence-Alpes-Côte d’Azur'] =
        array(
        'description'=> '91',
        'slug' => 'provence-alpes-cote-d-azur'
    );

    $main['Auvergne-Rhône-Alpes'] =
        array(
        'description'=> '82',
        'slug' => 'auvergne-rhone-alpes'
    );

    $main['Guadeloupe'] =
        array(
        'description'=> '1',
        'slug' => 'guadeloupe'
    );

    $main['Martinique'] =
        array(
        'description'=> '2',
        'slug' => 'martinique'
    );

    //departements

    $main['Ain'] =
        array(
        'description'=> '01',
        'slug' => 'ain',
        'parent'=> 'auvergne-rhone-alpes'
    );

    $main['Allier'] =
        array(
        'description'=> '03',
        'slug' => 'allier',
        'parent'=> 'auvergne-rhone-alpes'
    );

    $main['Ardèche'] =
        array(
        'description'=> '07',
        'slug' => 'ardeche',
        'parent'=> 'auvergne-rhone-alpes'
    );

    $main['Cantal'] =
        array(
        'description'=> '15',
        'slug' => 'cantal',
        'parent'=> 'auvergne-rhone-alpes'
    );

    $main['Drôme'] =
        array(
        'description'=> '26',
        'slug' => 'drome',
        'parent'=> 'auvergne-rhone-alpes'
    );

    $main['Haute-Loire'] =
        array(
        'description'=> '43',
        'slug' => 'haute-loire',
        'parent'=> 'auvergne-rhone-alpes'
    );

    $main['Haute-Savoie'] =
        array(
        'description'=> '74',
        'slug' => 'haute-savoie',
        'parent'=> 'auvergne-rhone-alpes'
    );

    $main['Isère'] =
        array(
        'description'=> '38',
        'slug' => 'isere',
        'parent'=> 'auvergne-rhone-alpes'
    );

    $main['Loire'] =
        array(
        'description'=> '42',
        'slug' => 'loire',
        'parent'=> 'auvergne-rhone-alpes'
    );

    $main['Puy-de-Dôme'] =
        array(
        'description'=> '63',
        'slug' => 'puy-de-dome',
        'parent'=> 'auvergne-rhone-alpes'
    );

    $main['Rhône'] =
        array(
        'description'=> '69',
        'slug' => 'rhone',
        'parent'=> 'auvergne-rhone-alpes'
    );

    $main['Savoie'] =
        array(
        'description'=> '73',
        'slug' => 'savoie',
        'parent'=> 'auvergne-rhone-alpes'
    );

    $main['Côte-d’Or'] =
        array(
        'description'=> '21',
        'slug' => 'cote-d-or',
        'parent'=> 'bourgogne-franche-comte'
    );

    $main['Doubs'] =
        array(
        'description'=> '25',
        'slug' => 'doubs',
        'parent'=> 'bourgogne-franche-comte'
    );
    $main['Haute-Saône'] =
        array(
        'description'=> '70',
        'slug' => 'haute-saone',
        'parent'=> 'bourgogne-franche-comte'
    );
    $main['Jura'] =
        array(
        'description'=> '39',
        'slug' => 'jura',
        'parent'=> 'bourgogne-franche-comte'
    );
    $main['Nièvre'] =
        array(
        'description'=> '58',
        'slug' => 'nievre',
        'parent'=> 'bourgogne-franche-comte'
    );
    $main['Saône-et-Loire'] =
        array(
        'description'=> '71',
        'slug' => 'saone-et-loire',
        'parent'=> 'bourgogne-franche-comte'
    );
    $main['Territoire de Belfort'] =
        array(
        'description'=> '90',
        'slug' => 'territoire-de-belfort',
        'parent'=> 'bourgogne-franche-comte'
    );
    $main['Yonne'] =
        array(
        'description'=> '89',
        'slug' => 'yonne',
        'parent'=> 'bourgogne-franche-comte'
    );

    $main['Côtes-d’Armor'] =
        array(
        'description'=> '22',
        'slug' => 'cotes-d-armor',
        'parent'=> 'bretagne'
    );
    $main['Finistère'] =
        array(
        'description'=> '29',
        'slug' => 'finistere',
        'parent'=> 'bretagne'
    );
    $main['Ille-et-Vilaine'] =
        array(
        'description'=> '35',
        'slug' => 'ille-et-vilaine',
        'parent'=> 'bretagne'
    );
    $main['Morbihan'] =
        array(
        'description'=> '56',
        'slug' => 'morbihan',
        'parent'=> 'bretagne'
    );

    $main['Cher'] =
        array(
        'description'=> '18',
        'slug' => 'cher',
        'parent'=> 'centre-val-de-loire'
    );
    $main['Eure-et-Loir'] =
        array(
        'description'=> '28',
        'slug' => 'eure-et-loir',
        'parent'=> 'centre-val-de-loire'
    );
    $main['Indre'] =
        array(
        'description'=> '36',
        'slug' => 'indre',
        'parent'=> 'centre-val-de-loire'
    );
    $main['Indre-et-Loire'] =
        array(
        'description'=> '37',
        'slug' => 'indre-et-loire',
        'parent'=> 'centre-val-de-loire'
    );
    $main['Loir-et-Cher'] =
        array(
        'description'=> '41',
        'slug' => 'loir-et-cher',
        'parent'=> 'centre-val-de-loire'
    );
    $main['Loiret'] =
        array(
        'description'=> '45',
        'slug' => 'loiret',
        'parent'=> 'centre-val-de-loire'
    );

    $main['Corse-du-Sud'] =
        array(
        'description'=> '2A',
        'slug' => 'corse-du-sud',
        'parent'=> 'corse'
    );
    $main['Haute-Corse'] =
        array(
        'description'=> '2B',
        'slug' => 'haute-corse',
        'parent'=> 'corse'
    );

    $main['Ardennes'] =
        array(
        'description'=> '08',
        'slug' => 'ardennes',
        'parent'=> 'grand-est'
    );
    $main['Aube'] =
        array(
        'description'=> '10',
        'slug' => 'aube',
        'parent'=> 'grand-est'
    );
    $main['Bas-Rhin'] =
        array(
        'description'=> '67',
        'slug' => 'bas-rhin',
        'parent'=> 'grand-est'
    );
    $main['Haut-Rhin'] =
        array(
        'description'=> '68',
        'slug' => 'haut-rhin',
        'parent'=> 'grand-est'
    );
    $main['Haute-Marne'] =
        array(
        'description'=> '52',
        'slug' => 'haute-marne',
        'parent'=> 'grand-est'
    );
    $main['Marne'] =
        array(
        'description'=> '51',
        'slug' => 'marne',
        'parent'=> 'grand-est'
    );
    $main['Meurthe-et-Moselle'] =
        array(
        'description'=> '54',
        'slug' => 'meurthe-et-moselle',
        'parent'=> 'grand-est'
    );
    $main['Meuse'] =
        array(
        'description'=> '55',
        'slug' => 'meuse',
        'parent'=> 'grand-est'
    );
    $main['Moselle'] =
        array(
        'description'=> '57',
        'slug' => 'moselle',
        'parent'=> 'grand-est'
    );
    $main['Vosges'] =
        array(
        'description'=> '88',
        'slug' => 'vosges',
        'parent'=> 'grand-est'
    );

    $main['Guadeloupe'] =
        array(
        'description'=> '971',
        'slug' => 'guadeloupe',
        'parent'=> 'guadeloupe'
    );

    $main['Aisne'] =
        array(
        'description'=> '02',
        'slug' => 'aisne',
        'parent'=> 'hauts-de-france'
    );
    $main['Nord'] =
        array(
        'description'=> '59',
        'slug' => 'nord',
        'parent'=> 'hauts-de-france'
    );
    $main['Oise'] =
        array(
        'description'=> '60',
        'slug' => 'oise',
        'parent'=> 'hauts-de-france'
    );
    $main['Pas-de-Calais'] =
        array(
        'description'=> '62',
        'slug' => 'pas-de-calais',
        'parent'=> 'hauts-de-france'
    );
    $main['Somme'] =
        array(
        'description'=> '80',
        'slug' => 'somme',
        'parent'=> 'hauts-de-france'
    );

    $main['Essonne'] =
        array(
        'description'=> '91',
        'slug' => 'essonne',
        'parent'=> 'ile-de-france'
    );
    $main['Hauts-de-Seine'] =
        array(
        'description'=> '92',
        'slug' => 'hauts-de-seine',
        'parent'=> 'ile-de-france'
    );
    $main['Paris'] =
        array(
        'description'=> '75',
        'slug' => 'paris-75',
        'parent'=> 'ile-de-france'
    );
    $main['Seine-et-Marne'] =
        array(
        'description'=> '77',
        'slug' => 'seine-et-marne',
        'parent'=> 'ile-de-france'
    );
    $main['Seine-Saint-Denis'] =
        array(
        'description'=> '93',
        'slug' => 'seine-saint-denis',
        'parent'=> 'ile-de-france'
    );
    $main['Val-d’Oise'] =
        array(
        'description'=> '95',
        'slug' => 'val-d-oise',
        'parent'=> 'ile-de-france'
    );
    $main['Val-de-Marne'] =
        array(
        'description'=> '94',
        'slug' => 'val-de-marne',
        'parent'=> 'ile-de-france'
    );
    $main['Yvelines'] =
        array(
        'description'=> '78',
        'slug' => 'yvelines',
        'parent'=> 'ile-de-france'
    );

    $main['Martinique'] =
        array(
        'description'=> '972',
        'slug' => 'martinique',
        'parent'=> 'martinique'
    );

    $main['Calvados'] =
        array(
        'description'=> '14',
        'slug' => 'calvados',
        'parent'=> 'normandie'
    );
    $main['Eure'] =
        array(
        'description'=> '27',
        'slug' => 'eure',
        'parent'=> 'normandie'
    );
    $main['Manche'] =
        array(
        'description'=> '50',
        'slug' => 'manche',
        'parent'=> 'normandie'
    );
    $main['Orne'] =
        array(
        'description'=> '61',
        'slug' => 'orne',
        'parent'=> 'normandie'
    );
    $main['Seine-Maritime'] =
        array(
        'description'=> '76',
        'slug' => 'seine-maritime',
        'parent'=> 'normandie'
    );

    $main['Charente'] =
        array(
        'description'=> '16',
        'slug' => 'charente',
        'parent'=> 'nouvelle-aquitaine'
    );
    $main['Charente-Maritime'] =
        array(
        'description'=> '17',
        'slug' => 'charente-maritime',
        'parent'=> 'nouvelle-aquitaine'
    );
    $main['Corrèze'] =
        array(
        'description'=> '19',
        'slug' => 'correze',
        'parent'=> 'nouvelle-aquitaine'
    );
    $main['Creuse'] =
        array(
        'description'=> '23',
        'slug' => 'creuse',
        'parent'=> 'nouvelle-aquitaine'
    );
    $main['Deux-Sèvres'] =
        array(
        'description'=> '79',
        'slug' => 'deux-sevres',
        'parent'=> 'nouvelle-aquitaine'
    );
    $main['Dordogne'] =
        array(
        'description'=> '24',
        'slug' => 'dordogne',
        'parent'=> 'nouvelle-aquitaine'
    );
    $main['Gironde'] =
        array(
        'description'=> '33',
        'slug' => 'gironde',
        'parent'=> 'nouvelle-aquitaine'
    );
    $main['Haute-Vienne'] =
        array(
        'description'=> '87',
        'slug' => 'haute-vienne',
        'parent'=> 'nouvelle-aquitaine'
    );
    $main['Landes'] =
        array(
        'description'=> '40',
        'slug' => 'landes',
        'parent'=> 'nouvelle-aquitaine'
    );
    $main['Lot-et-Garonne'] =
        array(
        'description'=> '47',
        'slug' => 'lot-et-garonne',
        'parent'=> 'nouvelle-aquitaine'
    );
    $main['Pyrénées-Atlantiques'] =
        array(
        'description'=> '64',
        'slug' => 'pyrenees-atlantiques',
        'parent'=> 'nouvelle-aquitaine'
    );
    $main['Vienne'] =
        array(
        'description'=> '86',
        'slug' => 'vienne',
        'parent'=> 'nouvelle-aquitaine'
    );

    $main['Ariège'] =
        array(
        'description'=> '09',
        'slug' => 'ariege',
        'parent'=> 'occitanie'
    );
    $main['Aude'] =
        array(
        'description'=> '11',
        'slug' => 'aude',
        'parent'=> 'occitanie'
    );
    $main['Aveyron'] =
        array(
        'description'=> '12',
        'slug' => 'aveyron',
        'parent'=> 'occitanie'
    );
    $main['Gard'] =
        array(
        'description'=> '30',
        'slug' => 'gard',
        'parent'=> 'occitanie'
    );
    $main['Gers'] =
        array(
        'description'=> '32',
        'slug' => 'gers',
        'parent'=> 'occitanie'
    );
    $main['Haute-Garonne'] =
        array(
        'description'=> '31',
        'slug' => 'haute-garonne',
        'parent'=> 'occitanie'
    );
    $main['Hautes-Pyrénées'] =
        array(
        'description'=> '65',
        'slug' => 'hautes-pyrenees',
        'parent'=> 'occitanie'
    );
    $main['Hérault'] =
        array(
        'description'=> '34',
        'slug' => 'herault',
        'parent'=> 'occitanie'
    );
    $main['Lot'] =
        array(
        'description'=> '46',
        'slug' => 'lot',
        'parent'=> 'occitanie'
    );
    $main['Lozère'] =
        array(
        'description'=> '48',
        'slug' => 'lozere',
        'parent'=> 'occitanie'
    );
    $main['Pyrénées-Orientales'] =
        array(
        'description'=> '66',
        'slug' => 'pyrenees-orientales',
        'parent'=> 'occitanie'
    );
    $main['Tarn'] =
        array(
        'description'=> '81',
        'slug' => 'tarn',
        'parent'=> 'occitanie'
    );
    $main['Tarn-et-Garonne'] =
        array(
        'description'=> '82',
        'slug' => 'tarn-et-garonne',
        'parent'=> 'occitanie'
    );

    $main['Loire-Atlantique'] =
        array(
        'description'=> '44',
        'slug' => 'loire-atlantique',
        'parent'=> 'pays-de-la-loire'
    );
    $main['Maine-et-Loire'] =
        array(
        'description'=> '49',
        'slug' => 'maine-et-loire',
        'parent'=> 'pays-de-la-loire'
    );
    $main['Mayenne'] =
        array(
        'description'=> '53',
        'slug' => 'mayenne',
        'parent'=> 'pays-de-la-loire'
    );
    $main['Sarthe'] =
        array(
        'description'=> '72',
        'slug' => 'sarthe',
        'parent'=> 'pays-de-la-loire'
    );
    $main['Vendée'] =
        array(
        'description'=> '85',
        'slug' => 'vendee',
        'parent'=> 'pays-de-la-loire'
    );

    $main['Alpes-de-Haute-Provence'] =
        array(
        'description'=> '04',
        'slug' => 'alpes-de-haute-provence',
        'parent'=> 'provence-alpes-cote-d-azur'
    );
    $main['Alpes-Maritimes'] =
        array(
        'description'=> '06',
        'slug' => 'alpes-maritimes',
        'parent'=> 'provence-alpes-cote-d-azur'
    );
    $main['Bouches-du-Rhône'] =
        array(
        'description'=> '13',
        'slug' => 'bouches-du-rhone',
        'parent'=> 'provence-alpes-cote-d-azur'
    );
    $main['Hautes-Alpes'] =
        array(
        'description'=> '05',
        'slug' => 'hautes-alpes',
        'parent'=> 'provence-alpes-cote-d-azur'
    );
    $main['Var'] =
        array(
        'description'=> '83',
        'slug' => 'var',
        'parent'=> 'provence-alpes-cote-d-azur'
    );
    $main['Vaucluse'] =
        array(
        'description'=> '84',
        'slug' => 'vaucluse',
        'parent'=> 'provence-alpes-cote-d-azur'
    );

    //SAVE THE TERMS
    $ids = array();
    foreach($main as $depkey=>$data){

        if(isset($data['parent']) && isset($ids[$data['parent']])){
            $data['parent'] = $ids[$data['parent']];
        }else{
            unset($data['parent']);
        }

        //check if already exist
        $term = get_term_by( 'slug', $data['slug'], 'departements');
        if(!$term){
            $term_result = wp_insert_term(
                $depkey, // the term
                'departements', // the taxonomy
                $data);

            $ids[$data['slug']] = $term_result['term_id'];
        }else{
            $ids[$data['slug']] = $term->term_id;
        }
    }
}

function save_dep(){
    if(isset($_GET['savedep'])){
        register_departements();
    }
}
add_action('init','save_dep');


// remove the html filtering
remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );

add_filter('edit_category_form_fields', 'cat_description');
function cat_description($tag)
{
    ?>
    <table class="form-table">
        <tr class="form-field">
            <th scope="row" valign="top"><label for="description"><?php _ex('Description', 'Taxonomy Description'); ?></label></th>
            <td>
                <?php
    $settings = array('wpautop' => true, 'media_buttons' => true, 'quicktags' => true, 'textarea_rows' => '15', 'textarea_name' => 'description' );
    wp_editor(wp_kses_post($tag->description , ENT_QUOTES, 'UTF-8'), 'cat_description', $settings);
                ?>
                <br />
                <span class="description"><?php _e('The description is not prominent by default; however, some themes may show it.'); ?></span>
            </td>
        </tr>
    </table>
    <?php
}

add_action('admin_head', 'remove_default_category_description');
function remove_default_category_description()
{
    global $current_screen;
    if ( $current_screen->id == 'edit-category' )
    {
    ?>
    <script type="text/javascript">
        jQuery(function($) {
            $('textarea#description').closest('tr.form-field').remove();
        });
    </script>
    <?php
    }
}

function tml_title( $title, $action ) {

	switch ( $action ) {
		case 'register' :
		case 'lostpassword':
		case 'retrievepassword':
		case 'resetpass':
		case 'rp':
		case 'login':
			$title = '';
			break;
	}
	return $title;
}
//add_filter( 'tml_title', 'tml_title', 11, 2 );

/**
 * Aiguillages mails contact form 7
 * 
 */
function mda_wpcf7_before_send_mail( $contact_form ) {
	$submission = WPCF7_Submission::get_instance();
	
	if( $submission ) {
		if( $contact_form->title() != 'Formulaire de contact' ) {
            return;
        }
        
		$mail = $contact_form->prop('mail');
		
		$posted_data = $submission->get_posted_data();
		
		if( preg_match( '/artiste/', $posted_data['votre-profil'][0] ) ) {
			$mail['recipient'] = 'charlotte.delsol@lamaisondesartistes.fr';
		} else {
			if( 
				preg_match( '/partenariat/', $posted_data['votre-demande-2'] ) ||
				preg_match( '/accueillir/', $posted_data['votre-demande-2'] )
			) {
				$mail['recipient'] = 'charlotte.delsol@lamaisondesartistes.fr';
			} elseif( preg_match( '/communication/', $posted_data['votre-demande-2'] ) ) {
				$mail['recipient'] = 'patrice.florella@lamaisondesartistes.fr';
			} else {
				$mail['recipient'] = 'antinea.garnier@lamaisondesartistes.fr';
			}
		}
		
		/* *
		//var_dump( $mail );
		var_dump( $posted_data['votre-profil'] );
		var_dump( $posted_data['votre-demande-1'] );
		var_dump( $posted_data['votre-demande-2'] );
		exit; //debug
		/* */
		
		$contact_form->set_properties( array( 'mail' => $mail ) );
	}
}
add_action( 'wpcf7_before_send_mail', 'mda_wpcf7_before_send_mail' );

function change_tml_action_message($message,$action){
	if($action == "resetpass"){
		$message = "Veuillez saisir le nouveau mot de passe que vous choisissez ci-dessous, ou noter puis valider le mot de passe déjà proposé";
	}
	return $message;
}
add_filter( 'tml_action_template_message', 'change_tml_action_message',10,2);

function change_tml_error_message($errors){
	if(preg_match('#cet identifiant est déjà utilisé#',$errors)){
		$errors = get_field('message_compte_deja_active','option');
		$errors = str_replace('Erreur', '<strong>ERREUR</strong>', $errors);
	}	
	return $errors;
}
add_filter( 'login_errors', 'change_tml_error_message',10,1);

/** Pas d'accès à wp-admin pour les adhérents **/
function mda_redirectwpadmin() {
	if( current_user_can( 'subscriber' ) && !DOING_AJAX) {
		exit( wp_redirect( '/site/espace-adherent/' ) );
	}
}
add_action( 'admin_init', 'mda_redirectwpadmin', 100 );

function change_title_new_adhesion( $title, $id = null ) {

	$row = is_user_doli_brouillon();
    if ( $title == "Renouveler votre adhésion" && $row) {
        return 'Payer votre adhésion';
    }
	
	if ( $title == "Espace adhérent" && $row) {
        return 'Adhésion en cours';
    }
    return $title;
}
add_filter( 'the_title', 'change_title_new_adhesion', 10, 2 );