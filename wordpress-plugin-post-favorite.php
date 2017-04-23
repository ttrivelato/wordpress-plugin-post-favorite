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

//Include required classes
include 'src/Fv.php';
include 'src/FvApi.php';
include 'src/Wg.php';
include 'src/Sc.php';
include 'src/Lf.php';

//Filter
add_filter('the_content', 
        array('\WordpressPluginPostFavorite\Fv', 'insertFvInContent')
        );

//Action
add_action('wp_ajax_nopriv_get_favorites', 
        array('\WordpressPluginPostFavorite\FvApi', 'listFavorites')
        );
add_action('wp_ajax_nopriv_update_favorites', 
        array('\WordpressPluginPostFavorite\FvApi', 'update')
        );
add_action('wp_ajax_nopriv_remove_favorites', 
        array('\WordpressPluginPostFavorite\FvApi', 'remove')
        );
add_action('wp_ajax_nopriv_get_title_favorites', 
        array('\WordpressPluginPostFavorite\FvApi', 'titleFavorites')
        );
add_action('wp_ajax_get_favorites', 
        array('\WordpressPluginPostFavorite\FvApi', 'listFavorites')
        );
add_action('wp_ajax_update_favorites', 
        array('\WordpressPluginPostFavorite\FvApi', 'update')
        );
add_action('wp_ajax_remove_favorites', 
        array('\WordpressPluginPostFavorite\FvApi', 'remove')
        );
add_action('wp_ajax_get_title_favorites', 
        array('\WordpressPluginPostFavorite\FvApi', 'titleFavorites')
        );
add_action('wp_enqueue_scripts', 
        array('\WordpressPluginPostFavorite\Lf', 'execute')
        );

add_action('widgets_init', 'fv_wd');

//ShortCode
add_shortcode('log-favorites', 
        array('\WordpressPluginPostFavorite\Sc', 'enableFavorite')
        );