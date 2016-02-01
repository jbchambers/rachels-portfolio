<?php use Roots\Sage\Titles; ?>

<!-- <div class="page-header">
  <h1><?= Titles\title(); ?></h1>
</div> -->

<!-- <img class="img-responsive pull-right hidden-xs logo-alt" src="<?= get_stylesheet_directory_uri(); ?>/assets/images/temp-logo-alt.png"/> -->
<img class="img-responsive pull-right hidden-xs logo-alt" src="<?php the_field('top_right_logo','option') ?>"/>