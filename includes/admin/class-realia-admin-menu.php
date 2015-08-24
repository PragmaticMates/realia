<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Admin_Menu
 *
 * @class Realia_Admin_Menu
 * @package Realia/Classes/Admin
 * @author Pragmatic Mates
 */
class Realia_Admin_Menu {
	/**
	 * Initialize API
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {
        add_action( 'admin_menu', array( __CLASS__, 'admin_menu' ) );
		add_action( 'admin_menu', array( __CLASS__, 'admin_separator' ) );
	}

	/**
	 * Registers separator
	 *
	 * @return void
	 */
	public static function admin_separator() {
		global $menu;

		$menu[49] = array( '', 'read', 'separator', '', 'wp-menu-separator' );
	}

	/**
	 * Registers Realia admin menu wrapper
	 *
	 * @return void
	 */
    public static function admin_menu() {
		add_menu_page( __( 'Realia', 'realia' ), __( 'Realia', 'realia' ), 'edit_posts', 'realia', null, null, '50' );
    }
}

Realia_Admin_Menu::init();
