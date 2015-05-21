<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Realia_Widget_Properties_Map
 *
 * @class Realia_Widget_Properties_Map
 * @package Realia/Classes/Widgets
 * @author Pragmatic Mates
 */
class Realia_Widget_Properties_Map extends WP_Widget {
    /**
     * Initialize widget
     *
     * @access public
     * @return void
     */
    function Realia_Widget_Properties_Map() {
        parent::__construct(
            'properties_map_widget',
            __( 'Properties Map', 'realia' ),
            array(
                'description' => __( 'Displays properties in the map.', 'realia' ),
            )
        );
    }

    /**
     * Frontend
     *
     * @access public
     * @param array $args
     * @param array $instance
     * @return void
     */
    function widget( $args, $instance ) {
        include Realia_Template_Loader::locate( 'widgets/properties-map' );
    }

    /**
     * Update
     *
     * @access public
     * @param array $new_instance
     * @param array $old_instance
     * @return array
     */
    function update( $new_instance, $old_instance ) {
        return $new_instance;
    }

    /**
     * Backend
     *
     * @access public
     * @param array $instance
     * @return void
     */
    function form( $instance ) {
        include Realia_Template_Loader::locate( 'widgets/properties-map-admin' );
    }
}