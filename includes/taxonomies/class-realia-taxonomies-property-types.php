<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Taxonomies_Property_Types
 *
 * @class Realia_Taxonomies_Property_Types
 * @package Realia/Classes/Taxonomies
 * @author Pragmatic Mates
 */
class Realia_Taxonomies_Property_Types {
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
		$property_types_labels = array(
			'name'              => __( 'Types', 'realia' ),
			'singular_name'     => __( 'Type', 'realia' ),
			'search_items'      => __( 'Search Types', 'realia' ),
			'all_items'         => __( 'All Types', 'realia' ),
			'parent_item'       => __( 'Parent Type', 'realia' ),
			'parent_item_colon' => __( 'Parent Type:', 'realia' ),
			'edit_item'         => __( 'Edit Type', 'realia' ),
			'update_item'       => __( 'Update Type', 'realia' ),
			'add_new_item'      => __( 'Add New Type', 'realia' ),
			'new_item_name'     => __( 'New Type', 'realia' ),
			'menu_name'         => __( 'Types', 'realia' ),
		);

		register_taxonomy( 'property_types', 'property', array(
			'labels'            => $property_types_labels,
			'hierarchical'      => true,
			'query_var'         => 'property-type',
			'rewrite'           => array( 'slug' => __( 'property-type', 'realia' ) ),
			'public'            => true,
			'show_ui'           => true,
		) );
	}
}

Realia_Taxonomies_Property_Types::init();
