<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Customizations_Recaptcha
 *
 * @class Realia_Customizations_Recaptcha
 * @package Realia/Classes/Customizations
 * @author Pragmatic Mates
 */
class Realia_Customizations_Recaptcha {
	/**
	 * Initialize customization type
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {
		add_action( 'customize_register', array( __CLASS__, 'customizations' ) );
	}

	/**
	 * Customizations
	 *
	 * @access public
	 * @param object $wp_customize
	 * @return void
	 */
	public static function customizations( $wp_customize ) {
		$wp_customize->add_section( 'realia_recaptcha', array(
			'title'     => __( 'Realia reCAPTCHA', 'realia' ),
			'priority'  => 1,
		) );

		// Site key
		$wp_customize->add_setting( 'realia_recaptcha_site_key', array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_recaptcha_site_key', array(
			'label'     => __( 'Site Key', 'realia' ),
			'section'   => 'realia_recaptcha',
			'settings'  => 'realia_recaptcha_site_key',
		) );

		// Secret key
		$wp_customize->add_setting( 'realia_recaptcha_secret_key', array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_recaptcha_secret_key', array(
			'label'     => __( 'Secret Key', 'realia' ),
			'section'   => 'realia_recaptcha',
			'settings'  => 'realia_recaptcha_secret_key',
		) );
	}
}

Realia_Customizations_Recaptcha::init();
