<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
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
								<?php the_content(); ?>
							</div><!-- .entry-content -->
						</div><!-- .wrap -->
					</article><!-- #post-## -->
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div><!-- #primary -->
<?php get_footer();
