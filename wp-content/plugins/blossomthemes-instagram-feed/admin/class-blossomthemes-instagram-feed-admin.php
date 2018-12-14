<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://blossomthemes.com
 * @since      1.0.0
 *
 * @package    Blossomthemes_Instagram_Feed
 * @subpackage Blossomthemes_Instagram_Feed/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Blossomthemes_Instagram_Feed
 * @subpackage Blossomthemes_Instagram_Feed/admin
 * @author     blossomthemes <info@blossomthemes.com>
 */
class Blossomthemes_Instagram_Feed_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Blossomthemes_Instagram_Feed_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Blossomthemes_Instagram_Feed_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/blossomthemes-instagram-feed-admin.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Blossomthemes_Instagram_Feed_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Blossomthemes_Instagram_Feed_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/blossomthemes-instagram-feed-admin.min.js', array( 'jquery' ), $this->version, false );

	}

   /**
	* Registers settings page for Social Share
	*
	* @since 1.0.0
	*/
	public function blossomthemes_instagram_feed_settings_page() {
		add_menu_page('BlossomThemes Instagram Feed', 'BlossomThemes Instagram Feed', 'manage_options', basename(__FILE__), array($this,'blossomthemes_instagram_feed_callback_function'), esc_url(BTIF_FILE_URL).'\admin\css\images\menu-icon.png');
	}

   /**
	* Registers settings.
	*
	* @since 1.0.0
	*/
	public function blossomthemes_instagram_feed_register_settings(){
	//The third parameter is a function that will validate input values.
		register_setting( 'blossomthemes_instagram_feed_settings', 'blossomthemes_instagram_feed_settings', '' );
	}

	/**
	* 
	* Retrives saved settings from the database if settings are saved. Else, displays fresh forms for settings.
	*
	* @since 1.0.0
	*/
	function blossomthemes_instagram_feed_callback_function() { 
		$blossom_themes_settings = new BlossomThemes_Instagram_Feed_Settings();
		$blossom_themes_settings->blossomthemes_instagram_feed_backend_settings();
	}
}
