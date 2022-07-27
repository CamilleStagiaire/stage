<!-- <//?php get_header(); ?>

<//?php if (have_posts()) : ?>
        <//?php while (have_posts()) : the_post(); ?> 
               <h2 class="text-center"><//?php the_title(); ?></h2>
            <div class="ms-3">
               <//?php the_content(); ?>
               </div>
        <//?php endwhile ?>
<//?php else : ?>
    <h1>Pas d'articles</h1>
<//?php endif ?> 
<//?php get_footer(); ?> -->