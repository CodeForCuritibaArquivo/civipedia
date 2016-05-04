<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Flatter
 */

get_header(); ?>



		<section class="page-header" style="background:#404040 url( <?php if ( get_header_image() ) { header_image(); }  ?>)">
		
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-12">
	                <div class="block">
	                    <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'flatter' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
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
					$class = 'col-md-6';
					$sidebar =  get_theme_mod('search_page_sidebar_position',__('right','flatter'));
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
					<?php if ( have_posts() ) : ?>

					<div class="masonry-2">
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );
							?>

						<?php endwhile; ?>
					</div>

						<?php the_posts_navigation(); ?>

					<?php else : ?>

						<?php get_template_part( 'template-parts/content', 'none' ); ?>

					<?php endif; ?>
				</div>
				<?php
				    if ($sidebar == 'right' || $sidebar == 'both'){ 
				        get_sidebar('right');
				       }
				?>
			</div>
		</div>
	</section><!-- #primary -->


<?php get_footer(); ?>