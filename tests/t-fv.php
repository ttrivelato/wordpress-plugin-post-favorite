<?php
/**
 * @name TEST FV
 * @package Wordpress Plugin Post Favorite TESTS
 * @category Wordpress
 * @version 1.0
 * @author Thiago Trivelato(ttrivelato@gmail.com)
 */

//Set namespace
namespace WordpressPluginPostFavorite\Fv\Test;
use WordpressPluginPostFavorite\Fv;

class FvTest extends \WP_UnitTestCase 
{

    //Set Favorite
    private $favorites;

     /**
     * @name setUp
     * @access public
     * @return Define a cookie to test
     */
    public function setUp()
    {
        parent::setUp();
        $this->favorites = new \WordpressPluginPostFavorite\Fv();
	$_COOKIE['wordpress-plugin-post-favorite'] = 'foo,bar';
    }
    
     /**
     * @name invokeMethod
     * @access public
     * @return Enable invoke method
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
    
     /**
     * @name existFavorite
     * @access public
     * @return Verify exist Favorite
     */
    public function existFavorite()
    {
        $this->assertTrue($this->invokeMethod($this->favorites, 'existFavorite', array('param1', array('param1','param2'))));
    }
    
     /**
     * @name existFavoriteNot
     * @access public
     * @return Verify not exist Favorite
     */
    public function existFavoriteNot()
    {
        $this->assertFalse($this->invokeMethod($this->favorites, 'existFavorite', array('param', array('param1','param2'))));
    }
    
     /**
     * @name favorites
     * @access public
     * @return Get Favorites
     */
    public function favorites()
    {
        $favorites = $this->favorites->favorites();
        $this->assertEquals(array('foo', 'bar'), $favorites);
    }

    /**
     * @name favoritesEmpty
     * @access public
     * @return Check if empty favorite
     */
    public function favoritesEmpty()
    {
        $_COOKIE['wordpress-plugin-post-favorite'] = null;
        $favorites = $this->favorites->favorites();
        $this->assertEmpty($favorites);
    }

     /**
     * @name toArray
     * @access public
     * @return Genetare cookie to array
     */
    public function toArray()
    {
        $retorno = $this->invokeMethod($this->favorites, 'toArray', array('param,param2'));
        $this->assertEquals(array('param', 'param2'), $retorno);
    }

     /**
     * @name arrayTo
     * @access public
     * @return Genetare array to cookie
     */
    public function arrayTo()
    {
        $retorno = $this->invokeMethod($this->favorites, 'arrayTo', array(array('foo', 'bar')));
        $this->assertEquals('foo,bar', $retorno);
    }
    
    /**
     * @name testShouldSaveCookie
     * @access public
     * @return Save Cookie
     */
    public function testShouldSaveCookie()
    {
        $this->markTestIncomplete();
    }

    /**
     * @name testGetListTitleFavorites
     * @access public
     * @return Get list title favorite
     */
    public function testGetListTitleFavorites()
    {
        $_COOKIE['wordpress-plugin-post-favorite'] = '1,2';
        $listFavorites = $this->favorites->listTitleFavorites();
    }
}