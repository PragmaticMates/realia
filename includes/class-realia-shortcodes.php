<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Shortcodes
 *
 * @class Realia_Shortcodes
 * @package Realia/Classes
 * @author Pragmatic Mates
 */
class Realia_Shortcodes {
	/**
	 * Initialize shortcodes
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {
	    add_action( 'wp', array( __CLASS__, 'check_logout' ) );

		add_shortcode( 'realia_logout', array( __CLASS__, 'logout' ) );
	    add_shortcode( 'realia_login', array( __CLASS__, 'login' ) );
	    add_shortcode( 'realia_register', array( __CLASS__, 'register' ) );
	    add_shortcode( 'realia_change_password', array( __CLASS__, 'change_password' ) );
	    add_shortcode( 'realia_change_profile', array( __CLASS__, 'change_profile' ) );
	    add_shortcode( 'realia_change_agent_profile', array( __CLASS__, 'change_agent_profile' ) );
	    add_shortcode( 'realia_breadcrumb', array( __CLASS__, 'breadcrumb' ) );
	    add_shortcode( 'realia_transactions', array( __CLASS__, 'transactions' ) );
		add_shortcode( 'realia_submission', array( __CLASS__, 'submission' ) );
	    add_shortcode( 'realia_submission_payment', array( __CLASS__, 'submission_payment' ) );
		add_shortcode( 'realia_submission_remove', array( __CLASS__, 'submission_remove' ) );
	    add_shortcode( 'realia_submission_list', array( __CLASS__, 'submission_list' ) );
	    add_shortcode( 'realia_submission_package_info', array( __CLASS__, 'submission_package_info' ) );
	}

	/**
	 * Logout checker
	 *
	 * @access public
	 * @param $wp
	 * @return void
	 */
	public static function check_logout( $wp ) {
		$post = get_post();

		if ( is_object( $post ) ) {
			if ( strpos( $post->post_content, '[realia_logout]' ) !== false ) {
				$_SESSION['messages'][] = array( 'success', __( 'You have been successfully logged out.', 'realia' ) );
				wp_redirect( html_entity_decode( wp_logout_url( home_url( '/' ) ) ) );
				exit();
			}
		}
	}

	/**
	 * Logout
	 *
	 * @access public
	 * @return void
	 */
	public static function logout( $atts ) {}

	/**
	 * Login
	 *
	 * @access public
	 * @return string
	 */
	public static function login( $atts ) {
		return Realia_Template_Loader::load( 'misc/login' );
	}

	/**
	 * Register
	 *
	 * @access public
	 * @return string
	 */
	public static function register( $atts ) {
		return Realia_Template_Loader::load( 'misc/register' );
	}

	/**
	 * Breadcrumb
	 *
	 * @access public
	 * @return string
	 */
	public static function breadcrumb( $atts ) {
		$atts = shortcode_atts( array(), $atts, 'realia_breadcrumb' );
		return Realia_Template_Loader::load( 'misc/breadcrumb' );
	}

	/**
	 * Submission index
	 *
	 * @access public
	 * @return string|void
	 */
	public static function submission( $atts ) {
	    if ( ! is_user_logged_in() ) {
		    echo Realia_Template_Loader::load( 'misc/not-allowed' );
		    return;
	    }

		$metaboxes = apply_filters( 'cmb2_meta_boxes', array() );

		if ( ! isset( $metaboxes[ REALIA_PROPERTY_PREFIX . 'front' ] ) ) {
			return __( 'A metabox with the specified \'metabox_id\' doesn\'t exist.', 'realia' );
		}

		// CMB2 is getting fields values from current post what means it will fetch data from submission page
		// We need to remove all data before.
		$post_id = ! empty( $_GET['id'] ) ? $_GET['id'] : false;
		if ( false == $post_id && empty( $_GET['id'] ) ) {
			unset( $_POST );

			foreach ( $metaboxes[ REALIA_PROPERTY_PREFIX . 'front' ]['fields'] as $field_name => $field_value ) {
				delete_post_meta( get_the_ID(), $field_value['id'] );
			}
		}

		if ( ! empty( $post_id ) && ! empty( $_POST['object_id'] ) ) {
			$post_id = $_POST['object_id'];
		}

		echo cmb2_get_metabox_form( $metaboxes[ REALIA_PROPERTY_PREFIX . 'front' ], $post_id, array(
			'form_format' => '<form action="//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '" class="cmb-form" method="post" id="%1$s" enctype="multipart/form-data" encoding="multipart/form-data"><input type="hidden" name="object_id" value="%2$s">%3$s<input type="submit" name="submit-cmb" value="%4$s" class="button-primary"></form>',
			'save_button' => __( 'Save property', 'realia' ),
		) );
	}

