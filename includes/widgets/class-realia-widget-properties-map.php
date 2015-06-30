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
			'properties_map',
			__( 'Properties Map', 'realia' ),
			array(
				'description' => __( 'Displays properties in the map.', 'realia' ),
			)
		);

	    add_action( 'body_class', array( __CLASS__, 'add_body_class' ) );
	}

	/**
	 * Adds classes to body
	 *
	 * @param $classes array
	 *
	 * @access public
	 * @return array
	 */
	public static function add_body_class( $classes ) {
		$settings = get_option( 'widget_properties_map' );

		if ( is_array( $settings ) ) {
			foreach ( $settings as $key => $value ) {
				if ( is_active_widget( false, 'properties_map-' . $key, 'properties_map' ) ) {
					if ( ! empty( $value['classes'] ) ) {
						$parts   = explode( ',', $value['classes'] );
						$classes = array_merge( $classes, $parts );
					}
				}
			}
		}
		return $classes;
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
