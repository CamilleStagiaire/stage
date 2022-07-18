<?php
// personalisation des couleurs navbar / footer et couleur de fond
add_action('customize_register', function(WP_Customize_Manager $manager) {

    $manager->add_section('softlor_apparence', [
        'title' => __('Couleur entête et pied de page', 'softlor')
    ]);

    $manager->add_setting('header_background', [
        'default' => '#FF0000',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);
    $manager->add_control(new WP_Customize_Color_Control($manager, 'header_background', [
        'section' => 'softlor_apparence',
        'label' => __('Couleur entête et pied de page', 'softlor')
    ]));
});

add_action('customize_register', function(WP_Customize_Manager $manager) {

    $manager->add_section('softlor_background', [
        'title' => __('Personnalisation du fond', 'softlor')
    ]);

    $manager->add_setting('body_background', [
        'default' => '#FFFFFF',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);
    $manager->add_control(new WP_Customize_Color_Control($manager, 'body_background', [
        'section' => 'softlor_background',
        'label' => __('Couleur de fond', 'softlor')
    ]));
});
add_action('customize_preview_init', function() {
    wp_enqueue_script('softlor_apparence', get_template_directory_uri() . '/assets/apparence.js', ['jquery', 'customize-preview'], '', true);
});