<?php
function theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css?ver=4.5.1' );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/css/animate.css?ver=4.5.1' );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/css/bootstrap.css?ver=4.5.1' );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/css/font-awesome.css?ver=4.5.1' );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/css/main.css?ver=4.5.1' );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/css/owl.carousel.css?ver=4.5.1' );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/css/owl.theme.css?ver=4.5.1' );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/css/responsive.css?ver=4.5.1' );

    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
?>