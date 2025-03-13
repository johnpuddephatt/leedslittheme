<?php

namespace App;

use Illuminate\Support\Str;
use function Roots\view;
use function Roots\bundle;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

add_action('load-index.php', function () {
    wp_redirect(admin_url('edit.php?post_type=page'));
});


add_filter('embed_oembed_html', function ($html) {
    if (str_contains($html, 'youtube.com')) {
        $html = str_replace('youtube.com', 'youtube-nocookie.com', $html);
    }
    return $html;
}, 10);

add_filter(
    'admin_menu',
    function ($menu) {
        remove_menu_page('index.php');
        // $customize_url = add_query_arg('return', urlencode(remove_query_arg(wp_removable_query_args(), wp_unslash($_SERVER['REQUEST_URI']))), 'customize.php');
        $customize_url = add_query_arg('return', urlencode(remove_query_arg(wp_removable_query_args(), wp_unslash($_SERVER['REQUEST_URI']))), 'widgets.php');
        remove_submenu_page('widgets.php', $customize_url);
    }
);

add_action('admin_bar_menu', function ($wp_admin_bar) {
    $wp_admin_bar->remove_menu('customize');
}, 999);




add_filter('acf/fields/wysiwyg/toolbars', function ($toolbars) {
    $toolbars['Simple'] = [];
    // $toolbars['Simple'][1] = ['bold', 'italic', 'underline', 'link', 'unlink'];
    $toolbars['Simple'][1] = ['bold', 'italic'];
    return $toolbars;
});


add_filter('acf_svg_icon_picker_folder', function () {
    return 'resources/icons/';
});

add_filter('excerpt_more', function ($more) {
    global $post;
    return ' ';
});

add_filter(
    'excerpt_length',
    function ($length) {
        return 20;
    },
    999
);



add_action('init', function () {
    $post_type_object = get_post_type_object('post');
    $post_type_object->template = array();
});

add_filter('simple_page_ordering_is_sortable', function ($sortable, $post_type) {
    return $post_type === 'person' ? $sortable : false;
}, 10, 2);


// add_filter('render_block', function ($block_content, $block) {
//     // dd($block_content);
//     if ('core/paragraph' === $block['blockName']) {
//         $block_content = new \WP_HTML_Tag_Processor($block_content);
//         $block_content->next_tag(); /* first tag should always be ul or ol */

//         $block_content->add_class('wp-block-paragraph');
//         $block_content->get_updated_html();
//     }

//     return $block_content;
// }, 10, 2);

define('TEC_HIDE_UPSELL', true);
add_filter('tec_common_telemetry_show_optin_modal', '__return_false');


add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    if (($_SERVER['SERVER_NAME'] ?? '') === parse_url(($_SERVER['HTTP_REFERER'] ?? ''), PHP_URL_HOST)) {
        $classes[] = 'internal-referer';
    }

    if (isset($_SERVER['HTTP_X_BARBA'])) {
        $classes[] = 'barba-loaded';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});
