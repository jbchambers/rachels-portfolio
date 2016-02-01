<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>

    <div class="col-sm-2">
        <?php get_template_part('templates/sidebar'); ?>
    </div>

    <div class="col-sm-8 col-sm-offset-1">
        <div class="page-header">
            <h1><?php the_title(); ?></h1>
        </div>
        <?php the_content(); ?>
    </div>

<?php endwhile; ?>
