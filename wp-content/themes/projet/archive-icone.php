<?php
/*
Template Name: archive-icone
*/
?>

<?php
query_posts(array(
	'post_type' => 'icone',
) );
?>

<div class="row justify-content-around">

<?php while (have_posts()) : the_post(); ?>
	<div class="col-auto p-5 ">
	<p><?php the_content(); ?></p>
	<h4 class="text-center"><?php the_title(); ?></h4>
		<div class="text">
			<!-- <h2><b><a href="<//?php the_permalink() ?>"><//?php the_title(); ?></a></b></h2> -->
</p>
			<p><?php echo get_the_excerpt(); ?></p>
		</div>
	</div>
<?php endwhile;?>


</div>