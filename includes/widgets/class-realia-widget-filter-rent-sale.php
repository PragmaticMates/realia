<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Widget_Filter_Rent_Sale
 *
 * @class Realia_Widget_Filter_Rent_Sale
 * @package Realia/Classes/Widgets
 * @author Pragmatic Mates
 */
class Realia_Widget_Filter_Rent_Sale extends WP_Widget {
	/**
	 * Initialize widget
	 *
	 * @access public
	 * @return void
	 */
	function Realia_Widget_Filter_Rent_Sale() {
		parent::__construct(
			'filter_rent_sale_widget',
			__( 'Rent/Sale Filter', 'realia' ),
			array(
				'description' => __( 'Rent/Sale Filter for filtering properties.', 'realia' ),
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
		include Realia_Template_Loader::locate( 'widgets/filter-rent-sale' );
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
		include Realia_Template_Loader::locate( 'widgets/filter-rent-sale-admin' );
	}
}
