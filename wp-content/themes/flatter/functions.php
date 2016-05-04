<?php
/**
 * Flatter functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Flatter
 */

if ( ! function_exists( 'flatter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function flatter_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Flatter, use a find and replace
	 * to change 'flatter' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'flatter', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'flatter-slider-thumb', 1366, 768, true ); 			// Home Slider full Image
	add_image_size( 'flatter-services-thumb', 770, 385, true ); 		// Home Services Thumbnail
	add_image_size( 'flatter-works-thumb', 800, 600, true ); 			// Home Work Thumb
	add_image_size( 'flatter-lpost-thumb', 800, 600, true ); 			// Home Latest Post Thumb	
	add_image_size( 'flatter-single-full', 999999, 350, true ); 		// Single Page


	add_action( 'after_setup_theme', 'flatter_woocommerce_support' );
		function flatter_woocommerce_support() {
    	add_theme_support( 'woocommerce' );
	} 


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'flatter' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'flatter_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );


}
endif; // flatter_setup
add_action( 'after_setup_theme', 'flatter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function flatter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'flatter_content_width', 640 );
}
add_action( 'after_setup_theme', 'flatter_content_width', 0 );




// =========================== FLATTER BREADCRUMBS ========================== //


if ( ! function_exists( 'flatter_breadcrumbs' ) ) :
function flatter_breadcrumbs() {
	if(!is_home()) {
		echo '<ul class="bc list-inline">';
		echo '<li><a href="'.esc_url(home_url('/')).'">'.get_bloginfo('name').'</a></li>';
		if (is_category() || is_single()) {
			echo '<li>'; the_category(); echo '</li>';
			if (is_single()) {
				echo ' <li><a>';
				the_title(); echo '</a></li>';
			}
		} elseif (is_page()) {
			echo '<li><a>'; the_title(); echo '</a></li>';
		}
		echo '</ul>';
	}
}
endif;





// =========================== FLATTER PAGINATION BARS ========================== //
if ( ! function_exists( 'flatter_pagination_bars' ) ) :
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function flatter_pagination_bars() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 1 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 2,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => __( '<span aria-hidden="true">&laquo;</span>', 'flatter' ),
			'next_text' => __( '<span aria-hidden="true">&raquo;</span>', 'flatter' ),
	        'type'      => 'list',
		) );

		if ( $links ) :

		?>
		<div class="pagination">			
				<?php echo $links; ?>
		</div>
		<?php
		endif;
	}
endif;




// =========================== FLATTER POST NAVIGATION ========================== //
if ( ! function_exists( 'flatter_post_nav' ) ) :
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function flatter_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		
		<nav>
            <ul class="pager">                    
			<?php
				previous_post_link( '<li class="previous">%link</li>', _x( '<i class="fa fa-angle-left"></i> Previous', 'Previous post link', 'flatter' ) );
				next_post_link(     '<li class="next">%link</li>',     _x( 'Next <i class="fa fa-angle-right"></i>', 'Next post link',     'flatter' ) );
			?>
			</ul>
		</nav><!-- .nav-links -->
		<?php
	}
endif;




// =========================== FLATTER ENTRY META ========================== //
if ( ! function_exists( 'flatter_entry_meta' ) ) :
	function flatter_entry_meta() {
		if ( is_sticky() && is_home() && ! is_paged() )
			echo '<span class="featured-post">' . __( 'Sticky', 'flatter' ) . '</span>';

		if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
			flatter_entry_meta();

		// Translators: used between list items, there is a space after the comma.
		$categories_list = get_the_category_list( __( ', ', 'flatter' ) );
		if ( $categories_list ) {
			echo '<span class="categories-links">' . $categories_list . '</span>';
		}

		// Translators: used between list items, there is a space after the comma.
		$tag_list = get_the_tag_list( '', __( ', ', 'flatter' ) );
		if ( $tag_list ) {
			echo '<span class="tags-links">' . $tag_list . '</span>';
		}

		// Post author
		if ( 'post' == get_post_type() ) {
			printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'flatter' ), get_the_author() ) ),
				get_the_author()
			);
		}
	}
endif;





// =========================== FLATTER GET LINK URL ========================== //
if ( ! function_exists( 'flatter_get_link_url' ) ) :
function flatter_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}
endif;





// ====================== FLATTER TAG CLOUDS ARGUMENTS ========================== //
add_filter( 'widget_tag_cloud_args', 'flatter_tag_cloud_args' );
function flatter_tag_cloud_args( $args ) {
	$args['number'] = 14; // Your extra arguments go here
	$args['largest'] = 14;
	$args['smallest'] = 14;
	$args['unit'] = 'px';
	return $args;
}


//====================EXCERPT LENGTH =======================//

function flatter_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'flatter_excerpt_length', 999 );


