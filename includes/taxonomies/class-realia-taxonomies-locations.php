<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Taxonomies_Locations
 *
 * @class Realia_Taxonomies_Locations
 * @package Realia/Classes/Taxonomies
 * @author Pragmatic Mates
 */
class Realia_Taxonomies_Locations {
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
		$property_locations_labels = array(
			'name'              => __( 'Locations', 'realia' ),
			'singular_name'     => __( 'Location', 'realia' ),
			'search_items'      => __( 'Search Location', 'realia' ),
			'all_items'         => __( 'All Locations', 'realia' ),
			'parent_item'       => __( 'Parent Location', 'realia' ),
			'parent_item_colon' => __( 'Parent Location:', 'realia' ),
			'edit_item'         => __( 'Edit Location', 'realia' ),
			'update_itm'        => __( 'Update Location', 'realia' ),
			'add_new_item'      => __( 'Add New Location', 'realia' ),
			'new_item_name'     => __( 'New Location', 'realia' ),
			'menu_name'         => __( 'Locations', 'realia' ),
		);

		register_taxonomy( 'locations', 'property', array(
			'labels'            => $property_locations_labels,
			'hierarchical'      => true,
			'query_var'         => 'location',
			'rewrite'           => array( 'slug' => __( 'location', 'realia' ), 'hierarchical' => true ),
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
		) );
	}
}

Realia_Taxonomies_Locations::init();
