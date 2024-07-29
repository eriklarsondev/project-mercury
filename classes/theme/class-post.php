<?php
namespace mercury;

class CustomPostTypeConfig extends Base
{
    public function __construct($static = false)
    {
        if (!$static) {
            add_action('init', [$this, 'initCustomPostTypes']);
        }
    }

    public function initCustomPostTypes()
    {
    }

    private function addPostType($post_type, $config)
    {
        $key = parent::formatLabel($post_type);

        $args = [
            'can_export' => true,
            'capability_type' => 'post',
            'delete_with_user' => false,
            'description' => isset($config->description) ? $config->description : null,
            'exclude_from_search' => true,
            'has_archive' => false,
            'hierarchical' => true,
            'labels' => $this->getPostLabels(
                $post_type,
                isset($config->collection) ? $config->collection : null
            ),
            'menu_icon' => isset($config->icon)
                ? 'dashicons-' . parent::formatLabel($config->icon, '-', false)
                : 'dashicons-admin-plugins',
            'menu_position' => isset($config->order) ? (int) $config->order : null,
            'public' => true,
            'publicly_queryable' => false,
            'query_var' => $key,
            'rest_base' => isset($config->collection)
                ? parent::formatLabel($config->collection . '-', false)
                : parent::formatLabel($post_type . 's', '-', false),
            'rest_namespace' => 'collections',
            'rewrite' => isset($config->collection)
                ? ['slug' => '/collection/' . parent::formatLabel($config->collection, '-', false)]
                : ['slug' => '/collection/' . parent::formatLabel($post_type . 's', '-', false)],
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'show_in_rest' => true,
            'show_ui' => true,
            'supports' => isset($config->features)
                ? $this->getPostFeatures($config->features)
                : $this->getPostFeatures(),
            'taxonomies' =>
                isset($config->categories) && (bool) $config->categories === true
                    ? ['category']
                    : [],
        ];
        register_post_type($key, $args);
    }

    private function removePostType($post_type)
    {
        $key = parent::formatLabel($post_type);
        unregister_post_type($key);
    }

    private function getPostLabels($post_type, $collection = '')
    {
        if (!$collection) {
            $collection = $post_type . 's';
        }
        return ['name' => ucwords($collection), 'singular' => ucwords($post_type)];
    }

    private function getPostFeatures($features = '')
    {
        $supported = [];

        if ($features) {
            $supported = explode(',', $features);
            foreach ($supported as $feature) {
                array_push($supported, parent::formatLabel($feature, '-', false));
            }
        } else {
            $supported = ['title', 'editor'];
        }
        return $supported;
    }

    static function add_post_type($post_type, $config)
    {
        add_action('init', function () use ($post_type, $config) {
            (new self(true))->addPostType($post_type, $config);
        });
    }

    static function remove_post_type($post_type)
    {
        add_action('init', function () use ($post_type) {
            (new self(true))->removePostType($post_type);
        });
    }
}

new CustomPostTypeConfig();
