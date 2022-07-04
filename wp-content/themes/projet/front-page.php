<?php

use Projet\NavMenuWalker;

get_header(); ?>

<?php get_template_part('slider', 'home'); ?>


<section class="mt-5" id="icone">

  <?php get_template_part('archive', 'icone'); ?>

</section>

<h1 class="text-center">A propos</h1>

<h1 class="text-center">Nous contacter</h1>

<div class="container p-5">
  <h4 class="text-center">Envoyer un message</h4>
  <form>
    <div class="row mt-5">
    <?= do_shortcode('[ninja_form id=1]') ?>
  </form>
</div>

<!-- <select name="page-dropdown"
 onchange='document.location.href=this.options[this.selectedIndex].value;'> 
 <option value="">
<//?php echo esc_attr( __( 'Select page' ) ); ?></option> 
 <//?php 
  $pages = get_pages(); 
  foreach ( $pages as $page ) {
    $option = '<option value="' . get_page_link( $page->ID ) . '">';
    $option .= $page->post_title;
    $option .= '</option>';
    echo $option;
  }
 ?>
</select> -->

<?php get_footer(); ?>