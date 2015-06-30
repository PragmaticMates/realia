<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Taxonomies_Amenities
 *
 * @class Realia_Taxonomies_Amenities
 * @package Realia/Classes/Taxonomies
 * @author Pragmatic Mates
 */
class Realia_Taxonomies_Amenities {
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
		$property_amenities_labels = array(
			'name'              => __( 'Amenities', 'realia' ),
			'singular_name'     => __( 'Amenity', 'realia' ),
			'search_items'      => __( 'Search Amenity', 'realia' ),
			'all_items'         => __( 'All Amenities', 'realia' ),
			'parent_item'       => __( 'Parent Amenity', 'realia' ),
			'parent_item_colon' => __( 'Parent Amenity:', 'realia' ),
			'edit_item'         => __( 'Edit Amenity', 'realia' ),
			'update_itm'        => __( 'Update Amenity', 'realia' ),
			'add_new_item'      => __( 'Add New Amenity', 'realia' ),
			'new_item_name'     => __( 'New Amenity', 'realia' ),
			'menu_name'         => __( 'Amenities', 'realia' ),
		);

		register_taxonomy( 'amenities', 'property', array(
			'labels'            => $property_amenities_labels,
			'hierarchical'      => true,
			'query_var'         => 'amenity',
			'rewrite'           => array( 'slug' => __( 'amenity', 'realia' ) ),
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
		) );
	}
}

Realia_Taxonomies_Amenities::init();
