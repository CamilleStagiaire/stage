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

<div id="icones" class="row justify-content-center">

<?php while (have_posts()) : the_post(); ?>
	<div id="hover" class="col-auto">
	<p><?php the_content(); ?></p>
	<?php the_title(); ?>
		<div class="text">
			<!-- <h2><b><a href="<//?php the_permalink() ?>"><//?php the_title(); ?></a></b></h2> -->
</p>
			<p><?php echo get_the_excerpt(); ?></p>
		</div>
	</div>
<?php endwhile;?>


</div>