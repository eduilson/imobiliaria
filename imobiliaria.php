<?php
/**
 * Plugin Name: Imobiliária
 * Description: Ferramenta completa para imobiliárias
 * Version: 1.0.0
 * Author: Eduilson Rodrigues da Silva
 * Author URI: https://caraibas.net
 * Text Domain: imobiliaria
 * Requires PHP: 7.2
 * Domain Path: /
 *
 * @package @Imobiliaria
 */

require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';

new Imobiliaria\Bootstrap([
    'plugin_path' => plugin_dir_path(__FILE__),
    'plugin_url' => plugin_dir_url( __FILE__ ),
    'plugin_version' => '1.0.0'
]);