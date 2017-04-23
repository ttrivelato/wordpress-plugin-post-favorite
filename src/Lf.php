<?php
/**
 * @package Wordpress Plugin Post Favorite
 * @category Wordpress
 * @version 1.0
 * @author Thiago Trivelato(ttrivelato@gmail.com)
 */

//Set namespace
namespace WordpressPluginPostFavorite;

/**
* Load File(Javascript) to Favorite Plugin
* @access public
* @return object FvApi
*/
class Lf 
{

    /**
     * @name load
     * @access public
     * @return Javascript embed in HTML
     */
    public static function execute() 
    {
        $folder = plugin_dir_url( __FILE__ ) . '../assets/javascript/';
        wp_enqueue_script('action-log-favorites', $folder.'execute.js', array('jquery'), '0.1' );
    }

}