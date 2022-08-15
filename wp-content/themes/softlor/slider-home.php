<?php

// Carroussel de page d'accueil
$args = [
    'post_type' => 'carrousel',
    'post_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
];
$slider_query = new WP_Query($args);

if ($slider_query->have_posts()) : ?>

    <section id="car" class="container-fluid" style="padding-left: 0;padding-right: 0">
        <div id="slider-01" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php $indicator_index = 0;
                while ($slider_query->have_posts()) : $slider_query->the_post();
                    echo '<button type="button" data-bs-target="#slider-01" data-bs-slide-to="' . $indicator_index . '" class="' . ($indicator_index == 0 ? "active" : "") . '" aria-current="true" aria-label="Slide 1"></button>';
                ?>
                <?php $indicator_index++;
                endwhile; ?>
            </div>
            <?php rewind_posts(); ?>

            <div class="carousel-inner">

                <?php $active_test = true;
                while ($slider_query->have_posts()) : $slider_query->the_post();

                $thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'slider');
                $thumbnail_src = $thumbnail_html['0'];

                if ($active_test) {
                    $theclass = " active";
                }else {
                    $theclass = "";
                }
                  
                ?>
                    <div class="carousel-item<?= $theclass; ?>" >
                        <img src="<?= $thumbnail_src ?>" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-md-block">
                            <h1 class="animate"><?php the_title(); ?></h1>
                            <h3 class="animate"><?php the_content(); ?></h3>
                          
                        </div>
                    </div>

                <?php $active_test = false;
                endwhile;
                wp_reset_postdata() ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#slider-01" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slider-01" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

<?php endif ?>