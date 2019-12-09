<?php
/*
 Template Name: Product-single-Template
 */
get_header(); ?>
<div id="ppiuae-main-content" class="ppiuae-content-area">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php
				while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>">
						<div class="ppiuae-wrap">
							<div class="entry-content">
								   <?php echo do_shortcode( get_the_content() );?>
							</div><!-- .entry-content -->
						</div><!-- .wrap -->
					</article><!-- #post-## -->
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div><!-- #primary -->
<?php get_footer();
