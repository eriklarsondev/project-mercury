<?php
namespace mercury;

class EditorConfig extends Base
{
    private static $disabled_wysiwyg = [];

    public function __construct()
    {
        // disabled gutenberg editor
        add_filter('use_block_editor_for_post', '__return_false');

        add_filter('user_can_richedit', [$this, 'disableVisualEditor']);
    }

    public function disableVisualEditor($enabled)
    {
        global $post;
        foreach (self::$disabled_wysiwyg as $post_type) {
            if (parent::formatLabel($post_type) === $post->post_type) {
                return false;
            }
        }
        return true;
    }

    static function disable_visual_editor($post_type)
    {
        array_push(self::$disabled_wysiwyg, $post_type);
    }
}

new EditorConfig();
