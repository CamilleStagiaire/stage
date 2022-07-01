<?php get_header();

  while(have_posts()) {
    the_post(); ?>
    <h2><?php the_title(); ?></h2>
    <p><img src="<?php wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'banner') ?>" alt="" style="width:100%; height:auto;"></p>
    <?php the_content(); ?>
    
  <?php }

  get_footer();

?>