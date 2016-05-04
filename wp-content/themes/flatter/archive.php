<?php
/**
 * The template for displaying archive pages.
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
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
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

        		<?php
					$class = 'col-md-6 col-sm-8';
					$sidebar =  get_theme_mod('sidebar_position',__('right','flatter') );
					 if($sidebar != 'both'){
						 $class = 'col-md-9';
					}
				?>          
					
				<?php
				    if ($sidebar == 'left' || $sidebar == 'both'){ 
				        get_sidebar('left');
				       }
				?>

				<div class="<?php echo $class;?> detail-content">
					<h2 class="hidden"><?php the_title(); ?></h2>
					<div class="masonry-2">
						<?php if ( have_posts() ) : ?>

							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>

								<?php
									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', get_post_format() );
								?>

							<?php endwhile; ?>

						<?php else : ?>

							<?php get_template_part( 'template-parts/content', 'none' ); ?>

						<?php endif; ?>
					</div>
					<?php flatter_pagination_bars(); ?>
				</div>

				<?php
				    if ($sidebar == 'right' || $sidebar == 'both'){ 
				        get_sidebar('right');
				       }
				?>

			</div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->
<?php get_footer(); ?>