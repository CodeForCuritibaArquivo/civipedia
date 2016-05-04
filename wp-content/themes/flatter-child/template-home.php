<?php
/**
 * Template Name: Civipedia Home
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Flatter-Child
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
	                    <?php get_search_form(); ?>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>

	<section class="inner-content">
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-12">
					<?php query_posts('post_type=post&post_status=publish&posts_per_page=12&paged='. get_query_var('paged')); ?>
					<?php if ( have_posts() ) : ?>

						<div class="masonry-4">
							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>

								<div class="single-post">									

									<?php if (has_post_thumbnail()) : ?>
									<div class="media img-responsive center-block">
							    		<?php the_post_thumbnail('media-thumb'); ?>
							    	</div>
								  	<?php endif; ?> 
								    <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								    <h6 class="post-info"><?php echo esc_attr( get_the_date('M d Y') );?><?php _e('- Posted by','flatter');?> <?php echo esc_attr( get_the_author_meta('display_name') );?></h6>

								    <p><?php the_excerpt(); ?></p>
								    <a href="<?php the_permalink(); ?>" title="" class="btn read-more"><?php _e('Read More', 'flatter');?></a>
								    
								    <div class="tag-comment">
								        <span class="pull-left"><i class="fa fa-tags"></i> <?php the_tags(); ?></span>
								        <span class="pull-right"><i class="fa fa-comments"></i> <?php comments_popup_link('0 comment','one comment', '% comments');?></span>
								    </div>
								</div>
							<?php endwhile; ?>
						</div>

						<?php flatter_pagination_bars(); ?>

						<?php else : ?>

						<?php get_template_part( 'template-parts/content', 'none' ); ?>

					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>