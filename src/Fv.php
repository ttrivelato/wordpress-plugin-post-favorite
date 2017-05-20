<?php
/**
 * @name Fv
 * @package Wordpress Plugin Post Favorite
 * @category Wordpress
 * @version 1.0
 * @author Thiago Trivelato(ttrivelato@gmail.com)
 */

//Set namespace WordpressPluginPostFavorite
namespace WordpressPluginPostFavorite;

/**
* Main FV class to Favorite Plugin
* @access public
* @return object FV
*/
class Fv 
{
    /**
     * @name insertFvInContent
     * @access public
     * @return $content The file of FV in post wordpress
     * @param string $data
     */
    public static function insertFvInContent($data) 
    {
        echo $data;
        
        if(\Wppf::existFavorite(get_the_ID(), \Wppf::favorites()))        
            include(WPPF_PLUGIN_DIR."src/views/fv_in_content_on.php");
        else
            include(WPPF_PLUGIN_DIR."src/views/fv_in_content_off.php"); 
        
    }
}