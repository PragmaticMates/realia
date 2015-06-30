<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Pages
 *
 * @class Realia_Pages
 * @package Realia/Classes
 * @author Pragmatic Mates
 */
class Realia_Pages {
	/**
	 * Initialize specialty pages
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {}

	/**
	 * Gets all pages list
	 *
	 * @access public
	 * @return array
	 */
	public static function get_pages() {
		$pages = array();
		$pages[] = __( 'Not set', 'realia' );

		foreach ( get_pages() as $page ) {
			$pages[ $page->ID ] = $page->post_title;
		}

		return $pages;
	}
}

Realia_Pages::init();
