<?php
/**
 * Flatter Theme Customizer.
 *
 * @package Flatter
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function flatter_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

}
add_action( 'customize_register', 'flatter_customize_register' );




function flatter_customizer_register( $wp_customize ) 
    {
      // Do stuff with $wp_customize, the WP_Customize_Manager object.

      $wp_customize->add_panel( 'theme_option', array(
        'priority' => 150,
        'title' => __( 'Flatter Theme Option', 'flatter' ),
        'description' => __( 'Welcome to Flatter Theme Option.', 'flatter' ),
      ));

      /**********************************************/
      /*************** LOGO SECTION *****************/
      /**********************************************/     

      $wp_customize->add_section('theme_logo',array(
        'priority' => 30,
        'title' => __('Theme Logo','flatter'),
        'capability' => 'edit_theme_options',
        'description' => __('Upload image of 200px width and 52px height for logo','flatter'),
        'panel' => 'theme_option',
      ));

     $wp_customize->add_setting('logo_image',array(
      'sanitize_callback' => 'esc_url_raw',
      'capability' => 'edit_theme_options'
      ));

      $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'logo_image',array(
        'label' => __('Edit Theme Logo','flatter'),
        'section' => 'theme_logo',
        'settings' => 'logo_image'
        )  
      ));  

      /**********************************************/
      /************* MAIN SLIDER SECTION *************/
      /**********************************************/     

      $wp_customize->add_section('slider_category',array(
        'title' => __('Slider Categories','flatter'),
        'capability' => 'edit_theme_options',
        'description' => __('Select the Slide Category for Homepage.','flatter'),
        'panel' => 'theme_option'
      ));

      $wp_customize->add_setting('slider_category_display',array(
        'sanitize_callback' => 'flatter_sanitize_category',
        'capability' => 'edit_theme_options',
        'default' => ''
      ));

      $wp_customize->add_control(new flatter_Customize_Dropdown_Taxonomies_Control($wp_customize,'slider_category_display',array(
        'label' => __('Choose category','flatter'),
        'section' => 'slider_category',
        'settings' => 'slider_category_display',
        'type'=> 'dropdown-taxonomies',
        )  
      ));

      $wp_customize->add_setting('slider_category_display_num',array(
        'capability'=>'edit_theme_options',
        'sanitize_callback' => 'flatter_sanitize_text',
        'default'=>'2',
        ));
      $wp_customize->add_control(new flatter_Select_Customize_Control($wp_customize,'slider_category_display_num',array(
        'label'=>__('Select Number of Post','flatter'),
        'section'=>'slider_category',
        'settings'=>'slider_category_display_num',
        'type'=>'select',
        'choices'=>array(1,2,3,4,5,6,7,8,9),
        )
      ));


      $wp_customize->add_setting(
        'slider_button',
            array(
              'sanitize_callback' => 'esc_url_raw',
              'capability' => 'edit_theme_options',
              'default' => '',
          )
      );

      $wp_customize->add_control(
        'slider_button',
         array(
          'label' => __('Contact Us Link','flatter'),
          'section' => 'slider_category',
          'settings' => 'slider_button',
          'type' => 'text',
         )
      );


      /**********************************************/
      /************* FEATURES SECTION *************/
      /**********************************************/     

      $wp_customize->add_section('features_category',array(
        'title' => __('Features Categories','flatter'),
        'capability' => 'edit_theme_options',
        'description' => __('Select the Features Content Category.','flatter'),
        'panel' => 'theme_option'
      ));

      $wp_customize->add_setting('features_category_display',array(
        'sanitize_callback' => 'flatter_sanitize_category',
        'capability' => 'edit_theme_options',
        'default' => ''
      ));

      $wp_customize->add_control(new flatter_Customize_Dropdown_Taxonomies_Control($wp_customize,'features_category_display',array(
        'label' => __('Choose category','flatter'),
        'section' => 'features_category',
        'settings' => 'features_category_display',
        'type'=> 'dropdown-taxonomies',
        )  
      ));
       $wp_customize->add_setting('featured_category_status',array(
        'capability'=>'edit_theme_options',
        'sanitize_callback' => 'flatter_sanitize_text',
        'default'=>0,
        ));
      $wp_customize->add_control(new flatter_Select_Customize_Control($wp_customize,'featured_category_status',array(
        'label'=>__('Enable/Disable Featured Content','flatter'),
        'section'=>'features_category',
        'settings'=>'featured_category_status',
        'type'=>'select',
        'choices'=>array('Enable', 'Disable'),
        )
      ));


      /**********************************************/
      /************* SERVICES SECTION *************/
      /**********************************************/     

      $wp_customize->add_section('services_category',array(
        'title' => __('Services Categories','flatter'),
        'capability' => 'edit_theme_options',
        'description' => __('Select the Services Category for Homepage.','flatter'),
        'panel' => 'theme_option'
      ));

      $wp_customize->add_setting(
        'services_title',
          array(
            'sanitize_callback' => 'flatter_sanitize_text',
            'capability' => 'edit_theme_options',  
            'default' => 'Our Services',
          )
      );

      $wp_customize->add_control(
        'services_title',
          array(
          'label' => __('Our Services Title','flatter'),
          'section' => 'services_category',
          'settings' => 'services_title',
          'type' => 'text',
         )
      );

      $wp_customize->add_setting('services_category_display',array(
        'sanitize_callback' => 'flatter_sanitize_category',
        'capability' => 'edit_theme_options',
        'default' => ''
      ));

      $wp_customize->add_control(new flatter_Customize_Dropdown_Taxonomies_Control($wp_customize,'services_category_display',array(
        'label' => __('Choose category','flatter'),
        'section' => 'services_category',
        'settings' => 'services_category_display',
        'type'=> 'dropdown-taxonomies',
        )  
      ));
        $wp_customize->add_setting('services_category_status',array(
        'capability'=>'edit_theme_options',
        'sanitize_callback' => 'flatter_sanitize_text',
        'default'=>0,
        ));
      $wp_customize->add_control(new flatter_Select_Customize_Control($wp_customize,'services_category_status',array(
        'label'=>__('Enable/Disable Services Section','flatter'),
        'section'=>'services_category',
        'settings'=>'services_category_status',
        'type'=>'select',
        'choices'=>array('Enable', 'Disable'),
        )
      ));


      /**********************************************/
      /************* TESTIMONIALS SECTION *************/
      /**********************************************/     

      $wp_customize->add_section('testimonial_category',array(
        'title' => __('Testimonials Categories','flatter'),
        'capability' => 'edit_theme_options',
        'description' => __('Select the Testimonials Category for Homepage.','flatter'),
        'panel' => 'theme_option'
      ));

      $wp_customize->add_setting(
        'testimonial_title',
          array(
            'sanitize_callback' => 'flatter_sanitize_text',
            'capability' => 'edit_theme_options',
            'default' => 'Testimonials',
          )
      );

      $wp_customize->add_control(
        'testimonial_title',
          array(
          'label' => __('Testimonials Title','flatter'),
          'section' => 'testimonial_category',
          'settings' => 'testimonial_title',
          'type' => 'text',
         )
      );

      $wp_customize->add_setting('testimonial_category_display',array(
        'sanitize_callback' => 'flatter_sanitize_category',
        'capability' => 'edit_theme_options',
        'default' => ''
      ));

      $wp_customize->add_control(new flatter_Customize_Dropdown_Taxonomies_Control($wp_customize,'testimonial_category_display',array(
        'label' => __('Choose category','flatter'),
        'section' => 'testimonial_category',
        'settings' => 'testimonial_category_display',
        'type'=> 'dropdown-taxonomies',
        )  
      ));

      $wp_customize->add_setting('testimonial_category_background',array(
        'sanitize_callback' => 'esc_url_raw',
        'capability' => 'edit_theme_options'
        ));

      $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'testimonial_category_background', array(
        'label' => __('Edit Testimonial Background','flatter'),
        'section' => 'testimonial_category',
        'settings' => 'testimonial_category_background'
        )
        ));
        $wp_customize->add_setting('testimonial_category_status',array(
        'capability'=>'edit_theme_options',
        'sanitize_callback' => 'flatter_sanitize_text',
        'default'=>0,
        ));
      $wp_customize->add_control(new flatter_Select_Customize_Control($wp_customize,'testimonial_category_status',array(
        'label'=>__('Enable/Disable Testimonials Section','flatter'),
        'section'=>'testimonial_category',
        'settings'=>'testimonial_category_status',
        'type'=>'select',
        'choices'=>array('Enable', 'Disable'),
        )
      ));

      /**********************************************/
      /************* LATEST POST SECTION *************/
      /**********************************************/     

      $wp_customize->add_section('latestpost_category',array(
        'title' => __('Latest Post Categories','flatter'),
        'capability' => 'edit_theme_options',
        'description' => __('Select the Latest Post Category for Homepage.','flatter'),
        'panel' => 'theme_option'
      ));

      $wp_customize->add_setting(
        'latestpost_title',
          array(
            'sanitize_callback' => 'flatter_sanitize_text',
            'capability' => 'edit_theme_options',
            'default' => 'Latest Post',
          )
      );

      $wp_customize->add_control(
        'latestpost_title',
          array(
          'label' => __('Latest Post Title','flatter'),
          'section' => 'latestpost_category',
          'settings' => 'latestpost_title',
          'type' => 'text',
         )
      );

      $wp_customize->add_setting('latestpost_category_display',array(
        'sanitize_callback' => 'flatter_sanitize_category',
        'capability' => 'edit_theme_options',
        'default' => ''
      ));

      $wp_customize->add_control(new flatter_Customize_Dropdown_Taxonomies_Control($wp_customize,'latestpost_category_display',array(
        'label' => __('Choose category','flatter'),
        'section' => 'latestpost_category',
        'settings' => 'latestpost_category_display',
        'type'=> 'dropdown-taxonomies',
        )  
      ));

          $wp_customize->add_setting('latestpost_category_status',array(
        'capability'=>'edit_theme_options',
        'sanitize_callback' => 'flatter_sanitize_text',
        'default'=>0,
        ));
      $wp_customize->add_control(new flatter_Select_Customize_Control($wp_customize,'latestpost_category_status',array(
        'label'=>__('Enable/Disable Latest Post Section','flatter'),
        'section'=>'latestpost_category',
        'settings'=>'latestpost_category_status',
        'type'=>'select',
        'choices'=>array('Enable', 'Disable'),
        )
      ));


      /**********************************************/
      /************* OUR WORKS SECTION *************/
      /**********************************************/     

      $wp_customize->add_section('ourworks_category',array(
        'title' => __('Our Works Categories','flatter'),
        'capability' => 'edit_theme_options',
        'description' => __('Select the Our Works Category for Homepage.','flatter'),
        'panel' => 'theme_option'
      ));

      $wp_customize->add_setting(
        'ourworks_title',
          array(
            'sanitize_callback' => 'flatter_sanitize_text',
            'capability' => 'edit_theme_options',
            'default' => 'Our Works',
          )
      );

      $wp_customize->add_control(
        'ourworks_title',
          array(
          'label' => __('Our Works Title','flatter'),
          'section' => 'ourworks_category',
          'settings' => 'ourworks_title',
          'type' => 'text',
         )
      );

      $wp_customize->add_setting('ourworks_category_display',array(
        'sanitize_callback' => 'flatter_sanitize_category',
        'capability' => 'edit_theme_options',
        'default' => ''
      ));

      $wp_customize->add_control(new flatter_Customize_Dropdown_Taxonomies_Control($wp_customize,'ourworks_category_display',array(
        'label' => __('Choose category','flatter'),
        'section' => 'ourworks_category',
        'settings' => 'ourworks_category_display',
        'type'=> 'dropdown-taxonomies',
        )  
      ));
      $wp_customize->add_setting('ourworks_category_status',array(
        'capability'=>'edit_theme_options',
        'sanitize_callback' => 'flatter_sanitize_text',
        'default'=>0,
        ));
      $wp_customize->add_control(new flatter_Select_Customize_Control($wp_customize,'ourworks_category_status',array(
        'label'=>__('Enable/Disable Our Works Section','flatter'),
        'section'=>'ourworks_category',
        'settings'=>'ourworks_category_status',
        'type'=>'select',
        'choices'=>array('Enable', 'Disable'),
        )
      ));

       /**********************************************/
      /*************** NEWSLETTER SECTION ***************/
      /**********************************************/

      $wp_customize->add_section('newsletter_text',array(
        'title' => __('Newsletter Section','flatter'),
        'capability' => 'edit_theme_options',
        'description' => __('Write Some Words for Newsletter Section in Homepage.install Newsletter plugin to use this section','flatter'),
        'panel' => 'theme_option'
      ));

      $wp_customize->add_setting(
        'newsletter_textbox',
          array(
            'sanitize_callback' => 'flatter_sanitize_text',
            'capability' => 'edit_theme_options',
            'default' => 'Subscribe for newsletter',
          )
      );

      $wp_customize->add_control(
        'newsletter_textbox',
          array(
          'label' => __('Newsletter Textbox','flatter'),
          'section' => 'newsletter_text',
          'settings' => 'newsletter_textbox',
          'type' => 'text',
         )
      ); 

      /**********************************************/
      /*************** FOOTER SECTION ***************/
      /**********************************************/

       $wp_customize->add_section(
        'footer_section',
          array(
            'title' => __('Footer Settings','flatter'),
            'capability' => 'edit_theme_options',
            'description' => __('Customize your Footer section.','flatter'),
            'panel' => 'theme_option'
        )
      );


      /**********************************************/
      /*************** COPYRIGHTS SECTION **************/
      /**********************************************/
       
      $wp_customize->add_setting(
        'copyright_textbox',
          array(
            'sanitize_callback' => 'flatter_sanitize_text',
            'capability' => 'edit_theme_options',
            'default' => '&copy; 2016. FLATTER. All Rights Reserved.',
          )
      );

      $wp_customize->add_control(
        'copyright_textbox',
          array(
          'label' => __('Copyright text','flatter'),
          'section' => 'footer_section',
          'settings' => 'copyright_textbox',
          'type' => 'text',
         )
      );


      /**********************************************/
      /******* SOCIAL ICON HIDE/ DISPLAY SECTION ********/
      /**********************************************/

      $wp_customize->add_setting('socialicon_display',array(
        'sanitize_callback' => 'flatter_sanitize_text',
        'capability' => 'edit_theme_options',
        'default' => '1'
      ));

      $wp_customize->add_control(new WP_Customize_Control($wp_customize,'socialicon_display',array(
        'label' => __('Show social icons','flatter'),
        'section' => 'footer_section',
        'settings' => 'socialicon_display',
        'type'=> 'checkbox',
        ))
      );


      /**********************************************/
      /********** SOCIAL ICON LINKS SECTION ***********/
      /**********************************************/

      $wp_customize->add_setting(
        'facebook_textbox',
          array(
            'sanitize_callback' => 'esc_url_raw',
            'capability' => 'edit_theme_options',
            'default' => '',
          )
      );

      $wp_customize->add_control(
        'facebook_textbox',
          array(
            'label' =>__('Facebook','flatter'),
            'section' => 'footer_section',
            'settings' => 'facebook_textbox',
            'type' => 'text',
          )
      );

      $wp_customize->add_setting(
        'twitter_textbox',
          array(
            'sanitize_callback' => 'esc_url_raw',
            'capability' => 'edit_theme_options',
            'default' => '',
          )
      );

      $wp_customize->add_control(
        'twitter_textbox',
         array(
          'label' => __('Twitter','flatter'),
          'section' => 'footer_section',
          'settings' => 'twitter_textbox',
          'type' => 'text',
         )
      );

      $wp_customize->add_setting(
        'googleplus_textbox',
          array(
            'sanitize_callback' => 'esc_url_raw',
            'capability' => 'edit_theme_options',
            'default' => '',
          )
      );

      $wp_customize->add_control(
        'googleplus_textbox',
          array(
          'label' => __('Googleplus','flatter'),
          'section' => 'footer_section',
          'settings' => 'googleplus_textbox',
          'type' => 'text',
         )
      );

      $wp_customize->add_setting(
        'youtube_textbox',
          array(
            'sanitize_callback' => 'esc_url_raw',
            'capability' => 'edit_theme_options',
          'default' => '',
          )
      );
      
      $wp_customize->add_control(
        'youtube_textbox',
          array(
            'label' => __('YouTube','flatter'),
            'section' => 'footer_section',
            'settings' => 'youtube_textbox',
            'type' => 'text',
         )
      );

      $wp_customize->add_setting(
        'linkedin_textbox',
            array(
              'sanitize_callback' => 'esc_url_raw',
              'capability' => 'edit_theme_options',
              'default' => '',
          )
      );

      $wp_customize->add_control(
        'linkedin_textbox',
         array(
          'label' => __('Linkedin','flatter'),
          'section' => 'footer_section',
          'settings' => 'linkedin_textbox',
          'type' => 'text',
         )
      );

      /**********************************************/
      /***** ADJUSTMENT OF SIDEBAR POSITION SECTION *****/
      /**********************************************/
     
      $wp_customize->add_panel( 'layout', array(
        'priority' => 160,
        'title' => __( 'Flatter Sidebar Layout', 'flatter' ),
        'description' => __( 'Theme Sidebar Layout', 'flatter' ),
      ));

      $wp_customize->add_section('sidebar' , array(
        'title' => __('Category Sidebar','flatter'),
        'capability' => 'edit_theme_options',
        'panel' => 'layout'
      ));

      $wp_customize->add_setting('sidebar_position', array(
        'sanitize_callback' => 'flatter_sanitize_text',
        'capability' => 'edit_theme_options',
          'default' => 'right'
        ));

      $wp_customize->add_control('sidebar_position', array(
        'label'      => __('Sidebar position', 'flatter'),
        'section'    => 'sidebar',
        'settings'   => 'sidebar_position',
        'type'       => 'radio',
        'choices'    => array(
          'both'   => 'both',
          'left'   => 'left',
          'right'  => 'right',
        ),
      ));


      /**********************************************/
      /********** SINGLE POST SIDEBAR SECTION ***********/
      /**********************************************/
     

      $wp_customize->add_section('single_post_sidebar' , array(
        'title' => __('Single Post Sidebar','flatter'),
        'capability' => 'edit_theme_options',
        'panel' => 'layout'
      ));


      $wp_customize->add_setting('single_post_sidebar_position', array(
        'sanitize_callback' => 'flatter_sanitize_text',
        'capability' => 'edit_theme_options',
          'default' => 'right'
      ));

      $wp_customize->add_control('single_post_sidebar_position', array(
        'label'      => __('Single Post Sidebar position', 'flatter'),
        'section'    => 'single_post_sidebar',
        'settings'   => 'single_post_sidebar_position',
        'type'       => 'radio',
        'choices'    => array(
          'both'   => 'both',
          'left'   => 'left',
          'right'  => 'right',
        ),
      ));


      /**********************************************/
      /********** SINGLE PAGE SIDEBAR SECTION ***********/
      /**********************************************/
     

      $wp_customize->add_section('single_page_sidebar' , array(
        'title' => __('Single Page Sidebar','flatter'),
        'capability' => 'edit_theme_options',
        'panel' => 'layout'
      ));


      $wp_customize->add_setting('single_page_sidebar_position', array(
        'sanitize_callback' => 'flatter_sanitize_text',
        'capability' => 'edit_theme_options',
          'default' => 'right'
      ));

      $wp_customize->add_control('single_page_sidebar_position', array(
        'label'      => __('Single Page Sidebar position', 'flatter'),
        'section'    => 'single_page_sidebar',
        'settings'   => 'single_page_sidebar_position',
        'type'       => 'radio',
        'choices'    => array(
          'both'   => 'both',
          'left'   => 'left',
          'right'  => 'right',
        ),
      ));


      /**********************************************/
      /******** SEARCH PAGE SIDEBAR SECTION *********/
      /**********************************************/     

      $wp_customize->add_section('search_page_sidebar' , array(
        'title' => __('Search Page Sidebar','flatter'),
        'capability' => 'edit_theme_options',
        'panel' => 'layout'
      ));


      $wp_customize->add_setting('search_page_sidebar_position', array(
        'sanitize_callback' => 'flatter_sanitize_text',
        'capability' => 'edit_theme_options',
          'default' => 'right'
      ));

      $wp_customize->add_control('search_page_sidebar_position', array(
        'label'      => __('Search Page Sidebar position', 'flatter'),
        'section'    => 'search_page_sidebar',
        'settings'   => 'search_page_sidebar_position',
        'type'       => 'radio',
        'choices'    => array(
          'both'   => 'both',
          'left'   => 'left',
          'right'  => 'right',
        ),
      ));

      /**********************************************/
      /******** About Flatter *********/
      /**********************************************/    
  $wp_customize->add_section('flatter_about_section', array(    
    'title'       => __('About Flatter Theme', 'flatter'),
    'priority' => 400,    
  ));

  $wp_customize->add_setting( 'flatter_about_section', array(
   'default'               => '',
   'type'                  => 'theme_mod',
   'capability'            => 'edit_theme_options',
   'theme_supports'        => '',
   'transport'             => 'refresh',
   'sanitize_callback' => 'flatter_sanitize_html'      
  ) );

  $wp_customize->add_control(new about_flatter_theme($wp_customize, 'flatter_about_section', 
      array(
        'label' => __('Important Links', 'flatter'),        
        'settings' => 'flatter_about_section',
        'section' => 'flatter_about_section'
      )
    )
  );

      /**********************************************/
      /******** PAGE NOT FOUND SIDEBAR SECTION *********/
      /**********************************************/     

      $wp_customize->add_section('page_not_found_sidebar' , array(
        'title' => __('Page Not Found Sidebar','flatter'),
        'capability' => 'edit_theme_options',
        'panel' => 'layout'
      ));


      $wp_customize->add_setting('page_not_found_sidebar_position', array(
        'sanitize_callback' => 'flatter_sanitize_text',
        'capability' => 'edit_theme_options',
          'default' => 'right'
      ));

      $wp_customize->add_control('page_not_found_sidebar_position', array(
        'label'      => __('Page Not Found Sidebar position', 'flatter'),
        'section'    => 'page_not_found_sidebar',
        'settings'   => 'page_not_found_sidebar_position',
        'type'       => 'radio',
        'choices'    => array(
          'both'   => 'both',
          'left'   => 'left',
          'right'  => 'right',
        ),
      ));      

      
    }

add_action( 'customize_register', 'flatter_customizer_register' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function flatter_customize_preview_js() {
	wp_enqueue_script( 'flatter_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'flatter_customize_preview_js' );

/**
 * Enqueue scripts for customizer
 */
function flatter_customizer_js() {
    wp_enqueue_script('flatter-customizer', get_template_directory_uri() . '/js/flatter-customizer.js', array('jquery'), '1.3.0', true);

    wp_localize_script( 'flatter-customizer', 'flatter_customizer_js_obj', array(
        'pro' => __('Upgrade To Flatter Plus','flatter')
    ) );
    wp_enqueue_style( 'flatter-customizer', get_template_directory_uri() . '/css/flatter-customizer.css');
}
add_action( 'customize_controls_enqueue_scripts', 'flatter_customizer_js' );

function flatter_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function flatter_sanitize_textarea( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function flatter_sanitize_category($input){
  $output=intval($input);
  return $output;

}