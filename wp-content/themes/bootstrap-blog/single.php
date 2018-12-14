<?php
/**
 * The template for displaying all single posts.
 *
 * @package Bootstrap Blog
 */

get_header(); ?>

<div class="inside-page">
  <div class="container-fluid">
    <div class="row custom_main_div_post"> 

      <div class="col-sm-9">
        <section class="page-section ">
          <div class="detail-content">
            <?php while ( have_posts() ) : the_post(); ?>    
			<div class="margin_post_custom"><h2 class="margin_post_title"><?php echo the_title() ?></h2></div>
			
              <?php get_template_part( 'template-parts/content', 'single' ); ?>
             <p> Author: <?php echo the_author() ?></p>
            <?php endwhile; // End of the loop. ?>
            

          </div><!-- /.end of deatil-content -->
        </section> <!-- /.end of section -->  
      </div>

      <div class="col-sm-3"><?php get_sidebar(); ?></div>

    </div>
  </div>
</div>

<?php get_footer();