<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Customizations_General
 *
 * @class Realia_Customizations_General
 * @package Realia/Classes/Customizations
 * @author Pragmatic Mates
 */
class Realia_Customizations_General {
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

		$pages = Realia_Pages::get_pages();

		$wp_customize->add_section('realia_general', array(
			'title' => __( 'Realia General', 'realia' ),
			'priority' => 1,
		));

		// Login required
		$wp_customize->add_setting( 'realia_general_login_required_page', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_general_login_required_page', array(
			'type'          => 'select',
			'label'         => __( 'Login Required Page', 'realia' ),
			'section'       => 'realia_general',
			'settings'      => 'realia_general_login_required_page',
			'choices'       => $pages,
		) );

		// After login page
		$wp_customize->add_setting( 'realia_general_after_login_page', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_general_after_login_page', array(
			'type'          => 'select',
			'label'         => __( 'After Login Page', 'realia' ),
			'section'       => 'realia_general',
			'settings'      => 'realia_general_after_login_page',
			'choices'       => $pages,
		) );

		// After register page
		$wp_customize->add_setting( 'realia_general_after_register_page', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_general_after_register_page', array(
			'type'          => 'select',
			'label'         => __( 'After Register Page', 'realia' ),
			'section'       => 'realia_general',
			'settings'      => 'realia_general_after_register_page',
			'choices'       => $pages,
		) );

		// Profile page
		$wp_customize->add_setting( 'realia_general_profile_page', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_general_profile_page', array(
			'type'          => 'select',
			'label'         => __( 'Profile Page', 'realia' ),
			'section'       => 'realia_general',
			'settings'      => 'realia_general_profile_page',
			'choices'       => $pages,
		) );

		// Change password page
		$wp_customize->add_setting( 'realia_general_password_page', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_general_password_page', array(
			'type'          => 'select',
			'label'         => __( 'Password Page', 'realia' ),
			'section'       => 'realia_general',
			'settings'      => 'realia_general_password_page',
			'choices'       => $pages,
		) );

		// Hide unassigned amenities
		$wp_customize->add_setting( 'realia_general_hide_unassigned_amenities', array(
			'default'           => false,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_general_hide_unassigned_amenities', array(
			'type'      => 'checkbox',
			'label'     => __( 'Hide Unassigned Amenities', 'realia' ),
			'section'   => 'realia_general',
			'settings'  => 'realia_general_hide_unassigned_amenities',
		) );

		// Show property archive as grid
		$wp_customize->add_setting( 'realia_general_show_property_archive_as_grid', array(
			'default'           => false,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_general_show_property_archive_as_grid', array(
			'type'      => 'checkbox',
			'label'     => __( 'Show property archive as grid', 'realia' ),
			'section'   => 'realia_general',
			'settings'  => 'realia_general_show_property_archive_as_grid',
		) );
	}
}

Realia_Customizations_General::init();
