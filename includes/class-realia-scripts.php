<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Scripts
 *
 * @class Realia_Scripts
 * @package Realia/Classes
 * @author Pragmatic Mates
 */
class Realia_Scripts {
	/**
	 * Initialize scripts
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_frontend' ) );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_backend' ) );
		add_action( 'wp_footer', array( __CLASS__, 'enqueue_footer' ) );
	}

	/**
	 * Loads frontend files
	 *
	 * @access public
	 * @return void
	 */
	public static function enqueue_frontend() {
		wp_enqueue_script( 'google-maps', '//maps.googleapis.com/maps/api/js?libraries=weather,geometry,visualization,places,drawing&sensor=false' );

		wp_register_script( 'infobox', plugins_url( '/realia/libraries/jquery-google-map/infobox.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'infobox' );

		wp_register_script( 'markerclusterer', plugins_url( '/realia/libraries/jquery-google-map/markerclusterer.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'markerclusterer' );

		wp_register_script( 'jquery-google-map', plugins_url( '/realia/libraries/jquery-google-map/jquery-google-map.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery-google-map' );

		wp_register_script( 'realia', plugins_url( '/realia/assets/js/realia.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'realia' );

		if ( Realia_Recaptcha::is_recaptcha_enabled() ) {
			wp_register_script( 'recaptcha', 'https://www.google.com/recaptcha/api.js?onload=recaptchaCallback&render=explicit', array( 'jquery' ), false, true );
			wp_enqueue_script( 'recaptcha' );
		}

	    if ( ! current_theme_supports( 'realia-custom-styles' ) ) {
		    wp_register_style( 'realia', plugins_url( '/realia/assets/css/realia.css' ) );
		    wp_enqueue_style( 'realia' );
	    }
	}

	/**
	 * Loads backend files
	 *
	 * @access public
	 * @return void
	 */
	public static function enqueue_backend() {
		wp_register_style( 'realia-admin', plugins_url( '/realia/assets/css/realia-admin.css' ) );
		wp_enqueue_style( 'realia-admin' );
	}

	/**
	 * Loads javascript into footer
	 *
	 * @access public
	 * @return void
	 */
	public static function enqueue_footer() {
		if ( Realia_Recaptcha::is_recaptcha_enabled() && ! is_admin() ) {
			?>
            <script type="text/javascript">
                var recaptchaCallback = function() {
                    jQuery('.recaptcha').each(function() {

                        var id = jQuery(this).attr('id');
                        var sitekey = jQuery(this).data('sitekey');

                        grecaptcha.render(id, {
                            'sitekey': sitekey
                        });
                    });
                };
            </script>
        <?php
		}
	}
}

Realia_Scripts::init();
