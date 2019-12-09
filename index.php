<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>
<section id="blog-list-sec">
	<div class="container">
	<div class="content-area col-sm-8 latest-news">
		<div class="row">
			<?php
			if ( have_posts() ) : 
				while ( have_posts() ) : the_post();
					?>
						<div class="col-sm-6">
							<div class="latest-news-post">
								<?php if ( has_post_thumbnail()) { 
										echo get_the_post_thumbnail(get_the_ID(),'home-blog-image'); } 
									else { 
									     echo '<img src="'.get_stylesheet_directory_uri().'/images/blog-banner-358x173.png" />'; 
									} ?>
									<div class="newpost">
										 <div class="news-date">
											<h3><?php echo date('j M, Y', strtotime(get_the_date())); ?></h3>
										 </div>
										  <div class="nwes-title">
											<a href=<?php echo get_permalink(get_the_ID()); ?>><?php echo wp_trim_words( get_the_title(), 10, '...' ); ?></a>
										 </div>
										<div class="more-news">
											<a href="<?php echo get_permalink(get_the_ID()); ?>" class="more-details">More Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </a> 
										</div>
									</div>
							</div>
						</div>
					<?php 
				endwhile;

				the_posts_pagination( array(
					'prev_text' => '<i class="fa fa-angle-left"></i><span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span><i class="fa fa-angle-right"></i>',
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
				) );

			else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif;
			?>

		</div><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div>
</section>
<?php get_footer();
