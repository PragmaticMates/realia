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
		add_filter( 'realia_filter_fields', array( __CLASS__, 'default_fields' ) );
		add_filter( 'realia_filter_field_names', array( __CLASS__, 'default_field_names' ) );

		add_action( 'pre_get_posts', array( __CLASS__, 'archive' ) );
		add_action( 'pre_get_posts', array( __CLASS__, 'taxonomy' ) );
	    add_action( 'realia_before_property_archive', array( __CLASS__, 'sort_template' ) );
	}

	/**
	 * Gets sort template
	 *
	 * @access public
	 * @return void
	 * @throws Exception
	 */
	public static function sort_template() {
		if ( is_post_type_archive( array( 'property' ) ) ) {
			include Realia_Template_Loader::locate( 'properties/sort' );
		}
	}

	/**
	 * List of default fields defined by plugin
	 *
	 * @access public
	 * @return array
	 */
	public static function default_fields() {
		return array(
			'id'            => __( 'Property ID', 'realia' ),
			'location'      => __( 'Location', 'realia' ),
			'property_type' => __( 'Property type', 'realia' ),
			'amenity'       => __( 'Amenity', 'realia' ),
			'status'        => __( 'Status', 'realia' ),
			'contract'      => __( 'Contract', 'realia' ),
			'material'      => __( 'Material', 'realia' ),
			'price'         => __( 'Price', 'realia' ),
			'rooms'         => __( 'Rooms', 'realia' ),
			'baths'         => __( 'Baths', 'realia' ),
			'beds'          => __( 'Beds', 'realia' ),
			'year_built'    => __( 'Year built', 'realia' ),
			'home_area'     => __( 'Home area', 'realia' ),
			'lot_area'      => __( 'Lot area', 'realia' ),
			'garages'       => __( 'Garages', 'realia' ),
			'featured'      => __( 'Featured', 'realia' ),
			'reduced'       => __( 'Reduced', 'realia' ),
			'sticky'        => __( 'Sticky', 'realia' ),
			'sold'          => __( 'Sold', 'realia' ),
		);
	}

	/**
	 * Returns list of available filter fields templates
	 *
	 * @access public
	 * @return array
	 */
	public static function get_fields() {
		return apply_filters( 'realia_filter_fields', array() );
	}

	/**
	 * Default filter field names
	 *
	 * @access public
	 * @return array
	 */
	public static function default_field_names() {
		return array(
			'filter-id',
		'filter-location',
		'filter-property-type',
		'filter-amenity',
		'filter-status',
		'filter-contract',
			'filter-material',
		'filter-price-from',
		'filter-price-to',
		'filter-rooms',
		'filter-baths',
		'filter-beds',
		'filter-year-built',
			'filter-home-area-from',
		'filter-home-area-to',
		'filter-garages',
		'filter-featured',
		'filter-reduced',
		'filter-sticky',
		'filter-sold',
			'filter-lot-area-from',
		'filter-lot-area-to',
		);
	}

	/**
	 * Return all filter field names
	 *
	 * @access public
	 * @return array
	 */
	public static function get_field_names() {
		return apply_filters( 'realia_filter_field_names', array() );
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
				if ( strrpos( $key, 'filter-', -strlen( $key ) ) !== false ) {
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
		if ( is_tax( 'statuses' ) || is_tax( 'property_types' ) || is_tax( 'amenities' ) || is_tax( 'locations' ) || is_tax( 'materials' ) ) {
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

		if ( ! empty( $_GET['filter-sort-order'] ) ) {
			$query->set( 'order', $_GET['filter-sort-order'] );
		}

		if ( ! empty( $_GET['filter-sort-by'] ) ) {
			switch ( $_GET['filter-sort-by'] ) {
				case 'title':
					$query->set( 'orderby', 'title' );
					break;
				case 'published':
					$query->set( 'orderby', 'date' );
					break;
				case 'price':
					$query->set( 'meta_key', REALIA_PROPERTY_PREFIX . 'price' );
					$query->set( 'orderby', 'meta_value_num' );
					break;
			}
		} else {
			if ( ! self::has_filter() ) {
				// TODO: WP 4.2 order by mutliple custom fields
				$query->set( 'order', 'DESC' );
				$query->set( 'orderby', 'meta_value date' );
				$query->set( 'meta_key', REALIA_PROPERTY_PREFIX . 'sticky' );
				// We need this filter to have sticky at the top of posts
				// https://core.trac.wordpress.org/ticket/19653
				add_filter( 'get_meta_sql', array( __CLASS__, 'filter_get_meta_sql_19653' ) );
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

	    // Search by distance
	    if ( ! empty( $_GET['filter-center-latitude'] ) && ! empty( $_GET['filter-center-longitude'] ) && ! empty( $_GET['filter-distance'] ) ) {
		    $properties = self::filter_by_distance( $_GET['filter-center-latitude'], $_GET['filter-center-longitude'], $_GET['filter-distance'] );
		    $ids = array();
		    foreach ( $properties as $property ) {
			    $ids[] = $property->ID;
		    }
			$query->set( 'post__in', $ids );
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

	    // Material
	    if ( ! empty( $_GET['filter-material'] ) ) {
		    $taxonomies[] = array(
			    'taxonomy'  => 'materials',
			    'field'     => 'id',
			    'terms'     => $_GET['filter-material'],
		    );
	    }

	    // Property contract
	    if ( ! empty( $_GET['filter-contract'] ) ) {
		    $meta[] = array(
			    'key'       => REALIA_PROPERTY_PREFIX . 'contract',
			    'value'     => $_GET['filter-contract'],
			    'compare'   => '==',
		    );
	    }

	    // Featured
	    if ( ! empty( $_GET['filter-featured'] ) ) {
		    $meta[] = array(
			    'key'       => REALIA_PROPERTY_PREFIX . 'featured',
			    'value'     => 'on',
			    'compare'   => '==',
		    );
	    }

	    // Reduced
	    if ( ! empty( $_GET['filter-reduced'] ) ) {
		    $meta[] = array(
			    'key'       => REALIA_PROPERTY_PREFIX . 'reduced',
			    'value'     => 'on',
			    'compare'   => '==',
		    );
	    }

	    // Sticky
	    if ( ! empty( $_GET['filter-sticky'] ) ) {
		    $meta[] = array(
			    'key'       => REALIA_PROPERTY_PREFIX . 'sticky',
			    'value'     => 'on',
			    'compare'   => '==',
		    );
	    }

	    // Sold
	    if ( ! empty( $_GET['filter-sold'] ) ) {
		    $meta[] = array(
			    'key'       => REALIA_PROPERTY_PREFIX . 'sold',
			    'value'     => 'on',
			    'compare'   => '==',
		    );
	    }

		// Property ID
		if ( ! empty( $_GET['filter-id'] ) ) {
			$meta[] = array(
				'key'       => REALIA_PROPERTY_PREFIX . 'id',
				'value'     => $_GET['filter-id'],
				'compare'   => 'LIKE',
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

		// Price to
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
			    'key'       => REALIA_PROPERTY_PREFIX . 'rooms',
			    'value'     => $_GET['filter-rooms'],
			    'compare'   => '>=',
			    'type'      => 'NUMERIC',
		    );
	    }

		// Beds
		if ( ! empty( $_GET['filter-beds'] ) ) {
			$meta[] = array(
				'key'       => REALIA_PROPERTY_PREFIX . 'beds',
				'value'     => $_GET['filter-beds'],
				'compare'   => '>=',
				'type'      => 'NUMERIC',
			);
		}

	    // Year built
	    if ( ! empty( $_GET['filter-year-built'] ) ) {
		    $meta[] = array(
			    'key'       => REALIA_PROPERTY_PREFIX . 'year_built',
			    'value'     => $_GET['filter-year-built'],
			    'compare'   => '>=',
			    'type'      => 'NUMERIC',
		    );
	    }

		// Baths
		if ( ! empty( $_GET['filter-baths'] ) ) {
			$meta[] = array(
				'key'       => REALIA_PROPERTY_PREFIX . 'baths',
				'value'     => $_GET['filter-baths'],
				'compare'   => '>=',
				'type'      => 'NUMERIC',
			);
		}

		// Home area from
		if ( ! empty( $_GET['filter-home-area-from'] ) ) {
			$meta[] = array(
				'key'       => REALIA_PROPERTY_PREFIX . 'home_area',
				'value'     => $_GET['filter-home-area-from'],
				'compare'   => '>=',
				'type'      => 'NUMERIC',
			);
		}

	    // Home area to
	    if ( ! empty( $_GET['filter-home-area-to'] ) ) {
		    $meta[] = array(
			    'key'       => REALIA_PROPERTY_PREFIX . 'home_area',
			    'value'     => $_GET['filter-home-area-to'],
			    'compare'   => '<=',
			    'type'      => 'NUMERIC',
		    );
	    }

	    // Lot area from
	    if ( ! empty( $_GET['filter-lot-area-from'] ) ) {
		    $meta[] = array(
			    'key'       => REALIA_PROPERTY_PREFIX . 'lot_area',
			    'value'     => $_GET['filter-lot-area-from'],
			    'compare'   => '>=',
			    'type'      => 'NUMERIC',
		    );
	    }

	    // Lot area to
	    if ( ! empty( $_GET['filter-lot-area-to'] ) ) {
		    $meta[] = array(
			    'key'       => REALIA_PROPERTY_PREFIX . 'lot_area',
			    'value'     => $_GET['filter-lot-area-to'],
			    'compare'   => '<=',
			    'type'      => 'NUMERIC',
		    );
	    }

		// Garages
		if ( ! empty( $_GET['filter-garages'] ) ) {
			$meta[] = array(
				'key'       => REALIA_PROPERTY_PREFIX . 'garages',
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

	/**
	 * Find properties by GPS position matching the distance
	 *
	 * @access public
	 * @param $latitude
	 * @param $longitude
	 * @param $distance
	 *
	 * @return mixed
	 */
	public static function filter_by_distance($latitude, $longitude, $distance) {
		global $wpdb;

		$sql = 'SELECT SQL_CALC_FOUND_ROWS ID, ( 3959 * acos( cos( radians(' . $latitude . ') ) * cos(radians( latitude.meta_value ) ) * cos( radians( longitude.meta_value ) - radians(' . $longitude . ') ) + sin( radians(' . $latitude . ') ) * sin( radians( latitude.meta_value ) ) ) ) AS distance
    				FROM ' . $wpdb->prefix . 'posts
                    INNER JOIN ' . $wpdb->prefix . 'postmeta ON (' . $wpdb->prefix . 'posts.ID = ' . $wpdb->prefix . 'postmeta.post_id)
                    INNER JOIN ' . $wpdb->prefix . 'postmeta AS latitude ON ' . $wpdb->prefix . 'posts.ID = latitude.post_id
                    INNER JOIN ' . $wpdb->prefix . 'postmeta AS longitude ON ' . $wpdb->prefix . 'posts.ID = longitude.post_id
                    WHERE ' . $wpdb->prefix . 'posts.post_type = "property"
                        AND ' . $wpdb->prefix . 'posts.post_status = "publish"
                        AND latitude.meta_key="property_map_location_latitude"
                        AND longitude.meta_key="property_map_location_longitude"
					GROUP BY ' . $wpdb->prefix . 'posts.ID HAVING distance <= ' . $distance . ';';

		return $wpdb->get_results( $sql );
	}
}

Realia_Filter::init();
