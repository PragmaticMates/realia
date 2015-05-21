<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Realia_Template_Loader
 *
 * @class Realia_Template_Loader
 * @package Realia/Classes
 * @author Pragmatic Mates
 */
class Realia_Template_Loader {
	/**
	 * Initialize template loader
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {
		add_filter( 'template_include', array( __CLASS__, 'templates' ) );
	}

	/**
	 * Default templates
	 *
	 * @access public
	 * @param $template
	 * @return string
	 * @throws Exception
	 */
	public static function templates( $template ) {
		$post_type = get_post_type();
		$custom_post_types = array( 'property', 'agency', 'agent' );

        if ( in_array( $post_type, $custom_post_types ) ) {
            if ( is_archive() ) {
                return self::locate('archive-' . $post_type);
            }

            if ( is_single() ) {
                return self::locate('single-' . $post_type);
            }
        }

		return $template;
	}

    /**
     * Gets template path
     *
     * @access public
     * @param $name
     * @return string
     * @throws Exception
     */
    public static function locate( $name ) {
        $template = '';

        // Current theme base dir
        if ( ! empty( $name ) ) {
            $template = locate_template( "{$name}.php" );
        }

        // Child theme
        if ( ! $template && ! empty( $name ) && file_exists( get_stylesheet_directory() . "/templates/{$name}.php" ) ) {
            $template = get_stylesheet_directory() . "/templates/{$name}.php";
        }

        // Original theme
        if ( ! $template && ! empty( $name ) && file_exists( get_template_directory() . "/templates/{$name}.php" ) ) {
            $template = get_template_directory() . "/templates/{$name}.php";
        }

        // Plugin
        if ( ! $template && ! empty( $name ) && file_exists( REALIA_DIR . "/templates/{$name}.php" ) ) {
            $template = REALIA_DIR . "/templates/{$name}.php";
        }

        // Nothing found
        if ( empty( $template ) ) {
            throw new Exception( "Template {$name}.php not found." );
        }

        return $template;
    }

    /**
     * Loads template content
     *
     * @param string $name
     * @param array $args
     * @return string
     * @throws Exception
     */
    public static function load( $name, $args = array() ) {
        if ( is_array( $args ) && count( $args ) > 0 ) {
            extract( $args, EXTR_SKIP );
        }

        $path = self::locate( $name );
        ob_start();
        include $path;
        $result = ob_get_contents();
        ob_end_clean();
        return $result;
    }
}

Realia_Template_Loader::init();