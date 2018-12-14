<?php
/**
 * Widget Instagram
 *
 * @package BlossomThemes
 */

// register BlossomThemes_Instagram_Widget widget
function btif_register_instagram_widget() {
    register_widget( 'BlossomThemes_Instagram_Widget' );
}
add_action( 'widgets_init', 'btif_register_instagram_widget' );
 
/**
 * Adds BlossomThemes_Instagram_Widget widget.
 */
class BlossomThemes_Instagram_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'btif_instagram_widget', // Base ID
            __( 'BlossomThemes: Instagram', 'blossomthemes-instagram-feed' ), // Name
            array( 'description' => __( 'A Instagram Widget that displays your latest Instagram photos.', 'blossomthemes-instagram-feed' ), ) // Args
        );
    }
    
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */   
    function widget( $args, $instance ) {

        $title              = empty( $instance['title'] ) ? '' : $instance['title'];
        $limit              = empty( $instance['number'] ) ? 6 : $instance['number'];
        $size               = empty( $instance['size'] ) ? 'img_thumb' : $instance['size'];
        $per_row            = empty( $instance['per_row'] ) ? 5 : $instance['per_row'];
        $options            = get_option( 'blossomthemes_instagram_feed_settings', true );
        $username           = empty( $instance['username'] ) ? $options['username'] : $instance['username'];
        $profile_link       = 'https://www.instagram.com/'.$username ;
        $profile_link_text  = 'Follow Me!';

        if( isset( $instance['profile_link_text'] ) && $instance['profile_link_text']!='' )
        {
            $profile_link_text = $instance['profile_link_text'];
        } 
        $meta = isset( $instance['meta'] ) ? 'true' : 'false';

        echo $args['before_widget'];

        if ( $title ) echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title'];
        if ( $username != '' ) 
        {   
            $ran = rand(1,100); $ran++;
            require_once BTIF_BASE_PATH . '/includes/vendor/InstagramSpider.php';
            ob_start();
            $obj =  new InstagramSpider;
            $photos_row = isset( $per_row ) ? esc_attr( $per_row ) :'5';
            $instaItems = $obj->getUserItems($username);
            add_filter('widget_text','do_shortcode');
            
            echo '<ul class="popup-gallery-'.$ran.' photos-'.$photos_row.'">';
            $i=0;
            if($instaItems)
            {
                foreach ($instaItems as $key) {
                    if( $i<$limit )
                    {
                        echo '<li><a href="'.esc_url($key['img_standard']).'"><img src="'.esc_url($key[$size]).'"></a>';
                        if( isset( $meta ) && $meta == 'true' )
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
                    $(".popup-gallery-'.$ran.'").magnificPopup({
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
                echo '<a class="profile-link" href="'.esc_url($profile_link).'" target="_blank">'.esc_attr($profile_link_text).'</a>';
                $output = ob_get_clean();
                echo $output;
            }
            else{
                echo '<b style="color:red;">'.__('Invalid or Private Username Used!','blossomthemes-instagram-feed').'</b>';
            }
            echo $args['after_widget'];
        }
    }
    
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    function form( $instance ) {
        $default = array( 
            'title'         => __( 'Instagram', 'blossomthemes-instagram-feed' ), 
            'number'        => 6, 
            'size'          => 'img_standard',
            'per_row'       => 5 
        );
        $instance = wp_parse_args( (array) $instance, $default );
        $options  = get_option( 'blossomthemes_instagram_feed_settings', true );
        $username           = empty( $instance['username'] ) ? $options['username'] : $instance['username'];
        $title              = empty( $instance['title'] ) ? '' : $instance['title'];
        $limit              = empty( $instance['number'] ) ? 6 : $instance['number'];
        $size               = empty( $instance['size'] ) ? 'img_standard' : $instance['size'];
        $per_row            = empty( $instance['per_row'] ) ? 5 : $instance['per_row'];
        $profile_link       = 'https://www.instagram.com/'.$username;
        $profile_link_text  = 'Follow Me!';
        if( isset( $instance['profile_link_text'] ) && $instance['profile_link_text']!='' )
        {
            $profile_link_text = $instance['profile_link_text'];
        }

        $meta               = !isset( $instance['meta'] ) ? '' : $instance['meta'];
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'blossomthemes-instagram-feed' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"><?php esc_html_e( 'Username', 'blossomthemes-instagram-feed' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>" type="text" value="<?php echo esc_attr( $username ); ?>" />
        </p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of photos', 'blossomthemes-instagram-feed' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" min="1" step="1" max="20" value="<?php echo esc_attr( $limit ); ?>" />
        </p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php esc_html_e( 'Photo size', 'blossomthemes-instagram-feed' ); ?></label>
            <select id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>" class="widefat">
                <option value="img_thumb" <?php selected( 'img_thumb', $size ) ?>><?php esc_html_e( 'Thumbnail', 'blossomthemes-instagram-feed' ); ?></option>
                <option value="img_low" <?php selected( 'img_low', $size ) ?>><?php esc_html_e( 'Small', 'blossomthemes-instagram-feed' ); ?></option>
                <option value="img_standard" <?php selected( 'img_standard', $size ) ?>><?php esc_html_e( 'Large', 'blossomthemes-instagram-feed' ); ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'per_row' ) ); ?>"><?php esc_html_e( 'Photos Per Row', 'blossomthemes-instagram-feed' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'per_row' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'per_row' ) ); ?>" type="number" min="1" max="5" step="1" value="<?php echo esc_attr( $per_row ); ?>" />
        </p>
        
        <p>
            <input type="checkbox" value="1" id="<?php echo esc_attr( $this->get_field_id( 'meta' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'meta' ) ); ?>" <?php if ( isset( $meta ) ) { checked( $meta, true );} ?>>
            <label for="<?php echo esc_attr( $this->get_field_id( 'meta' ) ); ?>"><?php esc_html_e( 'Display Comments/Likes', 'blossomthemes-instagram-feed' ); ?></label>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'profile_link_text' ) ); ?>"><?php esc_html_e( 'Profile Link Text', 'blossomthemes-instagram-feed' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'profile_link_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'profile_link_text' ) ); ?>" type="text" value="<?php echo esc_attr( $profile_link_text ); ?>" />
        </p>
        
        <?php
    }
    
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        
        $instance['title']        = strip_tags( $new_instance['title'] );
        $instance['number']       = ! absint( $new_instance['number'] ) ? 6 : $new_instance['number'];
        $instance['size']         = $new_instance['size'];
        $instance['per_row']      = ! absint( $new_instance['per_row'] ) ? 5 : $new_instance['per_row'];
        $instance['meta']         = $new_instance['meta'];
        $instance['profile_link'] = 'https://www.instagram.com/'.$username;
        $instance['username']     = $new_instance['username'] ;
        $instance['profile_link_text']     = $new_instance['profile_link_text'] ;

        return $instance;
    }
}
