<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="ppiuae-main-content" class="ppiuae-content-area">
	<div class="container">

		<div class="col-sm-8">
		<header class="page-header">
			<?php if ( have_posts() ) : ?>
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<?php else : ?>
				<h1 class="page-title"><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h1>
			<?php endif; ?>
		</header><!-- .page-header -->
			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) : the_post();?>
					<div class="search-posts">
							<h4><?php echo get_the_title(); ?></h4>
							<?php if(get_the_content()) { ?>
							<p>
								<?php echo wp_trim_words(strip_tags(do_shortcode(get_the_content())),'25','...');?>												
							</p>
							<?php } ?>
							<a href="<?php echo get_permalink(get_the_ID()); ?>">Read More</a>
					</div>

				<?php endwhile; // End of the loop.

				the_posts_pagination( array(
					'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
				) );

			else : ?>

				<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
				<?php
					get_search_form();

			endif;
			?>
		</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div>
</div>

<?php get_footer();
