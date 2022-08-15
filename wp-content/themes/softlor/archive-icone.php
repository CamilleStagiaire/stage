<?php
/*
Template Name: archive-icone
*/
?>

<?php

// gestion des icones dynaniques de la page d'accueil 
query_posts(array(
	'post_type' => 'icone',
	'orderby' => 'menu_order',
	'order' => 'ASC',
));
?>

<div class="row justify-content-around">
	<?php while (have_posts()) : the_post(); ?>
		<div class="col-md-3 p-5 ">
			<h4 class="text-center"><?php the_title(); ?></h4>
			<div class="text-center">
				<p><?= the_content(); ?></p>
			</div>
		</div>
	<?php endwhile; ?>
</div>