<?php 
/**
 *
 * Generate shortcode to show twitter feeds plugin
 *
 * @package    BlossomThemes_Instagram_Feed
 * @subpackage BlossomThemes_Instagram_Feed/includes
 * @author    blossomthemes
 */
class BlossomThemes_Instagram_Feed_Shortcodes
{
	public function init(){
		add_shortcode( 'blossomthemes_instagram_feed', array( $this, 'blossomthemes_instagram_feed_sc' ) );
	}

	function blossomthemes_instagram_feed_sc(){
		ob_start();
        $options = get_option( 'blossomthemes_instagram_feed_settings', true );

       	if( !isset( $options['username'] ) || $options['username'] == '' )
       	{
       		return;
       	}

		$obj = 	new InstagramSpider;
		$photos =  absint($options['photos']);
		$photo_size =  isset( $options['photo_size'] ) ? esc_attr( $options['photo_size'] ) :'img_thumb';
		$photos_row = isset( $options['photos_row'] ) ? esc_attr( $options['photos_row'] ) :'5';
		$instaUrl = 'https://www.instagram.com/';
		$instaUrl .= $options['username'];

		$instaItems = $obj->getUserItems($options['username']);
		$profile_link_text = isset( $options['follow_me'] ) ? esc_attr( $options['follow_me'] ):'Follow Me!';
		echo '<ul class="popup-gallery photos-'.$photos_row.'">';
		$i=0;
		if($instaItems)
		{
			foreach ($instaItems as $key) {
				if( $i<$photos )
				{
					echo '<li><a href="'.esc_url($key['img_standard']).'"><img src="'.esc_url($key[$photo_size]).'"></a>';
					if( isset( $options['meta'] ) )
					{	
						echo '<div class="instagram-meta"><span class="like"><i class="fa fa-heart"></i>'.$key['likes'].'</span>'.'<span class="comment"><i class="fa fa-comment"></i>'.$key['comments'].'</span>'.'</div>';
					}
					echo '</li>';
				}
				$i++;
			}
			echo '</ul>';
			echo 
	            '<script>
	            jQuery(document).ready(function($){
	                $(".popup-gallery").magnificPopup({
	                        delegate: "a",
	                      type: "image",
	                      gallery:{
	                        enabled:true
	                      }
	                    });

	                $(".popup-modal").magnificPopup({
	                    type: "inline",
	                    preloader: false,
	                    focus: "#username",
	                    modal: true
	                });
	                $(document).on("click", ".popup-modal-dismiss", function (e) {
	                    e.preventDefault();
	                    $.magnificPopup.close();
	                });
	            });
	            </script>';
	        echo ' <a class="profile-link" href="'.esc_url($instaUrl).'" target="_blank"><span class="insta-icon"><i class="fab fa-instagram"></i></span>'.esc_attr($profile_link_text).'</a>';
		 	$output = ob_get_clean();
		 	return $output;
		}
		else{
            echo '<b style="color:red;">'.__('Invalid or Private Username Used!','blossomthemes-instagram-feed').'</b>';
		}
	}
}
