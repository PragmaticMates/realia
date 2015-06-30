<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Submission
 *
 * @class Realia_Submission
 * @package Realia/Classes
 * @author Pragmatic Mates
 */
class Realia_Submission {
	/**
	 * Initialize submission
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {
		add_filter( 'realia_payment_gateways', array( __CLASS__, 'payment_gateways' ) );
	}

	/**
	 * Defines default payment gateways
	 *
	 * @access public
	 * @return array
	 */
	public static function payment_gateways() {
		$gateways = array();

		if ( self::is_wire_transfer_active() ) {
			array_push($gateways,
				array(
					'id'    => 'wire-transfer',
					'title' => __( 'Wire Transfer', 'realia' ),
					'proceed' => false,
					'content' => Realia_Template_Loader::load( 'submission/wire-transfer' ),
				)
			);
		}

		return $gateways;
	}

	/**
	 * Checks if Wire Transfer is active
	 *
	 * @access public
	 * @return bool
	 */
	public static function is_wire_transfer_active() {
		$account_number = get_theme_mod( 'realia_wire_transfer_account_number', null );
		$swift = get_theme_mod( 'realia_wire_transfer_swift', null );
		$full_name = get_theme_mod( 'realia_wire_transfer_full_name', null );
		$country = get_theme_mod( 'realia_wire_transfer_country', null );

		return ( ! empty( $account_number ) && ! empty( $swift ) && ! empty( $full_name ) && ! empty( $country ) );
	}
}

Realia_Submission::init();
