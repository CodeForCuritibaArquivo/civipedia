<?php
function theme_enqueue_styles() {

    $parent_style = 'parent-style';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/css/bootstrap.css' );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/css/font-awesome.css' );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/css/animate.css' );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/css/owl.carousel.css' );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/css/owl.theme.css' );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/css/main.css' );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/css/responsive.css' );


	if(is_rtl()) {
		wp_enqueue_style($parent_style, get_template_directory_uri().'/css/rtl.css' );
		wp_enqueue_style($parent_style, get_template_directory_uri().'/css/bootstrap-rtl.css' );
		wp_enqueue_script($parent_style, get_template_directory_uri() . '/js/bootstrap.rtl.js', array(), '1.0.0', true );
	}
	
	wp_enqueue_script($parent_style, get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script($parent_style, get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script($parent_style, get_template_directory_uri() . '/js/jquery.smartmenus.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script($parent_style, get_template_directory_uri() . '/js/wow.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script($parent_style, get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
?>