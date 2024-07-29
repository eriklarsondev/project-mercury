<?php
namespace mercury;

class FontFaceConfig
{
    public function __construct()
    {
        add_action('wp_footer', [$this, 'initCustomFontFaces']);
    }

    public function initCustomFontFaces()
    {
        $path = dirname(get_template_directory_uri()) . '/fonts'; ?>
        <style>
            @font-face {
                font-family: 'Roboto Condensed';
                font-weight: 300;
                font-display: auto;
                src: url(<?php echo $path . '/RobotoCondensed-Light.ttf'; ?>) format('truetype');
            }

            @font-face {
                font-family: 'Roboto Condensed';
                font-weight: 400;
                font-display: auto;
                src: url(<?php echo $path . '/RobotoCondensed-Regular.ttf'; ?>) format('truetype');
            }

            @font-face {
                font-family: 'Roboto Condensed';
                font-weight: 500;
                font-display: auto;
                src: url(<?php echo $path . '/RobotoCondensed-Medium.ttf'; ?>) format('truetype');
            }
        </style>
        <?php
    }
}

new FontFaceConfig();
