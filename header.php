<?php
   /**
   
    * The header for our theme
   
    *
   
    * This is the template that displays all of the <head> section and everything up until <div id="content">
   
    *
   
    * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
   
    *
   
    * @package WordPress
   
    * @subpackage Twenty_Seventeen
   
    * @since 1.0
   
    * @version 1.0
   
    */
   
   ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
   <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="profile" href="http://gmpg.org/xfn/11">
      <?php wp_head(); ?>
   </head>
   <body <?php body_class(); ?>>
      <div id="ppiuae-page" class="ppiuae-site">
      <header id="ppiuae-header">   
        	<div class="logo-colum">
              <div class="ppiuae-logo text-right">
                  <?php the_custom_logo(); ?>
              </div>
        	</div>
          <div class="menu-colum">
             	<?php
                  if ( is_active_sidebar( 'header-top-center' ) ) {
                  	dynamic_sidebar( 'header-top-center' );
                  }										  
              ?>
              <div class="cure-main-menu main-navigation">
                  <nav class="cft-main-navigation">
                     <?php wp_nav_menu( array(
                        'theme_location' => 'top',
                        'menu_id'        => 'top-menu',
                        ) ); ?>
                  </nav>
              </div>
          </div>
          <div class="ask-colum">
              <?php
                if ( is_active_sidebar( 'header-top-right' ) ) {
                		dynamic_sidebar( 'header-top-right' );
                }	                  
              ?>
          </div>
          <div class="mobile-show">
            <div class="top-header">
                <?php
                  if ( is_active_sidebar( 'header-top-center' ) ) {
                    dynamic_sidebar( 'header-top-center' );
                  }                     
                ?>
            </div>
            <div class="ask-colum">
              <?php
                if ( is_active_sidebar( 'header-top-right' ) ) {
                    dynamic_sidebar( 'header-top-right' );
                }                   
              ?>
            </div>
          </div>
      </header>
      <!-- #masthead -->
      <!-- header banner for innser pages --->
      <?php
         $sub_tagline = get_field( "tagline_text" );
         
         if ( ( is_page() && ! twentyseventeen_is_frontpage() ) && has_post_thumbnail( get_queried_object_id() ) ) {
         
         	echo '<div class="single-featured-image-header">';
         
         		echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
         
         		echo '<div class="ppiuae-tagline">';
         
         			echo '<div class="container">';
         
         				echo '<div class="row">';
         
         					echo '<div class="col-sm-12 text-left">';
         
         							echo '<h1 class="banner-coommon-title">'.get_the_title().'</h1>';
         
         							echo '<div class="tagline">'.$sub_tagline.'</div>';								
         
         					echo '</div>';
         
         				echo '</div>';
         
         			echo '</div>';
         
         		echo '</div>';
         
         		if (!is_front_page() && !is_404() && !is_page('thank-you')) {
         
         			echo '<div class="ppiuaebreadcrumb">';
         
         				echo '<div class="col-sm-12">';
         
         					echo '<div class="row">';
         
         						echo '<div class="col-sm-offset-6 col-sm-6 text-right bgbredcrumb">';
         
         								if(function_exists('bcn_display')) {
         
         									bcn_display();
         
         								}	
         
         						echo '</div>';
         
         					echo '</div>';
         
         				echo '</div>';
         
         			echo '</div>';									
         
         		}
         
         	echo '</div><!-- .single-featured-image-header -->';
         
         } else if((is_home() && get_option('page_for_posts'))|| is_single() ||  is_archive())  {		
         
         	$blogFeatureImg = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full');
         
         	echo '<div class="single-featured-image-header">';
         
         		echo '<img src="'.$blogFeatureImg[0].'" width="1366"/>';
         
         		echo '<div class="ppiuae-tagline">';
         
         			echo '<div class="container">';
         
         				echo '<div class="row">';
         
         					echo '<div class="col-sm-12 text-left">';
         
         							echo '<h1 class="banner-coommon-title">'.get_the_title(get_option('page_for_posts')).'</h1>';
         
         							echo '<div class="tagline">'.$sub_tagline.'</div>';	
         
         					echo '</div>';
         
         				echo '</div>';
         
         			echo '</div>';
         
         		echo '</div>';
         
         					if (!is_front_page() && !is_404() && !is_page('thank-you')) {
         
         			echo '<div class="ppiuaebreadcrumb">';
         
         				echo '<div class="col-sm-12">';
         
         					echo '<div class="row">';
         
         						echo '<div class="col-sm-offset-6 col-sm-6 text-right bgbredcrumb">';
         
         								if(function_exists('bcn_display')) {
         
         									bcn_display();
         
         								}	
         
         						echo '</div>';
         
         					echo '</div>';
         
         				echo '</div>';
         
         			echo '</div>';									
         
         		}
         
         	echo '</div><!-- .single-featured-image-header -->';
         
         } 
         
         ?>
      <div class="ppiuae-data">
      <div id="ppiuae-content">