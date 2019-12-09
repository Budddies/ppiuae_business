<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<section class="error-404 not-found">
					
					
		                <h1>404</h1>

		                <h4>Page Not Found</h4>

		                <h6>Please continue browsing!</h6>

		                <p>Check out our to find just what you're looking for or start over on our <a href="<?php echo site_url(); ?>">home page</a>. <br> We apologize for the inconvenience!</p>
	            	
				</section><!-- .error-404 -->
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
</div><!-- .wrap -->

<?php get_footer();
