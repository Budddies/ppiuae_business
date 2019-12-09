<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */
?>
		</div><!-- #content -->
		<section class="footer-call-action">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4">
						<?php
							if ( is_active_sidebar( 'footer-ask-quote' ) ) {
								dynamic_sidebar( 'footer-ask-quote' );
							}
						?>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4">
						<?php
							if ( is_active_sidebar( 'footer-call' ) ) {
								dynamic_sidebar( 'footer-call' );
							}
						?>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4">
						<?php
							if ( has_nav_menu( 'social' ) ) : ?>
							<nav class="cft-social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'social',
										'menu_class'     => 'social-links-menu',
										'depth'          => 1,
										'link_before'    => '<span class="screen-reader-text">',
										'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
									) );
								?>
							</nav>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
		<footer id="ppiuae-footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4">
						<?php
							if ( is_active_sidebar( 'footer-desc' ) ) {
								dynamic_sidebar( 'footer-desc' );
							}
						?>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="footer-nav">
							<h5>Quick Links</h5>
							<?php wp_nav_menu(array( 'menu' => 'Footer Menu' ) ); ?>
						</div>
						<div class="footer-social-link">
							<h5>Stay Connected</h5>
							<?php
							if ( has_nav_menu( 'social' ) ) : ?>
							<nav class="cft-social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'social',
										'menu_class'     => 'social-links-menu',
										'depth'          => 1,
										'link_before'    => '<span class="screen-reader-text">',
										'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
									) );
								?>
							</nav>
						<?php endif; ?>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4">
						<h5>Contact Us</h5>
						<?php
							if ( is_active_sidebar( 'footer-contact' ) ) {
								dynamic_sidebar( 'footer-contact' );
							}
						?>
					</div>
				</div>
			</div>			
		</footer>
		<section id="copyright-sec">
				<div class="container">
					<div class="row">
				   <div class="col-lg-12 col-md-12 col-sm-12">
				    	<div class="leftside">Copyright © <?php echo date('Y');?> PINNACLE, All Rights Reserved Designed & Developed by <a href="https://inventmedia.ae/" target="_blank">Inventmedia</a>.</div>
					</div>
				</div>
				</div>
		</section>		
	</div>
</div><script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=61ac17a6-107b-4f01-abb8-6de939fc8e75"> </script>
<?php wp_footer(); ?>
</body>
</html>
