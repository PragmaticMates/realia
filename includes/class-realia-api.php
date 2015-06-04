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
		add_filter( 'json_prepare_post', array( __CLASS__, 'add_fields' ) );

	}

	public static function add_fields( $post_response, $post, $context ) {
		// Price
		$post_response['price'] = Realia_Price::get_property_price( $post_response['ID'] );

		// Location
		$post_response['location'] = array(
			'latitude' => get_post_meta( $post_response['ID'], REALIA_PROPERTY_PREFIX . 'location_latitude', true ),
			'longitude' => get_post_meta( $post_response['ID'], REALIA_PROPERTY_PREFIX . 'location_longitude', true ),
		);

		return $post_response;
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
