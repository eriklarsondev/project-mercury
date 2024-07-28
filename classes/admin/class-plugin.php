<?php
namespace mercury;

class RequiredPluginConfig extends Base
{
    public function __construct($static = false)
    {
        if (!$static) {
            add_action('admin_init', [$this, 'initRequiredPlugins']);
        }
    }

    public function initRequiredPlugins()
    {
    }

    private function requirePlugin($plugin_name, $class_name = '')
    {
        if ($class_name) {
            if (!class_exists($class_name)) {
                return false;
            }
            return true;
        } else {
        }
    }

    private function renderError($plugin_name)
    {
        add_action('admin_notices', function () use ($plugin_name) {});
    }
}

new RequiredPluginConfig();
