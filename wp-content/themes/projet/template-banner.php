<?php
/**
 * Template Name: Page avec bannière
 * Template Post Type: page, post
 */
?>
<?php get_header() ?>

<div>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>
    
    <?php the_post_thumbnail('banner', ['class' => 'card-img-top', 'alt' => '', 'style' => 'height: auto;']) ?>
        
       <div id="banner">
        <?php the_content() ?>
</div>
    <?php endwhile ?>

<?php else : ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>

</div>

<?php get_footer() ?>