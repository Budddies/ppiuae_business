<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
get_header();?>
<div class="singleblog-content">
<?php while ( have_posts() ) : the_post(); ?>
	<div class="container">
		<div class="col-sm-8 singlepost-content">
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
					<div class="sharing-section">
                            <?php echo wpfai_social(); ?>
                    </div>
					<div class="col-sm-12">						
						<div class="content_info">
							<h2><?php echo get_the_title(); ?></h2>
							<div class="date-total">
								<div class="post-date"><i class="fa fa-calendar-o"></i><?php echo get_the_time('F j,Y'); ?></div> 
								<div class="comment-total">
									<i class="fa fa-comments-o"></i>(<?php
										$commentsCount = wp_count_comments(get_the_ID());
										echo $commentsCount->approved;
									?>) Comments
								</div>
                            </div>							
							<div class="sing-post-image">
							<?php if(has_post_thumbnail()){
								the_post_thumbnail( 'blog-single-image' ); 									
							} else { ?>
								<img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/news_default.jpg"/>
							<?php }?>
							</div>
							<div class="post-content"><?php the_content(); ?></div>
						</div>
						<div class="post-social-share sharing-section">
							<div class="social-title">Share on social media:</div> <?php echo wpfai_social(); ?>
						</div>						
						<div class="singleblog-comment">
							<?php if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif; ?>									
						</div>						 
					</div>					
					</div>
				</div>
			</div>			
		</div>
		<?php endwhile;?>
<?php get_sidebar();?>
	</div> 
<?php get_footer();
