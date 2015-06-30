<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Post_Types
 *
 * @class Realia_Post_Types
 * @package Realia/Classes/Post_Types
 * @author Pragmatic Mates
 */
class Realia_Post_Types {
	/**
	 * Initialize property types
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {
		self::includes();
	}

	/**
	 * Loads property types
	 *
	 * @access public
	 * @return void
	 */
	public static function includes() {
		require_once REALIA_DIR . 'includes/post-types/class-realia-post-type-agency.php';
		require_once REALIA_DIR . 'includes/post-types/class-realia-post-type-agent.php';
		require_once REALIA_DIR . 'includes/post-types/class-realia-post-type-package.php';
		require_once REALIA_DIR . 'includes/post-types/class-realia-post-type-property.php';
		require_once REALIA_DIR . 'includes/post-types/class-realia-post-type-transaction.php';
		require_once REALIA_DIR . 'includes/post-types/class-realia-post-type-user.php';
	}
}

Realia_Post_Types::init();
