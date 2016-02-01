<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <a href="<?= get_home_url(); ?>">
            <!-- <img class="img-responsive center-block logo" src="<?= get_stylesheet_directory_uri(); ?>/assets/images/temp-logo.png"/> -->
            <img class="img-responsive center-block logo" src="<?php the_field('top_left_logo','option') ?>"/>
        </a>
        <?php wp_nav_menu( array('menu'=>'Main Nav') ); ?>
    </div>
</div>