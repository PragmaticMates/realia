<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Post_Type_Agent
 *
 * @class Realia_Post_Type_Agent
 * @package Realia/Classes/Post_Types
 * @author Pragmatic Mates
 */
class Realia_Post_Type_Agent {
	/**
	 * Initialize custom post type
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'definition' ) );
		add_filter( 'cmb2_meta_boxes', array( __CLASS__, 'fields' ) );
		add_filter( 'cmb2_meta_boxes', array( __CLASS__, 'fields_front' ) );
	    add_filter( 'manage_edit-agent_columns', array( __CLASS__, 'custom_columns' ) );
	    add_action( 'manage_agent_posts_custom_column', array( __CLASS__, 'custom_columns_manage' ) );
		add_action( 'init', array( __CLASS__, 'process_agent_form' ), 10000 );
	}

	/**
	 * Custom post type definition
	 *
	 * @access public
	 * @return void
	 */
	public static function definition() {
		$labels = array(
			'name'               => __( 'Agents', 'realia' ),
			'singular_name'      => __( 'Agent', 'realia' ),
			'add_new'            => __( 'Add New Agent', 'realia' ),
			'add_new_item'       => __( 'Add New Agent', 'realia' ),
			'edit_item'          => __( 'Edit Agent', 'realia' ),
			'new_item'           => __( 'New Agent', 'realia' ),
			'all_items'          => __( 'Agents', 'realia' ),
			'view_item'          => __( 'View Agent', 'realia' ),
			'search_items'       => __( 'Search Agent', 'realia' ),
			'not_found'          => __( 'No agents found', 'realia' ),
			'not_found_in_trash' => __( 'No agents found in Trash', 'realia' ),
			'parent_item_colon'  => '',
			'menu_name'          => __( 'Agents', 'realia' ),
		);

		register_post_type( 'agent', array(
			'labels'        => $labels,
			'show_in_menu'	=> 'realia',
			'supports'      => array( 'title', 'editor', 'thumbnail' ),
			'public'        => true,
			'show_ui'       => true,
			'has_archive'   => true,
			'rewrite'       => array( 'slug' => __( 'agents', 'realia' ) ),
			'categories'    => array(),
		) );
	}

	/**
	 * Defines custom fields
	 *
	 * @access public
	 * @param array $metaboxes
	 * @return array
	 */
	public static function fields( array $metaboxes ) {
		$agencies = array();
		$agencies_objects = Realia_Query::get_agencies();

		if ( ! empty( $agencies_objects->posts ) && is_array( $agencies_objects->posts ) ) {
			foreach ( $agencies_objects->posts as $object ) {
				$agencies[ $object->ID ] = $object->post_title;
			}
		}

		$metaboxes[ REALIA_AGENT_PREFIX . 'general' ] = array(
			'id'              => REALIA_AGENT_PREFIX . 'general',
			'title'           => __( 'General Options', 'realia' ),
			'object_types'    => array( 'agent' ),
			'context'         => 'normal',
			'priority'        => 'high',
			'show_names'      => true,
			'fields'          => array(
				array(
					'id'                => REALIA_AGENT_PREFIX . 'email',
					'name'              => __( 'E-mail', 'realia' ),
					'type'              => 'text',
				),
				array(
					'id'                => REALIA_AGENT_PREFIX . 'web',
					'name'              => __( 'Web', 'realia' ),
					'type'              => 'text',
				),
				array(
					'id'                => REALIA_AGENT_PREFIX . 'phone',
					'name'              => __( 'Phone', 'realia' ),
					'type'              => 'text',
				),
				array(
					'id'                => REALIA_AGENT_PREFIX . 'address',
					'name'              => __( 'Address', 'realia' ),
					'type'              => 'textarea',
				),
				array(
					'name'              => __( 'Agencies', 'realia' ),
					'id'                => REALIA_AGENT_PREFIX . 'agencies',
					'type'              => 'multicheck',
					'options'           => $agencies,
				),
			),
		);

		return $metaboxes;
	}

	public static function fields_front( array $metaboxes) {
		if ( ! is_admin() ) {
			$assigned_agent_id = Realia_Query::get_current_user_assigned_agent_id();

			if ( ! empty( $assigned_agent_id ) ) {
				$post = get_post( $assigned_agent_id );
				$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $assigned_agent_id ) );
			}

			// Get list of available agents
			$agencies = array();
			$agencies_objects = Realia_Query::get_agencies();

			if ( ! empty( $agencies_objects->posts ) && is_array( $agencies_objects->posts ) ) {
				foreach ( $agencies_objects->posts as $object ) {
					$agencies[ $object->ID ] = $object->post_title;
				}
			}

