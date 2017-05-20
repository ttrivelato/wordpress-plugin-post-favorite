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
     * @name favorites
     * @access public
     * @return Json of favorites
     */
    public function listFavorites() 
    {
        \Wppf::toJson(\Wppf::favorites());
    }
    
    /**
     * @name update
     * @access public
     * @return json return json data
     * @param IdFavorite $_POST Id Of a Favorite
     */
    public function update() 
    {
        $fv = \Wppf::favorites();
        $fv[] = $_POST['IdFavorite'];
        $fv = array_unique($fv);
        \Wppf::save(\Wppf::arrayTo($fv));
        \Wppf::toJson($fv);
    }

    /**
     * @name remove
     * @access public
     * @return json return json data
     * @param IdFavorite $_POST Id Of a Favorite
     */
    public function remove() 
    {
        $fv = \Wppf::favorites();
        
        //Verify if a POST id Favorite Exists
        if (($key = array_search($_POST['IdFavorite'], $fv)) !== false) 
        {
            unset($fv[$key]);
        }
        \Wppf::save(\Wppf::arrayTo($fv));
        \Wppf::toJson($fv);
    }

    /**
     * @name titleFavorites
     * @access public
     * @return json return json data
     */
    public function titleFavorites() 
    {
        \Wppf::toJson(\Wppf::listTitleFavorites());
    }
}