	/**
	 * Remove submission
	 *
	 * @access public
	 * @return void
	 */
	public static function submission_remove( $atts ) {
		if ( ! is_user_logged_in() || empty( $_GET['id'] ) ) {
	        echo Realia_Template_Loader::load( 'misc/not-allowed' );
			return;
		}

		$is_allowed = Realia_Utilities::is_allowed_to_remove( get_current_user_id(), $_GET['id'] );
		if ( ! $is_allowed ) {
	        echo Realia_Template_Loader::load( 'misc/not-allowed' );
			return;
		}

		if ( wp_delete_post( $_GET['id'] ) ) {
			$_SESSION['messages'][] = array( 'success', __( 'Property has been successfully removed.', 'realia' ) );
		} else {
			$_SESSION['messages'][] = array( 'danger', __( 'An error occured when removing an item.', 'realia' ) );
		}
	}

	/**
	 * Submission index
	 *
	 * @access public
	 * @param $atts
	 * @return void
	 */
	public static function submission_list( $atts ) {
		if ( ! is_user_logged_in() || ! Realia_Packages::is_allowed_to_add_submission( get_current_user_id() ) ) {
			echo Realia_Template_Loader::load( 'misc/not-allowed' );
			return;
		}

		return Realia_Template_Loader::load( 'submission/list' );
	}

	/**
	 * Package information
	 *
	 * @access public
	 * @param $atts
	 * @return string
	 */
	public static function submission_package_info( $atts ) {
		if ( ! is_user_logged_in() ) {
			return Realia_Template_Loader::load( 'misc/not-allowed' );
		}

		return Realia_Template_Loader::load( 'submission/package-info' );
	}

	/**
	 * Submission payment
	 *
	 * @access public
	 * @param $atts
	 * @return string
	 */
	public static function submission_payment( $atts ) {
		if ( ! is_user_logged_in() ) {
			return Realia_Template_Loader::load( 'misc/not-allowed' );
		}

		return Realia_Template_Loader::load( 'submission/payment' );
	}

	/**
	 * Transactions
	 *
	 * @access public
	 * @param $atts
	 * @return string
	 */
	public static function transactions( $atts ) {
		if ( ! is_user_logged_in() ) {
			return Realia_Template_Loader::load( 'misc/not-allowed' );
		}

		return Realia_Template_Loader::load( 'misc/transactions' );
	}

	/**
	 * Change password
	 *
	 * @access public
	 * @param $atts
	 * @return string
	 */
	public static function change_password( $atts ) {
		if ( ! is_user_logged_in() ) {
			return Realia_Template_Loader::load( 'misc/not-allowed' );
		}

		return Realia_Template_Loader::load( 'misc/password-form' );
	}

	/**
	 * Change profile
	 *
	 * @access public
	 * @param $atts
	 * @return void
	 */
	public static function change_profile( $atts ) {
		if ( ! is_user_logged_in() ) {
			return Realia_Template_Loader::load( 'misc/not-allowed' );
		}

		return Realia_Template_Loader::load( 'misc/profile-form' );
	}

	/**
	 * Change agent profile
	 *
	 * @access public
	 * @param $atts
	 * @return void
	 */
	public static function change_agent_profile( $atts ) {
		if ( ! is_user_logged_in() || ! get_theme_mod( 'realia_submission_enable_agents', false ) ) {
			return Realia_Template_Loader::load( 'misc/not-allowed' );
		}

		return Realia_Template_Loader::load( 'agents/profile-form' );
	}
}

Realia_Shortcodes::init();
