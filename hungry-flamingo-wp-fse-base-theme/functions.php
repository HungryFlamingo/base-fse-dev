<?php
/**
 * Hungry Flamingo WP FSE Base Theme functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package HungryFlamingoWpFseBaseTheme
 * @since 1.0.0
 */

// @codeCoverageIgnoreStart
defined( 'ABSPATH' ) || die(); // Avoid direct file access
// @codeCoverageIgnoreEnd


/** Load plugin src and deps via Composer */
require_once get_template_directory() . '/vendor/autoload.php';

/** Initialize theme utils */
$hf_wpfse_utils = new \HungryFlamingo\WpFseBaseTheme\Utils(
	'Hungry Flamingo WP FSE Base Theme',
	'hungry-flamingo-wp-fse-base-theme',
	'1.0.0',
	get_template_directory() . '/',
	get_template_directory_uri() . '/'
);

\HungryFlamingo\WpFseBaseTheme\ThemeInit::theme_init();

