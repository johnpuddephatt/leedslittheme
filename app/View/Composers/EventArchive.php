<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class EventArchive extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'template-events',

    ];

    public function with()
    {

        if (($_GET['layout'] ?? false) == 'list') {
            $sort = [
                "orderby" => "meta_value",
                "meta_key" => "date"
            ];
        } else {
            $sort = [
                'orderby' => ['post_title' => 'ASC'],
            ];
        };

        return [
            'content' => apply_filters('the_content', get_the_content(null, false)),
            'events' => get_posts(array_merge($sort, [
                'post_type' => 'event',
                "order" => "ASC",
                'numberposts' => 9999,
                'page' => (int) get_query_var('paged')
            ]))
        ];
    }
}
