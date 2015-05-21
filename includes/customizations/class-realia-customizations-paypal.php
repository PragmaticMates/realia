<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Realia_Customizations_PayPal
 *
 * @class Realia_Customizations_PayPal
 * @package Realia/Classes/Customizations
 * @author Pragmatic Mates
 */
class Realia_Customizations_Paypal {
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
        $wp_customize->add_section( 'realia_paypal', array(
            'title'     => __( 'Realia PayPal', 'realia' ),
            'priority'  => 1,
        ) );

        // PayPal Client ID
        $wp_customize->add_setting( 'realia_paypal_client_id', array(
            'default'           => null,
            'crability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( 'realia_paypal_client_id', array(
            'label'         => __( 'Client ID', 'realia' ),
            'section'       => 'realia_paypal',
            'settings'      => 'realia_paypal_client_id',
        ) );


        // PayPal Client Secret
        $wp_customize->add_setting( 'realia_paypal_client_secret', array(
            'default'           => null,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( 'realia_paypal_client_secret', array(
            'label'         => __( 'Client Secret', 'realia' ),
            'section'       => 'realia_paypal',
            'settings'      => 'realia_paypal_client_secret',
        ) );

        // PayPal Live Mode
        $wp_customize->add_setting( 'realia_paypal_live', array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( 'realia_paypal_live', array(
            'label'         => __( 'Live Mode', 'realia' ),
            'type'          => 'checkbox',
            'section'       => 'realia_paypal',
            'settings'      => 'realia_paypal_live',
        ) );

        // Credit card
        $wp_customize->add_setting( 'realia_paypal_credit_card', array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( 'realia_paypal_credit_card', array(
            'label'         => __( 'Credit Card', 'realia' ),
            'type'          => 'checkbox',
            'section'       => 'realia_paypal',
            'settings'      => 'realia_paypal_credit_card',
        ) );
    }
}

Realia_customizations_Paypal::init();
