<?php
/**
 * Template Name: Portfolio
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>

    <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>


    <div class="row">
        <div class="col-sm-2">
            <?php get_template_part('templates/sidebar'); ?>
        </div>

        <div class="col-sm-8 col-sm-offset-1">

            <p>Select Each Image to View Full Project</p>

            <?php

            // check if the repeater field has rows of data
            if( have_rows('portfolio_items') ):

                // loop through the rows of data
                while ( have_rows('portfolio_items') ) : the_row(); ?>
                    <div class="col-xs-6 col-sm-4">
                        <a href="#" data-toggle="modal" data-target="#<?php the_sub_field('id');?>">
                            <img class="img-responsive center-block" src="<?php the_sub_field('featured_image');?>" alt=""/>
                        </a>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="<?php the_sub_field('id');?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel"><?php the_sub_field('title');?></h4>
                                </div>
                                <div class="modal-body">

                                    <!--Begin Slideshow-->
                                    <div id="slide-<?php the_sub_field('id');?>" class="carousel slide" data-ride="carousel">
                                        <!--Pagers-->
                                        <ol class="carousel-indicators">
                                            <?php $i = 0; while ( have_rows( 'images' ) ) : the_row(); ?>
                                                <li data-target="#<?php the_sub_field('id');?>" data-slide-to="<?= $i; ?>" class="<?php if ( $i == 0 ) echo 'active'; ?>"></li>
                                                <?php $i++; endwhile; ?>
                                        </ol>
                                        <!--Slideshow Content-->
                                        <div class="carousel-inner">
                                            <?php $i = 0; while ( have_rows('images') ) : the_row(); ?>
                                                <div class="item <?php if ( $i == 0 ) echo 'active'; ?>">
                                                    <img class="img-responsive" src="<?php the_sub_field('image'); ?>"/>
                                                </div>
                                                <?php $i++; endwhile; ?>
                                        </div>
                                        <!--Left & Right Controls-->
                                        <a class="left carousel-control" href="#slide-<?php the_sub_field('id');?>" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                        </a>
                                        <a class="right carousel-control" href="#slide-<?php the_sub_field('id');?>" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                        </a>
                                    </div>





                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

               <?php endwhile;

            else :

                // no rows found

            endif;

            ?>
        </div>
    </div>



<?php endwhile; ?>

