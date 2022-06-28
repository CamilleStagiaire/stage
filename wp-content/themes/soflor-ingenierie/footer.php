</div>
<footer class="container-fluid">
        <?php wp_nav_menu([
            'theme_location' =>'footer',
            'container' => false,
            'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0'
        ]);
       // the_widget(YoutubeWidget::class, ['title' => 'Salut', 'youtube' => '8glvVwC-q0w']);
        ?>

    </footer>

<?php wp_footer(); ?>
</body>
</html>