<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Taxonomies_Statuses
 *
 * @class Realia_Taxonomies_Statuses
 * @package Realia/Classes/Taxonomies
 * @author Pragmatic Mates
 */
class Realia_Taxonomies_Statuses {
	/**
	 * Initialize taxonomy
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'definition' ) );
	}

	/**
	 * Widget definition
	 *
	 * @access public
	 * @return void
	 */
	public static function definition() {
		$property_statuses_labels = array(
			'name'              => __( 'Statuses', 'realia' ),
			'singular_name'     => __( 'Status', 'realia' ),
			'search_items'      => __( 'Search Statuses', 'realia' ),
			'all_items'         => __( 'All Statuses', 'realia' ),
			'parent_item'       => __( 'Parent Status', 'realia' ),
			'parent_item_colon' => __( 'Parent Status:', 'realia' ),
			'edit_item'         => __( 'Edit Status', 'realia' ),
			'update_itm'        => __( 'Update Status', 'realia' ),
			'add_new_item'      => __( 'Add New Status', 'realia' ),
			'new_item_name'     => __( 'New Status', 'realia' ),
			'menu_name'         => __( 'Statuses', 'realia' ),
		);

		register_taxonomy( 'statuses', 'property', array(
			'labels'        => $property_statuses_labels,
			'hierarchical'  => true,
			'query_var'     => 'status',
			'rewrite'       => array( 'slug' => __( 'status', 'realia' ) ),
			'public'        => true,
			'show_ui'       => true,
		) );
	}
}

Realia_Taxonomies_Statuses::init();
