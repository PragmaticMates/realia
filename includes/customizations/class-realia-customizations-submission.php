<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Customizations_Submission
 *
 * @class Realia_Customizations_Submission
 * @package Realia/Classes/Customizations
 * @author Pragmatic Mates
 */
class Realia_Customizations_Submission {
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

		$wp_customize->add_section( 'realia_submission', array(
			'title'     => __( 'Realia Submission', 'realia' ),
			'priority'  => 1,
		) );

		// Enable agents
		$wp_customize->add_setting( 'realia_submission_enable_agents', array(
			'default'           => false,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_submission_enable_agents', array(
			'type'      => 'checkbox',
			'label'     => __( 'Enable agents', 'realia' ),
			'section'   => 'realia_submission',
			'settings'  => 'realia_submission_enable_agents',
		) );

		// Type
		$wp_customize->add_setting( 'realia_submission_type', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_submission_type', array(
			'type'              => 'select',
			'label'             => __( 'Type', 'realia' ),
			'section'           => 'realia_submission',
			'settings'          => 'realia_submission_type',
			'choices'           => array(
				'free-for-all'  => __( 'Free for all', 'realia' ),
				'pay-per-post'  => __( 'Pay per post', 'realia' ),
				'packages'      => __( 'Packages', 'realia' ),
			),
		) );

		// Pay per post - post price
		$wp_customize->add_setting( 'realia_submission_pay_per_post_price', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_submission_pay_per_post_price', array(
			'label'         => __( 'Pay per post - Post price', 'realia' ),
			'section'       => 'realia_submission',
			'settings'      => 'realia_submission_pay_per_post_price',
			'description'   => __( 'Enter price without any currency. As main currency will be used primary one (first defined).', 'realia' ),
		) );

		// Enable paying for featured
		$wp_customize->add_setting( 'realia_submission_enable_featured', array(
			'default'           => false,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_submission_enable_featured', array(
			'type'      => 'checkbox',
			'label'     => __( 'Enable pay for featured', 'realia' ),
			'section'   => 'realia_submission',
			'settings'  => 'realia_submission_enable_featured',
		) );

		// Featured price
		$wp_customize->add_setting( 'realia_submission_featured_price', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_submission_featured_price', array(
			'label'         => __( 'Featured price', 'realia' ),
			'section'       => 'realia_submission',
			'settings'      => 'realia_submission_featured_price',
			'description'   => __( 'Enter price without any currency. As main currency will be used primary one (first defined).', 'realia' ),
		) );

		// Enable paying for sticky
		$wp_customize->add_setting( 'realia_submission_enable_sticky', array(
			'default'           => false,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_submission_enable_sticky', array(
			'type'      => 'checkbox',
			'label'     => __( 'Enable pay for sticky', 'realia' ),
			'section'   => 'realia_submission',
			'settings'  => 'realia_submission_enable_sticky',
		) );

		// Featured price
		$wp_customize->add_setting( 'realia_submission_sticky_price', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_submission_sticky_price', array(
			'label'         => __( 'Sticky price', 'realia' ),
			'section'       => 'realia_submission',
			'settings'      => 'realia_submission_sticky_price',
			'description'   => __( 'Enter price without any currency. As main currency will be used primary one (first defined).', 'realia' ),
		) );

		// Payment page
		$wp_customize->add_setting( 'realia_submission_payment_page', array(
			'default'           => false,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_submission_payment_page', array(
			'type'              => 'select',
			'label'             => __( 'Payment Page', 'realia' ),
			'section'           => 'realia_submission',
			'settings'          => 'realia_submission_payment_page',
			'choices'           => $pages,
		) );

		// List Page
		$wp_customize->add_setting( 'realia_submission_list_page', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_submission_list_page', array(
			'type'          => 'select',
			'label'         => __( 'List Page', 'realia' ),
			'section'       => 'realia_submission',
			'settings'      => 'realia_submission_list_page',
			'choices'       => $pages,
		) );

		// Create Page
		$wp_customize->add_setting( 'realia_submission_create_page', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_submission_create_page', array(
			'type'          => 'select',
			'label'         => __( 'Create Page', 'realia' ),
			'section'       => 'realia_submission',
			'settings'      => 'realia_submission_create_page',
			'choices'       => $pages,
		) );

		// Edit Page
		$wp_customize->add_setting( 'realia_submission_edit_page', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_submission_edit_page', array(
			'type'          => 'select',
			'label'         => __( 'Edit Page', 'realia' ),
			'section'       => 'realia_submission',
			'settings'      => 'realia_submission_edit_page',
			'choices'       => $pages,
		) );

		// Remove Page
		$wp_customize->add_setting( 'realia_submission_remove_page', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_submission_remove_page', array(
			'type'          => 'select',
			'label'         => __( 'Remove Page', 'realia' ),
			'section'       => 'realia_submission',
			'settings'      => 'realia_submission_remove_page',
			'choices'       => $pages,
		) );

		// Transactions Page
		$wp_customize->add_setting( 'realia_submission_transactions_page', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_submission_transactions_page', array(
			'type'          => 'select',
			'label'         => __( 'Transactions Page', 'realia' ),
			'section'       => 'realia_submission',
			'settings'      => 'realia_submission_transactions_page',
			'choices'       => $pages,
		) );

		// Terms and Conditions Page
		$wp_customize->add_setting( 'realia_submission_terms', array(
			'default'           => null,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_submission_terms', array(
			'type'          => 'select',
			'label'         => __( 'Terms &amp; Conditions Page', 'realia' ),
			'section'       => 'realia_submission',
			'settings'      => 'realia_submission_terms',
			'choices'       => $pages,
		) );

		// Review before submission
		$wp_customize->add_setting( 'realia_submission_review_before', array(
			'default'           => false,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'realia_submission_review_before', array(
			'type'      => 'checkbox',
			'label'     => __( 'Review Before Submission', 'realia' ),
			'section'   => 'realia_submission',
			'settings'  => 'realia_submission_review_before',
		) );
	}
}

Realia_Customizations_Submission::init();
