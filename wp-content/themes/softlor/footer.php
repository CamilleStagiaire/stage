</main>
<footer class="container-fluid">
    <div id="footer" class="row d-flex justify-content-center" style="background-color: <?= get_theme_mod('header_background'); ?>!important">
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
</footer>

<?php wp_footer(); ?>
</body>

</html>