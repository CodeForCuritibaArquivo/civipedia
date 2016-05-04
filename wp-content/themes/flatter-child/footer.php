<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Flatter
 */

?>
	<?php if ( is_active_sidebar( 'Newsletter Block' ) ) : ?>
    <section class="newsletter">
        <div class="container">
            <div class="row">
                <div class="block wow fadeInUp">
                    <h3><?php echo esc_attr(get_theme_mod( 'newsletter_title', 'Subscribe for newsletter' )); ?></h3>
                    <div class="input-group">
                        <?php dynamic_sidebar( 'Newsletter Block' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<!--
  ______          _
 |  ____|        | |
 | |__ ___   ___ | |_ ___ _ __
 |  __/ _ \ / _ \| __/ _ \ '__|
 | | | (_) | (_) | ||  __/ |
 |_|  \___/ \___/ \__\___|_|

-->

<footer>
    <div class="container">
        <div class="row">
            <?php dynamic_sidebar( 'Footer Block' ); ?>
        </div>
    </div>

    <!-- Copyright -->

    <section class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h6>
                        <?php echo esc_attr(get_theme_mod( 'copyright_textbox', __( '&copy; 2016. FLATTER. All Rights Reserved.', 'flatter' ) ) ); ?>
                        
                    </h6>
                </div>
                <div class="col-sm-6">
                    <h6>
                        
                    </h6>
                </div>

                <div class="col-sm-3">
                    <?php
                    $show_social_in_footer = get_theme_mod('socialicon_display' );
                    if ( $show_social_in_footer) {?>
                        <ul class="list-inline social-media">
                            <?php
                            $facebook =  esc_url(get_theme_mod('facebook_textbox'));
                            $twitter = esc_url(get_theme_mod('twitter_textbox'));
                            $googleplus = esc_url(get_theme_mod('googleplus_textbox'));
                            $youtube = esc_url(get_theme_mod('youtube_textbox'));
                            $linkedin = esc_url(get_theme_mod('linkedin_textbox'));

                            if($facebook){?>
                                <li><a target="_blank"> href="<?php echo $facebook;?>"><i class="fa fa-facebook"></i></a></li>
                            <?php }
                            if($twitter){?>
                                <li><a target="_blank"> href="<?php echo $twitter;?>"><i class="fa fa-twitter"></i></a></li>
                            <?php }
                            if($googleplus) {?>
                                <li><a target="_blank"> href="<?php echo $googleplus;?>"><i class="fa fa-google-plus"></i></a></li>
                            <?php }
                            if($youtube){?>
                                <li><a target="_blank"> href="<?php echo $youtube;?>"><i class="fa fa-youtube-play"></i></a></li>
                            <?php }
                            if($linkedin){?>
                                <li><a target="_blank"> href="<?php echo $linkedin;?>"><i class="fa fa-linkedin"></i></a></li>
                            <?php }?>
                        </ul>

                    <?php }?>
                </div>  <!-- /.end of col-sm-3 -->
            </div>
        </div>
    </section>
</footer>

	<div class="scroll-top-wrapper">
		<span class="scroll-top-inner"><i class="fa fa-angle-double-up"></i></span>
	</div>

	<?php wp_footer(); ?>

</body>
</html>