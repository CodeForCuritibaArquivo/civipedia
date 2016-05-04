<?php
/**
 * Template Name: Full Width Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Flatter
 */

get_header(); ?>



	<section class="page-header" style="background-image: url( <?php if ( get_header_image() ) { header_image(); } else { ?> <?php echo esc_url( get_template_directory_uri());?>/images/slider1.jpg <?php } ?> )">
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-12">
	                <div class="block">
	                    <h1 class="page-title"><?php the_title(); ?></h1>
	                    <div class="underline"></div>
	                    <?php flatter_breadcrumbs(); ?>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>

	<section class="inner-content">
    	<div class="container">
        	<div class="row">       		

				<div class="col-md-12 detail-content">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'page' ); ?>	

					<?php endwhile; // End of the loop. ?>
				</div>
				
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->
<?php get_footer(); ?>