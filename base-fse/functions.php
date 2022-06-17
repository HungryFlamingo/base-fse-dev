<?php
/**
 * Base FSE - WordPress theme by Hungry Flamingo
 *
 * Theme functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BaseFse
 * @since 1.0.0
 */

// @codeCoverageIgnoreStart
defined( 'ABSPATH' ) || die(); // Avoid direct file access
// @codeCoverageIgnoreEnd


/** Load plugin src and deps via Composer */
require_once get_template_directory() . '/vendor/autoload.php';

/** Initialize theme utils */
$base_fse_utils = new \HungryFlamingo\BaseFse\Utils(
	'Base FSE',
	'base-fse',
	'1.0.0',
	get_template_directory() . '/',
	get_template_directory_uri() . '/'
);

\HungryFlamingo\BaseFse\ThemeInit::theme_init();

