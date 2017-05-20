<?php
/**
 * @name bootstrap
 * @package Wordpress Plugin Post Favorite TESTS
 * @category Wordpress
 * @version 1.0
 * @author Thiago Trivelato(ttrivelato@gmail.com)
 */

//Define Test Dir
$_tests_dir = getenv('WP_TESTS_DIR');

//If dir is empry capture /tpm dir
if (!$_tests_dir) 
{
    $_tests_dir = '/tmp/wordpress-tests-lib';
}

// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';

/**
 * Manually load the plugin being tested.
 */
function _manually_load_plugin() {
    require dirname( dirname( __FILE__ ) ) . '/wordpress-plugin-post-favorite.php';
}

tests_add_filter('muplugins_loaded', '_manually_load_plugin');

// Start up the WP testing environment.
require $_tests_dir . '/includes/bootstrap.php';
