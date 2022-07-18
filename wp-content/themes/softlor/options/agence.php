<?php

// Gestion des horaires / adresse / téléphones dans le meunu réglage Agence
class AgenceMenuPage
{
    const GROUP = 'agence_options';

    public static function register()
    {
        add_action('admin_menu', [self::class, 'addMenu']);
        add_action('admin_init', [self::class, 'registerSettings']);
    }

    public static function registerSettings()
    {
        register_setting(self::GROUP, 'agence_horaire');
        register_setting(self::GROUP, 'agence_adresse');
        register_setting(self::GROUP, 'agence_telephone');

        add_settings_section('agence_options_section', __('Paramètres','softlor'), function () {
            echo __('Vous pouvez gérer les paramètres','softlor');
        }, self::GROUP);
        add_settings_field('agence_options_horaire', __("Horaires d'ouverture",'softlor'), function () {
?>
            <textarea name="agence_horaire" cols="30" rows="10" style="width: 100%;"><?= esc_html(get_option('agence_horaire')) ?></textarea>
        <?php
        }, self::GROUP, 'agence_options_section');
        add_settings_field('agence_options_adresse', __("Adresse",'softlor'), function () {
        ?>
             <textarea name="agence_adresse" cols="30" rows="10" style="width: 100%;"><?= esc_html(get_option('agence_adresse')) ?></textarea>
        <?php
        }, self::GROUP, 'agence_options_section');
        add_settings_field('agence_options_telephone', __("Téléphones",'softlor'), function () {
            ?>
                 <textarea name="agence_telephone" cols="30" rows="10" style="width: 100%;"><?= esc_html(get_option('agence_telephone')) ?></textarea>
            <?php
            }, self::GROUP, 'agence_options_section');
    }

    public static function addMenu()
    {
        add_options_page( "Gestion de l'agence", __("Agence", 'softlor'), "manage_options", self::GROUP, [self::class, 'render']);
    }

    public static function render()
    {
        ?>
        <h1><?=__('Gestion de l\'agence', 'softlor') ?></h1>

        <form action="options.php" method="post">
            <?php
            settings_fields(self::GROUP);
            do_settings_sections(self::GROUP);
            submit_button()
            ?>
        </form>
<?php
    }
}
