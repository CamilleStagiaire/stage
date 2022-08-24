</main>
<footer class="container-fluid">
    <div>
        <div class="row" style="background-color: <?= get_theme_mod('header_background'); ?>!important">
            <div id="horaires" class="row">
                <div class="col-md-4">
                    <h5 class="text-center">Horaires d'ouverture</h5>
                    <p class="text-center"><?= get_option('agence_horaire') ?></p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-center">Venir nous voir</h5>
                    <p class="text-center"><?= get_option('agence_adresse') ?></p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-center">Nous appeler</h5>
                    <p class="text-center"><?= get_option('agence_telephone') ?></p>
                </div>
            </div>
            <div id="footer" class="row d-flex justify-content-center">
                <div class="col-auto">
                    <p>SOFTLOR INGENIERIE © 2006 – 2022</p>
                </div>
                <div class="col-auto">
                    <?php wp_nav_menu([
                        'theme_location' => 'footer',
                        'container' => false,
                        'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0'
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>