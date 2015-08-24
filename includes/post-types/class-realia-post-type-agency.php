<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Post_Type_Agency
 *
 * @class Realia_Post_Type_Agency
 * @package Realia/Classes/Post_Types
 * @author Pragmatic Mates
 */
class Realia_Post_Type_Agency {
	/**
	 * Initialize custom post type
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'definition' ) );
		add_filter( 'cmb2_meta_boxes', array( __CLASS__, 'fields' ) );
		add_filter( 'manage_edit-agency_columns', array( __CLASS__, 'custom_columns' ) );
		add_action( 'manage_agency_posts_custom_column', array( __CLASS__, 'custom_columns_manage' ) );
	}

	/**
	 * Custom post type definition
	 *
	 * @access public
	 * @return void
	 */
	public static function definition() {
		$labels = array(
			'name'               => __( 'Agencies', 'realia' ),
			'singular_name'      => __( 'Agency', 'realia' ),
			'add_new'            => __( 'Add New Agency', 'realia' ),
			'add_new_item'       => __( 'Add New Agency', 'realia' ),
			'edit_item'          => __( 'Edit Agency', 'realia' ),
			'new_item'           => __( 'New Agency', 'realia' ),
			'all_items'          => __( 'Agencies', 'realia' ),
			'view_item'          => __( 'View Agency', 'realia' ),
			'search_items'       => __( 'Search Agency', 'realia' ),
			'not_found'          => __( 'No agencies found', 'realia' ),
			'not_found_in_trash' => __( 'No agencies found in Trash', 'realia' ),
			'parent_item_colon'  => '',
			'menu_name'          => __( 'Agencies', 'realia' ),
		);

		register_post_type( 'agency',
			array(
				'labels'          => $labels,
				'show_in_menu'	  => 'realia',
				'supports'        => array( 'title', 'editor', 'thumbnail' ),
				'public'          => true,
				'show_ui'         => true,
				'has_archive'     => true,
				'rewrite'         => array( 'slug' => __( 'agencies', 'realia' ) ),
				'categories'      => array(),
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
		$metaboxes[ REALIA_AGENCY_PREFIX . 'general' ] = array(
			'id'                        => REALIA_AGENCY_PREFIX . 'general',
			'title'                     => __( 'General Options', 'realia' ),
			'object_types'              => array( 'agency' ),
			'context'                   => 'normal',
			'priority'                  => 'high',
			'show_names'                => true,
			'fields'                    => array(
				array(
					'id'                => REALIA_AGENCY_PREFIX . 'email',
					'name'              => __( 'E-mail', 'realia' ),
					'type'              => 'text',
				),
				array(
					'id'                => REALIA_AGENCY_PREFIX . 'web',
					'name'              => __( 'Web', 'realia' ),
					'type'              => 'text',
				),
				array(
					'id'                => REALIA_AGENCY_PREFIX . 'phone',
					'name'              => __( 'Phone', 'realia' ),
					'type'              => 'text',
				),
				array(
					'id'                => REALIA_AGENCY_PREFIX . 'address',
					'name'              => __( 'Address', 'realia' ),
					'type'              => 'textarea',
				),
			),
		);

		$metaboxes[ REALIA_AGENCY_PREFIX . 'location' ] = array(
			'id'                        => REALIA_AGENCY_PREFIX . 'location',
			'title'                     => __( 'Location', 'realia' ),
			'object_types'              => array( 'agency' ),
			'context'                   => 'normal',
			'priority'                  => 'high',
			'show_names'                => true,
			'fields'                    => array(
				array(
					'id'                => REALIA_AGENCY_PREFIX . 'location',
					'name'              => __( 'Location', 'realia' ),
					'desc'              => __( 'Drag the marker to set the exact location', 'realia' ),
					'type'              => 'pw_map',
					'sanitization_cb'   => 'pw_map_sanitise',
				),
			),
		);

		return $metaboxes;
	}

	/**
	 * Custom admin columns for post type
	 *
	 * @access public
	 * @return array
	 */
	public static function custom_columns() {
		$fields = array(
			'cb' 				=> '<input type="checkbox" />',
			'title' 			=> __( 'Title', 'realia' ),
			'thumbnail' 		=> __( 'Thumbnail', 'realia' ),
			'email'      		=> __( 'E-mail', 'realia' ),
			'web'      		    => __( 'Web', 'realia' ),
			'phone'      		=> __( 'Phone', 'realia' ),
			'agents'         	=> __( 'Agents', 'realia' ),
			'author' 			=> __( 'Author', 'realia' ),
		);

		return $fields;
	}

	/**
	 * Custom admin columns implementation
	 *
	 * @access public
	 * @param string $column
	 * @return array
	 */
	public static function custom_columns_manage( $column ) {
		switch ( $column ) {
			case 'thumbnail':
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'thumbnail', array(
						'class'     => 'attachment-thumbnail attachment-thumbnail-small',
					) );
				} else {
					echo '-';
				}
				break;
			case 'email':
				$email = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX . 'email', true );

				if ( ! empty( $email ) ) {
					echo esc_attr( $email );
				} else {
					echo '-';
				}
				break;
			case 'web':
				$web = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX  . 'web', true );

				if ( ! empty( $web ) ) {
					echo esc_attr( $web );
				} else {
					echo '-';
				}
				break;
			case 'phone':
				$phone = get_post_meta( get_the_ID(), REALIA_AGENCY_PREFIX  . 'phone', true );

				if ( ! empty( $phone ) ) {
					echo esc_attr( $phone );
				} else {
					echo '-';
				}
				break;
			case 'agents':
				$agents_count = Realia_Query::get_agency_agents( $post_id = get_the_ID() )->post_count;
				echo esc_attr( $agents_count );
				break;
		}
	}
}

Realia_Post_Type_Agency::init();
