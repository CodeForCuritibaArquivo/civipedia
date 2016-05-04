<?php
/**
 * The header for Flatter theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Flatter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<section class="logo-menu">
	<div class="container">		
		<div class="row">
			<div class="col-sm-3">
				<div class="logo">
          			<?php if (get_theme_mod('logo_image') != '') : ?>	                            
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php echo esc_url(get_theme_mod('logo_image')); ?>" alt="<?php bloginfo('name'); ?>" /></a>
                    
                    <?php else : ?>
                        <h1><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>                            
                    <?php endif; ?>
                    <h6 class="slogon"><?php bloginfo('description'); ?></h6>
      			</div>
    		</div> <!-- /.end of col-sm-3 -->

    		<div class="col-sm-9">
                <div class="main-menu">
                	<!-- Static navbar -->
  					<div class="navbar navbar-default" role="navigation">
				        <div class="navbar-header">
				          	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				            	<span class="sr-only"><?php _e('Toggle navigation','flatter'); ?></span>
				            	<span class="icon-bar"></span>
				            	<span class="icon-bar"></span>
				            	<span class="icon-bar"></span>
				          	</button>
				        </div>

				        <div class="navbar-collapse collapse">
          					<!-- Right nav -->		
							<?php
					            wp_nav_menu( array(
					                'menu'              => 'primary',
					                'theme_location'    => 'primary',
					                'depth'             => 8,
					                'container'         => 'div',
					                'menu_class'        => 'nav navbar-nav navbar-left',
					                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					                'walker'            => new wp_bootstrap_navwalker()
					            ));
					        ?>
				    	</div> <!-- /.end of collaspe navbar-collaspe -->
					</div>
                </div>
            </div> <!-- /.end of col-sm-9 -->
        </div>
    </div>
</section>