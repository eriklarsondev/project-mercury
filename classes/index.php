<?php
namespace mercury;

include_once __DIR__ . '/util/class-base.php';

include_once __DIR__ . '/theme/class-enqueue.php';
include_once __DIR__ . '/theme/class-excerpt.php';
include_once __DIR__ . '/theme/class-menu.php';
include_once __DIR__ . '/theme/class-post.php';
include_once __DIR__ . '/theme/class-redirect.php';
include_once __DIR__ . '/theme/class-sidebar.php';
include_once __DIR__ . '/theme/class-support.php';

include_once __DIR__ . '/admin/class-editor.php';
include_once __DIR__ . '/admin/class-plugin.php';

class Mercury
{
    /**
     * constructor
     */
    public function __construct()
    {
    }

    /**************************************************************************
     *** methods for menu location config
     *************************************************************************/

    /**
     * add new menu location
     *
     * @param string $menu_name
     * @return void
     */
    public function addMenuLocation($menu_name)
    {
        MenuLocationConfig::add_menu_location($menu_name);
    }

    /**
     * remove existing menu location
     *
     * @param string $menu_name
     * @return void
     */
    public function removeMenuLocation($menu_name)
    {
        MenuLocationConfig::remove_menu_location($menu_name);
    }

    /**************************************************************************
     *** methods for custom post type config
     *************************************************************************/

    /**
     * add new custom post type
     *
     * @param string $post_type
     * @param object $config
     * @return void
     */
    public function addPostType($post_type, $config)
    {
        CustomPostTypeConfig::add_post_type($post_type, $config);
    }

    /**
     * remove existing custom post type
     *
     * @param string $post_type
     * @return void
     */
    public function removePostType($post_type)
    {
        CustomPostTypeConfig::remove_post_type($post_type);
    }

    /**************************************************************************
     *** methods for sidebar location config
     *************************************************************************/

    /**
     * add new sidebar location
     *
     * @param string $sidebar_name
     * @param string $description
     * @return void
     */
    public function addSidebarLocation($sidebar_name, $description = '')
    {
        SidebarLocationConfig::add_sidebar_location($sidebar_name, $description);
    }

    /**
     * remove existing sidebar location
     *
     * @param string $sidebar_name
     * @return void
     */
    public function removeSidebarLocation($sidebar_name)
    {
        SidebarLocationConfig::remove_sidebar_location($sidebar_name);
    }

    /**************************************************************************
     *** methods for theme support config
     *************************************************************************/

    /**
     * add new theme support
     *
     * @param string $feature
     * @return void
     */
    public function addThemeSupport($feature)
    {
        ThemeSupportConfig::add_theme_support($feature);
    }

    /**
     * remove existing theme support
     *
     * @param string $feature
     * @return void
     */
    public function removeThemeSupport($feature)
    {
        ThemeSupportConfig::remove_theme_support($feature);
    }
}
