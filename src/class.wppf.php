<?php
/**
 * @name Wppf
 * @package Wordpress Plugin Post Favorite
 * @category Wordpress
 * @version 1.0
 * @author Thiago Trivelato(ttrivelato@gmail.com)
 */
class Wppf {
    
    /**
     * @name toJson
     * @access private
     * @return json return json data
     * @param array $data Collection of data
     */
    public static function toJson($data) 
    {
        @header('Content-Type: application/json');
        echo json_encode($data);
        wp_die();
    }
    
    /**
     * @name existFavorite
     * @access private
     * @return bool true/false
     * @param string $id Favorite ID (int) $arrayFavorite Colection Favorite (array)
     */
    public static function existFavorite($id, $arrayFavorite) 
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
    public static function newFavorites() 
    {
        self::save(',');
    }
    
    /**
     * @name save
     * @access protected
     * @return Create New Favorite
     * @param string $text Cookie Favorite
     */
    public static function save($text) 
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
    public static function toArray($cookieFavorites) 
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
    public function arrayTo($arrayFavorites) 
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