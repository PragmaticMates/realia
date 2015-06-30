<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Taxonomies_Materials
 *
 * @class Realia_Taxonomies_Materials
 * @package Realia/Classes/Taxonomies
 * @author Pragmatic Mates
 */
class Realia_Taxonomies_Materials {
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
		$property_materials_labels = array(
			'name'              => __( 'Materials', 'realia' ),
			'singular_name'     => __( 'Material', 'realia' ),
			'search_items'      => __( 'Search Materials', 'realia' ),
			'all_items'         => __( 'All Materials', 'realia' ),
			'parent_item'       => __( 'Parent Material', 'realia' ),
			'parent_item_colon' => __( 'Parent Material:', 'realia' ),
			'edit_item'         => __( 'Edit Material', 'realia' ),
			'update_item'       => __( 'Update Material', 'realia' ),
			'add_new_item'      => __( 'Add New Material', 'realia' ),
			'new_item_name'     => __( 'New Material', 'realia' ),
			'menu_name'         => __( 'Materials', 'realia' ),
		);

		register_taxonomy( 'materials', 'property', array(
			'labels'            => $property_materials_labels,
			'hierarchical'      => true,
			'query_var'         => 'material',
			'rewrite'           => array( 'slug' => __( 'material', 'realia' ) ),
			'public'            => true,
			'show_ui'           => true,
		) );
	}
}

Realia_Taxonomies_Materials::init();
