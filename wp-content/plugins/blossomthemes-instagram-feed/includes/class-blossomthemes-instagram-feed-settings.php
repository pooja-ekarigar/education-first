<?php
/**
 * Settings section of the plugin.
 *
 * Maintain a list of functions that are used for settings purposes of the plugin
 *
 * @package    BlossomThemes_Instagram_Feed
 * @subpackage BlossomThemes_Instagram_Feed/includes
 * @author    blossomthemes
 */
class BlossomThemes_Instagram_Feed_Settings
{
    function blossomthemes_instagram_feed_backend_settings()
    {
        
        ?>
        <div class="wrap btif-wrap">
            <?php if (isset($_GET['settings-updated']) && esc_attr($_GET['settings-updated']) == 'true'){ ?>
            <div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"> 
                <p><strong><?php _e('Settings updated.','blossomthemes-instagram-feed');?></strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php _e('Dismiss this notice.','blossomthemes-instagram-feed');?></span></button>
            </div>
            <?php } ?>
            <div class="btif-header">
                <h3><?php _e( 'BlossomThemes Instagram Feed', 'blossomthemes-notification-bars' ); ?></h3>
            </div>
        <div class="btif-inner-wrap">
            <h2 class="nav-tab-wrapper">
                <a href="#" class="btss-tab-trigger nav-tab nav-tab-active" data-configuration="general"><?php _e('General','blossomthemes-instagram-feed');?></a>
                <a href="#" class="btss-tab-trigger nav-tab" data-configuration="usage"><?php _e('Usage','blossomthemes-instagram-feed');?></a>
            </h2>  
            <form method="post" action="options.php" class="btif-settings-form">
                <?php
                $options = get_option( 'blossomthemes_instagram_feed_settings', true );
                $size = isset( $options['photo_size'] ) ? esc_attr( $options['photo_size'] ):'img_thumb';
                ?>
                <div class="blossomthemes-instagram-feed-settings general" id="blossomthemes-instagram-feed-settings-general">
                    <div class="btif-option-field-wrap">
                        <label for="blossomthemes_instagram_feed_settings[username]"><?php _e('Username', 'blossomthemes-instagram-feed'); ?></label>
                        <input id="blossomthemes_instagram_feed_settings[username]" name="blossomthemes_instagram_feed_settings[username]" type="text" value="<?php echo isset( $options['username'] ) ? esc_attr( $options['username'] ):''; ?>">
                    </div>
                    <div class="btif-option-field-wrap">
                        <label for="blossomthemes_instagram_feed_settings[photos]"><?php _e('Number of Photos', 'blossomthemes-instagram-feed'); ?></label>
                        <input min="1" max="20" id="blossomthemes_instagram_feed_settings[photos]" name="blossomthemes_instagram_feed_settings[photos]" type="number" value="<?php echo isset( $options['photos'] ) ? esc_attr( $options['photos'] ):'10'; ?>">
                    </div>
                    <div class="btif-option-field-wrap">
                        <label for="blossomthemes_instagram_feed_settings[photo_size]"><?php esc_html_e( 'Photo size', 'blossomthemes-instagram-feed' ); ?></label>
                        <select id="blossomthemes_instagram_feed_settings[photo_size]" name="blossomthemes_instagram_feed_settings[photo_size]">
                            <option value="img_thumb" <?php selected( 'img_thumb', $size ) ?>><?php esc_html_e( 'Thumbnail', 'blossomthemes-instagram-feed' ); ?></option>
                            <option value="img_low" <?php selected( 'img_low', $size ) ?>><?php esc_html_e( 'Small', 'blossomthemes-instagram-feed' ); ?></option>
                            <option value="img_standard" <?php selected( 'img_standard', $size ) ?>><?php esc_html_e( 'Large', 'blossomthemes-instagram-feed' ); ?></option>
                        </select>
                    </div>
                    <div class="btif-option-field-wrap">
                        <label for="blossomthemes_instagram_feed_settings[follow_me]"><?php _e('Profile Link Text', 'blossomthemes-instagram-feed'); ?></label>
                        <input id="blossomthemes_instagram_feed_settings[follow_me]" name="blossomthemes_instagram_feed_settings[follow_me]" type="text" value="<?php echo isset( $options['follow_me'] ) ? esc_attr( $options['follow_me'] ):'Follow Me!'; ?>">
                    </div>
                    <div class="btif-option-field-wrap">
                    <label for="likes-comments"><?php _e( 'Show Likes/Comments', 'blossomthemes-instagram-feed' ); ?></label>
                            <input type="checkbox" value="1" id="likes-comments" name="blossomthemes_instagram_feed_settings[meta]" <?php
                            if ( isset( $options['meta'] ) ) {
                                checked( $options['meta'], true );
                            }
                            ?>>
                    </div>
                </div>
                <div class="blossomthemes-instagram-feed-settings usage" id="blossomthemes-instagram-feed-settings-usage">
                    <?php $custom_id = get_the_ID(); ?>
                    <h4><?php _e( 'Uses', 'blossomthemes-instagram-feed' ); ?></h4>
                    <div class="wp-tm-settings-wrapper">
                    <h4 class="wp-tm-setting-title"><?php _e('Display via Shortcode','blossomthemes-instagram-feed');?></h4>
                        <div class="wp-tm--option-wrapper">
                            <div class="wp-tm-option-field">
                                <label class="wp-tm-plain-label">
                                    <div class="tm-option-side-note"> <?php _e('Copy this Shortcode to display your instagram gallery in pages/posts => ') ?><br>
                                    <input type="text" readonly="readonly" class="shortcode-usage" value="[blossomthemes_instagram_feed]" >
                                    </div>
                                </label>
                            </div>
                        </div>
                    <h4 class="wp-tm-setting-title"><?php _e('Display via PHP Function','blossomthemes-instagram-feed');?></h4>
                        <div class="wp-tm--option-wrapper">
                           <div class="wp-tm-option-field">
                                 <label class="wp-tm-plain-label">
                                    <div class="tm-option-side-note"> <?php _e('Copy the PHP Function below to display your instagram gallery in templates :') ?> <br>
                                    <textarea rows="2" cols="50" name="shortcode-function" readonly="readonly">&lt;?php echo do_shortcode("[blossomthemes_instagram_feed]"); ?&gt; </textarea>
                                    </div>
                                </label>

                            </div>
                        </div>
                    </div>
                </div>
                <?php $nonce = wp_create_nonce( 'blossomthemes-instagram-feed-nonce' ); ?>
                <input type="hidden" name="blossomthemes-instagram-feed-nonce" value="<?php echo $nonce; ?>">
                <div class="blossomthemes-instagram-feed-settings-submit">
                    <?php
                    settings_fields( 'blossomthemes_instagram_feed_settings' );
                    do_settings_sections( __FILE__ );
                    echo submit_button();
                    ?>
                </div>
            </form>
        </div>
            <?php include(BTIF_BASE_PATH . '/includes/template/backend/sidebar.php'); ?>
        </div>
<?php 
    }
}
new BlossomThemes_Instagram_Feed_Settings;
