<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Japn
 */

get_header('fixed');
?>
<main id="primary" class="site-main">

    <?php while ( have_posts() ) :	the_post();	?>
    <div class="inner-page-main-ip">
        <div class="banner-block-ip">
            <div class="banner-block-overlay-ip">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 banner-block-in-ip">
                            <div class="banner-middle-ip">
                                <div class="breadcrumb-ip">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo get_site_url(); ?>">昼ナビ</a></li>
                                        <li class="breadcrumb-item active"><?php the_title();?></li>
                                    </ol>
                                </div>
                                <div class="inner-title-ip">
                                    <h2><span><?php the_title();?></h2>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="about-block-ip interview-block-op">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 about-block-in-ip">
                        <div class="about-middle-ip">
                            <div class="about-left-ip">
                                <div class="about-box-ip interview-box-idp">
                                    <div class="about-box-border-top-ip"></div>
                                    <div class="about-box-middle-ip">
                                        <div class="about-box-middle-top-ip">
                                            <div class="about-img-ip">
                                                <?php 
                                                    $logo = get_field('log'); 
                                                    if( !empty( $logo ) ): ?>
                                                <img src="<?php echo esc_url($logo['url']); ?>"
                                                    alt="<?php echo esc_attr($logo['alt']); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            <div class="about-img-right-ip">
                                                <div class="adviser-about-title-ap">
                                                    <?php the_field('title') ?>
                                                </div>
                                                <p class="h5">
                                                    <?php the_field('company') ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="about-box-border-bottom-ip"></div>
                                </div>
                                <div class="adviser-details-info-ap mt-4">
                                    <p>
                                        <?php the_field('abstract') ?>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    </div>

    <?php endwhile;
    wp_reset_postdata();?>

</main><!-- #main -->

<?php  get_footer(); ?>