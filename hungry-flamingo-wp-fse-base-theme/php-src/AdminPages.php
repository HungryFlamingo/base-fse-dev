<?php
namespace HungryFlamingo\WpFseBaseTheme;

// @codeCoverageIgnoreStart
defined( 'ABSPATH' ) || die(); // Avoid direct file access
// @codeCoverageIgnoreEnd


/**
 * Class for plugin admin tab content
 *
 */
class AdminPages {

	/**
	 * Load admin pages content
	 *
	 * @param void
	 * @return void
	 * */
	public function init_pageblocks() {

		if ( ! current_user_can( 'manage_options' ) ) {

			wp_die();
		} else {
			$page = sanitize_text_field( $_GET['page'] );

			/**
			 * Load pageblock: preheader (wrapper)
			 * */
			$this->load_pageblock_preheader();

			/**
			 * Load pageblock: header
			 * */
			$this->load_pageblock_header( $page );

			/**
			 * Load pageblock: content
			 * */
			$this->load_pageblock_content( $page );

			/**
			 * Load pageblock: footer
			 * */
			$this->load_pageblock_footer();
		}

	}

	/**
	 * Loading the preheader (wrapper).
	 *
	 * @param void
	 * @return void
	 */
	private function load_pageblock_preheader() {

		echo "<div class='wrap hungry-flamingo-wrapper hungry_flamingo'>";

		echo '<h1>' . esc_html( get_admin_page_title() ) . '</h1>';
		echo '<div class="hungry_flamingo_admin_header">';
		echo '<img src="' . esc_attr( Utils::$theme_url . 'assets/img/hungry-flamingo-full-white.svg' ) . '" alt="Hungry Flamingo" />';
		echo '</div>';
	}

	/**
	 * Loading the page header.
	 *
	 * @param string $page
	 * @return void
	 */
	private function load_pageblock_header( $page ) {

		$baseurl = remove_query_arg( 'notice', esc_url_raw( $_SERVER['REQUEST_URI'] ) );

	}

	/**
	 * Loading the description block.
	 *
	 * @param string $text
	 * @return void
	 */
	private function load_pageblock_description( $text ) {

		if ( $text ) {

			echo '<div class="hungry_flamingo_admin_pb_description">';
			echo '<p>';

			echo esc_attr( $text );

			echo '</p>';
			echo '</div>';
		}
	}

	/**
	 * Loading the main content block.
	 *
	 * @param void
	 * @return void
	 */
	private function load_pageblock_content( $page ) {

		echo '<div id="' . esc_attr( Utils::$theme_slug . '-admin-page' ) . '"></div>';
	}

	/**
	 * Loading the page footer.
	 *
	 * @param void
	 * @return void
	 */
	private function load_pageblock_footer() {

		echo '<div class="hungry_flamingo_admin_footer">';
		echo '<p>';
		echo '<a href="https://hungryflamingo.com" target="_blank" style="text-decoration:none;">Hungry Flamingo</a>. Made with passion in Berlin.';
		echo '</p>';
		echo '</div>';

		echo '</div>'; // close wrapper div

	}

	/**
	 * Loading admin notices.
	 *
	 * @param void
	 * @return void
	 */
	public function admin_notice_construct() {

		if ( ! current_user_can( 'manage_options' ) ) {

			return;

		} else {

			if ( isset( $_GET['notice'] ) ) {
				switch ( sanitize_text_field( $_GET['notice'] ) ) {
					case ( 'saved' ):
						$notice = 'Saved';
						$type   = 'notice-success';
						break;
					case ( 'deleted' ):
						$notice = 'Deleted';
						$type   = 'notice-warning';
						break;
					case ( 'failed' ):
						$notice = 'Failed';
						$type   = 'notice-error';
						break;
					case ( 'info' ):
						$notice = 'INFO';
						$type   = 'notice-info';
						break;
					default:
						$notice = false;
				}
			} elseif ( isset( $_GET['settings-updated'] ) ) {
				switch ( sanitize_text_field( $_GET['settings-updated'] ) ) {
					case ( 'true' ):
						$notice = 'Saved';
						$type   = 'notice-success';
						break;
					default:
						$notice = false;
				}
			} else {
				return;
			}

			if ( $notice ) {
				add_action(
					'all_admin_notices',
					function() use ( $notice, $type ) {
						$this->admin_notice_render( $notice, $type );
					},
					10
				);
			}
		}
	}

	/**
	 * Rendering admin notices.
	 *
	 * @param string $notice
	 * @param string $type
	 * @return void
	 */
	private function admin_notice_render( $notice, $type ) {

		echo '<div class="notice ' . esc_attr( $type ) . ' is-dismissible hungry-flamingo-notice">
		<p>' . esc_html( $notice ) . '</p></div>';

	}

	// End class.
}
