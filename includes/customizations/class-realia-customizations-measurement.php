<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Customizations_Measurement
 *
 * @class Realia_Customizations_Measurement
 * @package Realia/Classes/Customizations
 * @author Pragmatic Mates
 */
class Realia_Customizations_Measurement {
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
		$wp_customize->add_section( 'realia_measurement', array(
			'title'     => __( 'Realia Measurement', 'realia' ),
			'priority'  => 1,
		) );

		// Area unit
		$wp_customize->add_setting( 'realia_measurement_area_unit', array(
			'default'           => 'sqft',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_measurement_area_unit', array(
			'label'     => __( 'Area Unit', 'realia' ),
			'section'   => 'realia_measurement',
			'settings'  => 'realia_measurement_area_unit',
		) );

		// Distance unit
		$wp_customize->add_setting( 'realia_measurement_distance_unit', array(
			'default'           => 'ft',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_measurement_distance_unit', array(
			'label'     => __( 'Distance Unit', 'realia' ),
			'section'   => 'realia_measurement',
			'settings'  => 'realia_measurement_distance_unit',
		) );
	}
}

Realia_Customizations_Measurement::init();
