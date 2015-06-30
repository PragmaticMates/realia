<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Widget_Properties
 *
 * @class Realia_Widget_Properties
 * @package Realia/Classes/Widgets
 * @author Pragmatic Mates
 */
class Realia_Widget_Properties extends WP_Widget {
	/**
	 * Initialize widget
	 *
	 * @access public
	 * @return void
	 */
	function Realia_Widget_Properties() {
		parent::__construct(
			'properties_widget',
			__( 'Properties', 'realia' ),
			array(
				'description' => __( 'Displays properties in multiple ways.', 'realia' ),
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
		$query = array(
			'post_type'         => 'property',
			'posts_per_page'    => ! empty( $instance['count'] ) ? $instance['count'] : 3,
		);

		if ( ! empty( $instance['attribute'] ) ) {
			if ( 'featured' == $instance['attribute'] ) {
				$query['meta_query'][] = array(
					'key'       => REALIA_PROPERTY_PREFIX . 'featured',
					'value'     => 'on',
					'compare'   => '==',
				);
			} elseif ( 'reduced' == $instance['attribute'] ) {
				$query['meta_query'][] = array(
					'key'       => REALIA_PROPERTY_PREFIX . 'reduced',
					'value'     => 'on',
					'compare'   => '==',
				);
			}
		}

		query_posts( $query );
		include Realia_Template_Loader::locate( 'widgets/properties' );

		wp_reset_query();
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
		include Realia_Template_Loader::locate( 'widgets/properties-admin' );
	}
}
