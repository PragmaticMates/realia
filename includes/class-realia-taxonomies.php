<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Taxonomies
 *
 * @class Realia_Taxonomies
 * @package Realia/Classes/Taxonomies
 * @author Pragmatic Mates
 */
class Realia_Taxonomies {
	/**
	 * Initialize taxonomies
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {
		self::includes();
	}

	/**
	 * Includes all taxonomies
	 *
	 * @access public
	 * @return void
	 */
	public static function includes() {
		require_once REALIA_DIR . 'includes/taxonomies/class-realia-taxonomies-amenities.php';
		require_once REALIA_DIR . 'includes/taxonomies/class-realia-taxonomies-statuses.php';
		require_once REALIA_DIR . 'includes/taxonomies/class-realia-taxonomies-locations.php';
		require_once REALIA_DIR . 'includes/taxonomies/class-realia-taxonomies-materials.php';
		require_once REALIA_DIR . 'includes/taxonomies/class-realia-taxonomies-property-types.php';
	}
}

Realia_Taxonomies::init();