// ========================= FLATTER CUSTOM COMMENTS ========================== //
function flatter_custom_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' : ?>
            
            <div class="back-link"><?php comment_author_link(); ?></div>
        <?php break;
        default : ?>
            
            <div class="single-comment">
          		<div class="image"><?php echo get_avatar( $comment, 100 ); ?></div>

          		<div class="content">
          			<div class="comment-info">
            			<h4 class="name"><?php comment_author(); ?></h4>
            			<h6 class="date"><time <?php comment_time( 'c' ); ?> class="comment-time">
				            <span class="date">
				            <?php comment_date(); ?>
				            </span>
				            <span class="time">
				            <?php comment_time(); ?>
				            </span>
				            </time>
				        </h6>
          			</div>

          			<p><?php comment_text() ?></p>
            		<a href="" class="reply" title="">
            			<?php 
				            comment_reply_link( array_merge( $args, array( 
				            'reply_text' => __('Reply','flatter'),
				            'after' => ' <span></span>', 
				            'depth' => $depth,
				            'max_depth' => $args['max_depth'] 
				            ) ) ); 
				        ?>
				    </a>
				</div>
 			</div>
            
        <?php // End the default styling of comment
        break;
    endswitch;
}






// ======================= FLATTER POST THUMBNAIL CAPTION ====================== //
function flatter_the_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span class="imgcaption">'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
}







// ================ FLATTER EDITOR STYLES FOR GOOGLE FONTS ================== //
function flatter_add_editor_styles() {
	$rep_lace=array("%2B", "%2C","%3A");
    $font_url = str_replace( $rep_lace, " ", "//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" );
    add_editor_style( $font_url );
}
add_action( 'after_setup_theme', 'flatter_add_editor_styles' );






// ================ FLATTER WOO COMMERCE BREADCRUMB CUSTOMIZE ================== //

add_filter( 'woocommerce_breadcrumb_defaults', 'flatter_breadcrumb_defaults');
function flatter_breadcrumb_defaults($defaults) {
$defaults['delimiter'] = ''; //whatever delimiter you want
return $defaults;
}






/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function flatter_widgets_init() {

	register_sidebar( array(
			'name'          => __('Category Right Sidebar','flatter'),
			'id'            => 'sidebar-1',
			'description'   => __('Drag your widgets for Right Sidebar here','flatter'),
			'before_widget' => '<div class="single">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>',
		) );

	register_sidebar( array(
		'name'          => __('Category Left Sidebar','flatter'),
		'id'            => 'sidebar-2',
		'description'   => __('Drag your widgets for Left Sidebar here','flatter'),
		'before_widget' => '<div class="single">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
			'name'          => __('Shop Sidebar Left','flatter'),
			'id'            => 'shopsidebar_left',
			'description'   => __('Drag your Woo-commerce Porducts widgets here','flatter'),
			'before_widget' => '<div class="single">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>',
		) );

	register_sidebar( array(
			'name'          => __('Footer Block','flatter'),
			'id'            => 'footer_block',
			'description'   => __('Footer Block supports 4 widgets here','flatter'),
			'before_widget' => '<div class="col-md-3 col-sm-6 single wow fadeInUp">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="single-title">',
			'after_title'   => '</h4>',
		) );
	
		register_sidebar( array(
			'name'          => __('Newsletter Block','flatter'),
			'id'            => 'newsletter_block',
			'description'   => __('Install https://wordpress.org/plugins/newsletter/ to use this section','flatter'),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h4 class="single-title">',
			'after_title'   => '</h4>',
		) );

	register_sidebar( array(
			'name'          => __('Contact Block','flatter'),
			'id'            => 'contact_block',
			'description'   => __('Paste your Google Map Location iFrame code here','flatter'),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h4 class="single-title">',
			'after_title'   => '</h4>',
		) );


}
add_action( 'widgets_init', 'flatter_widgets_init' );


if ( ! function_exists( 'flatter_fonts_url' ) ) :
	/**
	 * Register Google fonts for Flatter.
	 *
	 * Create your own flatter_fonts_url() function to override in a child theme.
	 *
	 * @since Flatter 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function flatter_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'flatter' ) ) {
			$fonts[] = 'Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800italic,800';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
endif;






/**
 * Enqueue scripts and styles.
 */
function flatter_scripts() {
	// use of google fonts
	wp_enqueue_style( 'flatter-google-fonts', flatter_fonts_url(), array(), null );
	wp_enqueue_style( 'flatter-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.css' );
	wp_enqueue_style( 'animate-min', get_template_directory_uri().'/css/animate.css' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/css/owl.carousel.css' );
	wp_enqueue_style( 'owl-theme', get_template_directory_uri().'/css/owl.theme.css' );
	wp_enqueue_style( 'flatter-main', get_template_directory_uri().'/css/main.css' );	
	wp_enqueue_style( 'flatter-responsive', get_template_directory_uri().'/css/responsive.css' );
	
	
	if(is_rtl()) {
		wp_enqueue_style( 'flatter-rtl', get_template_directory_uri().'/css/rtl.css' );
		wp_enqueue_style( 'bootstrap-css-rtl', get_template_directory_uri().'/css/bootstrap-rtl.css' );
		wp_enqueue_script( 'bootstrap-js-rtl', get_template_directory_uri() . '/js/bootstrap.rtl.js', array(), '1.0.0', true );
	}
	
	wp_enqueue_script( 'jquery-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'jquery-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'jquery-smartmenus', get_template_directory_uri() . '/js/jquery.smartmenus.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'jquery-wow', get_template_directory_uri() . '/js/wow.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'flatter-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'flatter_scripts' );


//Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';

//Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

//Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/class.php';

//Customizer additions.
require get_template_directory() . '/inc/customizer.php';

//Load Jetpack compatibility file.

require get_template_directory() . '/inc/jetpack.php';

// Register Custom Navigation Walker
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

