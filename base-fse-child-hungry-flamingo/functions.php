<?php
/**
 * Base FSE CHILD - WordPress theme by Hungry Flamingo
 *
 * CHILD Theme functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BaseFse
 * @since 1.0.0
 */

// @codeCoverageIgnoreStart
defined( 'ABSPATH' ) || die(); // Avoid direct file access
// @codeCoverageIgnoreEnd



// Remove WP generated favicon entries
remove_action( 'wp_head', 'wp_site_icon', 99 );
remove_action( 'admin_head', 'wp_site_icon' );
remove_action( 'login_head', 'wp_site_icon', 99 );

/** Remove WP generator info */
remove_action( 'wp_head', 'wp_generator' );
function remove_wp_generator() {
	return ''; }
add_filter( 'the_generator', 'remove_wp_generator' );

/** Remove emojis */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
add_filter( 'emoji_svg_url', '__return_false' );
/** Remove feeds */
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );



/** Remove rsd, wlwmanifest */
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );

/** Remove shortlinks */
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'template_redirect', 'wp_shortlink_header', 11, 0 );




add_action( 'wp_head', 'base_fse_add_to_head' );
add_action( 'admin_head', 'base_fse_add_to_head' );
add_action( 'login_head', 'base_fse_add_to_head' );
function base_fse_add_to_head() {
	?>
	<link rel="apple-touch-icon" sizes="180x180" href="https://cdn.hungryflamingo.com/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="https://cdn.hungryflamingo.com/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="https://cdn.hungryflamingo.com/favicon/favicon-16x16.png">
	<link rel="manifest" href="https://cdn.hungryflamingo.com/favicon/site.webmanifest">
	<link rel="mask-icon" href="https://cdn.hungryflamingo.com/favicon/safari-pinned-tab.svg" color="#ff00ff">
	<link rel="shortcut icon" href="https://cdn.hungryflamingo.com/favicon/favicon.ico">
	<meta name="msapplication-TileColor" content="#ff00ff">
	<meta name="msapplication-config" content="https://cdn.hungryflamingo.com/favicon/browserconfig.xml">
	<meta name="theme-color" content="#ff00ff">
	<?php
}



/**
 * Remove jQuery migrate
 */
function dequeue_jquery_migrate( $scripts ) {
	if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
		$scripts->registered['jquery']->deps = array_diff(
			$scripts->registered['jquery']->deps,
			array( 'jquery-migrate' )
		);
	}
}
add_action( 'wp_default_scripts', 'dequeue_jquery_migrate' );

/**
 * Remove reference to Yoast in sourcecode
 */
add_filter( 'wpseo_debug_markers', '__return_false' );



add_theme_support( 'woocommerce' );

