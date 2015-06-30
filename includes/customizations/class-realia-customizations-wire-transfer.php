<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Customizations_Wire_Transfer
 *
 * @class Realia_Customizations_Submission
 * @package Realia/Classes/Customizations
 * @author Pragmatic Mates
 */
class Realia_Customizations_Wire_Transfer {
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
		$wp_customize->add_section( 'realia_wire_transfer', array(
			'title'     => __( 'Realia Wire Transfer', 'realia' ),
			'priority'  => 1,
		) );

		// Account number
		$wp_customize->add_setting( 'realia_wire_transfer_account_number', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_wire_transfer_account_number', array(
			'label'         => __( 'Account number', 'realia' ),
			'section'       => 'realia_wire_transfer',
			'settings'      => 'realia_wire_transfer_account_number',
			'description'   => __( 'Bank account number [mandatory]', 'realia' ),
		) );

		// Bank code
		$wp_customize->add_setting( 'realia_wire_transfer_swift', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_wire_transfer_swift', array(
			'label'         => __( 'Bank code', 'realia' ),
			'section'       => 'realia_wire_transfer',
			'settings'      => 'realia_wire_transfer_swift',
			'description'   => __( 'SWIFT or BIC of your bank [mandatory]', 'realia' ),
		) );

		// Full name
		$wp_customize->add_setting( 'realia_wire_transfer_full_name', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_wire_transfer_full_name', array(
			'label'         => __( 'Full name', 'realia' ),
			'section'       => 'realia_wire_transfer',
			'settings'      => 'realia_wire_transfer_full_name',
			'description'   => __( 'Your full name [mandatory]', 'realia' ),
		) );

		// Street
		$wp_customize->add_setting( 'realia_wire_transfer_street', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_wire_transfer_street', array(
			'label'         => __( 'Street / P.O.Box', 'realia' ),
			'section'       => 'realia_wire_transfer',
			'settings'      => 'realia_wire_transfer_street',
			'description'   => __( 'Enter your street.', 'realia' ),
		) );

		// Postcode
		$wp_customize->add_setting( 'realia_wire_transfer_postcode', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_wire_transfer_postcode', array(
			'label'         => __( 'Postcode', 'realia' ),
			'section'       => 'realia_wire_transfer',
			'settings'      => 'realia_wire_transfer_postcode',
			'description'   => __( 'Enter your postcode (ZIP).', 'realia' ),
		) );

		// City
		$wp_customize->add_setting( 'realia_wire_transfer_city', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_wire_transfer_city', array(
			'label'         => __( 'City', 'realia' ),
			'section'       => 'realia_wire_transfer',
			'settings'      => 'realia_wire_transfer_city',
			'description'   => __( 'Enter your city.', 'realia' ),
		) );

		// Country
		$wp_customize->add_setting( 'realia_wire_transfer_country', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_wire_transfer_country', array(
			'label'         => __( 'Country', 'realia' ),
			'section'       => 'realia_wire_transfer',
			'settings'      => 'realia_wire_transfer_country',
			'description'   => __( 'Enter your country [mandatory]', 'realia' ),
		) );
	}
}

Realia_Customizations_Wire_Transfer::init();
