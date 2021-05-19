<?php

namespace Imobiliaria;

/**
 * Class Bootstrap
 * @package Imobiliaria
 */
class Bootstrap{

    static $plugin_path;
    static $plugin_url;
    static $plugin_version;

    /**
     * Bootstrap constructor.
     * @param array $args
     */
    public function __construct(array $args){
        self::$plugin_path = $args['plugin_path'];
        self::$plugin_url = $args['plugin_url'];
        self::$plugin_version = $args['plugin_version'];

        // Ativa o CarbonFields
        add_action( 'after_setup_theme', [$this, 'crb_load']);


        // Register custom posts
        new CustomPosts\Property();
    }

    public function crb_load(){
        \Carbon_Fields\Carbon_Fields::boot();
    }
}