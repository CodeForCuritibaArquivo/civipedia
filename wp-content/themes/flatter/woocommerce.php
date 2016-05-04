<?php
/**
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package ocean_train
 */

get_header(); ?>

	<section class="page-header" style="background:#404040 url( <?php if ( get_header_image() ) { header_image(); }  ?>)">
	
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-12">
	                <div class="block">
	                	<?php if (apply_filters( 'woocommerce_show_page_title', true )) : ?>
                            <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>                    
                        <?php else : ?>
                            <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>                         
                        <?php endif; ?>  

	                    <div class="underline"></div>
	                    	<?php echo woocommerce_breadcrumb(); ?>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>

	<section class="inner-content">
  		<div class="container">
    		<div class="row">

    			<div class="col-md-3">
    				<aside class="sidebar">
	    				<?php if ( is_active_sidebar( 'woocommerce_left' ) ) : ?>	
							<?php dynamic_sidebar( 'woocommerce_left' ); ?>
						<?php endif; ?>
					</aside>
				</div>

				<div class="col-md-9 detail-content">
					<?php woocommerce_content(); ?>	
				</div><!-- #primary -->
			</div>
		</div>
	</section>
<?php get_footer(); ?>