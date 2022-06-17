<?php
namespace HungryFlamingo\WpFseBaseTheme;

// @codeCoverageIgnoreStart
defined( 'ABSPATH' ) || die(); // Avoid direct file access
// @codeCoverageIgnoreEnd

/**
 * Plugin utils for general plugin management and configuration
 */
class Utils {

	public static $theme_name;
	public static $theme_slug;
	public static $theme_slug_filtered;
	public static $theme_version;
	public static $theme_path;
	public static $theme_url;

	public function __construct( $name, $slug, $version, $path, $url ) {
		self::$theme_name          = $name;
		self::$theme_slug          = $slug;
		self::$theme_slug_filtered = str_replace( '-', '_', $slug );
		self::$theme_version       = $version;
		self::$theme_path          = $path;
		self::$theme_url           = $url;
	}


}
