<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Flatter
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
              echo esc_attr( flatter_the_post_thumbnail_caption() );
          	echo '</div>';              
        	} 
        ?> 

        <div class="post-info">
            <span class="pull-left"><?php echo esc_attr( get_the_date('M d Y') );?><?php _e('- POSTED BY','flatter'); ?> <?php echo esc_html( get_the_author_meta('display_name') );?></span>
            
            <span class="pull-right"><i class="fa fa-tags"></i> <?php the_tags(); ?> &nbsp;<i class="fa fa-comments"></i> <?php comments_popup_link('zero comment','one comment', '% comments');?></span>
        </div>

        <div class="clearfix"></div>

        <div class="content">
        	<?php the_content(); ?>
        	
        	<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'flatter' ),
					'after'  => '</div>',
				) );
			?>
        </div>    
    

        <?php flatter_post_nav(); ?>

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
</div>