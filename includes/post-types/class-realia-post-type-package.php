<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Post_Type_Package
 *
 * @class Realia_Post_Type_Package
 * @package Realia/Classes/Post_Types
 * @author Pragmatic Mates
 */
class Realia_Post_Type_Package {
	/**
	 * Initialize custom post type
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'definition' ) );
		add_filter( 'cmb2_meta_boxes', array( __CLASS__, 'fields' ) );
	}

	/**
	 * Custom post type definition
	 *
	 * @access public
	 * @return void
	 */
	public static function definition() {
		$labels = array(
			'name'                  => __( 'Packages', 'realia' ),
			'singular_name'         => __( 'Package', 'realia' ),
			'add_new'               => __( 'Add New Package', 'realia' ),
			'add_new_item'          => __( 'Add New Package', 'realia' ),
			'edit_item'             => __( 'Edit Package', 'realia' ),
			'new_item'              => __( 'New Package', 'realia' ),
			'all_items'             => __( 'Packages', 'realia' ),
			'view_item'             => __( 'View Package', 'realia' ),
			'search_items'          => __( 'Search Package', 'realia' ),
			'not_found'             => __( 'No Packages found', 'realia' ),
			'not_found_in_trash'    => __( 'No Items Found in Trash', 'realia' ),
			'parent_item_colon'     => '',
			'menu_name'             => __( 'Packages', 'realia' ),
		);

		register_post_type( 'package',
			array(
				'labels'            => $labels,
				'show_in_menu'	  	=> 'realia',
				'supports'          => array( 'title' ),
				'public'            => false,
				'has_archive'       => false,
				'show_ui'           => true,
				'categories'        => array(),
			)
		);
	}


	/**
	 * Defines custom fields
	 *
	 * @access public
	 * @param array $metaboxes
	 * @return array
	 */
	public static function fields( array $metaboxes ) {
		$durations = Realia_Packages::get_package_durations( true );

		$metaboxes['package_general'] = array(
			'id'                        => 'package_general',
			'title'                     => __( 'General', 'realia' ),
			'object_types'              => array( 'package' ),
			'context'                   => 'normal',
			'priority'                  => 'high',
			'show_names'                => true,
			'fields'                    => array(
				array(
					'id'                => REALIA_PACKAGE_PREFIX . 'price',
					'name'              => __( 'Price', 'realia' ),
					'type'              => 'text',
					'description'       => __( 'Enter amount without currency.', 'realia' ),
				),
				array(
					'id'                => REALIA_PACKAGE_PREFIX . 'duration',
					'name'              => __( 'Duration', 'realia' ),
					'type'              => 'select',
					'options'           => $durations,
				),
				array(
					'id'                => REALIA_PACKAGE_PREFIX . 'of_properties',
					'name'              => __( 'Of properties', 'realia' ),
					'type'              => 'text',
					'description'       => __( 'Use -1 for unlimited amount of properties.', 'realia' ),
				),
			),
		);

		return $metaboxes;
	}
}

Realia_Post_Type_Package::init();
