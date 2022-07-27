<?php
get_header(); ?>

<?php get_template_part('slider', 'home'); ?>

<!-- Bloc d'icones -->
<article class="mt-5 py-5" id="icone">
  <?php
  $args = [
    'post_type' => 'page',
    'pagename' => 'softlor',
  ];
  // The Query
  $the_query = new WP_Query($args);

  // The Loop
  if ($the_query->have_posts()) {
    while ($the_query->have_posts()) {
      $the_query->the_post();
      echo '<h1 class="text-center mb-5">' . get_field('affichage') . '</h1>';
    }
  }
  wp_reset_postdata(); ?>

  <div class="divider"></div>
  <?php get_template_part('archive', 'icone'); ?>
</article>

<!-- Bloc à propos -->
<article class="py-5" id="propos" style="background-color: <?= get_theme_mod('body_background'); ?>!important">
  <?php
  query_posts(array(
    'post_type' => 'post',
    'category_name'  => 'accueil',
  ));
  ?>

  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <h2 class="text-center mx-5"><?php the_title(); ?></h2>
      <h4 class="text-center mx-5"> <?php the_excerpt(); ?></h4>
      <div class="divider my-5"></div>
      <div class="row m-5">
        <div id="logo" class="col-lg-2 text-center">
          <?php the_post_thumbnail() ?>
        </div>
        <div class="col-lg-9">
          <?php the_content(); ?>
        <?php endwhile ?>
      <?php endif ?>
        </div>
      </div>
</article>

<!-- Bloc de contact -->
<?php get_template_part('contact', 'home'); ?>

<?php get_footer(); ?>