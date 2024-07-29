<?php
namespace mercury;

class ToolbarConfig
{
    public function __construct()
    {
        // disable toolbar
        add_filter('show_admin_bar', '__return_false');
    }
}

new ToolbarConfig();
