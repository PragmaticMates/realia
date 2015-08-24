<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Post_Type_Transaction
 *
 * @class Realia_Post_Type_Transaction
 * @package Realia/Classes/Post_Types
 * @author Pragmatic Mates
 */
class Realia_Post_Type_Transaction {
	/**
	 * Initialize custom post type
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'definition' ) );
		add_filter( 'cmb2_meta_boxes', array( __CLASS__, 'fields' ) );
		add_filter( 'manage_edit-transaction_columns', array( __CLASS__, 'custom_columns' ) );
		add_action( 'manage_transaction_posts_custom_column', array( __CLASS__, 'custom_columns_manage' ) );
	}

	/**
	 * Custom post type definition
	 *
	 * @access public
	 * @return void
	 */
	public static function definition() {
		$labels = array(
			'name'                  => __( 'Transactions', 'realia' ),
			'singular_name'         => __( 'Transaction', 'realia' ),
			'add_new'               => __( 'Add New Transaction', 'realia' ),
			'add_new_item'          => __( 'Add New Transaction', 'realia' ),
			'edit_item'             => __( 'Edit Transaction', 'realia' ),
			'new_item'              => __( 'New Transaction', 'realia' ),
			'all_items'             => __( 'Transactions', 'realia' ),
			'view_item'             => __( 'View Transaction', 'realia' ),
			'search_items'          => __( 'Search Transaction', 'realia' ),
			'not_found'             => __( 'No Transactions found', 'realia' ),
			'not_found_in_trash'    => __( 'No Transactions Found in Trash', 'realia' ),
			'parent_item_colon'     => '',
			'menu_name'             => __( 'Transactions', 'realia' ),
		);

		register_post_type( 'transaction',
			array(
				'labels'            => $labels,
				'show_in_menu'	  => 'realia',
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
		$metaboxes[ REALIA_TRANSACTION_PREFIX . 'general' ] = array(
			'id'                        => REALIA_TRANSACTION_PREFIX . 'general',
			'title'                     => __( 'General', 'realia' ),
			'object_types'              => array( 'transaction' ),
			'context'                   => 'normal',
			'priority'                  => 'high',
			'show_names'                => true,
			'fields'                    => array(
				array(
					'id'                => REALIA_TRANSACTION_PREFIX . 'payment_type',
					'name'              => __( 'Payment type', 'realia' ),
					'type'              => 'text',
				),
				array(
					'id'                => REALIA_TRANSACTION_PREFIX . 'object_id',
					'name'              => __( 'Object ID', 'realia' ),
					'type'              => 'text',
				),
				array(
					'id'                => REALIA_TRANSACTION_PREFIX. 'object',
					'name'              => __( 'Object', 'realia' ),
					'type'              => 'textarea',
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
			'cb' 			=> '<input type="checkbox" />',
			'title' 	    => __( 'Title', 'realia' ),
			'id'            => __( 'ID', 'realia' ),
			'success'       => __( 'Success', 'realia' ),
			'price' 		=> __( 'Price', 'realia' ),
			'object' 		=> __( 'Object', 'realia' ),
			'type' 			=> __( 'Type', 'realia' ),
			'gateway' 	    => __( 'Payment Gateway', 'realia' ),
			'author' 		=> __( 'Author', 'realia' ),
			'date'			=> __( 'Date', 'realia' ),
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
		$object = get_post_meta( get_the_ID(), REALIA_TRANSACTION_PREFIX . 'object', true );
		$object_id = get_post_meta( get_the_ID(), REALIA_TRANSACTION_PREFIX . 'object_id', true );
		$post = get_post( $object_id );
		$payment_type = get_post_meta( get_the_ID(), REALIA_TRANSACTION_PREFIX . 'payment_type', true );
		$object = unserialize( $object );

		switch ( $column ) {
			case 'price':
				echo wp_kses( $object['price_formatted'], wp_kses_allowed_html( 'post' ) );
				break;
			case 'id':
				echo get_the_ID();
				break;
			case 'object':
				echo sprintf( '<a href="%s">%s</a>', get_permalink( $object_id ), get_the_title( $object_id ) );
				break;
			case 'success':
				if ( 'true' == $object['success'] ) {
					echo '<div class="dashicons-before dashicons-yes green"></div>';
				} else {
					echo '<div class="dashicons-before dashicons-no red"></div>';
				}

				break;
			case 'type':
				switch ( $payment_type ) {
					case 'pay_for_featured':
						echo __( 'Feature property', 'realia' );
						break;
					case 'sticky_post':
						echo __( 'Sticky post', 'realia' );
						break;
					case 'pay_per_post':
						echo __( 'Pay per post', 'realia' );
						break;
					case 'package':
						echo __( 'Package', 'realia' );
						break;
					default:
						echo esc_html( $payment_type );
						break;
				}
				break;
			case 'gateway':
				echo esc_attr( $object['gateway'] );
				break;
		}
	}
}

Realia_Post_Type_Transaction::init();
