<?php get_header(); ?>

<?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?> 
               <h2><?php the_title(); ?></h2></h2>
            
               <?php the_content(); ?>
        <?php endwhile ?>
<?php else : ?>
    <h1>Pas d'articles</h1>
<?php endif ?> 
<?php get_footer(); ?>