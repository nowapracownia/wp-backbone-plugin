<?php
/**
 * Trait for a class to be used as a singleton instance.
 *
 * @package ThePlugin
 */

namespace ThePlugin\Traits;

trait Singleton {

	/**
	 * An instance of the object to prevent duplication.
	 *
	 * @var object|null Instance of object.
	 */
	protected static ?object $instance = null;

	/**
	 * Object constructor.
	 * Intentionally empty and protected.
	 */
	protected function __construct() {
	}

	/**
	 * Prevent the object from being cloned.
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', 'scb' ), '1.0.0' );
	}

	/**
	 * Grabs an instance of the object.
	 *
	 * @return object
	 */
	final public static function instance(): object {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
			if ( method_exists( self::$instance, 'init' ) ) {
				self::$instance->init();
			}
		}

		return self::$instance;
	}
}

