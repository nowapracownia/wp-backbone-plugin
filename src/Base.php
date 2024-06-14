<?php
/**
 * Base.
 *
 * @package ThePlugin
 */

namespace ThePlugin;

use ThePlugin\Traits\Singleton;

final class Base {
	use Singleton;

	public function init(): void {
		$this->hooks();
		Admin::instance();
	}

	private function hooks(): void {
		$this->add_actions();
		$this->add_filters();
	}

	private function add_actions(): void {
	}

	private function add_filters(): void {
	}

	public static function get_template_part( $slug = null, $file = null, $data = array(), $path = ThePlugin_PATH ) {
		if ( is_null( $file ) || is_null( $slug ) ) {
			return false;
		}
		$slug = $path . $slug;
		$file = $file . '.php';

		$view = implode( '-', array( $slug, $file ) );

		if ( file_exists( $view ) ) {
			include( $view );
		} else {
			echo __( 'The view does not exist.', ThePlugin_TEXTDOMAIN );
		}
	}
}
