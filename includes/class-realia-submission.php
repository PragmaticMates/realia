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
		return array(
			array(
				'id'    => 'wire-transfer',
				'title' => __( 'Wire Transfer', 'realia' )
			),
		);
	}
}

Realia_Submission::init();