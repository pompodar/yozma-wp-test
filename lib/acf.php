<?php

namespace Roots\sage\ACF;

use LTC;

/**
 * Add options pages using ACF (advanced custom fields) for
 * globally accessed information on the site (used in things
 * like headers and footers, etc).
 */

if (function_exists("acf_add_options_page")) {

  // Add Theme Options page
  acf_add_options_page([
    'page_title' => 'Site Options',
    'menu_slug' => 'site_options',
    'capability' => 'edit_posts'
  ]);
}

/**
 * Only let LTC see Custom Fields Admin
 */

$users_allowed_acf = [
    'admin'
];

global $current_user; wp_get_current_user();
if (!in_array($current_user->user_login, $users_allowed_acf)) {
    add_filter('acf/settings/show_admin', '__return_false');
}