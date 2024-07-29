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
        add_action('admin_init', [$this, 'disableNativeTaxonomySupport']);
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

    public function disableNativeTaxonomySupport()
    {
        // disable post tags for posts
        unregister_taxonomy_for_object_type('post_tag', 'post');

        // disable page attributes for pages
        remove_post_type_support('page', 'page-attributes');
    }

    static function disable_visual_editor($post_type)
    {
        array_push(self::$disabled_wysiwyg, $post_type);
    }
}

new EditorConfig();
