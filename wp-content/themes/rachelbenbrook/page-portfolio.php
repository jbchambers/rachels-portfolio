<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>


    <?php the_content(); ?>
    <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>

    <div class="row">
        <div class="col-sm-2">
            <?php get_template_part('templates/sidebar'); ?>
        </div>

        <div class="col-sm-8 col-sm-offset-1">
            <?php $args = array ('post_type'=>'portfolio','order'=>'ASC','orderby'=>'menu_order',);?>
            <?php $query = new WP_Query( $args ); ?>
            <?php if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post();?>

                <div class="col-sm-4 portfolio-item">
                    <a href="#" data-toggle="modal" data-target="#<?= get_the_ID(); ?>">
                        <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
                    </a>
                </div>
                <div class="modal fade" id="<?= get_the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal Content -->
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <ul class="list-inline text-center">
                                    <li>
                                        <h4 class="modal-title" id="<?= get_the_ID(); ?>"><?php the_title(); ?></h4>
                                    </li>
                                    <?php if (get_field('portfolio_url')) { ?>
                                        <li>(<a href="<?php the_field('portfolio_url'); ?>" target="_blank">View Project</a>)</li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!-- Modal Body -->
                            <div class="modal-body">
                                <!--Begin Slideshow-->
                                <div id="slide-<?= get_the_ID(); ?>" class="carousel slide" data-ride="carousel">
                                    <!--Pagers-->
                                    <ol class="carousel-indicators">
                                        <?php $i = 0; while ( have_rows( 'portfolio_images' ) ) : the_row(); ?>
                                            <li data-target="#<?= get_the_ID(); ?>" data-slide-to="<?= $i; ?>" class="<?php if ( $i == 0 ) echo 'active'; ?>"></li>
                                            <?php $i++; endwhile; ?>
                                    </ol>
                                    <!--Slideshow Content-->
                                    <div class="carousel-inner">
                                        <?php $i = 0; while ( have_rows('portfolio_images') ) : the_row(); ?>
                                            <div class="item <?php if ( $i == 0 ) echo 'active'; ?>">
                                                <img class="img-responsive" src="<?php the_sub_field('image'); ?>"/>
                                            </div>
                                            <?php $i++; endwhile; ?>
                                    </div>
                                    <!--Left & Right Controls-->
                                    <a class="left carousel-control" href="#slide-<?= get_the_ID(); ?>" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                    </a>
                                    <a class="right carousel-control" href="#slide-<?= get_the_ID(); ?>" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                    </a>
                                </div>
                            </div>
                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } } else { ?>
                <!-- NO POSTS FOUND -->
            <?php } wp_reset_postdata(); ?>
    </div>



<?php endwhile; ?>
