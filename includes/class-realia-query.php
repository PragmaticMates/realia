<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Realia_Query
 *
 * @class Realia_Query
 * @package Realia/Classes
 * @author Pragmatic Mates
 */
class Realia_Query {
    /**
     * Gets user properties
     *
     * @access public
     * @param int $id
     * @return WP_Query
     */
    public static function get_properties_by_user( $id ) {
        return new WP_Query( array(
            'author'            => $id,
            'post_type'         => 'property',
            'posts_per_page'    => -1,
            'post_status'       => 'any'
        ) );
    }

    /**
     * Sets all properties into query
     *
     * @access public
     * @return void
     */
    public static function loop_properties_all() {
        query_posts( array(
            'post_type'         => 'property',
            'posts_per_page'    => -1,
            'post_status'       => 'publish',
        ) );
    }

    /**
     * Sets similar properties into loop
     *
     * @access public
     * @param null|int $post_id
     * @return void
     */
    public static function loop_properties_similar( $post_id = null ) {
        if ( $post_id == null ) {
            $post_id = get_the_ID();
        }

        $property_types = wp_get_post_terms( $post_id, 'property_types' );
        $property_type_ids = array();

        if ( ! empty( $property_types ) && is_array( $property_types ) ) {
            foreach ( $property_types as $property_type ) {
                $property_type_ids[] = $property_type->term_id;
            }
        }

        $args = array(
            'post_type' 		=> 'property',
            'posts_per_page' 	=> 3,
            'orderby'			=> 'rand',
            'post__not_in'		=> array( $post_id ),
        );

        if ( ! empty( $property_type_ids ) && is_array( $property_type_ids ) && count( $property_type_ids ) > 0 ) {
            $args['tax_query'] = array(
                array(
                    'taxonomy'  => 'property_types',
                    'field'     => 'id',
                    'terms'     => $property_type_ids,
                ),
            );
        }

        query_posts( $args );
    }

    /**
     * Applies search conditions into current query
     *
     * @access public
     * @return void
     */
    public static function loop_properties_filter() {
        global $wp_query;
        $query = Realia_Filter::filter_query( $wp_query );
        $query->posts = $query->get_posts();
        $wp_query = $query;
    }

    /**
     * Gets property agent
     *
     * @access public
     * @param null $post_id
     * @return bool|null|WP_Post
     */
    public static function get_property_agent( $post_id = null ) {
        if ( $post_id == null ) {
            $post_id = get_the_ID();
        }

        $agent_id = get_post_meta( $post_id, REALIA_PROPERTY_PREFIX . 'agents', true );

        if ( is_array( $agent_id ) && ! empty( $agent_id[0] ) ) {
            return get_post( $agent_id[0] );
        }

        return false;
    }

    /**
     * Gets property location name
     *
     * @access public
     * @param null $post_id
     * @param string $separator
     * @return bool|string
     */
    public static function get_property_location_name( $post_id = null, $separator = '/' ) {
        static $property_locations;

        if ( $post_id == null ) {
            $post_id = get_the_ID();
        }

        if ( ! empty( $property_locations[$post_id] ) ) {
            return $property_locations[$post_id];
        }

        $locations = wp_get_post_terms( $post_id, 'locations', array(
	        'orderby'   => 'parent',
	        'order'     => 'DESC'
        ) );

        if ( is_array( $locations ) && count( $locations ) > 0 ) {
            $output = '';

            $locations = array_reverse($locations);

            foreach ( $locations as $key => $location ) {
                $output .= '<a href="' . get_term_link( $location, 'locations' ). '">' . $location->name . '</a>';

                if ( array_key_exists( $key + 1, $locations ) ) {
                    $output .= ' <span class="separator">' . $separator . '</span> ';
                }
            }

            $property_locations[$post_id] = $output;
            return $output;
        }

        return false;
    }

    /**
     * Gets property status name
     *
     * @access public
     * @param null $post_id
     * @return bool
     */
    public static function get_property_status_name( $post_id = null ) {
        if ( $post_id == null ) {
            $post_id = get_the_ID();
        }

        $types = wp_get_post_terms( $post_id, 'statuses' );

        if ( is_array( $types ) && count( $types ) > 0 ) {
            $type = array_shift( $types );
            return $type->name;
        }

        return false;
    }

    /**
     * Gets property material name
     *
     * @access public
     * @param null $post_id
     * @return bool
     */
    public static function get_property_material_name( $post_id = null ) {
        static $property_materials;

        if ( $post_id == null ) {
            $post_id = get_the_ID();
        }

        if ( ! empty( $property_materials[$post_id] ) ) {
            return $property_materials[$post_id];
        }

        $materials = wp_get_post_terms( $post_id, 'materials' );

        if ( is_array( $materials ) && count( $materials ) > 0 ) {
            $output = '';

            foreach ( $materials as $key => $material ) {
                $output .= $material->name;

                if ( array_key_exists( $key + 1, $materials ) ) {
                    $output .= ', ';
                }
            }

            $property_materials[$post_id] = $output;
            return $output;
        }

        return false;
    }

