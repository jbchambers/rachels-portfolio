<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>


    <?php the_content(); ?>
    <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>

    <div class="row">
        <div class="col-sm-2">
            <?php get_template_part('templates/sidebar'); ?>
        </div>

        <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <!--Begin Slideshow-->
                    <div id="homepage-slideshow" class="carousel slide" data-ride="carousel">
                        <!--Pagers-->
                        <ol class="carousel-indicators">
                            <?php $i = 0; while ( have_rows( 'homepage_slideshow' ) ) : the_row(); ?>
                                <li data-target="#homepage-slideshow" data-slide-to="<?= $i; ?>" class="<?php if ( $i == 0 ) echo 'active'; ?>"></li>
                                <?php $i++; endwhile; ?>
                        </ol>
                        <!--Slideshow Content-->
                        <div class="carousel-inner">
                            <?php $i = 0; while ( have_rows('homepage_slideshow') ) : the_row(); ?>
                                <div class="item <?php if ( $i == 0 ) echo 'active'; ?>">
                                    <img class="img-responsive" src="<?php the_sub_field('image'); ?>"/>
                                </div>
                                <?php $i++; endwhile; ?>
                        </div>
                        <!--Left & Right Controls-->
                        <a class="left carousel-control" href="#homepage-slideshow" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#homepage-slideshow" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php endwhile; ?>
