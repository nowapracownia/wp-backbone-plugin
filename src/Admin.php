<?php
/**
 * Admin.
 *
 * @package ThePlugin
 */

namespace ThePlugin;

use ThePlugin\Traits\Singleton;

final class Admin {
	use Singleton;

	public function init(): void {
		$this->hooks();
	}

	private function hooks(): void {
		$this->add_actions();
		$this->add_filters();
	}

	private function add_actions(): void {
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts_and_styles' ) );
	}

	private function add_filters(): void {
	}

	public function admin_scripts_and_styles( $hook ) {
		$load_selectively = false;

		if ( $load_selectively && 'hook-slug' !== $hook ) {
			return;
		}

  		wp_enqueue_media();
		wp_enqueue_style('the_plugin_base_admin_styles', THE_PLUGIN_URL . 'assets/css/admin.css', array(), time() );
		wp_enqueue_script('the_plugin_base_admin_scripts', THE_PLUGIN_URL . 'assets/js/admin.js', array(), time() );
	}

	/**
	 * Gets the request parameter.
	 *
	 * @param      string  $key      The query parameter
	 * @param      string  $default  The default value to return if not found
	 *
	 * @return     string  The request parameter.
	 */
	public static function get_request_param( $key, $default = false ) {
		if ( ! isset( $_REQUEST[ $key ] ) || empty( $_REQUEST[ $key ] ) ) {
			return $default;
		}

		return strip_tags( (string) wp_unslash( $_REQUEST[ $key ] ) );
	}
}
