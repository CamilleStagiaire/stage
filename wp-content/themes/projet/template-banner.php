<?php
/**
 * Template Name: Page avec bannière
 * Template Post Type: page, post
 */
?>
<?php get_header() ?>

<div id="banner">

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>
    <?php the_post_thumbnail('banner', ['class' => 'card-img-top', 'alt' => '', 'style' => 'height: auto;']) ?>
        <h1 class="text-center"><?php the_title() ?></h1>
       
        <?php the_content() ?>
    <?php endwhile ?>

<?php else : ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>

</div>

<?php get_footer() ?>