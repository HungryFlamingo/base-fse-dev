<?php
namespace HungryFlamingo\WpFseBaseTheme;

// @codeCoverageIgnoreStart
defined( 'ABSPATH' ) || die(); // Avoid direct file access
// @codeCoverageIgnoreEnd

/**
 * Enqueue scripts and styles for the plugin
 */
class Enqueue {

	/**
	 * Enqueue CSS for plugin frontend
	 *
	 * @param void
	 * @return void
	 */
	public static function enqueue_frontend_css() {
		wp_enqueue_style(
			Utils::$theme_slug,
			Utils::$theme_url . 'assets/frontend/build/' . Utils::$theme_slug . '-frontend.css',
			null,
			Utils::$theme_version
		);
	}

	/**
	 * Enqueue JS for plugin frontend
	 *
	 * @param void
	 * @return void
	 */
	public static function enqueue_frontend_js() {

		$script_meta = array(
			'dependencies' => null,
			'version'      => '0',
		);

		if ( file_exists( Utils::$theme_path . 'assets/frontend/build/' . Utils::$theme_slug . '-frontend.min.asset.php' ) ) {
			$script_meta = require Utils::$theme_path . 'assets/frontend/build/' . Utils::$theme_slug . '-frontend.min.asset.php';
		}

		wp_enqueue_script(
			Utils::$theme_slug . '-frontend',
			Utils::$theme_url . 'assets/frontend/build/' . Utils::$theme_slug . '-frontend.min.js',
			$script_meta['dependencies'],
			Utils::$theme_version . '.' . $script_meta['version'],
			true
		);

		wp_localize_script(
			Utils::$theme_slug . '-frontend',
			'wpEnv',
			array(
				'_wp_ajax_url'     => admin_url( 'admin-ajax.php' ),
				'_wpnonce'         => wp_create_nonce( Utils::$theme_slug . '-nonce' ),
				'_wp_http_referer' => wp_get_referer(),
				'baseurl'          => get_bloginfo( 'wpurl' ),
				'basepath'         => parse_url( get_bloginfo( 'wpurl' ), PHP_URL_PATH ),
				'public_path'      => Utils::$theme_url . '/assets/frontend/build/',
			)
		);
	}


	/**
	 * Enqueue CSS for plugin admin backend
	 *
	 * @param void
	 * @return void
	 */
	public static function enqueue_admin_css() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die();
		} else {
			/** Enqueue general theme admin CSS */
			wp_enqueue_style(
				Utils::$theme_slug . '-admin',
				Utils::$theme_url . 'assets/admin/build/' . Utils::$theme_slug . '-admin.css',
				null,
				Utils::$theme_version
			);

			/** Enqueue theme editor styles */
			add_editor_style( 'editor-style.css' );
		}
	}

	/**
	 * Enqueue JS for plugin admin backend
	 *
	 * @param void
	 * @return void
	 */
	public static function enqueue_admin_js() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die();
		} else {

			$allowed_admin_pages = array(
				'hungry-flamingo',
				'hungry-flamingo-wp-fse-base-theme',
			);

			$plugin_page = sanitize_key( $_GET['page'] );

			/** Restrict plugin JS to only allowed pages */
			if ( false === array_search( $plugin_page, $allowed_admin_pages, true ) ) {
				$plugin_page = '';
				return;
			}

			$script_meta = array(
				'dependencies' => null,
				'version'      => '0',
			);

			if ( file_exists( Utils::$theme_path . 'assets/admin/build/' . Utils::$theme_slug . '-admin.min.asset.php' ) ) {
				$script_meta = require Utils::$theme_path . 'assets/admin/build/' . Utils::$theme_slug . '-admin.min.asset.php';
			}

			wp_enqueue_script(
				Utils::$theme_slug . '-admin',
				Utils::$theme_url . 'assets/admin/build/' . Utils::$theme_slug . '-admin.min.js',
				$script_meta['dependencies'],
				Utils::$theme_version . '.' . $script_meta['version'],
				true
			);

			wp_localize_script(
				Utils::$theme_slug . '-admin',
				'wpEnv',
				array(
					'_wp_ajax_url'     => esc_url_raw( admin_url( 'admin-ajax.php' ) ),
					'_wp_rest_url'     => esc_url_raw( rest_url() ),
					'_wpnonce'         => esc_attr( wp_create_nonce( Utils::$theme_slug . '-nonce' ) ),
					'_wp_rest_nonce'   => esc_attr( wp_create_nonce( 'wp_rest' ) ),
					'_wp_http_referer' => esc_url( wp_get_referer() ),
					'theme_slug'       => esc_attr( Utils::$theme_slug ),
					'admin_page'       => esc_attr( $plugin_page ),
					'baseurl'          => esc_url( get_bloginfo( 'wpurl' ) ),
					'basepath'         => esc_url( parse_url( get_bloginfo( 'wpurl' ), PHP_URL_PATH ) ),
					'public_path'      => esc_url( Utils::$theme_url . '/assets/admin/build/' ),
				)
			);
		}
	}
}

