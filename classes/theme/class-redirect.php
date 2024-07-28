<?php
namespace mercury;

class RedirectConfig
{
    public function __construct()
    {
        add_action('template_redirect', [$this, 'redirect']);
    }

    public function redirect()
    {
        if (!is_home() && !is_admin()) {
            wp_redirect(home_url(), 301);
        }
    }
}

new RedirectConfig();
