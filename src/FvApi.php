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
* API class to Favorite Plugin
* @access public
* @return object FvApi
*/
class FvApi extends Fv 
{
    /**
     * @name toJson
     * @access private
     * @return json return json data
     * @param array $data Collection of data
     */
    private function toJson($data) 
    {
        @header('Content-Type: application/json');
        echo json_encode( $data );
        wp_die();
    }
    
     /**
     * @name favorites
     * @access public
     * @return Json of favorites
     */
    public function listFavorites() 
    {
        self::toJson(self::favorites());
    }
    
    /**
     * @name update
     * @access public
     * @return json return json data
     * @param IdFavorite $_POST Id Of a Favorite
     */
    public function update() 
    {
        $fv = self::favorites();
        $fv[] = $_POST['IdFavorite'];
        $fv = array_unique($fv);
        self::save(self::arrayTo($fv));
        self::toJson($fv);
    }

    /**
     * @name remove
     * @access public
     * @return json return json data
     * @param IdFavorite $_POST Id Of a Favorite
     */
    public function remove() 
    {
        $fv = self::favorites();
        
        //Verify if a POST id Favorite Exists
        if (($key = array_search($_POST['IdFavorite'], $fv)) !== false) 
        {
            unset($fv[$key]);
        }
        self::save(self::arrayTo($fv));
        self::toJson($fv);
    }

    /**
     * @name titleFavorites
     * @access public
     * @return json return json data
     */
    public function titleFavorites() 
    {
        self::toJson(self::listTitleFavorites());
    }
}

