<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Realia_Taxonomies_Contracts
 *
 * @class Realia_Taxonomies_Contracts
 * @package Realia/Classes/Taxonomies
 * @author Pragmatic Mates
 */
class Realia_Taxonomies_Contracts {
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
        $property_contracts_labels = array(
            'name'              => __( 'Contracts', 'realia' ),
            'singular_name'     => __( 'Contract', 'realia' ),
            'search_items'      => __( 'Search Contract Types', 'realia' ),
            'all_items'         => __( 'All Contract Types', 'realia' ),
            'parent_item'       => __( 'Parent Contract', 'realia' ),
            'parent_item_colon' => __( 'Parent Contract:', 'realia' ),
            'edit_item'         => __( 'Edit Contract', 'realia' ),
            'update_itm'        => __( 'Update Contract', 'realia' ),
            'add_new_item'      => __( 'Add New Contract', 'realia' ),
            'new_item_name'     => __( 'New Contract', 'realia' ),
            'menu_name'         => __( 'Contracts', 'realia' ),
        );

        register_taxonomy( 'contracts', 'property', array(
            'labels'        => $property_contracts_labels,
            'hierarchical'  => true,
            'query_var'     => 'contract',
            'rewrite'       => array( 'slug' => __( 'contract', 'realia' ) ),
            'public'        => true,
            'show_ui'       => true,
        ) );
    }
}

Realia_Taxonomies_Contracts::init();