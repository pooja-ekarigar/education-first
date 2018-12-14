<form role="search" method="get" class="search-form form-inline margin_form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form-group"> <label>
        <span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'bootstrap-blog' ) ?></span>
        <input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_e( 'Search &hellip;', 'bootstrap-blog' ) ?>"
            value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_e( 'Search for:', 'bootstrap-blog' ) ?>" />
    </label></div>
      <div class="form-group"><input type="submit" class="search-submit form-control" value="<?php echo esc_attr_e( 'Search', 'bootstrap-blog' ) ?>" /></div>
</form>	
