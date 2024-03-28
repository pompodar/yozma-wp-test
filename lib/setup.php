<?php

namespace Roots\sage\Setup;

use Roots\sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
    add_theme_support('soil', [
        'clean-up',
        'disable-asset-versioning',
        'disable-trackbacks',
        'nav-walker'
    ]);

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/bl-translations
  load_theme_textdomain('bl', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Add custom logo
  add_theme_support('custom-logo');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sc'),
    'dropdown_navigation' => __('Dropdown Navigation', 'sc'),
    'footer_navigation_company' => __('Footer Navigation Company', 'sc'),
    'footer_navigation_blog' => __('Footer Navigation Blog', 'sc')
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');



  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/main.css'));

}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');



/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('bl/main.css', Assets\asset_path('styles/main.css'), false, null);
  wp_enqueue_script('bl/main.js', Assets\asset_path('scripts/main.js'), false, null, true);
}, 100);



/**
 * Login Screen Styles
 */

add_action('login_enqueue_scripts', function () {
  wp_enqueue_style('roots/login.css', Assets\asset_path('styles/login.css'),false,null);
}, 100);
