<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Customizations_Currency
 *
 * @class Realia_Customizations_Currency
 * @package Realia/Classes/Customizations
 * @author Pragmatic Mates
 */
class Realia_Customizations_Currency {
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
		$wp_customize->add_section( 'realia_currencies[0]', array(
			'title'     => __( 'Realia Currency', 'realia' ),
			'priority'  => 1,
		) );

		// Currency symbol
		$wp_customize->add_setting( 'realia_currencies[0][symbol]', array(
			// 'default'           => '$',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_currencies[0][symbol]', array(
			'label'     => __( 'Currency Symbol', 'realia' ),
			'section'   => 'realia_currencies[0]',
			'settings'  => 'realia_currencies[0][symbol]',
		) );

		// Currency code
		$wp_customize->add_setting( 'realia_currencies[0][code]', array(
			// 'default'           => 'USD',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_currencies[0][code]', array(
			'label'     => __( 'Currency Code', 'realia' ),
			'section'   => 'realia_currencies[0]',
			'settings'  => 'realia_currencies[0][code]',
		) );

		// Show after
		$wp_customize->add_setting( 'realia_currencies[0][show_after]', array(
			'default'           => false,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_currencies[0][show_after]', array(
			'type'      => 'checkbox',
			'label'     => __( 'Show Symbol After Amount', 'realia' ),
			'section'   => 'realia_currencies[0]',
			'settings'  => 'realia_currencies[0][show_after]',
		) );

		// Decimal places
		$wp_customize->add_setting( 'realia_currencies[0][money_decimals]', array(
			// 'default'           => '2',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'realia_currencies[0][money_decimals]', array(
			'label'         => __( 'Decimal places', 'realia' ),
			'section'       => 'realia_currencies[0]',
			'settings'      => 'realia_currencies[0][money_decimals]',
		) );

		// Decimal Separator
		$wp_customize->add_setting( 'realia_currencies[0][money_dec_point]', array(
			// 'default'           => '.',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_currencies[0][money_dec_point]', array(
			'label'         => __( 'Decimal Separator', 'realia' ),
			'section'       => 'realia_currencies[0]',
			'settings'      => 'realia_currencies[0][money_dec_point]',
		) );

		// Thousands Separator
		$wp_customize->add_setting( 'realia_currencies[0][money_thousands_separator]', array(
			// 'default'           => ',',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_currencies[0][money_thousands_separator]', array(
			'label'         => __( 'Thousands Separator', 'realia' ),
			'section'       => 'realia_currencies[0]',
			'settings'      => 'realia_currencies[0][money_thousands_separator]',
			'description'   => __( 'If you need space, enter &amp;nbsp;', 'realia' ),
		) );
	}
}

Realia_Customizations_Currency::init();
