<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="<?= get_template_directory_uri(); ?>/images/softlor.png">
  <?php wp_head() ?>
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-secondary" style="background-color: <?= get_theme_mod('header_background'); ?>!important">
    <div class="container-fluid">

      <a class="navbar-brand ps-3" href="http://localhost/stage/wordpress/">
        <img src="<?= get_template_directory_uri(); ?>/images/softlor.png" alt="" width="40" height="40" class="d-inline-block align-text-top">
        <?php bloginfo('name') ?>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
        <?php wp_nav_menu([
          'theme_location' => 'header',
          'container' => false,
          'menu_class' => 'navbar-nav'
        ]) ?>

      </div>
    </div>
  </nav>

  <main class="container-fluid" style="padding-right: 0px; padding-left: 0px ">