<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');


/**
 * Gravity Forms remove tab-index
 *
 */
add_filter( 'gform_tabindex', '__return_false' );

/**
 * Remove Comments Functionality
 */
add_action('wp_before_admin_bar_render', function () {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
});

add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

add_action('admin_menu', function () {
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
});