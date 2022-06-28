<?php

  get_header();

  while(have_posts()) {
    the_post(); ?>
    <h2><?php the_title(); ?></h2>
    <p><img src="<?php the_post_thumbnail_url() ?>" alt="" style="width:100%; height:auto;"></p>
    <?php the_content(); ?>
    
  <?php }

  get_footer();

?>