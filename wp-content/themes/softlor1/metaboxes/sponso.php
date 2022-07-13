<?php

class SponsoMetaBox
{
    const META_KEY = 'softor_sponso';
 


    public static function register()
    {
        add_action('add_meta_boxes', [self::class, 'add'], 10, 2);
        add_action('save_post', [self::class, 'save']);
    }

    public static function add($postType, $post)
    {
        if ($postType === 'post' &&  current_user_can('publish_posts', $post)) {
            add_meta_box(self::META_KEY, 'sponsoring', [self::class, 'render'], 'post', 'side');
        }
       
    }

    public static function render($post)
    {
        $value = get_post_meta($post->ID, self::META_KEY, true);
        ?>
        <input type="hidden" name="<?= self::META_KEY ?>" value="0">
        <input type="checkbox" name="<?= self::META_KEY ?>" value="1" <?= checked($value, '1') ?>>
        <label for="softlorsponso">Cet article est sponsorisé</label>
        <?php
    }

    public static function save(int $post)
    {

        if (array_key_exists(self::META_KEY, $_POST) && current_user_can('publish_posts', $post)) {
            if ($_POST[self::META_KEY] === '0') {
                delete_post_meta($post, self::META_KEY);
            } else {
                update_post_meta($post, self::META_KEY, 1);
            }
        }
    }
}
