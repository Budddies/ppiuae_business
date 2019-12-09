<?php
/*** Calling Assets ***/
add_action( 'wp_enqueue_scripts', 'ppiuae_business_assets' );
function ppiuae_business_assets() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'style-new', get_stylesheet_directory_uri() . '/style-new.css' );
    wp_enqueue_style( 'boostrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css' );
    wp_enqueue_style( 'awesome-style', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'lightslider', get_stylesheet_directory_uri() . '/assets/css/lightslider.css' );  
	wp_enqueue_style( 'homeslider', get_stylesheet_directory_uri() . '/assets/css/homeslider.css' );  
	wp_enqueue_script( 'boostrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), true  );
	wp_enqueue_script( 'lightslider', get_stylesheet_directory_uri() . '/assets/js/lightslider.js', array( 'jquery' ), true  );
	wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), true  );
	wp_enqueue_script( 'jssorslider', get_stylesheet_directory_uri() . '/assets/js/jssor.slider.min.js', array( 'jquery' ), true  );
}
/*** For Site Logo Skip cropping ***/
function themename_custom_logo_setup() {
    remove_action( 'after_setup_theme','twentyseventeen_setup',9 );
    $defaults = array(
        'height'      => 114,
        'width'       => 298,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup',20 );
/*** Removing parent theme's default widget ***/
add_action('init','remove_parent_theme_widget');
function remove_parent_theme_widget(){
    //unregister_sidebar('sidebar-1');
    unregister_sidebar('sidebar-2');
    unregister_sidebar('sidebar-3');
}
if ( function_exists( 'add_image_size' ) ) {
add_image_size( 'home-blog-image', 358, 173, true );
add_image_size( 'testimonial-image', 58, 58, true );
add_image_size( 'blog-image-one', 750, 348, true );
add_image_size( 'blog-single-image', 750, 348, true );
add_image_size( 'recent-story-image', 340, 180, true );
}
/* Add page slug in body class */
add_filter('body_class', 'ppiuae_body_classes');
function ppiuae_body_classes($classes) {
    global $post;
    $classes[] = 'ppiuae-'.$post->post_name;
    return $classes;
}
/*** Register menu for footer ***/
register_nav_menu('footer_menu_bottom', 'Footer Menu Bottom');
/*Register Sidebar*/
function wp_ppiuae_business_widgets_init() {
	register_sidebar( array(
        'name'          => esc_html__( 'Header Top Center', 'ppiuae_business' ),
        'id'            => 'header-top-center',
        'description'   => esc_html__( 'Add widgets here.', 'ppiuae_business' ),
        'before_widget' => '<section id="%1$s" class="header-center-menu %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
	register_sidebar( array(
        'name'          => esc_html__( 'Header Top Right', 'ppiuae_business' ),
        'id'            => 'header-top-right',
        'description'   => esc_html__( 'Add widgets here.', 'ppiuae_business' ),
        'before_widget' => '<section id="%1$s" class="header-right-menu %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Contact Area', 'ppiuae_business' ),
        'id'            => 'footer-contact',
        'description'   => esc_html__( 'Add widgets here.', 'ppiuae_business' ),
        'before_widget' => '<section id="%1$s" class="footer-contact %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Logo & Description', 'ppiuae_business' ),
        'id'            => 'footer-desc',
        'description'   => esc_html__( 'Add widgets here.', 'ppiuae_business' ),
        'before_widget' => '<section id="%1$s" class="footer-desc %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
	register_sidebar( array(
        'name'          => esc_html__( 'Footer Ask for quote', 'ppiuae_business' ),
        'id'            => 'footer-ask-quote',
        'description'   => esc_html__( 'Add widgets here.', 'ppiuae_business' ),
        'before_widget' => '<section id="%1$s" class="footer-ask %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
	register_sidebar( array(
        'name'          => esc_html__( 'Footer Call', 'ppiuae_business' ),
        'id'            => 'footer-call',
        'description'   => esc_html__( 'Add widgets here.', 'ppiuae_business' ),
        'before_widget' => '<section id="%1$s" class="footer-call %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'wp_ppiuae_business_widgets_init' );
/*** Register Testimonial CPT ***/
add_action( 'init', 'ppiuae_register_testimonial' );
function ppiuae_register_testimonial() {
    $labels = array(
        'name'               => _x( 'Testimonials', 'post type general name' ),
        'singular_name'      => _x( 'Testimonial', 'post type singular name' ),
        'menu_name'          => _x( 'Testimonials', 'admin menu' ),
        'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'testimonial' ),
        'add_new_item'       => __( 'Add New Testimonial' ),
        'new_item'           => __( 'New Testimonial' ),
        'edit_item'          => __( 'Edit Testimonial' ),
        'view_item'          => __( 'View Testimonial' ),
        'all_items'          => __( 'All Testimonials' ),
        'search_items'       => __( 'Search Testimonials' ),
        'parent_item_colon'  => __( 'Parent Testimonials:' ),
        'not_found'          => __( 'No testimonials found.' ),
        'not_found_in_trash' => __( 'No testimonials found in Trash.' )
    );
    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.' ),
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testimonial' ),
        'menu_icon'          => 'dashicons-format-quote',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail' )
    );
    register_post_type( 'testimonial', $args );
}
/*** Register Our client CPT ***/
add_action( 'init', 'ppiuae_register_ourclient' );
function ppiuae_register_ourclient() {
    $labels = array(
        'name'               => _x( 'Our Client', 'post type general name' ),
        'singular_name'      => _x( 'Our Client', 'post type singular name' ),
        'menu_name'          => _x( 'Our Client', 'admin menu' ),
        'name_admin_bar'     => _x( 'Our Client', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Our Client' ),
        'add_new_item'       => __( 'Add New Our Client' ),
        'new_item'           => __( 'New Our Client' ),
        'edit_item'          => __( 'Edit Our Client' ),
        'view_item'          => __( 'View Our Client' ),
        'all_items'          => __( 'All Our Client' ),
        'search_items'       => __( 'Search Our Client' ),
        'parent_item_colon'  => __( 'Parent Our Client:' ),
        'not_found'          => __( 'No Our Client found.' ),
        'not_found_in_trash' => __( 'No Our Client found in Trash.' )
    );
    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.' ),
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'ourclient' ),
        'menu_icon'          => 'dashicons-groups',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail' )
    );
    register_post_type( 'ourclient', $args );
}
/*** Register history CPT ***/
add_action( 'init', 'ppiuae_register_history' );
function ppiuae_register_history() {
    $labels = array(
        'name'               => _x( 'Our History', 'post type general name' ),
        'singular_name'      => _x( 'history', 'post type singular name' ),
        'menu_name'          => _x( 'Our History', 'admin menu' ),
        'name_admin_bar'     => _x( 'history', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'history' ),
        'add_new_item'       => __( 'Add New history' ),
        'new_item'           => __( 'New history' ),
        'edit_item'          => __( 'Edit history' ),
        'view_item'          => __( 'View history' ),
        'all_items'          => __( 'All Our History' ),
        'search_items'       => __( 'Search Our History' ),
        'parent_item_colon'  => __( 'Parent Our History:' ),
        'not_found'          => __( 'No Our History found.' ),
        'not_found_in_trash' => __( 'No Our History found in Trash.' )
    );
    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.' ),
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'history' ),
        'menu_icon'          => 'dashicons-format-quote',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'excerpt' )
    );
    register_post_type( 'history', $args );
}
/*** Register Our ranpak application CPT ***/
add_action( 'init', 'ppiuae_register_ranpakapplication' );
function ppiuae_register_ranpakapplication() {
    $labels = array(
        'name'               => _x( 'Ranpak Application', 'post type general name' ),
        'singular_name'      => _x( 'Ranpak Application', 'post type singular name' ),
        'menu_name'          => _x( 'Ranpak Application', 'admin menu' ),
        'name_admin_bar'     => _x( 'Ranpak Application', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Ranpak Application' ),
        'add_new_item'       => __( 'Add New Ranpak Application' ),
        'new_item'           => __( 'New Ranpak Application' ),
        'edit_item'          => __( 'Edit Ranpak Application' ),
        'view_item'          => __( 'View Ranpak Application' ),
        'all_items'          => __( 'All Ranpak Application' ),
        'search_items'       => __( 'Search Ranpak Application' ),
        'parent_item_colon'  => __( 'Parent Ranpak Application:' ),
        'not_found'          => __( 'No Ranpak Application found.' ),
        'not_found_in_trash' => __( 'No Ranpak Application found in Trash.' )
    );
    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.' ),
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'ranpakapplication' ),
        'menu_icon'          => 'dashicons-images-alt',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' )
    );
    register_post_type( 'ranpakapplication', $args );
}
/*** ourhistory slider ***/
add_shortcode('ourhistory-slides','ourhistory_slider_shortcode');
function ourhistory_slider_shortcode($args) {
ob_start();
$args = array(
        'posts_per_page'   => -1,
        'post_type'        => 'history',
        'post_status'      => 'publish',
        );
$ourhistory = get_posts( $args ); ?>
<div class="historyslider-section">
    <div class="item">
        <div id="historyslider" class="history-slider">
            <?php foreach ($ourhistory as $ourhistoryData) { ?>
                <div class="history-data">
                   <h3><?php echo $ourhistoryData->post_title; ?></h3>
                   <h4><?php echo $ourhistoryData->post_excerpt; ?></h4>
                   <p><?php echo $ourhistoryData->post_content; ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php return ob_get_clean(); }
/*** ourclient slider ***/
add_shortcode('ourclient-slides','ourclient_slider_shortcode');
function ourclient_slider_shortcode($args) {
ob_start();
$args = array(
        'posts_per_page'   => -1,
        'post_type'        => 'ourclient',
        'post_status'      => 'publish',
        );
$ourclient = get_posts( $args ); ?>
<div class="clientslider-section">
    <div class="item">
        <div id="clientslider" class="client-slider">
            <?php foreach ($ourclient as $ourclientData) { ?>
                <div class="client-data">
                   <?php echo get_the_post_thumbnail($ourclientData->ID,'ourclient-img');?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php return ob_get_clean(); }
/*** Testimonial slider ***/
add_shortcode('testimonial-slides','testimonial_slider_shortcode');
function testimonial_slider_shortcode($args) {
ob_start();
$args = array(
        'posts_per_page'   => -1,
        'post_type'        => 'testimonial',
        'post_status'      => 'publish',
        );
$testimonials = get_posts( $args ); ?>
<div class="testimonials">
    <div class="item">
        <div id="testimonials-slider" class="testimonials-slider">
            <?php foreach ($testimonials as $testimonialsData) { ?>
                <div class="testimonial-data">
                    <div class="feedback">
						<div class="testimonialtop">
						<div class="row">
							<div class="col-sm-offset-3 col-sm-2">
							<?php
							if(has_post_thumbnail($testimonialsData->ID)) { 
								echo get_the_post_thumbnail($testimonialsData->ID,'testimonial-image');
							} else { 
								echo '<img src="'.get_stylesheet_directory_uri().'/assets/img/user.png">';
							}
							?>
							</div>
							<div class="col-sm-7 text-left">
								<div class="rating">
								<?php $rating = get_field('star_rating',$testimonialsData->ID);
									if($rating){ 
										for ($i = 0; $i <= $rating; $i++) {
											echo "<i class='fa fa-star'></i>";
										} 
									}
								?>
								</div>
								<h2><?php echo $testimonialsData->post_title; ?></h2>							
							</div>
						</div>
						</div>
                        <p class="content"><?php echo $testimonialsData->post_content; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php return ob_get_clean(); }
/*** Latest 3 posts on homepage ***/
add_shortcode('latestposts','ppiuae_latest_posts');
function ppiuae_latest_posts(){ 
    ob_start();
$latestPostArgs = array(
    'posts_per_page'   => 3,
    'post_type'        => 'post',
    'post_status'      => 'publish',
);
$latestNews = get_posts( $latestPostArgs );
?>
   <div class="latest-news container">
	<div class="row">
		<?php foreach ($latestNews as $latestNewsArgs) { ?>
            <div class="col-sm-6 col-md-4 col-xs-12 post-hover">
                  <div class="latest-news-post">
				
                 <?php if ( has_post_thumbnail($latestNewsArgs->ID)) { echo get_the_post_thumbnail($latestNewsArgs->ID,'home-blog-image'); } else { echo '<img src="'.get_stylesheet_directory_uri().'/images/blog-banner-358x173.png" />'; } ?>
                 <div class="newpost">
                  <div class="news-date">
                    <h3><?php echo date('j M, Y', strtotime($latestNewsArgs->post_date)); ?></h3>
                 </div>
                      <div class="nwes-title">
                    <a href=<?php echo get_permalink($latestNewsArgs->ID); ?>><?php echo wp_trim_words( $latestNewsArgs->post_title, 10, '...' ); ?></a>
                     </div>
                    <div class="more-news">
                  <a href="<?php echo get_permalink($latestNewsArgs->ID); ?>" class="more-details">More Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </a> 
                  </div>
                </div>
            </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php return ob_get_clean(); }
/* contact form 7 submit to thankyou page redirect*/
add_action( 'wp_footer', 'redirect_cf7' );
function redirect_cf7() {
?>
<script type="text/javascript">
	document.addEventListener( 'wpcf7mailsent', function( event ) {
	       location = '<?php echo get_site_url();?>/thank-you/';
	}, false );
</script>
<?php
}
/* create option page for slider*/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Home Slider',
		'menu_title'	=> 'Home Slider',
		'menu_slug' 	=> 'home-slider',
		'capability'	=> 'edit_posts',
		'icon_url' => 'dashicons-images-alt2',
		'redirect'		=> false
	));
	
}
/*** Category slider ***/
add_shortcode('catrgory-slides','catrgory_slider_shortcode');
function catrgory_slider_shortcode($args) {
ob_start();
?>
<div class="categoryslider-section">
    <div class="item">
        <div id="categoryslider" class="category-slider">
            
			<?php 
			if( have_rows('category_images') ):
				while ( have_rows('category_images') ) : the_row();
					$image = get_sub_field('image');
			?>
			<div class="cat-slides">
					<div class="slide">
                            <img src="<?php echo $image;?>" />
                    </div>
					
            </div>
			<?php endwhile;
			endif; ?>
        </div>
    </div>
    <div class="product_slide">
		<ul class="next-previous-cat">
			<li id="goToPrevcat"><i class="fa fa-arrow-left"></i></li>
			<li id="goToNextcat"><i class="fa fa-arrow-right"></i></li>
		</ul>
        <h3><?php echo get_the_title();?> <br/>Products</h3>
    </div>
</div>
<?php return ob_get_clean(); }
/*** ranpak application slider ***/
add_shortcode('ranpak-application','ranpak_application_slider_shortcode');
function ranpak_application_slider_shortcode($args) {
ob_start();
$args = array(
        'posts_per_page'   => -1,
        'post_type'        => 'ranpakapplication',
        'post_status'      => 'publish',
        );
$ranpakapplication = get_posts( $args ); ?>
<div class="ranpakapplist">
    <div id="application_slider">
        <div data-u="slides" class="vc_inner-slider" style="position: absolute; left: 0px; top: 110px; height: 550px;  -webkit-filter: blur(0px); background-color: #fff; overflow: hidden;">
            <?php foreach ($ranpakapplication as $Data) { ?>
                <div>
					<div style="margin: 10px; overflow: hidden; color: #000;">
						<div class="col-sm-6"><?php echo get_the_post_thumbnail($Data->ID, 'app-thumb');?></div>
						<div class="col-sm-6 appcontent-section">
							<div class="app-title"><?php echo $Data->post_title; ?></div>
							<div class="app-content"><p><?php echo $Data->post_content; ?></p></div>
						</div>												
					</div>
					<div id="alltopthumb" data-u="thumb">
						<div class="apptop-thumb"><h2 class="main-app-title"><?php echo $Data->post_title; ?></h2></div>
					</div>
				</div>
            <?php } ?>
        </div>
		<div data-u="thumbnavigator" class="jssort12" style="left:0px; top: 0px;">
            <!-- Thumbnail Item Skin Begin -->
            <div data-u="slides" style="cursor: default; top: 0px; left: 0px;">
                <div data-u="prototype" class="p">
                    <div class="w"><div data-u="thumbnailtemplate" class="c"></div></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <span data-u="arrowleft" class="jssora051 arrowleftside" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </span>
        <span data-u="arrowright" class="jssora051 arrowrightside" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </span>
    </div>
</div>
<?php return ob_get_clean(); }

/* disable comment form to website url field */ 
function disable_url_comment_fields( $fields ){
  if(isset($fields['url']))
    unset($fields['url']);
  return $fields;
}
add_filter( 'comment_form_default_fields', 'disable_url_comment_fields' );

/* change comment form title*/
function isa_comment_reform ($arg) {
$arg['title_reply'] = __('Leave your Comments');
return $arg;
}
add_filter('comment_form_defaults','isa_comment_reform');

/* add placeholder on comment form*/
function set_placeholder_comment_fields( $fields ) {

	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$label     = $req ? '*' : ' ' . __( '(optional)', 'text-domain' );
	$aria_req  = $req ? "aria-required='true'" : '';
	$fields['author'] =
		'<p class="comment-form-author">
			<input id="author" name="author" type="text" placeholder="' . esc_attr__( "Your Name", "cure" ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30" ' . $aria_req . ' />
		</p>';

	$fields['email'] =
		'<p class="comment-form-email">
			<input id="email" name="email" type="email" placeholder="' . esc_attr__( "Email Address", "cure" ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) .
		'" size="30" ' . $aria_req . ' />
		</p>';

	return $fields;
}
add_filter( 'comment_form_default_fields', 'set_placeholder_comment_fields' );
function comment_placeholder_comment_field( $comment_field ) {

  $comment_field =
    '<p class="comment-form-comment">
            <textarea required id="comment" name="comment" placeholder="' . esc_attr__( "Type your comment", "cure" ) . '" cols="45" rows="8" aria-required="true"></textarea>
        </p>';

  return $comment_field;
}
add_filter( 'comment_form_field_comment', 'comment_placeholder_comment_field' );
/* change the button text */
function custom_comment_form_submit_label($arg) {
$arg['label_submit'] = 'Post Now';
return $arg;
}
add_filter('comment_form_defaults', 'custom_comment_form_submit_label');

/*** common cta action section on cvategory single page ***/
add_shortcode('ppiuae-cta','ppiuae_cta_shortcode');
function ppiuae_cta_shortcode() {
ob_start();
?>
<div class="pp-cta-section">
	<p><i class="fa fa-shopping-basket"></i>Looking to buy materials for retail? <a href="http://www.ppiuae.net/" target="_blank">Click Here.<i class='fa fa-angle-right'></i></a></p>
</div>
<?php return ob_get_clean(); }