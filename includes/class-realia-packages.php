<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Packages
 *
 * @class Realia_Packages
 * @package Realia/Classes
 * @author Pragmatic Mates
 */
class Realia_Packages {
	/**
	 * Initialize packages functionality
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'check_properties' ) );
	}

	/**
	 * Gets all packages
	 *
	 * @access public
	 * @param bool $show_none
	 * @return array
	 */
	public static function get_packages( $show_none = false ) {
		$packages_query = Realia_Query::get_packages_all();

		$packages = array();

		if ( $show_none ) {
			$packages[] = __( 'Not set', 'realia' );
		}

		foreach ( $packages_query->posts as $package ) {
			$duration = get_post_meta( $package->ID, REALIA_PACKAGE_PREFIX . 'duration', true );
			if ( ! empty( $duration ) ) {
				$packages[ $package->ID ] = $package->post_title;
			}
		}

		return $packages;
	}

	/**
	 * Gets all durations for packages
	 *
	 * @access public
	 * @param bool $show_none
	 * @return array
	 */
	public static function get_package_durations( $show_none = false ) {
		$durations = array();

		if ( $show_none ) {
			$durations[] = __( 'Not set', 'realia' );
		}

		return array_merge( $durations, array(
			'1_week'        => __( '1 week', 'realia' ),
			'1_month'       => __( '1 month', 'realia' ),
			'1_year'        => __( '1 year', 'realia' ),
		) );
	}

	/**
	 * Gets package for user
	 *
	 * @access public
	 * @param $user_id
	 * @return bool|WP_Post
	 */
	public static function get_package_for_user( $user_id ) {
		$current_package_array = get_user_meta( $user_id, REALIA_USER_PREFIX . 'package' );

		if ( count( $current_package_array ) == 0 ) {
			return false;
		}

		$current_package_id = array_shift( $current_package_array );
		return get_post( $current_package_id );
	}

	/**
	 * Gets package valid until data for user
	 *
	 * @access public
	 * @param $user_id
	 * @return bool|string
	 */
	public static function get_package_valid_date_for_user( $user_id ) {
		$valid = get_user_meta( $user_id, REALIA_USER_PREFIX . 'package_valid', true );

		if ( ! empty( $valid ) ) {
			$date_format = get_option( 'date_format' );
			return date( $date_format, $valid );
		}

		return false;
	}

	/**
	 * Checks if user's package is valid
	 *
	 * @access public
	 * @param $user_id
	 * @return bool
	 */
	public static function is_package_valid_for_user( $user_id ) {
		$valid = get_user_meta( $user_id, REALIA_USER_PREFIX . 'package_valid', true );
		$today = strtotime( 'today' );

		if ( empty( $valid ) ) {
			return false;
		}

		if ( $today > $valid ) {
			return false;
		}

		return true;
	}

	/**
	 * Gets remaining properties from user package
	 *
	 * @access public
	 * @param $user_id
	 * @return int|mixed|string
	 */
	public static function get_remaining_properties_count_for_user( $user_id ) {
		$package = self::get_package_for_user( $user_id );

		if ( $package && self::is_package_valid_for_user( $user_id ) ) {
			$of_properties = get_post_meta( $package->ID, REALIA_PACKAGE_PREFIX . 'of_properties', true );

			if ( '-1' == $of_properties ) {
				return 'unlimited';
			}

			$user_properties = count( Realia_Query::get_properties_by_user( $user_id )->posts );
			return $of_properties - $user_properties;
		}

		return 0;
	}

	/**
	 * Get package title
	 *
	 * @access public
	 * @param $package_id
	 * @return bool|string
	 */
	public static function get_package_title( $package_id ) {
		$packages = Realia_Query::package_find( $package_id );

		if ( is_array( $packages->posts ) && count( $packages->posts ) > 0 ) {
			$package = array_shift( $packages->posts );
			return $package->post_title;
		}

		return false;
	}

	/**
	 * Gets full package title
	 *
	 * @acces public
	 * @param $package_id
	 * @return string
	 */
	public static function get_full_package_title( $package_id ) {
		$package = get_post( $package_id );
		$price_formatted = self::get_package_formatted_price( $package_id );
		$duration_key = get_post_meta( $package_id, REALIA_PACKAGE_PREFIX . 'duration', true );
		$durations = self::get_package_durations();

		return sprintf( '%s (%s/%s)', $package->post_title, $price_formatted, $durations[ $duration_key ] );
	}

	/**
	 * Gets package price
	 *
	 * @access public
	 * @param $package_id
	 * @return bool|float
	 */
	public static function get_package_price( $package_id ) {
		$price = get_post_meta( $package_id, REALIA_PACKAGE_PREFIX . 'price', true );

		if ( empty( $price ) || ! is_numeric( $price ) ) {
			return false;
		}

		return $price;
	}

