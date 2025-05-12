<?php

/**
 * Plugin Name: Custom CPT Generator
 * Description: A lightweight helper class to register custom post types dynamically.
 * Version: 1.0.0
 * Author: Nabeel Sainudeen
 * License: GPL2+
 */

require_once plugin_dir_path(__FILE__) . 'includes/class-custom-post-generator.php';

function custom_register_sample_cpt()
{
    $args = [
        'slug'          => 'custom_presentation',
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-slides',
    ];

    $labels = [
        'post_type_name' => 'custom_presentation',
        'name'           => 'Presentation',
        'singular_name'  => 'Presentation',
    ];

    new Custom_Post_Generator_Fn($args, $labels);
}
add_action('init', 'custom_register_sample_cpt', 0);
