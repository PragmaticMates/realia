<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Customizations
 *
 * @access public
 * @package Realia/Classes/Customizations
 * @return void
 */
class Realia_Customizations {
	/**
	 * Initialize customizations
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {
		self::includes();
	}

	/**
	 * Include all customizations
	 *
	 * @access public
	 * @return void
	 */
	public static function includes() {
		require_once REALIA_DIR . 'includes/customizations/class-realia-customizations-currency.php';
		require_once REALIA_DIR . 'includes/customizations/class-realia-customizations-general.php';
		require_once REALIA_DIR . 'includes/customizations/class-realia-customizations-measurement.php';
		require_once REALIA_DIR . 'includes/customizations/class-realia-customizations-recaptcha.php';
		require_once REALIA_DIR . 'includes/customizations/class-realia-customizations-submission.php';
		require_once REALIA_DIR . 'includes/customizations/class-realia-customizations-wire-transfer.php';
	}
}

Realia_Customizations::init();
