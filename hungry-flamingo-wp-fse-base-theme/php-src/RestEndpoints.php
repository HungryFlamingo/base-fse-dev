<?php
namespace HungryFlamingo\WpFseBaseTheme;

// @codeCoverageIgnoreStart
defined( 'ABSPATH' ) || die(); // Avoid direct file access
// @codeCoverageIgnoreEnd


/**
 * Class for the plugin's admin REST API functionality
 */
class RestEndpoints {

	/**
	 * Initialization of admin REST API functionality for plugin
	 */
	public static function rest_init() {

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		} else {
			self::register_rest_routes();
		}
	}

	/**
	 * REST API permission callback. Only allowing admins.
	 */
	public static function permission_callback() {
		return current_user_can( 'manage_options' );
	}

	/**
	 * REST API Callback for get-affiliate-links endpoint
	 */
	public static function example_route( $request ) {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die();
		} else {

			$error = false;

			/** Retrieving the REST API data sent */
			$body_json = $request->get_param( 'data' );
			$body      = json_decode( $body_json, true );

			/** Retrieving the current affiliates stored in the DB */
			#$affiliates_json = get_option( Utils::$theme_slug_filtered . '_affiliates_json' );

			/** Check if any affiliate data stored already
			if ( false !== $affiliates_json && 1 < strlen( $affiliates_json ) ) {
				$response_data = $affiliates_json;
			} else {
				$response_data = null;
			} */

			/** Build response data */
			if ( false === $error ) {
				$response = array(
					'success' => true,
					'msg'     => '',
					#'data'    => $response_data,
				);
			} else {
				$response = array(
					'success' => false,
					'msg'     => $error,
					'data'    => null,
				);
			}

			return rest_ensure_response( $response );
		}
	}


	/**
	 * Registering routes to the REST API
	 */
	private static function register_rest_routes() {

		/** Register route example */
		register_rest_route(
			'hungry-flamingo/v1/' . Utils::$theme_slug,
			'example-route',
			array(
				'methods'             => \WP_REST_Server::READABLE,
				'callback'            => array( '\HungryFlamingo\WpFseBaseTheme\RestEndpoints', 'example_route' ),
				'permission_callback' => array( '\HungryFlamingo\WpFseBaseTheme\RestEndpoints', 'permission_callback' ),
			)
		);

	}
}
