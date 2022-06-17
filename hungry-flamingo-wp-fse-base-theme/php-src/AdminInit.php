<?php
namespace HungryFlamingo\WpFseBaseTheme;

// @codeCoverageIgnoreStart
defined( 'ABSPATH' ) || die(); // Avoid direct file access
// @codeCoverageIgnoreEnd


class AdminInit {

	/**
	 * Initialize admin, enqueue scripts etc.
	 *
	 * @param void
	 * @return void
	 */
	public static function admin_init() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		} else {

			Enqueue::enqueue_admin_css();
			Enqueue::enqueue_admin_js();
			self::register_menu_pages();

		}
	}

	/**
	 * Register plugin backend menu pages
	 *
	 * @param void
	 * @return void
	 */
	private static function register_menu_pages() {
		 $admin_pages_obj = new AdminPages();

		/** load main menu content */
		if ( empty( $GLOBALS['admin_page_hooks']['hungry-flamingo'] ) ) {
			$menu_page = add_menu_page(
				__( 'Hungry Flamingo', 'hungry-flamingo' ),
				'Hungry Flamingo',
				'manage_options',
				'hungry-flamingo',
				array( $admin_pages_obj, 'init_pageblocks' ),
				Utils::$theme_url . 'assets/img/hungry-flamingo-icon.svg',
				null
			);
			add_action( "load-$menu_page", array( $admin_pages_obj, 'admin_notice_construct' ) );

			$submenu_page[1] = add_submenu_page(
				'hungry-flamingo',
				__( 'General - Hungry Flamingo', 'hungry-flamingo' ),
				'General',
				'manage_options',
				'hungry-flamingo',
				array( $admin_pages_obj, 'init_pageblocks' ),
				1
			);
			add_action( "load-$submenu_page[1]", array( $admin_pages_obj, 'admin_notice_construct' ) );
		}

		$submenu_page[2] = add_submenu_page(
			'hungry-flamingo',
			__( 'Theme options - Hungry Flamingo', Utils::$theme_slug ),
			'Theme options',
			'manage_options',
			Utils::$theme_slug,
			array( $admin_pages_obj, 'init_pageblocks' ),
			2
		);
		add_action( "load-$submenu_page[2]", array( $admin_pages_obj, 'admin_notice_construct' ) );
	}
}
