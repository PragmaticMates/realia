<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Realia_Widgets
 *
 * @class Realia_Widgets
 * @package Realia/Classes/Widgets
 * @author Pragmatic Mates
 */
class Realia_Widgets {
    /**
     * Initialize widgets
     *
     * @access public
     * @return void
     */
    public static function init() {
        self::includes();
        add_action( 'widgets_init', array( __CLASS__, 'register' ) );

    }

    /**
     * Include widget classes
     *
     * @access public
     * @return void
     */
    public static function includes() {
        require_once REALIA_DIR . 'includes/widgets/class-realia-widget-agents.php';
        require_once REALIA_DIR . 'includes/widgets/class-realia-widget-agent-assigned.php';
        require_once REALIA_DIR . 'includes/widgets/class-realia-widget-enquire.php';
        require_once REALIA_DIR . 'includes/widgets/class-realia-widget-properties.php';
        require_once REALIA_DIR . 'includes/widgets/class-realia-widget-properties-map.php';
        require_once REALIA_DIR . 'includes/widgets/class-realia-widget-filter.php';
	    require_once REALIA_DIR . 'includes/widgets/class-realia-widget-filter-rent-sale.php';
    }

    /**
     * Register widgets
     *
     * @access public
     * @return void
     */
    public static function register() {
        register_widget( 'Realia_Widget_Agents' );
        register_widget( 'Realia_Widget_Agent_Assigned' );
        register_widget( 'Realia_Widget_Filter' );
	    register_widget( 'Realia_Widget_Filter_Rent_Sale' );
        register_widget( 'Realia_Widget_Enquire' );
        register_widget( 'Realia_Widget_Properties' );
        register_widget( 'Realia_Widget_Properties_Map' );
    }
}

Realia_Widgets::init();