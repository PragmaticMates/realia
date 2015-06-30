<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Currencies
 *
 * @class Realia_Currencies
 * @package Realia/Classes
 * @author Pragmatic Mates
 */
class Realia_Currencies {
	/**
	 * Gets current currency code
	 *
	 * @access public
	 * @return string
	 */
	public static function get_current_currency_code() {
		$currencies = get_theme_mod( 'realia_currencies' );
		$code = ! empty( $currencies['0']['code'] ) ? $currencies[0]['code'] : 'USD';
		return $code;
	}
}
