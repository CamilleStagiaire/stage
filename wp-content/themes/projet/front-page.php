<?php

use Projet\NavMenuWalker;

  get_header(); ?>
<?php  get_template_part('slider', 'home'); ?>

<section id="icone">

<?php  get_template_part('archive', 'icone'); ?>

</section>

<h1>Nous contacter</h1>

<h1>Formulaire</h1>

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

<?php  get_footer(); ?>