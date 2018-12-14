<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Bootstrap Blog
 */

?>	<footer class="main">
		<div class="container-fluid">
		<?php dynamic_sidebar( 'footer-2' );  dynamic_sidebar( 'footer-4' ); ?>
		</div>
		<div class="container-fluid">
		<div style="border:1px solid white; margin-top: 38px; "></div>
		</div>
		<div class="container-fluid">
		<?php dynamic_sidebar( 'footer-3' );   ?>
		<div class="col-md-6">
			 <table class="social_footer">
			<tr>
				<td><img src="http://ekarigarclients.com/education-first/wp-content/uploads/2018/11/fb.jpg"/></td>
				<td><img src="http://ekarigarclients.com/education-first/wp-content/uploads/2018/11/insta.jpg"/></td>
				<td><img src="http://ekarigarclients.com/education-first/wp-content/uploads/2018/11/twi.jpg"/></td>
			</tr>
		 </table>
		</div>
		</div>
		<div class="container-fluid">
		<div class="col-md-6">
			<p class="all_right">@2018 YSA. All Rights Reserved.</p>
		</div>
		<div class="col-md-6">
		
		</div>
		
		</div>
		
	</footer>
		<!--<div class="copyright text-center">
			<?php esc_html_e( "Powered by", 'bootstrap-blog' ); ?> <a href="<?php echo esc_url( 'http://wordpress.org/' ); ?>"><?php esc_html_e( "WordPress", 'bootstrap-blog' ); ?></a> | <a href="<?php echo esc_url( 'https://thebootstrapthemes.com' ); ?>" target="_blank"><?php esc_html_e( 'Bootstrap Themes','bootstrap-blog' ); ?></a>
		</div>
		<div class="scroll-top-wrapper"> <span class="scroll-top-inner"><i class="fa fa-2x fa-angle-up"></i></span></div> -->
		
		<?php wp_footer(); ?>
 <script>
 document.getElementById("search-label").addEventListener("click", function(e) {
   if (e.target == this) {
     e.preventDefault();
     this.classList.toggle("clicked");
   }
 });
 </script>
	</body>
	
</html>