			$metaboxes[ REALIA_AGENT_PREFIX . 'general_front' ] = array(
				'id'              => REALIA_AGENT_PREFIX . 'general_front',
				'title'           => __( 'General Options', 'realia' ),
				'object_types'    => array( 'agent' ),
				'context'         => 'normal',
				'priority'        => 'high',
				'show_names'      => true,
				'fields'          => array(
					array(
						'id'                => REALIA_AGENT_PREFIX . 'post_type',
						'type'              => 'hidden',
						'default'           => 'agent',
					),
					array(
						'name'              => __( 'Title', 'realia' ),
						'id'                => REALIA_AGENT_PREFIX . 'title',
						'type'              => 'text_medium',
						'default'           => ! empty( $post ) ? $post->post_title : '',
					),
					array(
						'id'                => REALIA_AGENT_PREFIX . 'description',
						'name'              => __( 'Description', 'realia' ),
						'type'              => 'textarea',
						'default'           => ! empty( $post ) ? $post->post_content : '',
					),
					array(
						'id'                => REALIA_AGENT_PREFIX . 'featured_image',
						'name'              => __( 'Image', 'realia' ),
						'type'              => 'file',
						'default'           => ! empty( $featured_image ) ? $featured_image[0] : '',
					),
					array(
						'id'                => REALIA_AGENT_PREFIX . 'email',
						'name'              => __( 'E-mail', 'realia' ),
						'type'              => 'text',
					),
					array(
						'id'                => REALIA_AGENT_PREFIX . 'web',
						'name'              => __( 'Web', 'realia' ),
						'type'              => 'text',
					),
					array(
						'id'                => REALIA_AGENT_PREFIX . 'phone',
						'name'              => __( 'Phone', 'realia' ),
						'type'              => 'text',
					),
					array(
						'id'                => REALIA_AGENT_PREFIX . 'address',
						'name'              => __( 'Address', 'realia' ),
						'type'              => 'textarea',
					),
				),
			);
		}

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
			'properties'  		=> __( 'Properties', 'realia' ),
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
				$email = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'email', true );

				if ( ! empty( $email ) ) {
					echo esc_attr( $email );
				} else {
					echo '-';
				}
				break;
			case 'web':
				$web = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'web', true );

				if ( ! empty( $web ) ) {
					echo esc_attr( $web );
				} else {
					echo '-';
				}
				break;
			case 'phone':
				$phone = get_post_meta( get_the_ID(), REALIA_AGENT_PREFIX . 'phone', true );

				if ( ! empty( $phone ) ) {
					echo esc_attr( $phone );
				} else {
					echo '-';
				}
				break;
			case 'properties':
				$properties_count = Realia_Query::get_agent_properties( $post_id = get_the_ID() )->post_count;
				echo esc_attr( $properties_count );
				break;
		}
	}

	/**
	 * Process agent form - front end submission
	 *
	 * @access public
	 * @return void
	 */
	public static function process_agent_form() {
		if ( ! isset( $_POST['submit-cmb'] ) && ! empty( $_POST['post_type'] ) && 'agent' == $_POST['post_type'] ) {
			return;
		}

		// Setup and sanitize data
		if ( isset( $_POST[ REALIA_AGENT_PREFIX . 'title' ] ) ) {
			$post_id = ! empty( $_POST['object_id'] ) ? $_POST['object_id'] : false;

			$data = array(
				'post_title'     => sanitize_text_field( $_POST[ REALIA_AGENT_PREFIX . 'title' ] ),
				'post_author'    => get_current_user_id(),
				'post_status'    => 'publish',
				'post_type'      => 'agent',
				'post_content'   => wp_kses( $_POST[ REALIA_AGENT_PREFIX . 'description' ], '<b><strong><i><em><h1><h2><h3><h4><h5><h6><pre><code><span>' ),
			);

			if ( ! empty( $post_id ) ) {
				$data['ID'] = $post_id;
			}

			$post_id = wp_insert_post( $data, true );

			if ( ! empty( $post_id ) && ! empty( $_POST['object_id'] ) ) {
				update_user_meta( get_current_user_id(), REALIA_USER_PREFIX . 'agent_object', $post_id );

				$_POST['object_id'] = $post_id;
				$post_id = $_POST['object_id'];
				$metaboxes = apply_filters( 'cmb2_meta_boxes', array() );
				cmb2_get_metabox_form( $metaboxes[ REALIA_AGENT_PREFIX . 'general_front' ], $post_id );

				// Create featured image
				$featured_image = get_post_meta( $post_id, REALIA_AGENT_PREFIX . 'featured_image', true );
				if ( ! empty( $featured_image ) ) {
					$featured_image_id = get_post_meta( $post_id, REALIA_AGENT_PREFIX . 'featured_image_id', true );
					set_post_thumbnail( $post_id, $featured_image_id );
				} else {
					update_post_meta( $post_id, REALIA_AGENT_PREFIX . 'featured_image', null );
					delete_post_thumbnail( $post_id );
				}

				$_SESSION['messages'][] = array( 'success', __( 'Agent has been successfully updated.', 'realia' ) );
				if ( ! empty( $_SERVER['HTTP_REFERER'] ) ) {
					wp_redirect( $_SERVER['HTTP_REFERER'] );
				} else {
					wp_redirect( site_url() );
				}
				exit();
			}
		}

		return;
	}
}

Realia_Post_Type_Agent::init();
