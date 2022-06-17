<?php
namespace HungryFlamingo\BaseFse;

// @codeCoverageIgnoreStart
defined( 'ABSPATH' ) || die(); // Avoid direct file access
// @codeCoverageIgnoreEnd


class ThemeInit {

	/**
	 * Initialize admin, enqueue scripts etc.
	 *
	 * @param void
	 * @return void
	 */
	public static function theme_init() {

		/** Initialize frontend */
		if ( ! is_admin() ) {
			/** Enqueue frontend scripts and styles */
			add_action( 'wp_enqueue_scripts', array( '\HungryFlamingo\BaseFse\Enqueue', 'enqueue_frontend_css' ), 10 );
			add_action( 'wp_enqueue_scripts', array( '\HungryFlamingo\BaseFse\Enqueue', 'enqueue_frontend_js' ), 10 );
			add_action( 'admin_menu', array( '\HungryFlamingo\BaseFse\AdminInit', 'admin_init' ), 10 );
		}

		/** Initialize backend */
		if ( is_admin() ) {
			add_action( 'admin_menu', array( '\HungryFlamingo\BaseFse\AdminInit', 'admin_init' ), 10 );
		}

		/** Register theme supports */
		add_action( 'after_setup_theme', array( '\HungryFlamingo\BaseFse\ThemeInit', 'register_theme_supports' ), 10 );

		/** Init REST API customizations */
		add_action( 'rest_api_init', array( '\HungryFlamingo\BaseFse\RestEndpoints', 'rest_init' ), 10 );
		add_action( 'rest_api_init', array( '\HungryFlamingo\BaseFse\AdminRestEndpoints', 'admin_rest_init' ), 10 );

		/** Register custom settings */
		add_action( 'admin_init', array( '\HungryFlamingo\BaseFse\ThemeInit', 'register_settings' ), 10 );
		add_action( 'rest_api_init', array( '\HungryFlamingo\BaseFse\ThemeInit', 'register_settings' ), 10 );

	}

	public static function register_settings() {

		#register_setting( Utils::$plugin_slug_filtered, Utils::$plugin_slug_filtered . '_affiliates_json' );
	}

	public static function register_theme_supports() {

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );

		add_theme_support( 'custom-line-height' );

		add_theme_support( 'responsive-embeds' );

		add_theme_support( 'custom-spacing' );

		add_theme_support( 'editor-styles' );

		//add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

	}
}
