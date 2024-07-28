<?php
namespace mercury;

class SidebarLocationConfig extends Base
{
    public function __construct($static = false)
    {
        if (!$static) {
            add_action('init', [$this, 'initSidebarLocations']);
        }
    }

    public function initSidebarLocations()
    {
        $this->addSidebarLocation('sidebar left');
        $this->addSidebarLocation('sidebar right');
    }

    private function addSidebarLocation($sidebar_name, $description = '')
    {
        $key = parent::formatLabel($sidebar_name);

        $args = [
            'name' => ucwords($sidebar_name),
            'id' => $key,
            'description' => $description,
        ];
        register_sidebar($args);
    }

    private function removeSidebarLocation($sidebar_name)
    {
        $key = parent::formatLabel($sidebar_name);
        unregister_sidebar($key);
    }

    static function add_sidebar_location($sidebar_name, $description = '')
    {
        add_action('init', function () use ($sidebar_name, $description) {
            (new self(true))->addSidebarLocation($sidebar_name, $description);
        });
    }

    static function remove_sidebar_location($sidebar_name)
    {
        add_action('init', function () use ($sidebar_name) {
            (new self(true))->removeSidebarLocation($sidebar_name);
        });
    }
}

new SidebarLocationConfig();
