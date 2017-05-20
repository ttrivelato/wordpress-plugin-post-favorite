<?php
/**
 * @package Wordpress Plugin Post Favorite
 * @category Wordpress
 * @version 1.0
 * @author Thiago Trivelato(ttrivelato@gmail.com)
 * 
 * Plugin Name: Wordpress Plugin Post Favorite
 * Plugin URI: http://www.ttrivelato.com.br
 * Description: Wordpress Plugin Post Favorite.
 * Version: 1.0
 * Author: Thiago Trivelato
 * Author URI: http://www.ttrivelato.com.br
 *
 */

//Make sure we don't expose any info if called directly
if (!function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

//Put Constants Necessary to Plugin
define('WPPF_NAME', '\WordpressPluginPostFavorite');
define('WPPF_FODER_NAME', 'wordpress-plugin-post-favorite');
define('WPPF_VERSION', '1.0');
define('WPPF_MINIMUM_WP_VERSION', '3.7');
define('WPPF_PLUGIN_DIR', plugin_dir_path( __FILE__ ));

//Include required classes
require_once(WPPF_PLUGIN_DIR . 'src/class.wppf.php');
require_once(WPPF_PLUGIN_DIR . 'src/Fv.php');
require_once(WPPF_PLUGIN_DIR . 'src/FvApi.php');
require_once(WPPF_PLUGIN_DIR . 'src/Wg.php');
require_once(WPPF_PLUGIN_DIR . 'src/Sc.php');
require_once(WPPF_PLUGIN_DIR . 'src/Lf.php');

//Filter
add_filter('the_content', array(WPPF_NAME.'\Fv', 'insertFvInContent'));

//Action
add_action('wp_ajax_nopriv_get_favorites', array(WPPF_NAME.'\FvApi', 'listFavorites'));
add_action('wp_ajax_nopriv_update_favorites',array(WPPF_NAME.'\FvApi', 'update'));
add_action('wp_ajax_nopriv_remove_favorites',array(WPPF_NAME.'\FvApi', 'remove'));
add_action('wp_ajax_nopriv_get_title_favorites', array(WPPF_NAME.'\FvApi', 'titleFavorites'));

add_action('wp_ajax_get_favorites',array(WPPF_NAME.'\FvApi', 'listFavorites'));
add_action('wp_ajax_update_favorites', array(WPPF_NAME.'\FvApi', 'update'));
add_action('wp_ajax_remove_favorites',array(WPPF_NAME.'\FvApi', 'remove'));
add_action('wp_ajax_get_title_favorites',array(WPPF_NAME.'\FvApi', 'titleFavorites'));

add_action('wp_enqueue_scripts', array(WPPF_NAME.'\Lf', 'execute'));

add_action('widgets_init', 'fv_wd');

//ShortCode
add_shortcode('wppf-favorites', array(WPPF_NAME.'\Sc', 'enableFavorite'));