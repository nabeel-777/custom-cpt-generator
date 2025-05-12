<?php

/**
 * Class to register a custom post type.
 */
class Custom_Post_Generator_Fn
{
    private $args;
    private $labels;

    public function __construct($args, $labels)
    {
        $this->args = $args;
        $this->labels = $labels;

        add_action('init', [$this, 'register']);
    }

    public function register()
    {
        if (!is_array($this->args) || !is_array($this->labels)) {
            return;
        }

        $post_type_name = sanitize_title($this->labels['post_type_name'] ?? '');
        if (empty($post_type_name) || post_type_exists($post_type_name)) {
            return;
        }

        $name = $this->labels['name'] ?? 'Items';
        $singular_name = $this->labels['singular_name'] ?? 'Item';
        $slug = $this->args['slug'] ?? $post_type_name;

        $labels = [
            'name'                  => $name,
            'singular_name'         => $singular_name,
            'menu_name'             => $name,
            'name_admin_bar'        => $singular_name,
            'add_new'               => 'Add New',
            'add_new_item'          => "Add New $singular_name",
            'edit_item'             => "Edit $singular_name",
            'new_item'              => "New $singular_name",
            'view_item'             => "View $singular_name",
            'search_items'          => "Search $name",
            'not_found'             => 'Not found',
            'not_found_in_trash'    => 'Not found in Trash',
            'all_items'             => "All $name",
            'parent_item_colon'     => "Parent $singular_name",
        ];

        $args = [
            'label'                 => $name,
            'labels'                => $labels,
            'public'                => true,
            'has_archive'           => true,
            'publicly_queryable'    => true,
            'query_var'             => true,
            'rewrite'               => ['slug' => $slug],
            'capability_type'       => 'post',
            'hierarchical'          => false,
            'supports'              => ['title', 'editor', 'thumbnail', 'excerpt'],
            'menu_position'         => $this->args['menu_position'] ?? 5,
            'menu_icon'             => $this->args['menu_icon'] ?? 'dashicons-admin-post',
            'show_in_rest'          => true,
        ];

        register_post_type($post_type_name, $args);
    }
}
