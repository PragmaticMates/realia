<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Widget_Agents_Assigned
 *
 * @class Realia_Widget_Agents_Assigned
 * @package Realia/Classes/Widgets
 * @author Pragmatic Mates
 */
class Realia_Widget_Agents_Assigned extends WP_Widget {
	/**
	 * Initialize widget
	 *
	 * @access public
	 * @return void
	 */
	function Realia_Widget_Agents_Assigned() {
		parent::__construct(
			'agents_assigned_widget',
			__( 'Assigned Agents', 'realia' ),
			array(
				'description' => __( 'Displays assigned agents.', 'realia' ),
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
		$agents = Realia_Query::get_property_agents();

		query_posts( array(
			'post_type'         => 'agent',
			'post__in'          => count( $agents ) > 0 ? $agents : array( null ),
			'posts_per_page'    => -1,
		) );

		include Realia_Template_Loader::locate( 'widgets/agents-assigned' );

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
		include Realia_Template_Loader::locate( 'widgets/agents-assigned-admin' );
	}
}
