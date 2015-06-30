<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Widget_Agents
 *
 * @class Realia_Widget_Agents
 * @package Realia/Classes/Widgets
 * @author Pragmatic Mates
 */
class Realia_Widget_Agents extends WP_Widget {
	/**
	 * Initialize widget
	 *
	 * @access public
	 * @return void
	 */
	function Realia_Widget_Agents() {
		parent::__construct(
			'agents_widget',
			__( 'Agents', 'realia' ),
			array(
				'description' => __( 'Displays agents in multiple ways.', 'realia' ),
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
		query_posts( array(
			'post_type'         => 'agent',
			'posts_per_page'    => ! empty( $instance['count'] ) ? $instance['count'] : 3,
		) );

		include Realia_Template_Loader::locate( 'widgets/agents' );

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
		include Realia_Template_Loader::locate( 'widgets/agents-admin' );
	}
}
