<?php
/**
 * @name TEST WIDGET
 * @package Wordpress Plugin Post Favorite TESTS
 * @category Wordpress
 * @version 1.0
 * @author Thiago Trivelato(ttrivelato@gmail.com)
 */

//Set namespace
namespace WordpressPluginPostFavorite\Fv\Test;
use WordpressPluginPostFavorite\Fv;

class WidgetTest extends \WP_UnitTestCase {

    /**
     * @var \favorites_widget
     */
    private $widget;

    /**
     * @name setUp
     * @access public
     * @return Define a cookie to test
     */
    public function setUp() {
        
        parent::setUp();
        $this->widget = new \favorites_widget();
        $_COOKIE['wordpress-plugin-post-favorite'] = 'foo,bar';

    }
    
    /**
     * @name testUpdateWidget
     * @access public
     * @return Test update Widget
     */
    public function testUpdateWidget() {
        $instance['title'] = "title";
        $this->assertEquals($this->widget->update($instance), $instance);
    }
}