	/**
	 * Gets package formatted price
	 *
	 * @access public
	 * @param $package_id
	 * @return bool|string
	 */
	public static function get_package_formatted_price( $package_id ) {
		$price = get_post_meta( $package_id, REALIA_PACKAGE_PREFIX . 'price', true );
		return Realia_Price::format_price( $price );
	}

	/**
	 * Checks if package exists
	 *
	 * @access public
	 * @param null $package_id
	 * @return bool
	 */
	public static function package_exists( $package_id = null ) {
		if ( empty( $package_id ) ) {
			return false;
		}

		$query = Realia_Query::package_find( $package_id );

		if ( count( $query->posts ) > 0 ) {
			return true;
		}

		return false;
	}

	/**
	 * Sets package for user
	 *
	 * @access public
	 * @param $user_id
	 * @param $package_id
	 * @return bool
	 */
	public static function set_package_for_user( $user_id, $package_id ) {
		if ( empty( $user_id ) || empty( $package_id ) ) {
			return false;
		}

		$duration = get_post_meta( $package_id, REALIA_PACKAGE_PREFIX . 'duration', true );

		if ( ! $duration ) {
			return false;
		}

		switch ( $duration ) {
			case '1_week':
				update_user_meta( $user_id, REALIA_USER_PREFIX . 'package_valid', strtotime( '+1 week' ) );
				break;
			case '1_month':
				update_user_meta( $user_id, REALIA_USER_PREFIX . 'package_valid', strtotime( '+1 month' ) );
				break;
			case '1_year':
				update_user_meta( $user_id, REALIA_USER_PREFIX . 'package_valid', strtotime( '+1 year' ) );
				break;
			default:
				return false;
				break;
		}

		update_user_meta( $user_id, REALIA_USER_PREFIX . 'package', $package_id );
		return true;
	}

	/**
	 * Checks if user is allowed to add submision
	 *
	 * @access public
	 * @param $user_id
	 * @return bool
	 */
	public static function is_allowed_to_add_submission( $user_id ) {
		if ( get_theme_mod( 'realia_submission_type', 'free' ) == 'packages' ) {
			if ( self::is_package_valid_for_user( $user_id ) && ( self::get_remaining_properties_count_for_user( $user_id ) > 0 || self::get_remaining_properties_count_for_user( $user_id ) === 'unlimited' ) ) {
				return true;
			}

			return false;
		}

		return true;
	}

	/**
	 * Unpublish properties
	 *
	 * @access public
	 * @param $properties
	 * @return void
	 */
	public static function unpublish_properties( $properties ) {
		foreach ( $properties as $item ) {
			if ( $item->post_status != 'publish' ) {
				continue;
			}

			wp_update_post( array(
				'ID'            => $item->ID,
				'post_status'   => 'draft',
			) );
		}
	}

	/**
	 * Publish properties
	 *
	 * @access public
	 * @param $properties
	 * @return void
	 */
	public static function publish_properties( $properties ) {
		$review_before_publish = get_theme_mod( 'realia_submission_review_before', false );

		foreach ( $properties as $item ) {
			if ( $item->post_status == 'publish' ) {
				continue;
			}

			if ( $review_before_publish && $item->post_status == 'draft' || ! $review_before_publish ) {
				wp_update_post( array(
					'ID'            => $item->ID,
					'post_status'   => 'publish',
				) );
			}
		}
	}

	/**
	 * Set property status for properties
	 *
	 * @access public
	 * @return void
	 */
	public static function check_properties() {
		if ( get_theme_mod( 'realia_submission_type' ) != 'packages' ) {
			return;
		}

		$options = array();
		$users = get_users( $options );

		foreach ( $users as $user ) {
			$query = Realia_Query::get_properties_by_user( $user->ID );

			$items = $query->posts;

			if ( count( $items ) == 0 ) {
				continue;
			}

			// Check if package is valid
			$is_package_valid = self::is_package_valid_for_user( $user->ID );

			if ( ! $is_package_valid ) {
				// Unpublish all properties
				self::unpublish_properties( $items );
			} else {
				// Get remaining posts available to create
				$remaining = self::get_remaining_properties_count_for_user( $user->ID );

				if ( 'unlimited' == $remaining || $remaining >= 0 ) {
					// Publish all properties
					self::publish_properties( $items );
				} else {
					// Publish available properties
					self::publish_properties( array_slice( $items, abs( $remaining ) , count( $items ) - abs( $remaining ) ) );

					// Unpublish abs(remaining) properties
					self::unpublish_properties( array_slice( $items, 0, abs( $remaining ) ) );
				}
			}
		}
	}
}

Realia_Packages::init();
