<!-- Bloc de contact -->
<div id="contact" class="mt-5">
  <h1 class="text-center my-5">Nous contacter</h1>
  <div class="divider"></div>
  <div class="mt-5 row fixed-bg d-flex align-items-center" id="contacts">
    <div id="contact1" class="col-md-4 text-center">
      <div>
      <img src="<?= get_template_directory_uri();?>/images/icons-horloge.png" style="color:white;" alt="" width="50" height="50" class="d-inline-block align-text-top">
      </div>
      <?= get_option('agence_horaire') ?>
    </div>
    <div id="contact2" class="col-md-4 text-center">
      <div>
      <img src="<?= get_template_directory_uri();?>/images/icons-geo.png" alt="" width="50" height="50" class="d-inline-block align-text-top">
      </div>
      <?= get_option('agence_adresse') ?>
    </div>
    <div id="contact3" class="col-md-4 text-center">
      <div>
      <img src="<?= get_template_directory_uri();?>/images/icons-tel.png" alt="" width="50" height="50" class="d-inline-block align-text-top">
      </div>
      <?= get_option('agence_telephone') ?>
    </div>
  </div>
</div>

<!-- Formulaire de contact -->
<div class="pb-5" id="form" style="background-color: <?= get_theme_mod('body_background'); ?>!important">
  <h4 class="text-center my-5 pt-5">Envoyer un message</h4>
  <div class="divider"></div>
  <form>
    <div class="row mt-5 text-center">
      <?= do_shortcode('[ninja_form id=1]') ?>
  </form>
</div>