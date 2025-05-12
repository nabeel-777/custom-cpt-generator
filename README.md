# Custom CPT Generator

A lightweight, reusable class for quickly registering custom post types in WordPress.

## Features

- Clean separation of logic into a dedicated class
- Easy to define CPTs via `$args` and `$labels`
- Hooks safely into the `init` action
- Supports `show_in_rest` for Gutenberg/REST API
- No framework dependencies

## Installation

1. Clone or download this plugin into your WordPress `wp-content/plugins` directory.
2. Activate it from the Plugins screen in your WordPress admin.

## Usage

Add the following to a plugin or theme:

```php
function custom_register_book_cpt() {
    $args = [
        'slug'          => 'books',
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-book',
    ];

    $labels = [
        'post_type_name' => 'book',
        'name'           => 'Books',
        'singular_name'  => 'Book',
    ];

    new Custom_Post_Generator_Fn($args, $labels);
}
add_action('init', 'custom_register_book_cpt', 0);
```
