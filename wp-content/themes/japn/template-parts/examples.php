<?php /* Template Name: Examples */?>

<?php 
get_header('fixed');
 ?>
<main id="primary" class="site-main">
    <!-- CONTAIN_START -->
    <section id="contain">
        <div class="inner-page-main-ip">
            <div class="banner-block-ip">
                <div class="banner-block-overlay-ip">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 banner-block-in-ip">
                                <div class="banner-middle-ip">
                                    <div class="breadcrumb-ip">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">昼ナビTOP</a></li>
                                            <li class="breadcrumb-item"><a href="#">昼ナビとは</a></li>
                                            <li class="breadcrumb-item active">アドバイザー紹介</li>
                                        </ol>
                                    </div>
                                    <div class="inner-title-ip">
                                        <h2>アドバイザー紹介aaa</h2>
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
                                    <div class="adviser-box-op">
                                        <div class="about-box-border-top-ip"></div>
                                        <div class="interview-box-middle-op">
                                            <div class="interview-title-op">
                                                <div class="interview-title-left-op">アドバイザーコメント</div>
                                                <div class="interview-title-right-op">Advisor Comment</div>
                                            </div>
                                            <div class="interview-info-op">
                                                <p>夜職出身のアドバイザーがあなたの転職を全面サポートします。あなたの強みや持ち味を最大限に引き出し、あなたに合った企業をご紹介。夜職出身だからこそ、あなたの抱えている悩みや不安はよく分かります。1人1人の悩みを解消した上で、長く活躍できる会社に入社できるようお手伝いします。昼職の事については知り尽くしているので、何でも聞いてくださいね！仕事の話はもちろん、プライベートの話もしながら友達のような感覚で気軽にお話ししましょう！
                                                </p>
                                            </div>
                                        </div>
                                        <div class="about-box-border-bottom-ip"></div>
                                    </div>

                                    <div class="adviser-info-ap">
                                        <div class="common-title-hp common-title-2-hp">
                                            <h2><span>A</span>dvisor</h2>
                                            <p>アドバイザー</p>
                                        </div>
                                        <div class="adviser-boxes-ap">
                                            <?php
                                            $args = array('post_type' => 'example', 'posts_per_page' => 3);
                                            $the_query = new WP_Query($args);
                                             ?>
                                            <?php if ($the_query->have_posts()): ?>
                                            <?php while ($the_query->have_posts()): $the_query->the_post();?>
                                            <div class="adviser-box-ap">
                                                <a href="#advisor_<?php the_ID() ?>">
                                                    <div class="adviser-box-img-ap">
                                                        <?php 
                                                    $logo = get_field('main_image'); 
                                                    if( !empty( $logo ) ): ?>
                                                        <img src="<?php echo esc_url($logo['url']); ?>"
                                                            alt="<?php echo esc_attr($logo['alt']); ?>" />
                                                        <?php endif; ?>
                                                    </div>
                                                    <h3><?php the_title(); ?></h3>
                                                    <p><?php the_field('abstract') ?></p>
                                                </a>
                                            </div>
                                            <?php endwhile;
                                                wp_reset_postdata();?>
                                            <?php else: ?>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <?php
                                            $args = array('post_type' => 'example', 'posts_per_page' => 3);
                                            $the_query = new WP_Query($args);
                                             ?>
                                    <?php if ($the_query->have_posts()): ?>
                                    <?php while ($the_query->have_posts()): $the_query->the_post();?>
                                    <div class="adviser-details-ap" id="advisor_<?php the_ID() ?>">
                                        <div class="about-box-ip">
                                            <div class="about-box-border-top-ip"></div>
                                            <div class="about-box-middle-ip">
                                                <div class="about-box-middle-top-ip">
                                                    <div class="about-img-ip">
                                                        <?php 
                                                    $logo = get_field('main_image'); 
                                                    if( !empty( $logo ) ): ?>
                                                        <img src="<?php echo esc_url($logo['url']); ?>"
                                                            alt="<?php echo esc_attr($logo['alt']); ?>" />
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="about-img-right-ip">
                                                        <h2>Advisor</h2>
                                                        <div class="adviser-about-title-ap"><?php the_title(); ?></div>
                                                        <p><?php the_field('abstract') ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="about-box-border-bottom-ip"></div>
                                        </div>
                                        <div class="adviser-details-in-nap">
                                            <?php the_field('content') ?>
                                        </div>
                                        <div class="adviser-details-btn-ap">
                                            <a href="<?php echo get_site_url() ?>/consultation_form" class="common-btn-hp">アドバイザーに相談する</a>
                                        </div>
                                    </div>
                                    <?php endwhile;
                                                wp_reset_postdata();?>
                                    <?php else: ?>
                                    <?php endif;?>
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
        <div class="company-block-hp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 company-block-in-hp">
                        <div class="company-middle-hp">
                            <div class="company-middle-in-hp">
                                <div class="company-img-hp">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="" />
                                </div>
                                <div class="company-info-hp">
                                    昼ナビは、キャバクラ・クラブ・ボーイ・黒服などのナイトワークの方々が昼職に転職に転職したいと考えた時に感じる「履歴書の書き方が分からない」・「自分にあった仕事が分からない」・「昼職の実情が分からない」といったお悩みをアドバイザーが一人ひとりに真剣に向き合い、お話しした上で全て解消し、希望や適正に応じたお仕事をご紹介します。
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </section>
    <!-- CONTAIN_END -->
</main>
<?php get_footer();
?>