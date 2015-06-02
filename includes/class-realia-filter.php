<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Realia_Filter
 *
 * @class Realia_Filter
 * @package Realia/Classes
 * @author Pragmatic Mates
 */
class Realia_Filter {
    /**
     * Initialize filtering
     *
     * @access public
     * @return void
     */
    public static function init() {
        add_action( 'pre_get_posts', array( __CLASS__, 'archive' ) );
        add_action( 'pre_get_posts', array( __CLASS__, 'taxonomy') );
    }

    /**
     * Checks if in URI are filter conditions
     *
     * @access public
     * @return bool
     */
    public static function has_filter() {
        if ( ! empty( $_GET ) && is_array( $_GET ) ) {
            foreach ( $_GET as $key => $value ) {
                if ( strrpos( $key, 'filter-', -strlen( $key ) ) !== FALSE ) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * When accessing taxonomy page order properties by sticky
     *
     * @access public
     * @param $query
     * @return array
     */
    public static function taxonomy( $query ) {
        $is_correct_taxonomy = false;
        if ( is_tax( 'statuses' ) || is_tax( 'property_types' ) || is_tax( 'amenities') || is_tax( 'locations' ) ) {
            $is_correct_taxonomy = true;
        }

        if ( ! $is_correct_taxonomy  || ! $query->is_main_query() || is_admin() ) {
            return;
        }

        // TODO: WP 4.2 order by mutliple custom fields
        $query->set( 'order', 'DESC' );
        $query->set( 'orderby', 'meta_value date' );
        $query->set( 'meta_key', REALIA_PROPERTY_PREFIX . 'sticky' );

        // We need this filter to have sticky at the top of posts
        // https://core.trac.wordpress.org/ticket/19653
        add_filter( 'get_meta_sql', array( __CLASS__, 'filter_get_meta_sql_19653' ) );

        return $query;
    }


    /**
     * Filter properties on archive page
     *
     * @access public
     * @param $query
     * @return void
     */
    public static function archive( $query ) {
        $suppress_filters = ! empty( $query->query_vars['suppress_filters'] ) ? $query->query_vars['suppress_filters'] : '';

        if ( ! is_post_type_archive( 'property' ) || ! $query->is_main_query() || is_admin() || $query->query_vars['post_type'] != 'property' || $suppress_filters ) {
            return;
        }

        $taxonomies = array();
        $meta = array();

        if ( ! empty( $_GET['filter-sort-order'] ) ) {
            $query->set( 'order', $_GET['filter-sort-order']);
        }

        if ( ! empty( $_GET['filter-sort-by'] ) )  {
            switch ( $_GET['filter-sort-by'] ) {
                case 'title':
                    $query->set( 'orderby', 'title' );
                    break;
                case 'published':
                    $query->set( 'orderby', 'date');
                    break;
                case 'price':
                    $query->set( 'meta_key', REALIA_PROPERTY_PREFIX . 'price' );
                    $query->set( 'orderby', 'meta_value_num' );
                    break;
            }
        } else {
            if ( ! self::has_filter() ) {
                // TODO: WP 4.2 order by mutliple custom fields
                $query->set('order', 'DESC');
                $query->set('orderby', 'meta_value date');
                $query->set('meta_key', REALIA_PROPERTY_PREFIX . 'sticky');
                // We need this filter to have sticky at the top of posts
                // https://core.trac.wordpress.org/ticket/19653
                add_filter('get_meta_sql', array(__CLASS__, 'filter_get_meta_sql_19653'));
            }
        }

        return self::filter_query( $query );
    }


    /**
     * Add params into query object
     *
     * @access public
     * @param $query
     * @return mixed
     */
    public static function filter_query( $query ) {
        $meta = array();
        $taxonomies = array();

        // Location
        if ( ! empty( $_GET['filter-location'] ) ) {
            $taxonomies[] = array(
                'taxonomy'  => 'locations',
                'field'     => 'id',
                'terms'     => $_GET['filter-location'],
            );
        }

        // Property type
        if ( ! empty( $_GET['filter-property-type'] ) ) {
            $taxonomies[] = array(
                'taxonomy'  => 'property_types',
                'field'     => 'id',
                'terms'     => $_GET['filter-property-type'],
            );
        }

	    // Amenity
	    if ( ! empty( $_GET['filter-amenity'] ) ) {
		    $taxonomies[] = array(
			    'taxonomy'  => 'amenities',
			    'field'     => 'id',
			    'terms'     => $_GET['filter-amenity'],
		    );
	    }

        // Status
        if ( ! empty( $_GET['filter-status'] ) ) {
            $taxonomies[] = array(
                'taxonomy'  => 'statuses',
                'field'     => 'id',
                'terms'     => $_GET['filter-status'],
            );
        }

        // Property ID
        if ( ! empty( $_GET['filter-id'] ) ) {
            $meta[] = array(
                'key'       => REALIA_PROPERTY_PREFIX . 'id',
                'value'     => $_GET['filter-id'],
                'compare'   => '=='
            );
        }

        // Price from
        if ( ! empty( $_GET['filter-price-from'] ) ) {
            $meta[] = array(
                'key'       => REALIA_PROPERTY_PREFIX . 'price',
                'value'     => $_GET['filter-price-from'],
                'compare'   => '>=',
                'type'      => 'NUMERIC',
            );
        }

        if ( ! empty( $_GET['filter-price-to'] ) ) {
            $meta[] = array(
                'key'       => REALIA_PROPERTY_PREFIX . 'price',
                'value'     => $_GET['filter-price-to'],
                'compare'   => '<=',
                'type'      => 'NUMERIC',
            );
        }

	    // Contract
	    if ( ! empty( $_GET['filter-contract'] ) ) {
		    $meta[] = array(
			    'key'       => REALIA_PROPERTY_PREFIX . 'contract',
			    'value'     => $_GET['filter-contract'],
		    );
	    }

	    // Rooms
	    if ( ! empty( $_GET['filter-rooms'] ) ) {
		    $meta[] = array(
			    'key'       => REALIA_PROPERTY_PREFIX . 'attributes_rooms',
			    'value'     => $_GET['filter-rooms'],
			    'compare'   => '>=',
			    'type'      => 'NUMERIC',
		    );
	    }

        // Beds
        if ( ! empty( $_GET['filter-beds'] ) ) {
            $meta[] = array(
                'key'       => REALIA_PROPERTY_PREFIX . 'attributes_beds',
                'value'     => $_GET['filter-beds'],
                'compare'   => '>=',
                'type'      => 'NUMERIC',
            );
        }

        // Baths
        if ( ! empty( $_GET['filter-baths'] ) ) {
            $meta[] = array(
                'key'       => REALIA_PROPERTY_PREFIX . 'attributes_baths',
                'value'     => $_GET['filter-baths'],
                'compare'   => '>=',
                'type'      => 'NUMERIC',
            );
        }

        // Area
        if ( ! empty( $_GET['filter-area'] ) ) {
            $meta[] = array(
                'key'       => REALIA_PROPERTY_PREFIX . 'attributes_area',
                'value'     => $_GET['filter-area'],
                'compare'   => '>=',
                'type'      => 'NUMERIC',
            );
        }

        // Garages
        if ( ! empty( $_GET['filter-garages'] ) ) {
            $meta[] = array(
                'key'       => REALIA_PROPERTY_PREFIX . 'attributes_garages',
                'value'     => $_GET['filter-garages'],
                'compare'   => '>=',
                'type'      => 'NUMERIC',
            );
        }


        $query->set( 'meta_query', $meta );
        $query->set( 'tax_query', $taxonomies );
        return $query;
    }

    /**
     * Tweak for displaying sticky posts at the top
     *
     * @access public
     * @param $clauses
     * @return mixed
     */
    public static function filter_get_meta_sql_19653( $clauses ) {
        remove_filter( 'get_meta_sql', array( __CLASS__, 'filter_get_meta_sql_19653' ) );

        // Change the inner join to a left join,
        // and change the where so it is applied to the join, not the results of the query.
        $clauses['join']  = str_replace( 'INNER JOIN', 'LEFT JOIN', $clauses['join'] ) . $clauses['where'];
        $clauses['where'] = '';

        return $clauses;
    }
}

Realia_Filter::init();