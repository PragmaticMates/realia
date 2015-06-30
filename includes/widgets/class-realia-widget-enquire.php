<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Widget_Enquire
 *
 * @class Realia_Widget_Enquire
 * @package Realia/Classes/Widgets
 * @author Pragmatic Mates
 */
class Realia_Widget_Enquire extends WP_Widget {
	/**
	 * Initialize widget
	 *
	 * @access public
	 * @return void
	 */
	function Realia_Widget_Enquire() {
		parent::__construct(
			'enquire_widget',
			__( 'Enquire Form', 'realia' ),
			array(
				'description' => __( 'Displays enquire form. To show it only on property detail use is_singular(\'property\') in Widget Logic.', 'realia' ),
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
		include Realia_Template_Loader::locate( 'widgets/enquire' );
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
		include Realia_Template_Loader::locate( 'widgets/enquire-admin' );
	}
}
