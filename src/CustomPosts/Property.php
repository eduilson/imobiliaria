<?php

namespace Imobiliaria\CustomPosts;

/**
 * Class Property
 * @package Imobiliaria\CustomPosts
 */
class Property
{

    static $slug = 'property';

    public function __construct()
    {
        add_action('init', [$this, 'register']);
        add_action('carbon_fields_register_fields', [$this, 'register_fields']);

        add_filter('enter_title_here', [$this, 'title_placeholder'], 20, 2);
        add_action('init', [$this, 'post_statuses']);
    }

    public function register()
    {
        $labels = [
            'name' => _x('Properties', 'imobiliaria'),
            'singular_name' => __('Property', 'imobiliaria'),
            'add_new' => __('New property', 'imobiliaria'),
            'add_new_item' => __('Add new property', 'imobiliaria'),
            'edit_item' => __('Edit', 'imobiliaria'),
            'new_item' => __('New property', 'imobiliaria'),
            'all_items' => __('All properties', 'imobiliaria'),
            'view_item' => __('View', 'imobiliaria'),
            'search_items' => __('Search', 'imobiliaria'),
            'not_found' => __('No records found', 'imobiliaria'),
            'not_found_in_trash' => __('Nothing found in the trash', 'imobiliaria'),
            //'parent_item_colon'  => ’,
            'menu_name' => __('Properties', 'imobiliaria')
        ];

        $args = array(
            'labels' => $labels,
            //'description' => __('Cotação de produtos para a categoria: ' . $category->name, 'imobiliaria'),
            'public' => true,
            'exclude_from_search' => false,
            //'publicly_queryable' => false,
            //'query_var' => false,
            //'rewrite' => false,
            'menu_position' => 56,
            //'supports' => array('title'),
            'menu_icon' => 'dashicons-money-alt',
            'has_archive' => true,
            'capability_type' => 'post',
            'capabilities' => array(//'create_posts' => 'do_not_allow', // false < WP 4.5, credit @Ewout
            ),
            'map_meta_cap' => true, // if users are not allowed to edit/delete existing posts
        );

        register_post_type(self::$slug, $args);
    }

    public function register_fields()
    {
        Property\Details::fields();
        Property\Price::fields();
        Property\Location::fields();
        Property\Media::fields();
    }

    /**
     * @param string $title
     * @param \WP_Post $post
     */
    public function title_placeholder($title, $post)
    {
        return $post->post_type === self::$slug ? __('Property title', 'imobiliaria') : $title;
    }

    public function post_statuses()
    {
        $statuses = [
            [ 'label' => _x('Sold', 'imobiliaria'), 'code' => 'sold']
        ];

        foreach ($statuses as $status) {
            register_post_status($status['code'], array(
                'label' => $status['label'],
                'public' => true,
                'exclude_from_search' => false,
                'show_in_admin_all_list' => true,
                'show_in_admin_status_list' => true,
                //'label_count' => _n_noop('Unread <span class="count">(%s)</span>', 'Unread <span class="count">(%s)</span>'),
            ));
        }
    }
}