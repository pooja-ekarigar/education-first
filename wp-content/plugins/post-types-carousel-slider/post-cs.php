<?php
   /*
   Plugin Name: Post Carousel & Slider
   Plugin URI: http://aeonian.in/post-carousel-slider/
   Description: By using this plugin you can display posts OR custom posts as a slider OR carousel. Next and Previous post data come by Ajax.
   Version: 1.0.3
   Author: Aeonian
   Author URI: http://aeonian.in/
   Text Domain: post-carousel-and-slider
   License: GPLv2
   */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class postcsCls {

	public function __construct() {
		/*Admin functionality*/
		require_once(dirname(__FILE__) . '/includes/admin.php');

		/*Css & Js*/
		require_once(dirname(__FILE__) . '/includes/css_js.php');

		/*Shortcode*/
		require_once(dirname(__FILE__) . '/includes/shortcode.php');

      /*Front functionality*/
      require_once(dirname(__FILE__) . '/includes/front.php');
	}
	
   /*General Functions*/
   /*Convert string to variable*/
   public function get_inbetween_strings($start, $end, $str) {
       $matches = array();
       $regex = "/$start([a-zA-Z0-9_|-]*)$end/";
       preg_match_all($regex, $str, $matches);
       return $matches[1];
   }

   /*Custom get_the_excerpt func*/
   public function postcs_the_excerpt($charlength) {
      $excerpt = get_the_excerpt();
      $charlength++;
      if ( mb_strlen( $excerpt ) > $charlength ) {
         $subex = mb_substr( $excerpt, 0, $charlength - 5 );
         $exwords = explode( ' ', $subex );
         $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
         if ( $excut < 0 ) {
            $return_val = mb_substr( $subex, 0, $excut );
         } else {
            $return_val = $subex;
         }
         $return_val .= '...';
      } else {
         $return_val = $excerpt;
      }
      return $return_val;
   }

}

$postcsCls = New postcsCls;