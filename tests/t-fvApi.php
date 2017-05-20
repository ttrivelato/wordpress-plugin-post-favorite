<?php
/**
 * @name TEST FV API
 * @package Wordpress Plugin Post Favorite TESTS
 * @category Wordpress
 * @version 1.0
 * @author Thiago Trivelato(ttrivelato@gmail.com)
 */

//Set namespace
namespace WordpressPluginPostFavorite\Fv\Test;
use WordpressPluginPostFavorite\FvApi;

class FvApiTest extends \WP_UnitTestCase {

     /**
     * @name setUp
     * @access public
     * @return Define a cookie to test
     */
    private $favorites;

    public function setUp()
    {
        parent::setUp();
        $this->favorites = new \WordpressPluginPostFavorite\FvApi();
    }

    /**
     * @expectedException \WPDieException
     */
    public function testListFavorites() {
        $_POST['IdFavorite'] = 1;
        $this->expectOutputString('["1","2"]');
        $this->favorites->listFavorites();
    }

    /**
     * @expectedException \WPDieException
     */
    public function testUpdate() {
        $_POST['IdFavorite'] = 1;
        $this->expectOutputString('["1","2"]');
        $this->favorites->update();
    }

    /**
     * @expectedException \WPDieException
     */
    public function testTitleFavorites() {
        $_POST['IdFavorite'] = 1;
        $this->expectOutputString('[]');
        $this->favorites->titleFavorites();
    }

    /**
     * @expectedException \WPDieException
     */
    public function testRemove() {
        $_POST['IdFavorite'] = 1;
        $this->expectOutputString('[]');
        $this->favorites->remove();
    }
}