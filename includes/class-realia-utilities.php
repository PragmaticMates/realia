<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Realia_Utilities
 *
 * @class Realia_Utilities
 * @package Realia/Classes
 * @author Pragmatic Mates
 */
class Realia_Utilities {
	/**
	 * Checks if PayPal is enabled
	 *
	 * @access public
	 * @return bool
	 */
	public static function is_paypal_enabled() {
		$client_id = get_theme_mod( 'realia_paypal_client_id', null );
		$client_secret = get_theme_mod( 'realia_paypal_client_secret', null );

		if ( ! empty( $client_id ) && ! empty( $client_secret ) ) {
			return true;
		}
		return false;
	}

	/**
	 * Function checks if the user is signed in and if there is ID attribute
	 * in $_GET, check if the current user is owner.
	 *
	 * @access public
	 * @return void
	 */
	public static function protect() {
		if ( ! is_user_logged_in() ) {
			$login_required_page = get_theme_mod( 'realia_general_login_required_page', null );

			if ( ! empty( $login_required_page ) ) {
				wp_redirect( get_permalink( $login_required_page ) );
			} else {
				$_SESSION['messages'][] = array( 'warning', __( 'Please sign in before accessing this page.', 'realia' ) );
				wp_redirect( '/' );
			}

			exit();
		}

		if ( ! empty( $_GET['id'] ) ) {
			$post = get_post( $_GET['id'] );

			if ( $post->post_author != get_current_user_id() ) {
				$_SESSION['messages'][] = array( 'warning', __( 'You are not allowed to access this page.', 'realia' ) );
				wp_redirect( '/' );
				exit();
			}
		}
	}

	/**
	 * Checks if user allowed to remove post
	 *
	 * @access public
	 * @param $user_id int
	 * @param $item_id int
	 * @return bool
	 */
	public static function is_allowed_to_remove( $user_id, $item_id ) {
		$item = get_post( $item_id );

		if ( ! empty( $item->post_author ) ) {
			if ( $item->post_author == $user_id ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Gets link for login
	 *
	 * @access public
	 * @return bool|string
	 */
	public static function get_link_for_login() {
		$login_required_page = get_theme_mod( 'realia_general_login_required_page', null );

		if ( ! empty( $login_required_page ) ) {
			return get_permalink( $login_required_page );
		}

		return false;
	}

	/**
	 * Makes multi dimensional array
	 *
	 * @access public
	 * @param $input array
	 * @return array
	 */
	public static function array_unique_multidimensional( $input ) {
		$serialized = array_map( 'serialize', $input );
		$unique = array_unique( $serialized );
		return array_intersect_key( $input, $unique );
	}

	/**
	 * Custom implementation of media_sideload_image. Function returns
	 * image ID instead of image formatted <img> tag.
	 *
	 * @access public
	 * @param $file string
	 * @param $post_id int
	 * @param $desc string|null
	 * @return int
	 */
	public static function media_sideload_image( $file, $post_id, $desc = null ) {
		if ( ! empty( $file ) ) {
			// Set variables for storage, fix file filename for query strings.
			preg_match( '/[^\?]+\.(jpe?g|jpe|gif|png)\b/i', $file, $matches );
			$file_array = array();
			$file_array['name'] = basename( $matches[0] );

			// Download file to temp location.
			$file_array['tmp_name'] = download_url( $file );

			// If error storing temporarily, return the error.
			if ( is_wp_error( $file_array['tmp_name'] ) ) {
				return $file_array['tmp_name'];
			}

			// Do the validation and storage stuff.
			$id = media_handle_sideload( $file_array, $post_id, $desc );

			// If error storing permanently, unlink.
			if ( is_wp_error( $id ) ) {
				unlink( $file_array['tmp_name'] );
				return $id;
			}

			$src = wp_get_attachment_url( $id );
		}

		// Finally check to make sure the file has been saved, then return the HTML.
		if ( ! empty( $id ) ) {
			return $id;
		}
	}
}
