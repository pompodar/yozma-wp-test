<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
    'lib/acf.php',        // ACF Functions
    'lib/assets.php',     // Scripts and stylesheets
    'lib/extras.php',     // Custom functions
    'lib/setup.php',      // Theme setup
    'lib/titles.php',     // Page titles
    'lib/wrapper.php',    // Theme wrapper class
    'lib/acf-blocks.php', // Gutenberg Blocks
    'lib/acf-global.php', // Gutenberg Blocks
];
// svg
function allow_svg_and_avif_upload( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['avif'] = 'image/avif'; 
    $mimes['webp'] = 'image/webp'; 
    return $mimes;
}
add_filter( 'upload_mimes', 'allow_svg_and_avif_upload' );

foreach ($sage_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);


/**
 * Asset call function
 */

function asset_uri($asset)
{
    echo Roots\Sage\Assets\asset_path($asset);
}

function get_asset_uri($asset)
{
    return Roots\Sage\Assets\asset_path($asset);
}

function get_asset_path($asset)
{
    return Roots\Sage\Assets\asset_path($asset, true);
}

/**
* Get base64 binary data of preloader image
*/
function get_img_binary($image)
{
    $url = parse_url($image);
    if (strpos($image, 'uploads-cache') !== false) {
        return base64_encode(file_get_contents(WP_CONTENT_DIR . '/uploads-cache/' . ltrim($url['path'], '/app/uploads-cache')));
    } else {
        return base64_encode(file_get_contents(wp_upload_dir()['basedir'] . '/' . ltrim($url['path'], '/app/uploads')));
    }
}


/**
 * Changing the logo link from wordpress.org to your site
 */

function custom_login_url()
{
    return home_url();
}

add_filter('login_headerurl', 'custom_login_url');


/**
 * Changing the alt text on the logo to show your site name
 */

function custom_login_title()
{
    return get_option('blogname');
}

add_filter('login_headertext', 'custom_login_title');


/**
 * Add excerpt block to pages
 */

add_action( 'init', 'ud_add_excerpt_to_pages' );
function ud_add_excerpt_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}


/**
 * Move Yoast to Bottom
 */

function yoasttobottom()
{
    return 'low';
}

add_filter('wpseo_metabox_prio', 'yoasttobottom');


/**
 * Get Primary Taxonomy
 */

if (!function_exists('get_primary_taxonomy_id')) {
    function get_primary_taxonomy_id($post_id, $taxonomy)
    {
        $prm_term = '';
        if (class_exists('WPSEO_Primary_Term')) {
            $wpseo_primary_term = new WPSEO_Primary_Term($taxonomy, $post_id);
            $prm_term = $wpseo_primary_term->get_primary_term();
        }
        if (!is_object($wpseo_primary_term) || empty($prm_term)) {
            $term = wp_get_post_terms($post_id, $taxonomy);
            if (isset($term) && !empty($term)) {
                return $term[0]->term_id;
            } else {
                return '';
            }
        }
        return $wpseo_primary_term->get_primary_term();
    }
}


/**
 * Remove Gutenberg Block Library CSS and other plugin stuff we don't need
 */

// function remove_bloat_assets()
// {
//     wp_dequeue_style('classic-theme-styles');
//     wp_dequeue_style('wc-blocks-style');
//     wp_dequeue_style('wp-block-library');
//     wp_dequeue_style('wc-blocks-vendors-style');
//     wp_dequeue_style('wcwl_frontend');
//     wp_dequeue_style('photoswipe');
//     wp_dequeue_script('photoswipe');
//     wp_dequeue_style('photoswipe');
//     wp_dequeue_script('photoswipe-ui-default');
//     wp_dequeue_style('photoswipe-ui-default');
//     wp_dequeue_script('zoom');
// }

// add_action('wp_enqueue_scripts', 'remove_bloat_assets', 999);
// add_action('wp_print_scripts', 'remove_bloat_assets', 999);


/**
 * Gravity Forms Spinner URL
 */

add_filter( 'gform_ajax_spinner_url', 'spinner_url', 10, 2 );
function spinner_url( $image_src, $form ) {
    return get_asset_uri('images/loading-dots.svg');
}


/**
 * Separate media categories
 */
add_filter('wpmediacategory_taxonomy', function () {
    return 'category_media';
}); //requires PHP 5.3 or newer



/**
 * UD -> Fly Wrapper
 */

function ud_get_attachment_image($attachment_id = 0, $size = 'medium', $crop = null, $attr = array())
{
    return fly_get_attachment_image($attachment_id, $size, $crop, $attr);
}

function ud_get_attachment_image_src($attachment_id = 0, $size = 'medium', $crop = null)
{
    return fly_get_attachment_image_src($attachment_id, $size, $crop);
}

/**
 * Allow Editors Menu Access
 */

function add_theme_caps() {
    $role = get_role('editor');
    $role->add_cap('manage_options');
}

