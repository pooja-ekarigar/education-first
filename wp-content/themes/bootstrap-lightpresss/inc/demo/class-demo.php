<?php
/**
 * Demo class
 *
 * @package Bootstrap Photo
 */

if ( ! class_exists( 'Bootstrap_Photo_Demo' ) ) {

	/**
	 * Main class.
	 *
	 * @since 1.0.0
	 */
	class Bootstrap_Photo_Demo {

		/**
		 * Singleton instance of Bootstrap_Photo_Demo.
		 *
		 * @var Bootstrap_Photo_Demo $instance Bootstrap_Photo_Demo instance.
		 */
		private static $instance;

		/**
		 * Configuration.
		 *
		 * @var array $config Configuration.
		 */
		private $config;

		/**
		 * Main Bootstrap_Photo_Demo instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $config Configuration array.
		 */
		public static function init( $config ) {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Bootstrap_Photo_Demo ) ) {
				self::$instance = new Bootstrap_Photo_Demo();
				if ( ! empty( $config ) && is_array( $config ) ) {
					self::$instance->config = $config;
					self::$instance->setup_actions();
				}
			}
		}

		/**
		 * Setup actions.
		 *
		 * @since 1.0.0
		 */
		public function setup_actions() {

			// Disable branding.
			add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

			// OCDI import files.
			add_filter( 'pt-ocdi/import_files', array( $this, 'ocdi_files' ), 99 );

			// OCDI after import.
			add_action( 'pt-ocdi/after_import', array( $this, 'ocdi_after_import' ) );
		}

		/**
		 * OCDI files.
		 *
		 * @since 1.0.0
		 */
		public function ocdi_files() {

			$ocdi = isset( $this->config['ocdi'] ) ? $this->config['ocdi'] : array();
			return $ocdi;
		}

		/**
		 * OCDI after import.
		 *
		 * @since 1.0.0
		 */
		public function ocdi_after_import() {

			$front_page_id = get_page_by_title( 'Home' );
			update_option( 'show_on_front', 'page' );

			update_option( 'page_on_front', $front_page_id->ID );

			foreach ( $pages as $option_key => $slug ) {
				$result = get_page_by_path( $slug );
				if ( $result ) {
					if ( is_array( $result ) ) {
						$object = array_shift( $result );
					} else {
						$object = $result;
					}

					update_option( $option_key, $object->ID );
				}
			}

			// Set menu locations.
			$menu_details = isset( $this->config['menu_locations'] ) ? $this->config['menu_locations'] : array();
			if ( ! empty( $menu_details ) ) {
				$nav_settings  = array();
				$current_menus = wp_get_nav_menus();

				if ( ! empty( $current_menus ) && ! is_wp_error( $current_menus ) ) {
					foreach ( $current_menus as $menu ) {
						foreach ( $menu_details as $location => $menu_slug ) {
							if ( $menu->slug === $menu_slug ) {
								$nav_settings[ $location ] = $menu->term_id;
							}
						}
					}
				}

				set_theme_mod( 'nav_menu_locations', $nav_settings );
			}
		}
	}

} // End if().
