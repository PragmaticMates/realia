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
            'all_items'          => __( 'All Agencies', 'realia' ),
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
                'supports'        => array( 'title', 'editor', 'thumbnail', ),
                'public'          => true,
                'show_ui'         => true,
                'has_archive'     => true,
                'rewrite'         => array( 'slug' => __( 'agencies', 'realia' ) ),
                'menu_position'   => 44,
                'categories'      => array( ),
                'menu_icon'       => 'dashicons-groups',
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
        $metaboxes[REALIA_AGENCY_PREFIX . 'general'] = array(
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

        $metaboxes[REALIA_AGENCY_PREFIX . 'location'] = array(
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
            )
        );

        return $metaboxes;
    }
}

Realia_Post_Type_Agency::init();