    /**
     * Gets property type name
     *
     * @access public
     * @param null $post_id
     * @return bool
     */
    public static function get_property_type_name( $post_id = null ) {
        static $property_type_names;

        if ( $post_id == null ) {
            $post_id = get_the_ID();
        }

        if ( ! empty( $property_type_names[$post_id] ) ) {
            return $property_type_names[$post_id];
        }

        $types = wp_get_post_terms( $post_id, 'property_types' );

        if ( is_array( $types ) && count( $types ) > 0 ) {
            $type = array_shift( $types );
            $property_type_names[$post_id] = $type->name;
            return $type->name;
        }

        return false;
    }

    /**
     * Checks if property is paid
     *
     * @access public
     * @param null $post_id
     * @return bool
     */
    public static function is_property_paid( $post_id = null ) {
        if ( $post_id == null ) {
            $post_id = get_the_ID();
        }

        $query = new WP_Query( array(
            'post_type'         => 'transaction',
            'posts_per_page'    => 1,
            'orderby'           => 'post_date',
            'order'             => 'DESC',
            'meta_query'        => array(
                'relation'      => 'AND',
                array(
                    'key'       => REALIA_TRANSACTION_PREFIX . 'object_id',
                    'value'     => $post_id,
                    'compare'   => '='
                ),
                array(
                    'key'       => REALIA_TRANSACTION_PREFIX . 'payment_type',
                    'value'     => 'pay_per_post',
                    'compare'   => '='
                ),
                array(
                    'key'       => REALIA_TRANSACTION_PREFIX . 'object',
                    'value'     => 'success',
                    'compare'   => 'LIKE'
                )
            )
        ) );

        return $query->have_posts();
    }

    /**
     * Gets all packages
     *
     * @access public
     * @return WP_Query
     */
    public static function get_packages_all() {
        return new WP_Query( array(
            'post_type'         => 'package',
            'posts_per_page'    => -1,
            'post_status'       => 'publish',
        ) );
    }

    /**
     * Fnd packages
     *
     * @access public
     * @param int $id
     * @return WP_Query
     */
    public static function package_find( $id ) {
        return new WP_Query( array(
            'p'                 => $id,
            'post_type'         => 'package',
            'post_status'       => 'publish',
            'posts_per_page'    => -1,
        ) );
    }

    /**
     * Sets agency agents into loop
     *
     * @access public
     * @param null|int $post_id
     * @return void
     */
    public static function loop_agency_agents( $post_id = null ) {
        if ( $post_id == null ) {
            $post_id = get_the_ID();
        }

        $args = array(
            'post_type'         => 'agent',
            'meta_query'        => array(
                array(
                    'key'       => REALIA_AGENT_PREFIX . 'agencies',
                    'value'     =>  '"' . $post_id . '"',
                    'compare'   => 'LIKE'
                ),
            ),
        );

        query_posts( $args );
    }

    /**
     * Gets agency agents
     *
     * @access public
     * @param null|int $post_id
     * @return WP_Query
     */
    public static function get_agency_agents( $post_id = null ) {
        if ( $post_id == null ) {
            $post_id = get_the_ID();
        }

        $args = array(
            'post_type'         => 'agent',
            'meta_query'        => array(
                array(
                    'key'       => REALIA_AGENT_PREFIX . 'agencies',
                    'value'     =>  '"' . $post_id . '"',
                    'compare'   => 'LIKE'
                ),
            ),
        );

        return new WP_Query( $args );
    }

    /**
     * Sets agent properties into loop
     *
     * @access public
     * @param null|int $post_id
     * @return void
     */
    public static function loop_agent_properties( $post_id = null ) {
        if ( $post_id == null ) {
            $post_id = get_the_ID();
        }

        $args = array(
            'post_type'         => 'property',
            'meta_query'        => array(
                array(
                    'key'       => REALIA_PROPERTY_PREFIX . 'agents',
                    'value'     => '"' . $post_id . '"',
                    'compare'   => 'LIKE',
                ),
            ),
        );

        query_posts( $args );
    }

    /**
     * Gets agent properties
     *
     * @access public
     * @param null|int $post_id
     * @return WP_Query
     */
    public static function get_agent_properties( $post_id = null ) {
        if ( $post_id == null ) {
            $post_id = get_the_ID();
        }

        $args = array(
            'post_type'         => 'property',
            'meta_query'        => array(
                array(
                    'key'       => REALIA_PROPERTY_PREFIX . 'agents',
                    'value'     =>  '"' . $post_id . '"',
                    'compare'   => 'LIKE'
                ),
            ),
        );

        return new WP_Query( $args );
    }

    /**
     * Resets current query
     *
     * @access public
     * @return void
     */
    public static function loop_reset() {
        wp_reset_query();
    }

	/**
	 * Checks if there is another post in query
	 *
	 * @access public
	 * @return bool
	 */
	public static function loop_has_next() {
		global $wp_query;

		if ( $wp_query->current_post + 1 < $wp_query->post_count ) {
			return true;
		}

		return false;
	}
}