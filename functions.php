<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://github.com/timber/starter-theme
 */

namespace App;

use Timber\Timber;

// Load Composer dependencies.
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/StarterSite.php';

Timber::init();

new StarterSite();

function create_people_custom_post_type() {
    $labels = [
        'name' => __('People'),
        'singular_name' => __('Person'),
        'menu_name' => __('People'),
        'add_new' => __('Add New Person'),
        'add_new_item' => __('Add New Person'),
        'edit_item' => __('Edit Person'),
        'view_item' => __('View Person'),
        'all_items' => __('All People'),
        'search_items' => __('Search People'),
        'not_found' => __('No people found'),
        'not_found_in_trash' => __('No people found in Trash'),
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'people'),
        'show_in_rest' => true,
    ];

    register_post_type('people', $args);
}
add_action('init', __NAMESPACE__ . '\\create_people_custom_post_type');
