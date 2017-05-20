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
* Main Class to Source Code In Wordpress
* @access public
* @return object SC
*/
class Sc extends Fv 
{

    /**
     * @name enableFavorite
     * @access public
     * @return The Html to show Favorite
     */
    public static function enableFavorite() 
    {
        $listFavorites = \Wppf::listTitleFavorites();
        echo "<ul id=\"wppf-favorite-shortcode\">";
        
        foreach ($listFavorites as $favorite) 
        {
            echo "<li>" . $favorite . "</li>";
        }
        
        echo "</ul>";
    }
}

