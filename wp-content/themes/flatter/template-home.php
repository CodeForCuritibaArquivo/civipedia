<?php
/**
 * Template Name: Frontpage
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

	<header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
       	<ol class="carousel-indicators">
       	<?php $i = 0; $num=get_theme_mod('slider_category_display_num'); ?>
       	<?php while($i<=$num) { ?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>" class="<?php if($i==0){echo 'active';}?>"></li>
         <?php $i=$i+1;}?> 
        </ol> 

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
        	<?php
				$cid = get_theme_mod('slider_category_display');
				$category_link = get_category_link($cid);
				$flatter_cat = get_category($cid);
				if ($flatter_cat) {
        	?>

        	<?php
				global $post;
				$cnum=get_theme_mod('slider_category_display_num');
				$cnum=$cnum+1;
	            $args = array(
	              'posts_per_page' => $cnum,
	              'paged' => 1,
	              'cat' => $cid
	            );
	            $loop = new WP_Query($args);

	          
	            if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();
	          ?>
            
            <div class="item">
            	<div class="overlay"></div>
            	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'flatter-slider-thumb' ); ?>
				<div class="fill" style="background-image: url( <?php if ( has_post_thumbnail() ) {
					echo $image[0]; } else { ?>
				<?php echo esc_url( get_template_directory_uri());?>/images/slider1.jpg <?php } ?> )">
                </div>
                
                <div class="carousel-caption outer">
                 	<div class="middle">
                    	<div class="inner wow zoomIn" data-wow-duration="1.5s">
                    		<h3><?php the_title();?></h3>
                    		<?php the_excerpt();?>
                    		<div class="buttons text-center">
                    		<?php if(get_theme_mod('slider_button')) { ?>
                    			<span><a href="<?php echo esc_url(get_theme_mod( 'slider_button', 'http://oceanwebthemes.com' )); ?>" class="btn btn-slider" title=""><?php _e('Contact Us', 'flatter'); ?></a></span>
                    		<?php }?>
                    			<span><a href="<?php the_permalink();?>" class="btn btn-slider" title=""><?php _e('Read More','flatter'); ?></a></span>
                    		</div>
                    	</div>
                    </div>
                </div>
            </div>
            <?php                 
      			endwhile;
      				wp_reset_postdata();  
      			endif;                             
    				}
    		?>
        </div>
    </header>

	<!-- 
	  ______            _                          
	 |  ____|          | |                         
	 | |__  ___   __ _ | |_  _   _  _ __  ___  ___ 
	 |  __|/ _ \ / _` || __|| | | || '__|/ _ \/ __|
	 | |  |  __/| (_| || |_ | |_| || |  |  __/\__ \
	 |_|   \___| \__,_| \__| \__,_||_|   \___||___/
	                                                                                           
	-->
	<?php $status=get_theme_mod('featured_category_status'); 
	if($status==0):?> 
	<section class="intro">
	    <div class="container">
	        <div class="row">
	        	<?php
					$cid = get_theme_mod('features_category_display');
					$category_link = get_category_link($cid);
					$flatter_cat = get_category($cid);
					if ($flatter_cat) {
	        	?>

	        	<?php
		            $args = array(
		              'posts_per_page' => 4,
		              'paged' => 1,
		              'cat' => $cid
		            );
		            $loop = new WP_Query($args);
		            
		            $cn = 0;
		            if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();$cn++;
		          ?>

	            <div class="col col-md-3 col-sm-6">
	                <div class="single wow fadeInUp">
	                    <div class="icon">
	                    	<?php if(has_post_thumbnail()){
			                	$arg =
			                  	array(
			                      'class' => 'img-responsive center-block'
			                		);
			                	the_post_thumbnail('flatter-features-thumb',$arg);
			              	  } 
			                ?>
	                    </div>
	                    <h3 class="block-title"><?php the_title();?></h3>
						<?php the_excerpt();?>
	                    <a href="<?php the_permalink();?>" class="btn read-more" title="<?php the_title();?>"><i class="fa fa-angle-double-right"></i></a>
	                </div>
	            </div>
	            <?php                 
	      			endwhile;
	      				wp_reset_postdata();  
	      			endif;                             
	    			}
    			?> 
	        </div>
	    </div>
	</section>

<?php endif; ?>
<!--
	   _____                     _                 
	  / ____|                   (_)                
	 | (___    ___  _ __ __   __ _   ___  ___  ___ 
	  \___ \  / _ \| '__|\ \ / /| | / __|/ _ \/ __|
	  ____) ||  __/| |    \ V / | || (__|  __/\__ \
	 |_____/  \___||_|     \_/  |_| \___|\___||___/
	                                               
	                                               
	 -->
	 <?php $statusservices=get_theme_mod('services_category_status'); 
	if($statusservices==0):?> 
	<section class="services">
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-12">
	                <div class="section-title">
	                    <h3><?php echo esc_attr(get_theme_mod( 'services_title', 'Our Service','flatter' )); ?></h3>
	                    <div class="underline"></div>
	                </div>
	            </div>

	            <?php
					$cid = get_theme_mod('services_category_display');
					$category_link = get_category_link($cid);
					$flatter_cat = get_category($cid);
					if ($flatter_cat) {
	        	?>

	        	<?php
		            $args = array(
		              'posts_per_page' => 4,
		              'paged' => 1,
		              'cat' => $cid
		            );
		            $loop = new WP_Query($args);
		            
		            $cn = 0;
		            if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();$cn++;
		        ?>

	            <div class="col col-md-3 col-sm-6">
	                <div class="single wow fadeInUp">
	                    <?php if(has_post_thumbnail()){
			                $arg =
			                  	array(
			                      'class' => 'img-responsive center-block'
			                		);
			                the_post_thumbnail('flatter-services-thumb',$arg);
			              	} 
			            ?>
	                    <div class="content">
	                        <h3 class="block-title"><?php the_title();?></h3>
							<?php the_excerpt();?>
	                        <a href="<?php the_permalink();?>" class="btn read-more" title=""><?php _e('Read More','flatter'); ?></a>
	                    </div>
	                </div>
	            </div>
	            <?php                 
	      			endwhile;
	      				wp_reset_postdata();  
	      			endif;                             
	    			}
    			?>
	        </div>
	    </div>
	</section>
<?php endif; ?>
	<!-- 
	  _______          _    _                           _         _      
	 |__   __|        | |  (_)                         (_)       | |     
	    | |  ___  ___ | |_  _  _ __ ___    ___   _ __   _   __ _ | | ___ 
	    | | / _ \/ __|| __|| || '_ ` _ \  / _ \ | '_ \ | | / _` || |/ __|
	    | ||  __/\__ \| |_ | || | | | | || (_) || | | || || (_| || |\__ \
	    |_| \___||___/ \__||_||_| |_| |_| \___/ |_| |_||_| \__,_||_||___/
	                                                                     
	                                                                     
	- -->
 <?php $statustestimonial=get_theme_mod('testimonial_category_status'); 
	if($statustestimonial==0):?> 
	<section class="testimonials" style="background:#404040 url(<?php echo esc_url(get_theme_mod('testimonial_category_background'));?>);">
		<div class="overlay"></div>
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-12">
	                <div class="section-title">
	                    <h3><?php echo esc_attr(get_theme_mod( 'testimonial_title', __('Testimonials', 'flatter' ))); ?></h3>
	                    <div class="underline"></div>
	                </div>
	            </div>

	            <div class="col-sm-12">  	            
                	<div id="owl-demo" class="owl-carousel owl-theme wow fadeInUp">
                		<?php
							$cid = get_theme_mod('testimonial_category_display');
							$category_link = get_category_link($cid);
							$flatter_cat = get_category($cid);
							if ($flatter_cat) {
			        	?>

			        	<?php
				            $args = array(
				              'posts_per_page' => -1,
				              'paged' => 1,
				              'cat' => $cid
				            );
				            $loop = new WP_Query($args);
				            
				            $cn = 0;
				            if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();$cn++;
				        ?>
	                  	<div class="item">
	                      	<div class="feedback">
								<?php the_excerpt();?>
	                      	</div>
	                      	<div class="client-info">
	                          <h3><?php the_title();?></h3>
	                      	</div>
	                  	</div>            
	            
			            <?php                 
			      			endwhile;
			      				wp_reset_postdata();  
			      			endif;                             
			    			}
						?>
					</div>
				</div>
	        </div>
	    </div>
	</section>
<?php endif; ?>

	<!-- 
	  _             _              _     _____             _   
	 | |           | |            | |   |  __ \           | |  
	 | |      __ _ | |_  ___  ___ | |_  | |__) |___   ___ | |_ 
	 | |     / _` || __|/ _ \/ __|| __| |  ___// _ \ / __|| __|
	 | |____| (_| || |_|  __/\__ \| |_  | |   | (_) |\__ \| |_ 
	 |______|\__,_| \__|\___||___/ \__| |_|    \___/ |___/ \__|
	                                                           
	                                                           
	 -->
<?php $statuslatest=get_theme_mod('latestpost_category_status'); 
	if($statuslatest==0):?> 
	<section class="latest-post">
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-12">
	                <div class="section-title">
	                    <h3><?php echo esc_attr(get_theme_mod( 'latestpost_title', __('Latest Post','flatter' ))); ?></h3>
	                    <div class="underline"></div>
	                </div>
	            </div>

	            <?php
					$cid = get_theme_mod('latestpost_category_display');
					$category_link = get_category_link($cid);
					$flatter_cat = get_category($cid);
					if ($flatter_cat) {
	        	?>

	        	<?php
		            $args = array(
		              'posts_per_page' => 4,
		              'paged' => 1,
		              'cat' => $cid
		            );
		            $loop = new WP_Query($args);
		            
		            $cn = 0;
		            if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();$cn++;
		        ?>

	            <div class="col col-md-3 col-sm-6">
	                <div class="single wow fadeInUp">
	                	<div class="lpimg">
		                    <?php if(has_post_thumbnail()){
				                $arg =
				                  	array(
				                      'class' => 'img-responsive center-block'
				                		);
				                the_post_thumbnail('flatter-lpost-thumb',$arg);
				              	} 
				            ?>
			            </div>
	                    <div class="content">
	                    	<div class="post-info">
	                    		<span class="pull-left"><i class="fa fa-calendar"></i> <?php echo esc_attr( get_the_date('d M Y') ) ;?></span>
	                    		<span class="pull-right"><i class="fa fa-comments"></i> &nbsp; <?php comments_popup_link('0 comment','one comment', '% comments');?></span>
	                    	</div>

	                        <h3 class="block-title"><?php the_title();?></h3>
							<?php the_excerpt();?>
	                        <a href="<?php the_permalink();?>" class="btn read-more" title=""><?php _e('Read More', 'flatter');?></a>
	                    </div>
	                </div>
	            </div>
	            <?php                 
	      			endwhile;
	      				wp_reset_postdata();  
	      			endif;                             
	    			}
				?>
	        </div>
	    </div>
	</section>
<?php endif; ?>
	<!-- 
	                                             _         
	                                            | |        
	   ___   _   _  _ __  __      __ ___   _ __ | | __ ___ 
	  / _ \ | | | || '__| \ \ /\ / // _ \ | '__|| |/ // __|
	 | (_) || |_| || |     \ V  V /| (_) || |   |   < \__ \
	  \___/  \__,_||_|      \_/\_/  \___/ |_|   |_|\_\|___/
	                                                       
	                                                       
	 -->
<?php $statusworks=get_theme_mod('ourworks_category_status'); 
	if($statusworks==0):?> 
	<section class="our-works">
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-12">
	                <div class="section-title">
	                    <h3><?php echo esc_attr(get_theme_mod( 'ourworks_title', __('Our Works', 'flatter' ))); ?></h3>
	                    <div class="underline"></div>
	                </div>
	            </div>

	            <?php
					$cid = get_theme_mod('ourworks_category_display');
					$category_link = get_category_link($cid);
					$flatter_cat = get_category($cid);
					if ($flatter_cat) {
	        	?>

	        	<?php
		            $args = array(
		              'posts_per_page' => 8,
		              'paged' => 1,
		              'cat' => $cid
		            );
		            $loop = new WP_Query($args);
		            
		            $cn = 0;
		            if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();$cn++;
		        ?>

	            <div class="col-md-3 col-sm-6 single wow fadeInUp">
	                <?php if(has_post_thumbnail()){
		                $arg =
		                  	array(
		                      'class' => 'img-responsive center-block'
		                		);
		                the_post_thumbnail('flatter-works-thumb',$arg);
		              	} 
		            ?>
	                <div class="on-hover">
		                <div class="outer">
		                    <div class="middle">
		                        <div class="inner">
		                            <h3 class="category"><?php the_title();?></h3>
		                            <div class="underline"></div>
									<?php the_excerpt();?>
		                            <a href="<?php the_permalink();?>" title="" class="btn read-more"><?php _e('Read More', 'flatter');?></a>
		                        </div>
		                    </div>
		                </div>
	                </div>
	            </div>            
	            <?php                 
	      			endwhile;
	      				wp_reset_postdata();  
	      			endif;                             
	    			}
				?>
	        </div>
	    </div>
	</section>
<?php endif; ?>	
<?php get_footer(); ?>