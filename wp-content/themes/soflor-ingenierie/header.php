<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head() ?>
</head>

<body>

  <nav class="navbar navbar-dark bg-secondary" style="background-color: <?= get_theme_mod('header_background'); ?>!important">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="images/terre.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
        <?php bloginfo('name') ?>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarToggler">
        <?php wp_nav_menu([
          'theme_location' => 'header',
          'container' => false,
          'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0'
        ]) ?>
      </div>
      <?= get_search_form() ?>
    </div>
  </nav>
  
  <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-secondary mb-4" style="background-color: <//?= get_theme_mod('header_background'); ?>!important ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <//?php the_title(); ?>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarToggleExternalContentt">
        <//?php wp_nav_menu([
          'theme_location' => 'header',
          'container' => false,
        ]) ?>

        
      </div>
    </div>
  </nav> -->


  <div class="container">

    <!-- 
      <div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-dark p-4">
    <h5 class="text-white h4">Collapsed content</h5>
    <span class="text-muted">Toggleable via the navbar brand.</span>
  </div>
</div>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
     -->