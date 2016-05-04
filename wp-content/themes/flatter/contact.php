<?php
/**
 * Template Name: Contactpage
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Flatter
 */

get_header(); ?>



	<section class="page-header" style="background:#404040 url( <?php if ( get_header_image() ) { header_image(); }  ?>)">
	
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-12">
	                <div class="block">
	                    <?php
							the_title( '<h1 class="page-title">', '</h1>' );
						?>
	                    <div class="underline"></div>
	                    <?php flatter_breadcrumbs(); ?>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>

	<section class="inner-content no-padding">
    	<div class="container">
        	<div class="row">
            	<div class="no-padding col-sm-12">
					<?php if ( have_posts() ) : ?>
						
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

					<div class="contact-head">
						<p><?php the_content(); ?></p>
					</div>

					<div class="clearfix"></div>

					<?php if ( is_active_sidebar( 'contact_block' ) ) : ?>
                	<div class="google-map">
                    	<!-- 16:9 aspect ratio -->
                    	<div class="embed-responsive embed-responsive-16by9">                    		
							<?php dynamic_sidebar( 'contact_block' ); ?>							
						</div>
					</div>
					<?php endif; ?>

					<?php endwhile; ?>
				</div>

				<?php endif; ?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>