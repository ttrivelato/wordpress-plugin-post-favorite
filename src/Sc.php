<?php
/**
 * @package Wordpress Plugin Post Favorite
 * @category Wordpress
 * @version 1.0
 * @author Thiago Trivelato(ttrivelato@gmail.com)
 */

//Set namespace
namespace WordpressPluginPostFavorite;

//Use FV
use WordpressPluginPostFavorite\Fv;
require_once('Fv.php');

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
        $listFavorites = self::listTitleFavorites();
        echo "<ul id=\"log-favorite-shortcode\">";
        
        foreach ($listFavorites as $favorite) 
        {
            echo "<li>" . $favorite . "</li>";
        }
        
        echo "</ul>";
    }
}

