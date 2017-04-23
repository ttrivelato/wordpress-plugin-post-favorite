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
* Main Class to Favorite Plugin
* @access public
* @return object FV
*/
class Fv 
{

    /**
     * @name insertFvInContent
     * @access public
     * @return $content The string of FV in post wordpress
     * @param string $data
     */
    public static function insertFvInContent($data) 
    {
        //Set Image Folder(on/off)
        $imgFolder = "/wordpress-plugin-post-favorite/assets/images/";

        $data .= "<div>";

        $url = "";
        $url .= "<a href=\"javascript:void(0)\" class=\"add-favorite\" data-id-favorite=\"" . get_the_ID() . "\">";
        $url .= "<img class=\"star-favorite\" src=\"" . plugins_url($imgFolder.'favorite_off') . "\">" . __("Favorite");
        $url .= "</a>";

        //Check if exists favorite (turn on/turn off)
        if (self::existFavorite(get_the_ID(), self::favorites())) 
        {
            $url = "";
            $url .= "<a href=\"javascript:void(0)\" class=\"remove-favorite\" data-id-favorite=\"" . get_the_ID() . "\">";
            $url .= "<img class=\"star-favorite\" src=\"" . plugins_url($imgFolder.'favorite_on') . "\">" . __("Favorite");
            $url .= "</a>";
        }

        $data .= $url;
        $data .= "</div>";

        return $data;
    }
    
    /**
     * @name existFavorite
     * @access private
     * @return bool true/false
     * @param string $id Favorite ID (int) $arrayFavorite Colection Favorite (array)
     */
    private static function existFavorite($id, $arrayFavorite) 
    {
        $existFavorite = array_search($id, $arrayFavorite);
        return $existFavorite !== false;
    }

    /**
     * @name favorites
     * @access public
     * @return Cookie Favorites
     */
    public static function favorites() 
    {
        //Check if exists cookie favorite
        if (!isset($_COOKIE['wordpress-plugin-post-favorite'])) 
        {
            self::newFavorites();
        }

        return self::toArray(@$_COOKIE['wordpress-plugin-post-favorite']);
    }

    /**
     * @name newFavorites
     * @access private
     * @return Create New Favorite
     */
    private static function newFavorites() 
    {
        self::save(',');
    }
    
    /**
     * @name save
     * @access protected
     * @return Create New Favorite
     * @param string $text Cookie Favorite
     */
    protected static function save($text) 
    {
        //Check if exists cookie favorite
        if( isset($_COOKIE['wordpress-plugin-post-favorite'])) 
        {
            unset($_COOKIE['wordpress-plugin-post-favorite']);
        }
        @setcookie('wordpress-plugin-post-favorite', null, - 1, '/');
        @setcookie('wordpress-plugin-post-favorite', $text, time() + 3600, "/");
    }

    /**
     * @name toArray
     * @access private
     * @return Transform cookies favorites to array
     * @param collection $cookieFavorites Cookie Favorite
     */
    private static function toArray($cookieFavorites) 
    {
        $arrayFavorites = explode(",", $cookieFavorites);
        $key = array_search( "", $arrayFavorites );
        
        if ($key !== false) 
        {
            unset($arrayFavorites[$key]);
        }

        return $arrayFavorites;
    }
    
    /**
     * @name arrayTo
     * @access protected
     * @return Transform Array cookies in a cookie
     * @param collection $arrayFavorites Cookie Favorite
     */
    protected function arrayTo($arrayFavorites) 
    {
        return implode( ",", $arrayFavorites );
    }
    
    /**
     * @name listTitleFavorites
     * @access public
     * @return List of Favorites
     */
    public static function listTitleFavorites() 
    {
        $listOfFavorites = self::favorites();
        $titles = array();
        
        //Open looping od data
        foreach ($listOfFavorites as $favorite) 
        {
            //Check if empty
            if ($favorite != "") 
            {
                $titles[$favorite] = get_the_title($favorite);
            }
        }

        return $titles;
    }
}