<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;



add_action('admin_menu', function () {
    remove_action('admin_notices', 'update_nag', 3);
});

add_action('admin_init', function () {
    $options_pages = ['page_for_events'];

    foreach ($options_pages as $option) {
        add_settings_field($option, ucfirst(str_replace('_', ' ', $option)), function ($args) use ($option) {
            wp_dropdown_pages(array(
                'name'              => $option,
                'show_option_none'  => '&mdash; Select &mdash;',
                'option_none_value' => '0',
                'selected'          => get_option($option),
            ));
        }, 'reading', 'default', array(
            'label_for' => 'field-' . $option,
            'class'     => 'row-' . $option,
        ));

        add_filter('allowed_options', function ($options) use ($option) {
            $options['reading'][] = $option;
            return $options;
        });
    }
});


add_filter('acf/settings/show_admin', '__return_false');



add_action('admin_head', function () {
    echo view('svg')->render();
});



add_action('admin_head', function () {
    $screen = get_current_screen();
    // if ($screen && $screen->id === 'settings_page_my_options_page') {
    echo "<style>            
            [data-toolbar='simple'] iframe {
            height: 75px !important;
            min-height: 75px !important;
            }

            [data-toolbar='simple'] .mce-statusbar {
            display: none;
            }

             [data-toolbar='simple'] .mce-top-part {
            display: none;
            }
        </style>";
    // }
});



/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {

    define('TRIBE_DISABLE_TOOLBAR_ITEMS', true);
    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'secondary_navigation' => __('Secondary Navigation', 'sage'),
        'footer_navigation' => __('Footer Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register image sizes
 */

add_image_size('wide', 300, 150, true);
add_image_size('wide-lg', 600, 300, true);
add_image_size('wide-xl', 900, 450, true);
add_image_size('wide-2xl', 1200, 600, true);

add_image_size('wide-3xl', 1800, 900, true);

// add_image_size('square', 300, 300, true);
// add_image_size('square-lg', 600, 600, true);
// add_image_size('square-xl', 900, 900, true);
// add_image_size('square-2xl', 1200, 1200, true);


add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];
    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);
    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});