add_action('admin_init', 'add_theme_caps');


/**
 * Remove Tags on Posts
 */
function ud_unregister_tags_for_posts()
{
    unregister_taxonomy_for_object_type('post_tag', 'post');
}

// add_action('init', 'ud_unregister_tags_for_posts');


/**
 * Gravity Forms - Change submit button to <button>
 */

add_filter('gform_submit_button', 'input_to_button', 10, 2);
function input_to_button($button, $form)
{
    $dom = new DOMDocument();
    $dom->loadHTML($button);
    $input = $dom->getElementsByTagName('input')->item(0);
    $new_button = $dom->createElement('button');
    $new_button->appendChild($dom->createTextNode($input->getAttribute('value')));
    $input->removeAttribute('value');
    foreach ($input->attributes as $attribute) {
        $new_button->setAttribute($attribute->name, $attribute->value);
    }
    $input->parentNode->replaceChild($new_button, $input);

    return $dom->saveHtml($new_button);
}

add_filter('gform_submit_button', 'add_custom_css_classes', 10, 2);
function add_custom_css_classes($button, $form)
{
    $dom = new DOMDocument();
    $dom->loadHTML($button);
    $input = $dom->getElementsByTagName('button')->item(0);
    $classes = $input->getAttribute('class');
    $classes .= " button";
    $input->setAttribute('class', $classes);
    return $dom->saveHtml($input);
}

// Custom logo
function mytheme_customize_register( $wp_customize ) {
    $wp_customize->add_setting('sticky_header_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sticky_header_logo', array(
        'label' => 'Sticky Header Logo',
        'section' => 'title_tagline',
        'settings' => 'sticky_header_logo',
        'priority' => 8
    )));
}
add_action( 'customize_register', 'mytheme_customize_register' );

// Menu
function ltc_header_menu() {
    register_nav_menu('ltc_header_menu',__( 'LTC Header Menu' ));
}
add_action( 'init', 'ltc_header_menu' );

function ltc_footer_menu_left() {
    register_nav_menu('ltc_footer_menu_left',__( 'LTC Left Footer Menu' ));
}

add_action( 'init', 'ltc_footer_menu_left' );

function ltc_footer_menu_right() {
    register_nav_menu('ltc_footer_menu_right',__( 'LTC Right Footer Menu' ));
}

add_action( 'init', 'ltc_footer_menu_right' );

function defer_parsing_of_js( $url ) {
    if ( is_user_logged_in() ) return $url;
    if ( FALSE === strpos( $url, '.js' ) ) return $url;
    if ( strpos( $url, 'jquery.js' ) ) return $url;
    return str_replace( ' src', ' defer src', $url );
}

add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );

add_theme_support('wp-block-styles');

// add_filter( 'allowed_block_types_all', 'ltc_allowed_block_types', 25, 2 );

function ltc_allowed_block_types( $allowed_blocks, $editor_context ) {
 
	if( 'post' === $editor_context->post->post_type ) {
		$allowed_blocks = array(
		'core/block', 'core/post-content', 'core/post-excerpt', 'core/post-featured-image', 'core/heading', 'core/paragraph', 'core/image', 'core/embed',
	);
	}
 
	return $allowed_blocks;
 
}

// custom acf editor styles

/**
 * Registers an editor stylesheet for the theme.
 */
function ltc_theme_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}

add_action( 'admin_init', 'ltc_theme_add_editor_styles' );

add_filter( 'wp_mail_from_name', 'ltc_mail_from_name' );

function ltc_mail_from_name( $name ) {
    return "LTC";
}

add_action( 'woocommerce_after_shop_loop_item', 'display_product_variations', 9 );

function display_product_variations() {
    global $product;

    // Check if the product is a variable product
    if ( $product->is_type( 'variable' ) ) {
        // Get the variations
        $variations = $product->get_available_variations();

        // Output each variation
        foreach ( $variations as $variation ) {
            $variation_id = $variation['variation_id'];
            $variation_obj = new WC_Product_Variation( $variation_id );

            $variation_image = $variation_obj->get_image();

            echo '<div class="variation-data-wrapper">';

            // Output variation name and image
            echo '<div class="variation-data">';
            echo '<div class="variation-image">' . $variation_image . '</div>';
            echo '</div>';

            $variation_slug = $variation_obj->get_attributes()['pa_color'];

            // Output variation name, slug, and image
            echo '<div class="variation-data">';
            echo '<p class="variation-slug">' . $variation_slug . '</p>';
            echo '</div>';

            echo '</div>';

        }
    }
}


if (!defined("MY_THEME_DIR")) define("MY_THEME_DIR", trailingslashit( get_template_directory() ));

require_once MY_THEME_DIR.'lib/walker-scripts.php' ;

require_once MY_THEME_DIR.'lib/styles-scripts-enqueue.php' ;