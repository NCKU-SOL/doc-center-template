<?php

//////////////////////////////////////////////////////////////////
// Set Content Width
//////////////////////////////////////////////////////////////////
function zopit_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'zopit_content_width', 840 );
}
add_action( 'after_setup_theme', 'zopit_content_width', 0 );


//////////////////////////////////////////////////////////////////
// Theme set up
//////////////////////////////////////////////////////////////////

if ( ! function_exists( 'zopit_theme_setup' ) ) :

	function zopit_theme_setup() {

		// Localization support
		load_theme_textdomain( 'zopit', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Title Tag
		add_theme_support( 'title-tag' );

		// Register navigation menu
		register_nav_menus(
			array(
				'main-menu' => __( 'Primary Menu', 'zopit' )
			) );


		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'gallery',
			'caption',
		) );

		// Custom Logo
		add_theme_support( 'custom-logo' );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'zopit_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Post thumbnails
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'zopit-post-thumbnails', 750, 450, true );
		add_image_size( 'zopit-recent-post', 110, 80, true );

	}
endif; // zopit_theme_setup

add_action( 'after_setup_theme', 'zopit_theme_setup' );



//////////////////////////////////////////////////////////////////
// Register widget
//////////////////////////////////////////////////////////////////
function zopit_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'zopit' ),
		'id'            => 'blog-sidebar',
		'description'   => esc_html__('Add widgets here to appear in your sidebar.', 'zopit'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title text-uppercase">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'zopit_widgets_init' );


//////////////////////////////////////////////////////////////////
// zopit Fonts URL.
//////////////////////////////////////////////////////////////////
function zopit_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'zopit' ) ) {
		$fonts[] = 'Open Sans:400,300,300italic,400italic,600,600italic,700,700italic';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}
	return $fonts_url;
}


//////////////////////////////////////////////////////////////////
// Enqueue scripts and styles.
//////////////////////////////////////////////////////////////////

function zopit_all_scripts_and_css() {

	// CSS File
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.6', 'all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.4.0', 'all' );
	wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/assets/css/slicknav.css', array(), null );
	wp_enqueue_style( 'zopit-stylesheet', get_stylesheet_uri() );
	wp_enqueue_style( 'zopit-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), null );

	// Google Fonts
	wp_enqueue_style( 'zopit-google-fonts', zopit_fonts_url(), array(), null );

	// JS Files
	wp_enqueue_script( 'jquery-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'jquery-smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.js', array( 'jquery' ), '0.9.9', true );
	wp_enqueue_script( 'jquery-slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'jquery-fitvids', get_template_directory_uri() . '/assets/js/jquery.fitvids.js', array( 'jquery' ), '1.1', true );
	wp_enqueue_script( 'jquery-masonry', array( 'jquery' ), null, true);
	wp_enqueue_script( 'zopit-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'zopit_all_scripts_and_css' );


function zopit_admin_scripts() {

    wp_enqueue_style( 'zopit-admin', get_template_directory_uri() . '/css/admin.css', false, null );

}
add_action( 'admin_enqueue_scripts', 'zopit_admin_scripts' );


//////////////////////////////////////////////////////////////////
// WooCommerce support
//////////////////////////////////////////////////////////////////

add_action( 'after_setup_theme', 'zopit_woocommerce_support' );
function zopit_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}


//////////////////////////////////////////////////////////////////
// Widget categories post counter
//////////////////////////////////////////////////////////////////

function zopit_categories_post_count_filter( $cat_post_count ) {
	$cat_post_count = str_replace( '(', '<span class="post_count pull-right"> (', $cat_post_count );
	$cat_post_count = str_replace( ')', ' )</span>', $cat_post_count );

	return $cat_post_count;
}

add_filter( 'wp_list_categories', 'zopit_categories_post_count_filter' );


//////////////////////////////////////////////////////////////////
// THE EXCERPT
//////////////////////////////////////////////////////////////////
function zopit_custom_excerpt_length( $length ) {
	return 46;
}

add_filter( 'excerpt_length', 'zopit_custom_excerpt_length', 999 );

function zopit_new_excerpt_more( $more ) {
	return '&hellip;';
}

add_filter( 'excerpt_more', 'zopit_new_excerpt_more' );


//////////////////////////////////////////////////////////////////
// COMMENTS LAYOUT
//////////////////////////////////////////////////////////////////

if ( ! function_exists( 'zopit_comment' ) ):

	function zopit_comment( $comment, $args, $depth ) {
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
				// Display trackbacks differently than normal comments.
				?>
				<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
				<p><?php _e( 'Pingback:', 'zopit' ); ?><?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'zopit' ), '<span class="edit-link">', '</span>' ); ?></p>
				<?php
				break;
			default :

				global $post;
				?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<div id="comment-<?php comment_ID(); ?>" class="comment-body media">

					<div class="comment-avartar pull-left">
						<?php
						echo get_avatar( $comment, $args['avatar_size'] );
						?>
					</div>
					<div class="comment-context media-body">
						<div class="comment-head">
							<?php
							printf( '<h3 class="comment-author">%1$s</h3>',
								get_comment_author_link() );
							?>
							<span class="comment-date"><?php echo get_comment_date() ?></span>
						</div>

						<?php if ( '0' == $comment->comment_approved ) : ?>
							<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.',
									'zopit' ); ?></p>
						<?php endif; ?>

						<div class="comment-content">
							<?php comment_text(); ?>
						</div>

						<?php edit_comment_link( __( 'Edit', 'zopit' ), '<span class="edit-link">', '</span>' ); ?>
						<span class="comment-reply">
							<?php comment_reply_link( array_merge( $args, array(
								'reply_text' => __( 'Reply', 'zopit'
								),
								'after'      => '',
								'depth'      => $depth,
								'max_depth'  => $args['max_depth']
							) ) ); ?>
						</span>

					</div>

				</div>
				<?php
				break;
		endswitch;
	}

endif;


if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {

	wp_redirect(admin_url("themes.php?page=theme77support"));
	
}


//////////////////////////////////////////////////////////////////
// Include files
//////////////////////////////////////////////////////////////////

//Custom Widgets 
require_once get_template_directory() . '/inc/widgets/blog-posts.php';
require_once get_template_directory() . '/inc/widgets/social-icons.php';
require_once get_template_directory() . '/inc/widgets/about_widget.php';

// Custom template tags for this theme.
require_once get_template_directory() . '/inc/template-tags.php';

require_once get_template_directory() . '/functions/support.php';

