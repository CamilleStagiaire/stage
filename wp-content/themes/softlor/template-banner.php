<?php

/**
 * Template Name: Page avec bannière
 * Template Post Type: page, post
 */
?>
<?php get_header() ?>

<div id="banniere" style="background-color: <?= get_theme_mod('body_background'); ?>!important">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php the_post_thumbnail('banner', ['class' => 'card-img-top', 'alt' => '', 'style' => 'height: auto;']) ?>
            <div class="mb-5"> <?php the_content() ?>
            </div>

        <?php endwhile ?>
    <?php else : ?>
        <h1>Pas d'articles</h1>
    <?php endif; ?>
</div>
<?= get_sidebar('pages')  ?>


<!-- Bloc de contact -->
<?php get_template_part('contact', 'home'); ?>

<?php get_footer() ?>