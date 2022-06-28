<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head() ?>
</head>

<body style="background-color: <?= get_theme_mod('body_background'); ?>!important">

  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary" style="background-color: <?= get_theme_mod('header_background'); ?>!important">
    <div class="container-fluid">

      <a class="navbar-brand" href="index.php">
        <img src="<?= get_template_directory_uri();?>/images/terre.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
        <?php bloginfo('name') ?>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php wp_nav_menu([
          'theme_location' => 'header',
          'container' => false,
          'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0'
        ]) ?>

        <?= get_search_form() ?>
      </div>

    </div>
  </nav>

  <main class="container-fluid"></main>