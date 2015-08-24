<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Admin_Notices
 *
 * @class Realia_Admin_Notices
 * @package Realia/Classes/Admin
 * @author Pragmatic Mates
 */
class Realia_Admin_Notices {
	/**
	 * List of notices defined in format identifier => template
	 *
	 * @access private
	 */
	private static $notices = array(
		'welcome' => 'notices/welcome'
	);

	/**
	 * Initialize API
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {
        add_action( 'admin_notices', array( __CLASS__, 'show' ) );
		add_action( 'wp_loaded', array( __CLASS__, 'hide' ) );
	}

	/**
	 * Show all not hidden notices
	 *
	 * @access public
	 * @return void
	 */
    public static function show() {
		$hidden_notices = get_option( 'realia_admin_hidden_notices', array() );

		foreach ( self::$notices as $id => $template ) {
			if ( ! in_array( $id, $hidden_notices ) ) {
				echo Realia_Template_Loader::load( $template );
			}
		}
    }

	/**
	 * Hide notice
	 *
	 * @return void
	 */
	public static function hide() {
		if ( ! empty( $_GET['realia-hide-notice'] ) ) {
			if ( ! wp_verify_nonce( $_GET['_realia_notice_nonce'], 'realia_hide_notices_nonce' ) ) {
				wp_die( __( 'Please refresh the page and retry action.', 'realia' ) );
			}

			$notices = get_option( 'realia_admin_hidden_notices', array() );
			$notices[] = $_GET['realia-hide-notice'];
			$notices = Realia_Utilities::array_unique_multidimensional( $notices );
			update_option( 'realia_admin_hidden_notices', $notices );
		}
	}
}

Realia_Admin_Notices::init();
