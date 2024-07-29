<?php
namespace mercury;

use \WP_Customize_Manager;

global $wp_customize;

class CustomizerConfig extends Base
{
    private static $customizer;

    public function __construct($wp_customizer)
    {
        self::$customizer = $wp_customizer;

        add_action('customize_register', [$this, 'initCustomizerPanels']);
        add_action('customize_register', [$this, 'initCustomizerSections']);
        add_action('customize_register', [$this, 'initCustomizerControls']);
    }

    public function initCustomizerPanels()
    {
        $this->addPanel('mercury');
        $this->addSection('headless theme', 'mercury');
    }

    public function initCustomizerSections()
    {
        $this->addSection('headless theme', 'mercury');
    }

    public function initCustomizerControls()
    {
        $this->addControl('External Website URL', 'website url', 'headless theme');
    }

    private function addPanel($panel_name, $description = '')
    {
        $key = parent::formatLabel($panel_name . ' panel');

        $args = [
            'title' => __(ucwords($panel_name), parent::getRootPath()),
            'description' => __($description, parent::getRootPath()),
            'priority' => 100,
        ];
        self::$customizer->add_panel($key, $args);
    }

    private function addSection($section_name, $panel_name, $description = '')
    {
        $key = parent::formatLabel($section_name . ' section');

        $args = [
            'title' => __(ucwords($section_name), parent::getRootPath()),
            'description' => __($description, parent::getRootPath()),
            'panel' => parent::formatLabel($panel_name . ' panel'),
        ];
        self::$customizer->add_section($key, $args);
    }

    private function addControl($label, $control_name, $section_name, $description = '')
    {
        $key = parent::formatLabel($control_name . 'control');

        self::$customizer->add_setting($key, [
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $args = [
            'type' => 'text',
            'label' => $label,
            'description' => $description,
            'section' => parent::formatLabel($section_name . 'section'),
            'priority' => 10,
        ];
        self::$customizer->add_control($key, $args);
    }
}

new CustomizerConfig($wp_customize);
