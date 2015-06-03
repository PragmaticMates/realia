<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Api
 *
 * @class Realia_Api
 * @package Realia/Classes
 * @author Pragmatic Mates
 */
class Realia_Api {
	/**
	 * Initialize API
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {
		add_filter( 'pre_get_posts', array( __CLASS__, 'filter_fields' ) );
	}

	/**
	 * Adds filtering option into WP API
	 *
	 * @access public
	 * @param $query
	 * @return mixed
	 */
	public static function filter_fields( $query ) {
		if ( defined( 'JSON_REQUEST' ) && JSON_REQUEST ) {
			$query = Realia_Filter::filter_query( $query );
		}

		return $query;
	}
}

Realia_Api::init();


