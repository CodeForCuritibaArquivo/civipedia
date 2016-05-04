<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Flatter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="single-page">	
    
    	<?php if(has_post_thumbnail()){
			echo '<div class="featured-image">';
          	$arg =
            	array(
                  'class' => 'img-responsive',
                  'alt' => '',
                  'data-wow-duration'=> '2s'
          		);
          		the_post_thumbnail('full',$arg);
          	echo '</div>';
        	} 
        ?>   

        <div class="content">
        	<?php the_content(); ?>
        	
        	<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'flatter' ),
					'after'  => '</div>',
				) );
			?>
        </div>

        <div class="clearfix"></div>  

        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('social-share') ) : ?>
            <ul class="list-inline">
            	<?php dynamic_sidebar( 'social-share' ); ?>
            </ul>
        <?php endif; ?>     

        <div class="comment-form">
            <?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
        </div>

		<div class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'flatter' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</div><!-- .entry-footer -->
	</div>
</article>