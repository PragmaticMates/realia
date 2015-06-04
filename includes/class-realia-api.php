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
		add_filter( 'json_prepare_post', array( __CLASS__, 'add_fields' ), 10, 3 );

	}

	public static function add_fields( $post_response, $post, $context ) {
		// Price
		$post_response['price'] = Realia_Price::get_property_price( $post_response['ID'] );

		// Location
		$location = get_post_meta( $post_response['ID'], REALIA_PROPERTY_PREFIX . 'map_location', true );

		$post_response['map_location'] = array(
			'latitude'  => ! empty( $location['latitude'] ) ? floatval( $location['latitude'] ) : null,
			'longitude' => ! empty( $location['longitude'] ) ? floatval( $location['longitude'] ) : null,
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
