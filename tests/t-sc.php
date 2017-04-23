<?php
/**
 * @name TEST SHORTCODE
 * @package Wordpress Plugin Post Favorite TESTS
 * @category Wordpress
 * @version 1.0
 * @author Thiago Trivelato(ttrivelato@gmail.com)
 */

//Set namespace
namespace WordpressPluginPostFavorite\Fv\Test;

use WordpressPluginPostFavorite\Fv;
use WordpressPluginPostFavorite\Sc;

class Shortcode extends \WP_UnitTestCase {

    /**
     * @var \favorites_widget
     */
    private $shortCode;

     /**
     * @name setUp
     * @access public
     * @return Define a cookie to test
     */
    public function setUp() {
        parent::setUp();
        $_COOKIE['wordpress-plugin-post-favorite'] = 'foo,bar';
    }

     /**
     * @name testEnableFavorite
     * @access public
     * @return Verify if favorite is enable
     */
    public function testEnableFavorite()
    {
        $this->expectOutputString('<ul id="log-favorite-shortcode"><li></li><li></li></ul>');
        Sc::enableFavorite();
    }
}